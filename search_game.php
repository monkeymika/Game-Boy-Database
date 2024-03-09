<?
mysqli_query ("SET NAMES utf8");
	 $ser = $_POST[ser];
	$ser = htmlentities($ser);

?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Search results for <? echo $ser; ?></title>
</head>

<body>

    <header>
        <? include "inc/menu.php"; ?>

    </header>

    <main class="integration">

        <div class="container-blocks">
             <?
		  include "config.inc.php";
			$makecal = "select * from GB_jeu where nom like '%$ser%' or ref like '%$ser%' order by nom, boite, code asc";
	/*	  $total = mysql_num_rows($makecal);
		  echo "$total results !";  */
		$makecal2 = mysqli_query($conn,$makecal);
			while ($i=mysqli_fetch_object($makecal2))
	{
?>
				<div class="block-data">
                <div class="database-container">
                    <div class="database-img">
						<? $vfile = "vizu/$i->idjeu.jpg";
							if (file_exists($vfile)) {
	
								
										echo "<img src=\"vizu/$i->idjeu.jpg\" width=\"50\" />";
									}
	 			else {
						
								$vcart = "cartridges/$i->idjeu.jpg";
										if (file_exists($vcart))
										{
										echo "<img src=\"cartridges/$i->idjeu.jpg\" width=\"50\" class=\"picgame\" />";
										}
										else
										{
										
										echo "<img src=\"structure/false.png\" />";
										}

							 }
						?>
						
                       
                    </div>
                    <div class="database-title-content">
                        <h2><? echo $i->nom; ?></h2>
                        <p class="database-info1"><? echo $i->code; ?></p>
                        <p class="database-info2"><? echo $i->boite; ?></p>
                        <a class="see-more" href="<? echo "game-$i->ref-$i->idjeu-$i->boite.html"; ?>">See Details</a>
                    </div>
                </div>
            </div>		
			
<?			
}
			?>
			
			
			
			

            
            
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