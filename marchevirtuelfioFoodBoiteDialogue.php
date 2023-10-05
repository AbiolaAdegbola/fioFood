<?php 
   include 'connexionBaseDonnee.php';
?>
 <div class="conteneurDesVillesmarche">
   <?php 
   $userid = $_POST['userid'];
   $commerc = 'commerçant';
   $recuDonne = $bdd->prepare('SELECT localisationProfil,nommarche,paysmarche FROM fiofood WHERE localisationProfil=:id_user and profession=:profession' );
   $recuDonne->bindParam(':id_user',$userid);
   $recuDonne->bindParam(':profession',$commerc);
   $recuDonne->execute();
   $tableauDouble = array(); 
   $paysmarche =' ';
   $villemarche = ' ';

   while ($recuDonneInfo = $recuDonne->fetch()) {
    if (!empty($recuDonneInfo['nommarche']) and strlen($recuDonneInfo['nommarche'])>=2) {
        array_push($tableauDouble, $recuDonneInfo['nommarche']);    
    }

    if (!empty($recuDonneInfo['paysmarche']) and (strlen($recuDonneInfo['paysmarche'])>=2) and ($paysmarche==' ') and (strlen($paysmarche)<=2)) {
        $paysmarche = $recuDonneInfo['paysmarche'];
    }
    if (!empty($recuDonneInfo['localisationProfil']) and (strlen($recuDonneInfo['localisationProfil'])>=2) and ($villemarche==' ') and (strlen($villemarche)<=2)) {
        
        $villemarche = $recuDonneInfo['localisationProfil'];
    }
       }
       $tableauUnique = array_unique($tableauDouble);
       ?>
       <h1 style="text-align: center;font-size: 22px; color: black;">fioFood : <?php echo($villemarche)  ?></h1>
       <?php 
       foreach ($tableauUnique as $value) {
          ?>
          <ul class="conteneurDesQuartiermarche">
             <ol><a href="marche_virtuel_fiofood.php?nommarche=<?php echo($value); ?>&amp;paysmarche=<?php echo($paysmarche); ?>&amp;villemarche=<?php echo($villemarche); ?>"><?php echo($value); ?></a></ol>
         </ul>
      <?php  } ?>
      
     </div>

<style type="text/css">
	.conteneurDesVillesmarche
	{
		list-style-type: none;
	}

	.lesvillemarche
	{
		margin-left: 10px;
		color: black;
	}

	.conteneurDesQuartiermarche
	{
		color: black;
	}
</style>