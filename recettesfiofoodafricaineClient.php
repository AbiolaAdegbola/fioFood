<?php 
include 'barreDeRecherche.php'; 


      if (isset($_GET['recette'])) {   
      $recettte = htmlspecialchars(simple_decrypt($_GET['recette']));  
      $paysrecette = htmlspecialchars(simple_decrypt($_GET['pays']));
?>
<div class="headerPanier" style="margin-top: 40px;font-size: 20px;">Recettes
       <img src="icon/nameFioFood.png">
    </div>
<div class="recetteChoisir">

        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM recette WHERE id=:id');
    	  $recuperation->bindParam(':id',$recettte);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
		<div class="imagePosteMarcheRecette" align="center">
			<img src="<?php echo 'recettesfiofood/'.$recuperationInfo['imagerecette'];?>">
		</div>
			<div class="recettteDescription">
			<div class="detailsPosteMarcheRecette" align="center">
				<?php 				  
				   echo(($recuperationInfo['nomrecette']));
				 ?>							
			</div>	
				<div class="paysrecette">
					<img src="icon/placeholder.png" width="50px"><br>
					<?php echo ($recuperationInfo['paysrecette']); ?>
				</div>
		 <div class="posteFaireParRecette">
		 	<?php 
		 	if (isset($recuperationInfo['id_recette'])) {
		 		$fairePar =$bdd->prepare('SELECT prenom,nom FROM fiofood WHERE id=:id_recette');
        $fairePar->bindParam(':id_recette',$recuperationInfo['id_recette']);
        $fairePar->execute();
        $faireParInfo = $fairePar->fetch();
		 	?>
		 	<div>publié par : <span><?php echo($faireParInfo['nom']." ".$faireParInfo['prenom']); ?></span></div>
		 	<?php } ?>
		</div><br>
					<div class="detailrecettenombrepersonne">
						<div class="detailrecettenombrepersonneAvantFlex">
							<div class="tempspreparation">
							<img src="icon/tempsprepa.png"><br>
							Temps de préparation :
						</div>
						<div style="font-weight: bolder;">
							<?php echo($recuperationInfo['tempsprepa']); ?>
						</div>
						</div>
						<div class="detailrecettenombrepersonneAvantFlex">
							<div class="tempspreparation">
							    <img src="icon/tempscuisson.png"><br>
							    Temps de cuisson :
						    </div>
						<div style="font-weight: bolder;">
							<?php echo($recuperationInfo['tempscuisson']); ?>
						</div>
						</div>
					</div>

						<div class="detailrecettenombrepersonneAvantFlex">
							<div class="tempspreparation">
							<img src="icon/nombrepersonne.png"><br>
							Nombre de personnes :
						</div>
						<div style="font-weight: bolder;">
							<?php echo($recuperationInfo['nombrepersonne']." personnes"); ?>
						</div>
						</div>
					<ul class="ingredientRecette">
						<h6>Ingrédients : </h6>
						<?php 
					    $ingredient = unserialize($recuperationInfo['ingredients']);
					     foreach ($ingredient as $value) {
					    	?>
                           <li> <?php echo($value); ?></li>
					    <?php }?>
					</ul>

				<ol class="ingredientRecette">
						<h6>Etapes de la préparation : </h6>
						<?php 
					    $preparation = unserialize($recuperationInfo['preparation']);
					     foreach ($preparation as $value) {
					    	?>
                           <li> <?php echo($value); ?></li>
					    <?php }?>
					</ol>
			</div>
 	   <?php }?>
</div>


<!-- les recettes du meme paysles recettes du meme paysles recettes du meme paysles recettes du meme paysles recettes du meme paysles recettes du meme paysles recettes du meme paysles recettes du meme paysles recettes du meme paysles recettes du meme pays -->
<div style="margin-top: 10px;">
	
</div>	      

<div class="conteneurmarchefiofoodUtilisateurPage" align="center">
 	<div class="conteneurmarchefiofoodUtilisateurPageSection">
 	<?php
	 $recuperation = $bdd->prepare('SELECT * FROM recette WHERE paysrecette=:paysrecette LIMIT 0,1');
    	  $recuperation->bindParam(':paysrecette',$paysrecette);
 	     	$recuperation->execute();
	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarcheRecette">
 	  <a href="recettesfiofoodafricaineClient.php?recette=<?php echo(simple_encrypt($recuperationInfo['id'])) ?>&amp;pays=<?php echo(simple_encrypt($recuperationInfo['paysrecette'])); ?>">
		<div class="imagePosteMarchePage">
			<img src="<?php echo 'recettesfiofood/'.$recuperationInfo['imagerecette'];?>">
		</div>
		<div class="detailsPosteMarchePage">
			<div class="detailsPosteMarchePageNom">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nomrecette']))>=40) {
		         		echo(substr(mb_strtolower($recuperationInfo['nomrecette'],'UTF-8'), 0,40).''.'...');
		         }
		         else{
					echo(($recuperationInfo['nomrecette']));
		         }
			?>
			</div>	
             <div class="detailsPosteMarchePagePays">
             	<img src="icon/placeholder.png"><br>
             	<?php echo($recuperationInfo['paysrecette']); ?>
             </div>
             <div class="detailsPosteMarchePageNombre">
			<img src="icon/nombrepersonne.png">			
			<span><?php echo($recuperationInfo['nombrepersonne']." personnes"); ?></span>
             </div>
		</div>
 	  </a>
	</section>
 <?php }?>
 	</div>

  	<div class="conteneurmarchefiofoodUtilisateurPageSection">
 	<?php
	 $recuperation = $bdd->prepare('SELECT * FROM recette WHERE paysrecette=:paysrecette LIMIT 1,1');
    	  $recuperation->bindParam(':paysrecette',$paysrecette);
 	     	$recuperation->execute();
	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarcheRecette">
 	  <a href="recettesfiofoodafricaineClient.php?recette=<?php echo(simple_encrypt($recuperationInfo['id'])) ?>&amp;pays=<?php echo(simple_encrypt($recuperationInfo['paysrecette'])); ?>">
		<div class="imagePosteMarchePage">
			<img src="<?php echo 'recettesfiofood/'.$recuperationInfo['imagerecette'];?>">
		</div>
		<div class="detailsPosteMarchePage">
			<div class="detailsPosteMarchePageNom">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nomrecette']))>=40) {
		         		echo(substr(mb_strtolower($recuperationInfo['nomrecette'],'UTF-8'), 0,40).''.'...');
		         }
		         else{
					echo(($recuperationInfo['nomrecette']));
		         }
			?>
			</div>	
             <div class="detailsPosteMarchePagePays">
             	<img src="icon/placeholder.png"><br>
             	<?php echo($recuperationInfo['paysrecette']); ?>
             </div>
             <div class="detailsPosteMarchePageNombre">
			<img src="icon/nombrepersonne.png">			
			<span><?php echo($recuperationInfo['nombrepersonne']." personnes"); ?></span>
             </div>
		</div>
 	  </a>
	</section>
 <?php }?>
 	</div>
</div> 

<?php
 }
 else{
 	echo "<script>window.location.href='recettesfiofoodafricaines.php';</script>";
 }
     include 'footer.php'; 
 
     
?>