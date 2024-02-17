<? include "../config.inc.php";
$ge = $_GET[cd];
$ge = "CHN";

		htmlentities($ge);
   $titlepage = "List $ge";
	 
		  
		  switch ($ge) {
    case "ASI":
        $req2 = "'ASI' or boite='ASI-1'";
		$pra = "(ASI, ASI-1)";
        break;
    case "AUS":
        $req2 = "'AUS' or boite='AUS-1' or boite='AUS-2' or boite='AUS-3' or boite='AUS-4'";
		$pra = "(AUS, AUS-1, AUS-2, AUS-3,AUS-4)";
        break;
    case "CAN":
        $req2 = "'CAN' or boite='CAN-1'";
		$pra = "(CAN, CAN-1)";
        break;

    case "ESP":
        $req2 = "'ESP' or boite='ESP-1' or boite='ESP-2' or boite='NESP' or boite='NEAI' or boite='NEAI-1'";
		$pra = "(ESP, ESP-1, ESP-2, NESP, NEAI, NEAI-1)";
        break;
    case "EUR":
        $req2 = "'EUR' or boite='EUR-1' or boite='EUR-2' or boite='EUR-3' or boite='EUR-4' or boite='NEU6' or boite='NEU6-1' or boite='NEU6-3' or boite='NEU6-4' or boite='NEU6-2' or boite='EUU'";
		$pra = "(EUR, EUR-1, EUR-2, EUR-3, EUR-4, NEU6, NEU6-1, NEU6-2,NEU6-3,NEU-4, EUU)";
        break;
   case "CHN":
        $req2 = "'CHN'";
		$pra = "(CHN)";
        break;		  
   case "FAH":
        $req2 = "'FAH' or boite='FAH-1' or boite='FAH-2' or boite='FAH-3' or boite='FAH-4' or boite='FAH-5' or boite='NFAH' or boite='NFHU' or boite='NFAH-1'";
		$pra = "(FAH, FAH-1, FAH-2, FAH-3, FAH-4, FAH-5, NFAH, NFAH-1, NFHU)";
        break;
    case "FRA":
        $req2 = "'FRA' or boite='FRA-1' or boite='NFRA' or boite='NFRA-1' or boite='NFRA-2' or boite='NFRA-3'";
		$pra = "(FRA, FRA-1, NFRA, NFRA-1, NFRA-2,NFRA-3)";
        break;
    case "FRG":
        $req2 = "'FRG' or boite='FRG-1' or boite='FRG-2' or boite='FRG-3' or boite='FRG-4'";
		$pra = "(FRG, FRG-1, FRG-2, FRG-3, FRG-4)";
        break;
    case "GPS":
        $req2 = "'GPS' or boite='GPS-1' or boite='GPS-2'";
		$pra = "(GPS, GPS-1, GPS-2)";
        break;
    case "HOL":
        $req2 = "'HOL' or boite='HOL-1' or boite='NHOL'";
        break;
    case "ITA":
        $req2 = "'ITA' or boite='ITA-1' or boite='ITA-2' or boite='ITA-3' or boite='NITA' or boite='NITA-1' or boite='NITA-2' or boite='NITA-3' or boite='NEAI' or boite='NEAI-1'";
		$pra = "(ITA, ITA-1, ITA-2, ITA-3, NITA, NITA-1, NITA-2, NITA-3, NEAI, NEAI-1)";
        break;		  
    case "NOE":
        $req2 = "'NOE' or boite='NOE-1' or boite='NOE-2' or boite='NOE-3' or boite='NOE-4' or boite='NOE-5' or boite='NNOE' or boite='NNOE-1'";
		$pra = "(NOE, NOE-1, NOE-2, NOE-3, NOE-4, NOE-5, NNOE, NNOE-1)";
        break;		  
    case "UKV":
        $req2 = "'UKV' or boite='UKV-1' or boite='UKV-2' or boite='UKV-3' or boite='NUKV'";
		$pra = "(UKV, UKV-1, UKV-2, UKV-3, NUKV)";
        break;
    case "SCN":
        $req2 = "'SCN' or boite='SCN-1'";
		$pra = "(SCN, SCN-1)";
        break;		  
    case "USA":
        $req2 = "'USA' or boite='USA-1' or boite='USA-2' or boite='USA-3'";
		$pra = "(USA, USA-1, USA-2, USA-3)";
        break;
	case "JPN":
        $req2 = "'JPN' or boite='JPN-1' or boite='JPN-2'";
		$pra = "(JPN, JPN-1,...)";
        break;
	case "TWN":
        $req2 = "'TWN'";
		$pra = "(TWN)";
        break;		
		  		  
   case "KOR":
        $req2 = "'KOR'";
		$pra = "(KOR)";
        break;
		
		
   case "BRA":
        $req2 = "'BRA'";
		$pra = "(BRA)";
        break;		
		}
		
 mysqli_query ("SET NAMES utf8");
								

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fullset <? echo $ge; ?></title>

    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <main>
        <h1 class="Listing">Listing ASI</h1>

        <section class="cards-container">

		   <?
					
					if ($conn)
					{
			//recherche jeu par nom
$requetechercheliste = "select distinct nom,boite from GB_jeu where boite=$req2 order by nom asc";
$requetechercheliste2 = mysqli_query($conn,$requetechercheliste);
$compteurjeux = $requetechercheliste2->num_rows;
						


				while ($b=mysqli_fetch_assoc($requetechercheliste2))
					
				{
					$bnom = addslashes($b["nom"]);
					$bboite = $b["boite"];
					
					//cherchechaqueversion
					$chercheversion2 = mysqli_query($conn,"select* from GB_jeu where nom='$bnom' and boite ='$bboite' limit 1");
						while ($a=mysqli_fetch_assoc($chercheversion2))							
								{			
					
						$compteversions = mysqli_query($conn,"select* from GB_jeu where nom='$bnom' and boite ='$bboite'");
								$nbv = $compteversions->num_rows ;
								$ref = $a["ref"];
								$nom = $a["nom"];
								$idjeu = $a["idjeu"];
								$boite = $a["boite"];
								
					?>
			
						            <div class="card-game">
									<? echo "<a href=\"game-$ref-$idjeu-$boite.html\">";
									$vfile = "../vizu/$idjeu.jpg";
									if (file_exists($vfile))
									{
									echo "<img src=\"../vizu/$idjeu.jpg\" alt=\"\"></a>";
									}
									else
									{
									echo "<img src=\"../images/picneeded.jpg\"></a>";		
									}
											 ?>	
										
										
                					
               						 <div class="card-info">
                  					  <p class="game-name"><? echo "$nom $boite"; ?></p>
										 <p><?  
											
											if ($nbv>1)
											{
											echo " ($nbv known versions)";
											}
											else
											{
											echo " ($nbv version)";
											
											}
											
											 ?></p>	 
               						 </div>
            							</div>
			
			
			
								
																					<?					


									}
					
				}
				
					}
					
					?>	
			
			
			



			
			
			
			
			
        </section>
    </main>



</body>

</html>