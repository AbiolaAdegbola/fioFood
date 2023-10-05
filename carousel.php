<?php include 'connexionBaseDonnee.php'; ?>

<div class="entetePostePublication">
		<a href="">Marché Virtuel de : <span></span></a>
</div>
<div id="carousel" class="owl-carousel">
         <?php 
         $commer ='commerçant';
         $elementmarche = $bdd->prepare('SELECT nommarche,localisationProfil FROM fioFood WHERE profession=:profession');
         $elementmarche->bindParam(':profession',$commer);
         $elementmarche->execute();
         $tableauElementAffiche = array();

while ($elementmarcheInfo = $elementmarche->fetch()) { 

         	if (!empty($elementmarcheInfo['nommarche']) and strlen($elementmarcheInfo['nommarche'])>=2) {  
         	array_push($tableauElementAffiche, strtoupper($elementmarcheInfo['localisationProfil']));
         }}
         $tableauElementAfficheUnique = array_unique($tableauElementAffiche);
         foreach ($tableauElementAfficheUnique as $value) {
         	?>
         	<div class="marcheVirtuel lesMachesDisponible" data-id="<?php echo ($value); ?>"type="button"><?php echo($value); ?>
		</div>
         	<?php  }     ?>
    
  </div>

  <style type="text/css">
  	.marcheVirtuel
  	{
  		width: 90%;
  		min-height: 50px;
  		max-height: 50px;
  		color: white;
  		font-weight: bolder;
  		text-align: center;
  		padding-top: 12px;
  		border-radius: 10px;
  		background-color: seagreen;
  		box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.5);
  	}

  	.marcheVirtuel:hover
  	{
  		color:black;
  		background-color: white;
  	}
  </style>