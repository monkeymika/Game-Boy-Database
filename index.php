<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./style.css" />
  <title>Game Boy Database</title>

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <!-- FontAwesome Icons -->
  <script src="https://kit.fontawesome.com/8921e10786.js" crossorigin="anonymous"></script>

</head>

<body>
  <header>
    <!-- NavBar-->
    <nav>
      <div class="logo">
        <img src="./images/logo.png" alt="">
      </div>

      <!-- <div class="logo-main">
        <img src="./images/text-logoGB_pink.png" alt="">
      </div> -->
      <div class="container-nav-user">
        <div class="toggle-btn">
          <button class="burger" onclick="this.classList.toggle('active')">
          </button>
        </div>

        <div class="container-user">
        <?php
            // Afficher les messages d'erreur de connexion
            if (isset($_SESSION['error'])) {
              echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
              // Après l'affichage, supprimez le message d'erreur de la session pour qu'il ne réapparaisse pas après un rafraîchissement de la page
              unset($_SESSION['error']);
            }

            // Afficher un message de succès si l'utilisateur s'est connecté avec succès
            if (isset($_SESSION['user'])) {
              echo '<div class="success-message">' . htmlspecialchars($_SESSION['user']['username']) . '</div>';
              // Vous pourriez également rediriger l'utilisateur ou changer l'affichage selon que l'utilisateur est connecté
            }
          ?>




          <?php if (isset($_SESSION['user']) && isset($_SESSION['user']['profile-image'])): ?>
          <img src="profile-images/<?php echo htmlspecialchars($_SESSION['user']['profile-image']); ?>"
            alt="Profile Image">
          <?php else: ?>
          <i class="fa-solid fa-user"></i>
          <?php endif; ?>

          

        </div>




        <!-- User Modals-->

        <div id="userModal" class="userModal">
          <div class="userModal-content">
            <?php if (isset($_SESSION['user'])): ?>
            <!-- Contenu de la modal pour l'utilisateur connecté -->
            <?php if (isset($_SESSION['user']) && isset($_SESSION['user']['profile-image'])): ?>
          <img src="profile-images/<?php echo htmlspecialchars($_SESSION['user']['profile-image']); ?>"
            alt="Profile Image">
          <?php else: ?>
          <i class="fa-solid fa-user"></i>
          <?php endif; ?>
            <span class="userClose">&times;</span>
            <div class="connected-modal">
              <p>Welcome,
                <?php echo htmlspecialchars($_SESSION['user']['username']); ?>!
              </p>
              <a href="my_collection.php">My Collection</a>
              <a href="my_profile.php">My Profile</a>
              <a href="html/logout.php">Log Out</a>
            </div>
            <?php else: ?>
            <!-- Contenu de la modal pour l'utilisateur non connecté -->
            <img class="modal-img" src="./images/rockmanLogin_GB-database.png" alt="Login Image">
            <p class="login-text">Welcome Back, Hero!
              Ready to continue your adventure? Log in to access your saved games and pick up right where you left off.
              Not yet part of our community? Click 'Register' to join and start your journey with us. Let's play!
            </p>
            <span class="userClose">&times;</span>
            <button id="loginBtn">Login</button>
            <a href="html/register.php" class="register-button">Register</a>
            <?php endif; ?>
          </div>
        </div>


        <!-- User Modals End-->


      </div>

    </nav>

    <div class="overlay">
      <div class="block"></div>
      <div class="block"></div>
      <div class="block"></div>
      <div class="block"></div>
      <div class="block"></div>
      <div class="block"></div>
      <div class="block"></div>
      <div class="block"></div>
    </div>

    <div class="overlay-menu">
      <!-- <div class="menu-title">
        <p>menu</p>
      </div> -->

      <form action="search_game.php" method="post" class="search-bar">
        <input type="text" placeholder="Search..." name="search">
        <button type="button" class="search-button expand-button"><i class="fa-solid fa-magnifying-glass"></i></button>
        <button type="submit" class="search-button submit-button" style="display: none;"><i
            class="fa-solid fa-arrow-right"></i></button>
      </form>



      <div class="container-menu-item">

        <div class="menu-item">
          <div class="menu-item-name">
            <div class="item-toggle toggle-title">
              <p class="title-list">Fullsets<i class="fa-solid fa-sort-down"></i></p>

            </div>
            <ul id="fullset-list" class="hidden toggle-content">
              <div class="fullsetList-part1">
                <a href="../pages/fullset-ASI.html">
                  <li class="items__sub__list">ASI</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">AUS</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">CAN</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">CHN</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">ESP</li>
                </a>
              </div>
              <div class="fullsetList-part2">
                <a href="#">
                  <li class="items__sub__list">EUR</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">FAH</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">FRA</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">FRG</li>
                </a>
              </div>
              <div class="fullsetList-part3">
                <a href="../pages/fullset-ASI.html">
                  <li class="items__sub__list ">GPS</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">HOL</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">ITA</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">JPN</li>
                </a>
              </div>
              <div class="fullsetList-part4">
                <a href="#">
                  <li class="items__sub__list">NOE</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">SCN</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">UKV</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">USA</li>
                </a>
              </div>
            </ul>
          </div>
        </div>



        <div class="menu-item">
          <div class="menu-item-name">
            <div class="item-toggle toggle-title">
              <p class=" title-list">Zoom On<i class="fa-solid fa-sort-down"></i></p>

            </div>
            <ul id="zoom" class="hidden toggle-content">
              <div class="list-part1">
                <a href="../pages/fullset-ASI.html">
                  <li class="items__sub__list">Ads & Catalog</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">Dig into the database</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">Zoom on Companies</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">Clasic Disney</li>
                </a>


              </div>
              <div class="list-part2">
                <a href="#">
                  <li class="items__sub__list">Ocean budget white boxes</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">Player's choice</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">Timeline Listing</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">Loose Collection</li>
                </a>

              </div>
            </ul>
          </div>
        </div>
        <div class="menu-item">
          <div class="menu-item-name">
            <div class="item-toggle toggle-title">
              <p class=" title-list">About<i class="fa-solid fa-sort-down"></i></p>

            </div>
            <ul id="about" class="hidden toggle-content">
              <div class="list-part1">
                <a href="../pages/fullset-ASI.html">
                  <li class="items__sub__list">How can you help ?</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">Statistics</li>
                </a>
                <a href="#">
                  <li class="items__sub__list">The Team</li>
                </a>
              </div>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Hero Section -->

    <div class="hero-section">
      <div class="hero-content">
        <!-- Le h1 aura l'animation de "slide in from top" -->
        <h1>Welcome to <br> Game Boy Database</h1>
        <!-- Le texte en italique aura également l'animation avec un délai -->
        <p class="italic-text">A site for All Collectors</p>
        <!-- Le paragraphe aura l'animation avec un délai plus long -->
        <p>Initially launched by a collector, the site aims to reference all possible versions of each game. The project
          is community-based, currently primarily managed at the IT level by Guilh, Eegbor, RPGHCG, and Unexist.. We
          don't own everything. Do not hesitate to send us scans, photos, information on the email below .... We will be
          happy to share them. Excellent visit.</p>
        <!-- Le bouton aura l'animation avec le délai le plus long -->
        <div class="btn-hero-container">
          <a href="" class="btn-hero">
            See The Database
          </a>
        </div>
      </div>
      <!-- L'image de la Game Boy aura son propre effet d'animation en glissant de la droite -->
      <img src="./images/gameboy_simple.png" alt="" class="gameboy-image">
    </div>

  </header>

  <main class="main-style">
    <section class="birthday">

      <h2 class="doubleLines">Happy birthday to these game</h2>

      <div class="posts">
        <article>
          <a href="#">
            <div class="container-birthday-img">
              <img src="./images/marioGolf.jpg" alt="">
            </div>
          </a>
          <div class="content-birthday">
            <h3>Mario Golf</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, in.</p>
            <a class="see-more" href="#">See More</a>
          </div>
        </article>
        <article>
          <a href="#">
            <div class="container-birthday-img">
              <img src="./images/marioGolf.jpg" alt="">
            </div>
          </a>
          <div class="content-birthday">
            <h3>Mario Golf</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, in.</p>
            <a class="see-more" href="#">See More</a>
          </div>
        </article>
        <article>
          <a href="#">
            <div class="container-birthday-img">
              <img src="./images/marioGolf.jpg" alt="">
            </div>
          </a>
          <div class="content-birthday">
            <h3>Mario Golf</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, in.</p>
            <a class="see-more" href="#">See More</a>
          </div>
        </article>
        <article>
          <a href="#">
            <div class="container-birthday-img">
              <img src="./images/marioGolf.jpg" alt="">
            </div>
          </a>
          <div class="content-birthday">
            <h3>Mario Golf</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, in.</p>
            <a class="see-more" href="#">See More</a>
          </div>
        </article>
        <article>
          <a href="#">
            <div class="container-birthday-img">
              <img src="./images/marioGolf.jpg" alt="">
            </div>
          </a>
          <div class="content-birthday">
            <h3>Mario Golf</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, in.</p>
            <a class="see-more" href="#">See More</a>
          </div>
        </article>
        <article>
          <a href="#">
            <div class="container-birthday-img">
              <img src="./images/marioGolf.jpg" alt="">
            </div>
          </a>
          <div class="content-birthday">
            <h3>Mario Golf</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, in.</p>
            <a class="see-more" href="#">See More</a>
          </div>
        </article>

      </div>
    </section>

    <section class="news">
      <div class="section-title">
        <h2 class="doubleLines">News from the database</h2>
      </div>
      <div class="news-container">
        <article class="news-card">

          <img src="./images/help.jpg" alt="">
          <h3>How can i help ? </h3>
          <p>
            You can help contribute to the database in the following way: look at your collection, and compare with
            what
            we have. Sometimes you will have a tab that we have not referenced. Or higher quality scans. Even a
            missing
            game! In this case, send to dmgdatabase@gmail.com, with your nickname on the site. The game will be added
            in
            a few days, and your name will be given alongside. Thank you !
          </p>

        </article>
        <article class="news-card">

          <img src="./images/logonewgig.jpg" alt="">
          <h3>About the Italian Fullset </h3>
          <p>
            Thanks to Steven, an active contributor, we have made good progress on the Italian fullset. We invite you to
            regularly visit the listing which is being completed day after day. There will of course always be some
            small information, scans, etc.... that will be missing ! We invite potential contributors to do the same!
            The database cannot be complete without this type of help! Thanks to him !
          </p>

        </article>
        <article class="news-card">

          <img src="./images/bookcover.jpg" alt="">
          <h3>About the book </h3>
          <p>
            The book "Game boy Cartridge Collection" has received great success, and is unfortunately no longer
            available, despite two reprints. We're sorry for those who didn't buy it, but maybe one day, we'll reprint
            it, why not? For Loose Collectors who didn't buy it, no worries, everything is on this website ! For the
            happy owners of the book, fortunately, we had planned to be able to update it via a system of stickers.
            Thanks to you, and your contributions, the following versions will be able to be sent by email to each owner
            of the book: Mole Mania Playtronic, Motocross Manics FRG-1, ... Thank you again for your support, and thank
            you for the daily contributions of information to add or modify to improve the database! You are great !
          </p>

        </article>
        <article class="news-card">

          <img src="./images/dontcopy.jpg" alt="">
          <h3>Why Watermarks ? </h3>
          <p>
            We received many requests to know if we were planning to remove the watermarks from certain photos one day.
            We even received an email of insults on the subject. Let's be clear. Box reproduction is not at all the
            policy of the members of this site. We don't understand how people can call themselves collectors while
            printing fake things. At the very beginning of the site, these watermarks were not present. We were
            surprised to find on ebay a fake box designed from a scan of the site. So, in order to preserve the heritage
            of the Game Boy, not to contribute to the development of reproductions, we will never remove these
            watermarks. We're sorry! However, as part of a cultural project (book, ...), you needed one or two photos,
            please send us an email. thank you for your understanding
          </p>

        </article>
        <article class="news-card">

          <img src="./images/inter.jpg" alt="">
          <h3>Game Boy Database Censored !!! </h3>
          <p>
            Please note that for information, an American facebook group automatically deletes any message linking to
            our site. Some people with oversized egos want to think they are the best collectors in the world and have
            the knowledge all to themselves. We ask contributors not to make things worse, and to leave these people
            alone with their knowledge. Thank you for your understanding !
          </p>

        </article>
      </div>
    </section>

    <section class="last-game-added-section">
      <div class="section-title">
        <h2 class="doubleLines">Last Games Added</h2>
      </div>
      <div class="container swiper">
        <div class="slide-container">
          <div class="card-wrapper swiper-wrapper">
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="./images/marioGolf.jpg" alt="" />
              </div>
              <div class="card-content">
                <div class="game-title">
                  <h3>Mario Golf</h3>
                </div>
                <div class="profile-details">
                  <img src="./images/profilRPGHCG.jpg" alt="" />
                  <div class="name-job">
                    <h4 class="name">Contributor : RPGHCG</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="./images/marioGolf.jpg" alt="" />
              </div>
              <div class="card-content">
                <div class="game-title">
                  <h3>Mario Golf</h3>
                </div>
                <div class="profile-details">
                  <img src="./images/profilRPGHCG.jpg" alt="" />
                  <div class="name-job">
                    <h4 class="name">Contributor : RPGHCG</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="./images/marioGolf.jpg" alt="" />
              </div>
              <div class="card-content">
                <div class="game-title">
                  <h3>Mario Golf</h3>
                </div>
                <div class="profile-details">
                  <img src="./images/profilRPGHCG.jpg" alt="" />
                  <div class="name-job">
                    <h4 class="name">Contributor : RPGHCG</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="./images/marioGolf.jpg" alt="" />
              </div>
              <div class="card-content">
                <div class="game-title">
                  <h3>Mario Golf</h3>
                </div>
                <div class="profile-details">
                  <img src="./images/profilRPGHCG.jpg" alt="" />
                  <div class="name-job">
                    <h4 class="name">Contributor : RPGHCG</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="./images/marioGolf.jpg" alt="" />
              </div>
              <div class="card-content">
                <div class="game-title">
                  <h3>Mario Golf</h3>
                </div>
                <div class="profile-details">
                  <img src="./images/profilRPGHCG.jpg" alt="" />
                  <div class="name-job">
                    <h4 class="name">Contributor : RPGHCG</h4>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="swiper-button-next swiper-button-next1 swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-button-prev1 swiper-navBtn"></div>
        <div class="swiper-pagination swiper-pagination1"></div>
      </div>
    </section>

    <section class="most-seen-on-database">
      <div class="section-title">
        <h2 class="doubleLines">Most Seen on the Database</h2>
      </div>
      <div class="container swiper">
        <div class="slide-container">
          <div class="card-wrapper swiper-wrapper">
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="./images/marioGolf.jpg" alt="" />
              </div>
              <div class="card-content">
                <div class="game-title">
                  <h3>Mario Golf</h3>
                </div>
                <div class="profile-details">
                  <img src="./images/profilRPGHCG.jpg" alt="" />
                  <div class="name-job">
                    <h4 class="name">Contributor : RPGHCG</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="./images/marioGolf.jpg" alt="" />
              </div>
              <div class="card-content">
                <div class="game-title">
                  <h3>Mario Golf</h3>
                </div>
                <div class="profile-details">
                  <img src="./images/profilRPGHCG.jpg" alt="" />
                  <div class="name-job">
                    <h4 class="name">Contributor : RPGHCG</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="./images/marioGolf.jpg" alt="" />
              </div>
              <div class="card-content">
                <div class="game-title">
                  <h3>Mario Golf</h3>
                </div>
                <div class="profile-details">
                  <img src="./images/profilRPGHCG.jpg" alt="" />
                  <div class="name-job">
                    <h4 class="name">Contributor : RPGHCG</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="./images/marioGolf.jpg" alt="" />
              </div>
              <div class="card-content">
                <div class="game-title">
                  <h3>Mario Golf</h3>
                </div>
                <div class="profile-details">
                  <img src="./images/profilRPGHCG.jpg" alt="" />
                  <div class="name-job">
                    <h4 class="name">Contributor : RPGHCG</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="./images/marioGolf.jpg" alt="" />
              </div>
              <div class="card-content">
                <div class="game-title">
                  <h3>Mario Golf</h3>
                </div>
                <div class="profile-details">
                  <img src="./images/profilRPGHCG.jpg" alt="" />
                  <div class="name-job">
                    <h4 class="name">Contributor : RPGHCG</h4>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="swiper-button-next swiper-button-next2 swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-button-prev2 swiper-navBtn"></div>
        <div class="swiper-pagination swiper-pagination2"></div>
      </div>
    </section>

    <section class="last-comments">
      <div class="section-title">
        <h2 class="doubleLines">Lasts Comments</h2>
      </div>
      <div class="block-comments">
        <div class="container-comments">
          <div class="game-about">
            <h3>Mario Golf</h3>
          </div>
          <div class="container-data">
            <div class="comments-img">
              <img src="./images/profilRPGHCG.jpg" alt="profil image">
              <div class="user-name-container">
                <h4 class="user-name">RpgHcg</h4>
              </div>
            </div>
            <div class="comments-content">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium perferendis expedita dignissimos
                accusamus nihil consequuntur ducimus eius repellendus dolorum porro.</p>
            </div>
          </div>
          <div class="date-comments">
            <p class="date">11/20/13 12:00 pm</p>
          </div>
        </div>
        <div class="container-comments">
          <div class="game-about">
            <h3>Mario Golf</h3>
          </div>
          <div class="container-data">
            <div class="comments-img">
              <img src="./images/profilRPGHCG.jpg" alt="profil image">
              <div class="user-name-container">
                <h4 class="user-name">RpgHcg</h4>
              </div>
            </div>
            <div class="comments-content">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium perferendis expedita dignissimos
                accusamus nihil consequuntur ducimus eius repellendus dolorum porro.</p>
            </div>
          </div>
          <div class="date-comments">
            <p class="date">11/20/13 12:00 pm</p>
          </div>
        </div>
        <div class="container-comments">
          <div class="game-about">
            <h3>Mario Golf</h3>
          </div>
          <div class="container-data">
            <div class="comments-img">
              <img src="./images/profilRPGHCG.jpg" alt="profil image">
              <div class="user-name-container">
                <h4 class="user-name">RpgHcg</h4>
              </div>
            </div>
            <div class="comments-content">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium perferendis expedita dignissimos
                accusamus nihil consequuntur ducimus eius repellendus dolorum porro.</p>
            </div>
          </div>
          <div class="date-comments">
            <p class="date">11/20/13 12:00 pm</p>
          </div>
        </div>
        <div class="container-comments">
          <div class="game-about">
            <h3>Mario Golf</h3>
          </div>
          <div class="container-data">
            <div class="comments-img">
              <img src="./images/profilRPGHCG.jpg" alt="profil image">
              <div class="user-name-container">
                <h4 class="user-name">RpgHcg</h4>
              </div>
            </div>
            <div class="comments-content">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium perferendis expedita dignissimos
                accusamus nihil consequuntur ducimus eius repellendus dolorum porro.</p>
            </div>
          </div>
          <div class="date-comments">
            <p class="date">11/20/13 12:00 pm</p>
          </div>
        </div>
      </div>
    </section>

    <section class="videos">
      <div class="section-title">
        <h2 class="doubleLines">Some Videos</h2>
      </div>


      <div class="containerVideo swiper">
        <div class="slide-container">
          <div class="card-wrapper swiper-wrapper">
            <div class="cardVideos swiper-slide">
              <a href="http://gangeekstyle.com/" target="_blank">
                <iframe src="https://www.youtube.com/embed/vc8dqEMN0fE" title="YouTube video player" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen="">
                </iframe>
              </a>
            </div>
            <div class="cardVideos swiper-slide">
              <a href="http://gangeekstyle.com/" target="_blank">
                <iframe src="https://www.youtube.com/embed/vc8dqEMN0fE" title="YouTube video player" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen="">
                </iframe>
              </a>
            </div>
            <div class="cardVideos swiper-slide">
              <a href="http://gangeekstyle.com/" target="_blank">
                <iframe src="https://www.youtube.com/embed/vc8dqEMN0fE" title="YouTube video player" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen="">
                </iframe>
              </a>
            </div>
            <div class="cardVideos swiper-slide">
              <a href="http://gangeekstyle.com/" target="_blank">
                <iframe src="https://www.youtube.com/embed/vc8dqEMN0fE" title="YouTube video player" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen="">
                </iframe>
              </a>
            </div>
            <div class="cardVideos swiper-slide">
              <a href="http://gangeekstyle.com/" target="_blank">
                <iframe src="https://www.youtube.com/embed/vc8dqEMN0fE" title="YouTube video player" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen="">
                </iframe>
              </a>
            </div>
          </div>
        </div>
        <div class="swiper-button-next swiper-button-next3 swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-button-prev3 swiper-navBtn"></div>
        <div class="swiper-pagination swiper-pagination3"></div>
      </div>
    </section>


  </main>

  <footer>
    <div class="footer-container">
      <div class="footer-wrapper">
        <div class="footer-widget">
          <a href="#">
            <img src="./images/logoGBDatabase.png" alt="logo footer" class="footer-logo">
          </a>
          <p class="desc">
            Everywhere in the world
          </p>

        </div>
        <div class="footer-widget">
          <h3>Contact</h3>
          <ul class="links">
            <li><a href="mailto:">dmgdatabase@gmail.com</a></li>

          </ul>
        </div>

        <div class="footer-widget">
          <h3>Social Links</h3>
          <ul class="socials">
            <li>
              <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-brands fa-facebook-f"></i></i></a>
            </li>
            <li>
              <a href="#"><i class="fa-brands fa-facebook-f"></i></i></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="copyright-wrapper">
        <p>
          Design and Developed by
          <a href="https://monkeysdev.fr/" target="blank">MonkeysDev</a> || Illustrations by Ivankaiser
        </p>
      </div>
  </footer>

  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js"></script>
  <!-- Font Awesome icon -->
  <script src="https://kit.fontawesome.com/8921e10786.js" crossorigin="anonymous"></script>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <!-- Main  JS -->
  <script src="./js/index.js"></script>
</body>

</html>