<?
include "config.inc.php";
mysqli_query ("SET NAMES utf8");
$ref = $_GET['id'];
$region = $_GET['area'];
$idjeu = $_GET['idjeu'];

$compteur ==1;

$titlepage = "";
$chercheref = mysqli_query($conn,"select* from GB_jeu where idjeu=$idjeu");


$adresse = "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
$_SESSION['adresse'] = $adresse;


while ($infojeu=mysqli_fetch_assoc($chercheref))
{

$idfamillejeu=$infojeu["id_famille"];
	
$chercheinfofamille = mysqli_query($conn,"select* from GB_famille_jeu where id_famille_jeu=$idfamillejeu");	

	while ($infofamille=mysqli_fetch_assoc($chercheinfofamille))
	{
		
$boitegame=$infojeu["boite"];
$namegame=$infojeu["nom"];
$namegame=addslashes($namegame);
$refgame=$infojeu["ref"];
$bookletgame=$infojeu["notice"];
$cartridgegame=$infojeu["cartouche"];
$codegame=$infojeu["code"];
$dategame=$infojeu["date"];
$devgame=$infofamille["developer"];
$publigame=$infofamille["publisher"];
$distrigame=$infojeu["distri"];
$distrigame2=$infojeu["distri2"];
$distrigame3=$infojeu["distri3"];
$distrigame4=$infojeu["distri4"];
$distrigame5=$infojeu["distri5"];
$youtube=$infofamille["youtube"];
$fcolor=$infojeu["fcolor"];
$bcolor=$infojeu["bcolor"];
$cale=$infojeu["cale"];
$sauvegarde=$infofamille["sauvegarde"];
$supergb=$infofamille["supergb"];
$nbplayers=$infofamille["nb_joueurs"];
$contrib1=$infojeu["contrib1"];
$contrib2=$infojeu["contrib2"];
$contrib3=$infojeu["contrib3"];
$cherchehistoire=$infofamille["histoire"];
$genre=$infofamille["genre"];
$othersystems=$infofamille["othersystems"];	
$credits=$infofamille["credits"];
$import_informations=$infofamille["import_informations"];
$comparaison_boite=$infofamille["comparaison_boite"];
$comparaison_supports=$infofamille["comparaison_supports"];	
$more_informations=$infofamille["more_informations"];
}

}

?>

<?

//script cherche compteur
/*
$testcompt = mysqli_query ($conn,"select * from compteurpages where idjeu=$idjeu");
$nbtest = $testcompt->num_rows;
*/



$cssrand = rand(0,199);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Game info</title>
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="sass/external/swiper-bundle.min.css" />
    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/8921e10786.js" crossorigin="anonymous"></script>
</head>

