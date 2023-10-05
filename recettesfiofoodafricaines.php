<?php
     include 'barreDeRecherche.php'; 
?>

<div class="conteneurGeneralmarchVirtuel" style="margin-top: 40px;">
	    <div class="headerPanier" style="font-size: 20px;">Recettes
	       <img src="icon/nameFioFood.png">
	    </div>	      

<div class="conteneurmarchefiofoodUtilisateurPage" align="center">
 	<div class="conteneurmarchefiofoodUtilisateurPageSection">
 	<?php
	$recuperation = $bdd->query('SELECT recette.* FROM recette,fiofood WHERE recette.id_recette=fiofood.id and fiofood.certifierfiofood="1" LIMIT 0,1');
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
	$recuperation = $bdd->query('SELECT recette.* FROM recette,fiofood WHERE recette.id_recette=fiofood.id and fiofood.certifierfiofood="1" LIMIT 1,1');
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
</div>

<?php
     include 'footer.php'; 
?>