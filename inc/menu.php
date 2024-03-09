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
          <i class="fa-solid fa-user"></i>
        </div>

        <!-- User Modals-->

        <div id="userModal" class="userModal">
          <div class="userModal-content">
            <img class="modal-img" src="./images/rockmanLogin_GB-database.png" alt="">
            <p class="login-text">Welcome Back, Hero!
              Ready to continue your adventure? Log in to access your saved games and pick up right where you left off.
              Not yet part of our community? Click 'Register' to join and start your journey with us. Let's play!</p>
            <span class="userClose">&times;</span>
            <button id="loginBtn">Login</button>
            <a href="register.html" class="register-button">Register</a>
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
<form method="post" action="search_game.php"> 
      <div class="search-bar">
		
        <input type="text" placeholder="Search..." name="search" value="ser">
        <button type="button" class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
		
			  </div>
</form> 
      <div class="container-menu-item">

        <div class="menu-item">
          <div class="menu-item-name">
            <div class="item-toggle toggle-title">
              <p class="title-list">Fullsets 1/2 <i class="fa-solid fa-sort-down"></i></p>

            </div>
            <ul id="fullset-list" class="hidden toggle-content">
              <div class="list-part1">
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
              <div class="list-part2">
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
            </ul>
          </div>
        </div>

        <div class="menu-item">
          <div class="menu-item-name">
            <div class="item-toggle toggle-title">
              <p class="title-list">Fullsets 2/2<i class="fa-solid fa-sort-down"></i></p>

            </div>
            <ul id="fullset-list-part2" class="hidden toggle-content">
              <div class="list-part1">
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
              <div class="list-part2">
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