<body>
	
	 <header class="game-details-header">
        <div class="container-gameboy">
            <div class="screen">
                <div class="screen-content">
                    <div class="message">
                        <div class="message-content">
                            <h1 class="event-text">
                                <? echo "$namegame $boitegame"; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="add-btn-container">
                <div class="add__btns">
                    <i class="fa-solid fa-plus"> Add to my collection</i>
                </div>
            </div>
        </div>
    </header>
	
		<?  include "inc/menu.php"; ?>
	
    <main>
        <div class="bloc__page">



            <div class="container__twoBlocks">

                <div class="left__block">

					
					
					
					<!-- BLOC DE PRESENTATION (titres + images) !-->
                    <div class="game__presentation__container">
                        <div class="container-game-details-title">
                            <div class="container-pixel-img">
                                <img class="pixel-img" src="images/icons/nintendoCartridge.png" alt="pixel image">
                            </div>
                            <h3 class="special-title"><? echo "$namegame $region"; ?></h3>
                        </div>
                        <div class="game-images-container">

                            <div class="container swiper">
                                <div class="slide-container">
                                    <div class="img-wrapper swiper-wrapper">
                                        <div class="swiper-slide">
											
											
											<?
											
											// je vérifie si l'image existe
											$vfile = "vizu/$idjeu.jpg";
											if (file_exists($vfile))
											{
											?>
											<div class="container-img-slide">
                                            <div class="details-img-container">
                                            <img class="game-img" src="vizu/<? echo $idjeu; ?>.jpg" alt="" />
                                            </div>
											</div>	
											<?
											}
											else
											{
												// si elle existe pas, on change. Y aurait moyen de faire plus simple, mais là je fais des copier coller pour bin expliquer
											?>
											<div class="container-img-slide">
                                            <div class="details-img-container">
                                            <img class="game-img" src="images/picneeded.jpg" alt="" />
                                            </div>
											</div>	
											<?
											}
											?>
											</div>
											
											
											
											
											<?
											
											function photopresentation($nomdudossier,$iddem)  //je cree une fonction
											{
											$verif_presence_photo = "$nomdudossier/$iddem.jpg";   // je verifie dans chaque dossier la présence de l'image
												if (file_exists($verif_presence_photo))  // si l'image est vérifiée, on l'ajoute
												{
													
												echo "<div class=\"swiper-slide\">
												<div class=\"details-img-container\">
                                                <img class=\"game-img\" src=\"$nomdudossier/$iddem.jpg\" alt=\"\" />
                                            	</div>
												</div>";	
												
												}
												else {}  // sinon, ben on affiche rien....
											}
											// et là je lance les fonctions pour chaque dossier
										photopresentation ('back',$idjeu);
										photopresentation ('bfront',$idjeu);
										photopresentation ('bback',$idjeu);
										photopresentation ('cartridges',$idjeu);
										photopresentation ('sidetop',$idjeu);
										photopresentation ('sidebottom',$idjeu);
										photopresentation ('sideleft',$idjeu);
										photopresentation ('sideright',$idjeu);
										photopresentation ('flap',$idjeu);
										photopresentation ('pcb',$idjeu);
										photopresentation ('bfront2',$idjeu);
										photopresentation ('bback2',$idjeu);
										photopresentation ('POSTERS',$idjeu);
										photopresentation ('adfront',$idjeu);
										photopresentation ('adback',$idjeu);
										photopresentation ('adfront2',$idjeu);
										photopresentation ('adback2',$idjeu);
											?>
                                    </div>
                                </div>
                                <div class="swiper-button-next swiper-button-next4 swiper-navBtn"></div>
                                <div class="swiper-button-prev swiper-button-prev4 swiper-navBtn"></div>
                                <div class="swiper-pagination swiper-pagination4"></div>
                            </div>
                        </div>
							<? if ($cherchehistoire!='') { echo "<div class=\"game__description\"><p>$cherchehistoire</p></div>";}  ?>
						
                    </div>
				<!-- DOUBLE TABLEAU !-->
                    <div class="game__info__container">
                        <div class="container__table">
                            <div class="individual__info">
                                <div class="container-game-details-title">
                                    <div class="container-game-details-title">
                                        <div class="container-pixel-img">
                                            <img class="pixel-img" src="images/icons/zoom.png" alt="pixel image">
                                        </div>
                                        <h3 class="special-title">About this version</h3>
                                    </div>
                                </div>
                                <table class="infoTable">
                                    <tbody>
                                        <tr>
                                            <td>Flap Code</td>
                                            <td><? echo $refgame; ?>-<? echo $region; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Cartridge Code</td>
                                            <td><? echo $refgame; ?>-<? echo $cartridgegame; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Flap Code</td>
                                            <td><? echo $codegame; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Flap Shape</td>
                                            <td><? //a ajouter ?></td>
                                        </tr>
                                        <tr>
                                            <td>Cartridge Number</td>
                                            <td><? //a ajouter ?></td>
                                        </tr>
                                        <tr>
                                            <td>Box languages</td>
                                            <td>
										<?	
										$cherchelangueboite = mysqli_query($conn,"select* from GB_langue_boite where idjeu=$idjeu");	
										while ($infolangueboite=mysqli_fetch_assoc($cherchelangueboite))
										{

										$langueboite=$infolangueboite["idlangue"];
										if ($langueboite!="") { echo "<img src=\"languages/$langueboite.png\" />" ; }

										}	
										?>
											</td>
                                        </tr>
                                        <tr>
                                            <td>Booklet languages</td>
                                            <td>
										<?	
										$cherchelanguenotice = mysqli_query($conn,"select* from GB_langue_notice where idjeu=$idjeu");	
										while ($infolanguenotice=mysqli_fetch_assoc($cherchelanguenotice))
										{
										$languenotice=$infolanguenotice["idlangue"];
										if ($languenotice!="") { echo "<img src=\"languages/$languenotice.png\" />" ; }
										}
										?></td>
                                        </tr>
	                                    <tr>
                                           <td>Games language(s)</td>
                                           <td>
										<?
										$cherchelanguejeu = mysqli_query($conn,"select* from GB_langue_jeu where idjeu=$idjeu");	
										while ($infolanguejeu=mysqli_fetch_assoc($cherchelanguejeu))
										{
										$languenotice=$infolanguejeu["idlangue"];
										if ($languenotice!="") { echo "<img src=\"languages/$languenotice.png\" />" ; }
										}
										?></td>
                                        </tr>
										<tr>
                                           <td>Importation</td>
                                           <td>
										<?
										$chercheimport = mysqli_query($conn,"select* from GB_import where idjeu=$idjeu");
										while ($import = mysqli_fetch_assoc($chercheimport))
										{
										$importpays = $import["idpays"];	
										echo "<img src=\"pays/$importpays.png\" />";
										}
										?>
											</td>
									    </tr>
                                        <tr>
                                            <td>Cale</td>
                                            <td>
										<? 
										if ($cale!=0)
		 									{
												if ($cale==1)
												{
														 echo "<img src=\"images/transparent.png\" /><br />Transparent plastic inlay";
												}
												if ($cale==2)
												{
														 echo "<img src=\"images/cart.png\" /><br />Cardboard inlay (game on top)";
												}
												if ($cale==3)
												{
														 echo "<img src=\"images/strange.png\" /><br />Cardboard inlay (game in the middle)";
												}		 		 
											} 
										?>
											</td>
                                        </tr>
                                        <tr>
                                            <td>Editeur</td>
                                            <td>
										<?
										if($publigame!='')
											{
											echo "<img src=\"company/logos/$publigame.jpg\" />"; 
											} 
										?>
											</td>
                                        </tr>
                                        <tr>
                                            <td>Distributeur</td>
                                            <td>
										<?
										$cherchedistri = mysqli_query($conn,"select* from GB_distri_jeu where id_jeu=$idjeu");	
										while ($infodistri=mysqli_fetch_assoc($cherchedistri))
											{
											$distri1=$infodistri["id_company"];
													if ($distri1!="")
													{ 
													echo "<img src=\"company/logos/$distri1.jpg\" /><br />";
													}

											}
										?>
											</td>
                                        </tr>
                                    </tbody>
                                    </tr>
                                </table>
                            </div>
                            <div class="multiple__info">
                                <div class="container-game-details-title">
                                    <div class="container-pixel-img">
                                        <img class="pixel-img" src="images/icons/chat.png" alt="pixel image">
                                    </div>
                                    <h3 class="special-title">About the game</h3>
                                </div>
                                <table class="infoTable">
                                    <tbody>
										                                        <tr>
                                            <td>Developed by</td>
                                            <td>
											<?
											if($devgame!='')
												{
												echo "<img src=\"company/logos/$devgame.jpg\" />";
												} 
											?>
											</td>
                                        </tr>
                                        <tr>
                                            <td>Others supports</td>
                                            <td><? echo $othersystems; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Saving</td>
                                            <td>
											<?
											if ($sauvegarde==0)
												{
												echo "<img src=\"images/interrogation.png\" />"; 	
												}
											if ($sauvegarde==1)
												{
												echo "<img src=\"images/battery.png\" />"; 
												}
											if ($sauvegarde==2)
												{
												echo "<img src=\"images/password.png\" />"; 
												}
											if ($sauvegarde==3)
												{
												echo "No save available"; 
												}
											?>
											</td>
                                        </tr>
                                        <tr>
                                            <td>Gaming type</td>
                                            <td>
											<?
											$recherchegenre = mysqli_query($conn,"select* from GB_genre where id_genre=$genre");
												while ($cherchegenre=mysqli_fetch_assoc($recherchegenre))
													{
													echo $cherchegenre["genre"];
													}
											?>
											</td>
                                        </tr>
                                        <tr>
                                            <td>Number of players</td>
                                            <td>
											<?
												if ($nbplayers==1)
												{
												echo "<img src=\"images/1player.jpg\" />";	
												}
												if ($nbplayers==2)
												{
												echo "<img src=\"images/2player.jpg\" />";	
												}	
												if ($nbplayers==4)
												{
												echo "<img src=\"images/4player.jpg\" />";	
												}
												if ($nbplayers==0)
												{
												echo "unknown";	
												}		
											?>
											</td>
                                        </tr>
                                        <tr>
                                            <td>Super Game Boy Functions</td>
                                            <td>
											<? 
												if ($supergb==2)
													{
													echo "None";	
													}
												else
													{
													if ($supergb==0)
														{
														echo "?";	
														}	
														else
														{
														echo "<img src=\"images/supergb.jpg\" />";		
														}
													}
											 ?>
											</td>
                                        </tr>
										<tr>
                                           <td>Youtube</td>
                                           <td>
											 <?
											if ($youtube)
												{	?>
														<iframe width="280" height="157" src="https://www.youtube.com/embed/<? echo $youtube; ?>?si=TBF49S7W1YoId3N1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>	
											<?
												 }	?>
											</td>
                                                </tr>
				
										
											<?
											$chercheserie = mysqli_query($conn,"select* from GB_serie_jeu where idfamille=$idfamillejeu");
											$compteserie = mysqli_num_rows($chercheserie);

														if ($compteserie>0)
														{
														?>
														<tr>
														<td>This game belongs to ...</td>
														<td>
														<?
															while ($infoserie=mysqli_fetch_assoc($chercheserie))
																{
															$idserie=$infoserie["idserie"];	
															$cherchenomserie=mysqli_query($conn,"select* from GB_serie where idserie=$idserie");
																while ($cherchenomserie2=mysqli_fetch_assoc($cherchenomserie))
																	{
																	$nomserie = $cherchenomserie2["nomserie"];
																	$iconeserie = $cherchenomserie2["iconeserie"];
																	echo "<img src=\"icone_serie/$iconeserie\" /> $nomserie<br />";	
																	}
																}
														?></td>
														</tr>
														<?
														}
														?>
                                    </tbody>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="other__photos">
                        <div class="container-game-details-title">
                            <div class="container-pixel-img">
                                <img class="pixel-img" src="images/icons/camera.png" alt="pixel image">
                            </div>
                            <h3 class="special-title">Screenshots</h3>
                        </div>
                        <div class="game-ohter-img-container">


                            <div class="container swiper">
                                <div class="slide-container">
                                    <div class="img-wrapper swiper-wrapper">
  									 <?  //Fonction script de recherche des photos sur le serveur appellé plusieurs fois dans la page 
										function scandir_through($dir)
											{
											$items = glob($dir . '/*');
											for ($i = 0; $i < count($items); $i++)
												{
												if (is_dir($items[$i]))
													{
													$add = glob($items[$i] . '/*');
													$items = array_merge($items, $add);
													scandir_through($items[$i]);
													}
												}
											return $items;
											}
										//appel de la fonction pour la partie screenshots		
										$dir="screens/$idfamillejeu";
										foreach(scandir_through($dir) as $key=>$filename)
											{
											?>
										<div class="swiper-slide">
                                            <div class="details-img-container">
                                           	<img class="game-img" src="<? echo $filename; ?>" alt="<? echo $filename; ?>" />
                                            </div>
										</div>
										<?
										}
										?>
                                    </div>
                                </div>
                                <div class="swiper-button-next swiper-button-next5 swiper-navBtn"></div>
                                <div class="swiper-button-prev swiper-button-prev5 swiper-navBtn"></div>
                                <div class="swiper-pagination swiper-pagination5"></div>
                            </div>
                        </div>
                    </div>
						<?
					//affichage du bloc crédits si celui ci est renseigné
						if ($credits!="")
							{
						?> 
						<div class="credit__container">
							<div class="credit">
							<div class="container-game-details-title">
								<div class="container-pixel-img">
								<img class="pixel-img" src="images/icons/note.png" alt="pixel image">
								</div>
								<h3 class="special-title">Credits</h3>
							</div>
							<? echo $credits; ?>
							</div>
						</div>
						<?	}
						?>
                           
                    

                    <div class="pcb__container">

                        <div class="pcb">
                            <div class="container-game-details-title">
                                <div class="container-pixel-img">
                                    <img class="pixel-img" src="images/icons/settings.png" alt="pixel image">
                                </div>
                                <h3 class="special-title">PCB Technical Information</h3>
                            </div>
                            <ul>
                                <li>Taille de la ROM : 1 Mbit / 128 ko</li>
                                <li>PCB : DMG-BEAN-02</li>
                                <li>Mapper : MBC1-B</li>

                            </ul>
                        </div>
                    </div>
						<?
						//affichage bloc importations si celui-ci est renseigné
						if ($import_informations!='')
						{
						?>
							<div class="import">
                        	<div class="container-game-details-title">
                            		<div class="container-pixel-img">
                            		<img class="pixel-img" src="images/icons/www.png" alt="pixel image">
                            		</div>
                            		<h3 class="special-title">Import Versions</h3>
                        	</div>
                        	<? echo $import_informations; ?>
		                    </div>
						<?
						}
						//Affichage bloc comparaison boites si celui-ci est renseginé
						
						if ($comparaison_boite!='')
						{
						?>				
							<div class="cover__compare">
							<div class="container-game-details-title">
									<div class="container-pixel-img">
									<img class="pixel-img" src="images/icons/note.png" alt="pixel image">
									</div>
									<h3 class="special-title">Cover Comparison</h3>
							</div>
							<? echo $comparaison_boite; ?>
							</div>			
						<?					
						}
						?>    			
  
					<div class="ingame__compare">
                        <div class="container-game-details-title">
                            <h3 class="special-title">In-game Comparison</h3>
                        </div>
                        <ul>
                            <li>Les versions EURO et USA sont exactement les mêmes.</li>
                            <li>L’écran titre de la version JPN affiche le titre du jeu en kanji tandis que
                                celui des versions EURO et USA affiche le titre du jeu en écriture occidentale.
                            </li>
                        </ul>
                    </div>

                    <div class="version__compare">
                        <div class="container-game-details-title">
                            <h3 class="special-title">Comparaison Versions</h3>
                        </div>
                        <ul>
                            <li>Dans la version GB, les 8 iles sont découpées en 6 niveaux, le sixième étant
                                celui du boss. Dans la version NES, le nombre de niveaux est variable suivant
                                les iles. Il peut y en avoir plus ou moins que sur GB.
                            </li>
                            <li>La version NES possède une carte des 8 iles permettant de suivre la progression
                                du héro au sein même de l’ile. Cette carte est visible à la fin de chaque niveau
                                sauf celui du boss.
                            </li>
                        </ul>
                    </div>

                    <div class="additional__info">
                        <div class="container-game-details-title">
                            <div class="container-pixel-img">
                                <img class="pixel-img" src="../images/icons/help.png" alt="pixel image">
                            </div>
                            <h3 class="special-title">Additional Information</h3>
                        </div>
                        <ul>
                            <li>Les versions EURO et USA sur GB s’intitulent Adventure Island alors que la
                                version NES/Famicom s’intitule Adventure Island II. Il y a effectivement un
                                épisode sur NES sorti auparavant mais ce dernier n’a jamais été adapté sur GB.
                                Les versions occidentales ont donc commencé leur numérotation par cet épisode
                                car c’est le 1er sorti sur ce support. Les versions orientales JPN et CHN ont,
                                quant à elles, gardé la numérotation correcte.
                            </li>
                            <li>La front cover de la version EURO sur GB reprend le même artwork que celle du
                                1er épisode sur NES en version USA ou sur Famicom en version JPN, ce qui est
                                d’autant plus trompeur.
                            </li>
                            <li>Ce jeu est l'un des rares pour lequel les inscriptions "Mode d'emploi en
                                français" "Met nederlandse handleiding" sur la front cover de la version FAH
                                n'apparaissent pas.
                            </li>
                            <li>Si on regarde le dos de la boite de la version JPN ou CHN et la face avant des
                                versions européennes, on remarque qu’il y a un crédit pour Light & Shadows, Inc.
                                Susumu Matsushita. Ce dernier est en fait celui qui a réalisé le dessin du
                                personnage de Master Higgins et Light & Shadows, Inc. est sa compagnie.
                                L’artwork de la version USA a surement été fait par quelqu’un d’autre puisque ce
                                crédit n’apparait nulle part sur la boite.
                            </li>
                            <li>La série des Adventure Island a connu 6 épisodes dispersés sur plusieurs
                                supports. Les 4 1er épisodes sont sortis sur NES entre 1986 et 1994. Le 1er est
                                également sorti sur MSX, le 2ème et le 3ème ont connu une adaptation sur GB et
                                le 4ème est sorti uniquement sur NES et n’a jamais dépassé les frontières du
                                Japon. Les 2 derniers ont suivi sur SNES en 1992 et 1994 sous le nom de Super
                                Adventure Island 1 et 2 et la série s’est arrêtée là.
                            </li>
                            <li>La série des Adventure Island est souvent comparée à Wonder Boy 1er du nom sur
                                Master System. Et pour cause ! Les 1ers opus de ces 2 séries sont à l’origine le
                                même jeu ! Escape (connu maintenant sous le nom de Westone) a créé pour
                                commencer le jeu Wonder Boy sur arcade. Sega l’a distribué puis l’a ensuite
                                sorti sur sa console, la Master System. Escape avait donc un accord avec Sega
                                mais une version NES était également prévue. A cette époque, Sega et Nintendo
                                étaient de grands rivaux donc Hudson s’est chargé de la distribution du jeu sur
                                la console de Nintendo en effectuant quelques modifications sur le jeu original
                                car Sega était propriétaire du titre du jeu, du nom et de l’apparence du héros.
                                C’est ainsi que Adventure Island fut créé. Hudson conserva la majorité de
                                l’ambiance et du gameplay pour ses épisodes suivant tandis que Sega et Escape
                                orientèrent la série Wonder Boy dans une ambiance médiéval/fantasy.
                            </li>
                        </ul>
                    </div>

				<?
				// bloc photos autres supports. On regarde déjà s'il existe d'autres supports, ensuite on va chercher avec la fonction de recherche d'images et on affiche
				if ($othersystems!='None')
					{
					 ?>
					<div class="screenshots">
						<div class="container-game-details-title">
						<h3 class="special-title">Other systems</h3>
						</div>
					<div class="container__screenshots">
						<div class="container swiper">
							<div class="slide-container">
								<div class="img-wrapper swiper-wrapper">
					<?
					$dir3="others/$idfamillejeu";
					foreach(scandir_through($dir3) as $key=>$filename)
						{
					?>
						<div class="swiper-slide">
							<div class="details-img-container">
							<img class="game-img" src="<? echo $filename; ?>" alt="<? echo $filename; ?>" />
							</div>
                        </div>
					<?
						}
					?>
					    </div>
                                </div>
                                <div class="swiper-button-next swiper-button-next6 swiper-navBtn"></div>
                                <div class="swiper-button-prev swiper-button-prev6 swiper-navBtn"></div>
                                <div class="swiper-pagination swiper-pagination6"></div>
                            </div>

                        </div>
                    </div>				
					<?
						}
 					?>
	                   <div class="magazine__test other__photos">
                        <div class="container-game-details-title">
                            <h3 class="special-title">Seen in the press</h3>
                        </div>

                        <div class="container-magazine-test">
                            <div class="container swiper">
                                <div class="slide-container">
                                    <div class="img-wrapper swiper-wrapper">
					<?
					//script presse, je scanne le serveur voir si des photos existenrt
						$dir2="tests/$idfamillejeu";
						foreach(scandir_through($dir2) as $key=>$filename)
							{
							?>
						   <div class="swiper-slide">
								<div class="details-img-container">
								<img class="game-img" src="<? echo $filename; ?>" alt="<? echo $filename; ?>" />
								</div>
						   </div>
							<?
							}
							?>
                           </div>
                                </div>
                                <div class="swiper-button-next swiper-button-next7 swiper-navBtn"></div>
                                <div class="swiper-button-prev swiper-button-prev7 swiper-navBtn"></div>
                                <div class="swiper-pagination swiper-pagination7"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right__block">
                    <div class="other-versions">
                        <div class="container-game-details-title">
                            <div class="container-pixel-img">
                                <img class="pixel-img" src="images/icons/pixelClock.png" alt="pixel image">
                            </div>
                            <h3 class="special-title">Other Versions</h3>
                        </div>
				<?  // je vais chercher dans la BD toutes les autres verisons
		  		$compteurversions=0;
		  		$chercheversions = mysqli_query($conn,"select* from GB_jeu where id_famille=$idfamillejeu order by boite,code asc");
					while ($z = mysqli_fetch_assoc($chercheversions))
					  {
					$dateversion = $z["date"];
					$refversion = $z["ref"];
					$idjeuversion = $z["idjeu"];
					$boiteversion = $z["boite"];
			 		$nomjeuversion = $z["nom"]; 
						if (($dateversion!='')&&($dateversion!='No date appears'))
		 					{
					 		$dr = $dateversion;
							}
						else
							{
							$dr="";
							}
			  		$vfile = "vizu/$idjeuversion.jpg";
						if (file_exists($vfile))
							{
							$adrautreimage = "vizu/$idjeuversion.jpg";
							}
							else
							{
							$adrautreimage = "images/picneeded.jpg";		
							}
		  
	  //CSS mika
					echo "<div class=\"other-versions-container\">";
					echo "<a href=\"game-$refversion-$idjeuversion-$boiteversion.html\">";
					echo "<div class=\"other-versions-img-container\">";
					echo "<img class=\"game-img\" src=\"$adrautreimage\" alt=\"other versions image\" />";    
					echo "</div><div class=\"other-versions-details\">";
					echo "<p>$nomjeuversion $boiteversion $dr";
	//cherchedrapaux import
			  
					$chercheimp = mysqli_query ($conn,"select * from GB_import where idjeu=$idjeuversion"); 
						 while ($drap = mysqli_fetch_assoc($chercheimp))
							{ 
							$paysimp = $drap["idpays"];
							echo "<img src=\"pays/$paysimp.png\" width=\"16\" height=\"16\" />";
							}
					echo "</p></div></a></div>";
					$compteurversions++;
					  } 
					?>
                    </div>
                    <div class="timeline">
                        <div class="container-game-details-title">
                            <div class="container-pixel-img">
                                <img class="pixel-img" src="images/icons/pixelClock.png" alt="pixel image">
                            </div>
                            <h3 class="special-title">timeline</h3>
                        </div>
                        <div class="panel-heading">
				<?
				$timelinereq = mysqli_query($conn,"select* from GB_jeu where id_famille=$idfamillejeu order by code asc");
				while ($datereq = mysqli_fetch_assoc($timelinereq))
					{
					$date = $datereq["date"];
					$nomjeudate = $datereq["nom"];
					$boitejeudate = $datereq["boite"];
						if ($date=='')
							{
							}
						else
							{	
							echo "<p class=\"textelist\">$date : $nomjeudate - $boitejeudate</p>"; 
							echo "<hr />";
							}
					}
			?>
                        </div>
                    </div>
                    <!-- <div class="container__comments">
                        <form class="comment__form" name="form1" method="post" action="leavecomment.php">
                            <p>Leave a comment about this game :</p>
                            <div class="text__zone">
                                <textarea name="comment"></textarea>
                                <input name="game" type="hidden" value="GO">
                                <input name="url" type="hidden"
                                    value="https://www.game-boy-database.com/game-GO-4798-AUS-1.html">
                                <div class="container__post">
                                    <input class="post" type="submit" name="Submit" value="Post !">
                                </div>
                            </div>
                        </form>
                    </div> -->
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js"></script>
    <script src="https://kit.fontawesome.com/8921e10786.js" crossorigin="anonymous"></script>
    <!-- Swiper JS -->
    <script src="../js/swiper-bundle.min.js"></script>
    <script src="../js/index.js"></script>


    <div id="modal" class="modal">
        <span id="closeModal" class="close">&times;</span>
        <div class="modal-zoom-container" id="zoomContainer">
            <img class="modal-content" id="modalImg">
        </div>
        <div id="caption"></div>
    </div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.4/gsap.min.js"></script>
  <script src="https://kit.fontawesome.com/8921e10786.js" crossorigin="anonymous"></script>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="./js/index.js"></script>

</body>

</html>