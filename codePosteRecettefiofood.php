	<?php 
	session_start();
	    include 'connexionBaseDonnee.php';
	    include 'fonctionEncrypt.php';
	?>
      
            <div class="conteneurmarchefiofoodUtilisateurAvantDisplay">
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM recette WHERE id_recette=:id LIMIT 0,2');
    	  $recuperation->bindParam(':id',$_SESSION['id']);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarcheRecette" style="min-height: 190px;max-height: 190px;">
 	  <a href="recettesfiofoodafricaineClient.php?recette=<?php echo(simple_encrypt($recuperationInfo['id'])) ?>&amp;pays=<?php echo(simple_encrypt($recuperationInfo['paysrecette'])); ?>">
		<div class="imagePosteMarche">
			<img src="<?php echo 'recettesfiofood/'.$recuperationInfo['imagerecette'];?>">
		</div>
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nomrecette']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nomrecette'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nomrecette']));
         }
				 ?>	
             <div style="color:black;">
             	<?php echo($recuperationInfo['paysrecette']); ?>
             </div>
			</div>
 	  </a>
      <div id="divContenantMS">
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?suppRecette=<?php echo $recuperationInfo['id']; ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompteRecette"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
	</section>
 	        <?php }?>
            	</div>
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM recette WHERE id_recette=:id LIMIT 2,2');
    	  $recuperation->bindParam(':id',$_SESSION['id']);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarcheRecette" style="min-height: 190px;max-height: 190px;">
 	  <a href="recettesfiofoodafricaineClient.php?recette=<?php echo(simple_encrypt($recuperationInfo['id'])) ?>&amp;pays=<?php echo(simple_encrypt($recuperationInfo['paysrecette'])); ?>">
		<div class="imagePosteMarche">
			<img src="<?php echo 'recettesfiofood/'.$recuperationInfo['imagerecette'];?>">
		</div>
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nomrecette']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nomrecette'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nomrecette']));
         }
				 ?>	
             <div style="color:black;">
             	<?php echo($recuperationInfo['paysrecette']); ?>
             </div>
			</div>
 	  </a>
      <div id="divContenantMS">
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?suppRecette=<?php echo $recuperationInfo['id']; ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompteRecette"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
	</section>
 	        <?php }?>
            	</div>
            </div>
            	<!-- DEUXIEME BLOCS DEUXIEME BLOCS DEUXIEME BLOCS DEUXIEME BLOCS DEUXIEME BLOCS DEUXIEME BLOCS
            	DEUXIEME BLOCS DEUXIEME BLOCS DEUXIEME BLOCS DEUXIEME BLOCS DEUXIEME BLOCS  -->
            <div class="conteneurmarchefiofoodUtilisateurAvantDisplay">
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM recette WHERE id_recette=:id LIMIT 4,2');
    	  $recuperation->bindParam(':id',$_SESSION['id']);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarcheRecette" style="min-height: 190px;max-height: 190px;">
 	  <a href="recettesfiofoodafricaineClient.php?recette=<?php echo(simple_encrypt($recuperationInfo['id'])) ?>&amp;pays=<?php echo(simple_encrypt($recuperationInfo['paysrecette'])); ?>">
		<div class="imagePosteMarche">
			<img src="<?php echo 'recettesfiofood/'.$recuperationInfo['imagerecette'];?>">
		</div>
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nomrecette']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nomrecette'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nomrecette']));
         }
				 ?>	
             <div style="color:black;">
             	<?php echo($recuperationInfo['paysrecette']); ?>
             </div>
			</div>
 	  </a>
      <div id="divContenantMS">
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?suppRecette=<?php echo $recuperationInfo['id']; ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompteRecette"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
	</section>
 	        <?php }?>
            	</div>
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM recette WHERE id_recette=:id LIMIT 6,2');
    	  $recuperation->bindParam(':id',$_SESSION['id']);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarcheRecette" style="min-height: 190px;max-height: 190px;">
 	  <a href="recettesfiofoodafricaineClient.php?recette=<?php echo(simple_encrypt($recuperationInfo['id'])) ?>&amp;pays=<?php echo(simple_encrypt($recuperationInfo['paysrecette'])); ?>">
		<div class="imagePosteMarche">
			<img src="<?php echo 'recettesfiofood/'.$recuperationInfo['imagerecette'];?>">
		</div>
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nomrecette']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nomrecette'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nomrecette']));
         }
				 ?>	
             <div style="color:black;">
             	<?php echo($recuperationInfo['paysrecette']); ?>
             </div>
			</div>
 	  </a>
      <div id="divContenantMS">
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?suppRecette=<?php echo $recuperationInfo['id']; ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompteRecette"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
	</section>
 	        <?php }?>
            	</div>
            </div>  
	<!-- session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux -->     
            <div class="conteneurmarchefiofoodUtilisateurAvantDisplay">
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM recette WHERE id_recette=:id LIMIT 8,2');
    	  $recuperation->bindParam(':id',$_SESSION['id']);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarcheRecette" style="min-height: 190px;max-height: 190px;">
 	  <a href="recettesfiofoodafricaineClient.php?recette=<?php echo(simple_encrypt($recuperationInfo['id'])) ?>&amp;pays=<?php echo(simple_encrypt($recuperationInfo['paysrecette'])); ?>">
		<div class="imagePosteMarche">
			<img src="<?php echo 'recettesfiofood/'.$recuperationInfo['imagerecette'];?>">
		</div>
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nomrecette']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nomrecette'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nomrecette']));
         }
				 ?>	
             <div style="color:black;">
             	<?php echo($recuperationInfo['paysrecette']); ?>
             </div>
			</div>
 	  </a>
      <div id="divContenantMS">
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?suppRecette=<?php echo $recuperationInfo['id']; ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompteRecette"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
	</section>
 	        <?php }?>
            	</div>
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM recette WHERE id_recette=:id LIMIT 10,2');
    	  $recuperation->bindParam(':id',$_SESSION['id']);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarcheRecette" style="min-height: 190px;max-height: 190px;">
 	  <a href="recettesfiofoodafricaineClient.php?recette=<?php echo(simple_encrypt($recuperationInfo['id'])) ?>&amp;pays=<?php echo(simple_encrypt($recuperationInfo['paysrecette'])); ?>">
		<div class="imagePosteMarche">
			<img src="<?php echo 'recettesfiofood/'.$recuperationInfo['imagerecette'];?>">
		</div>
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nomrecette']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nomrecette'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nomrecette']));
         }
				 ?>	
             <div style="color:black;">
             	<?php echo($recuperationInfo['paysrecette']); ?>
             </div>
			</div>
 	  </a>
      <div id="divContenantMS">
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?suppRecette=<?php echo $recuperationInfo['id']; ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompteRecette"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
	</section>
 	        <?php }?>
            	</div>
            </div>
            	<!-- DEUXIEME BLOCS DEUXIEME BLOCS DEUXIEME BLOCS DEUXIEME BLOCS DEUXIEME BLOCS DEUXIEME BLOCS
            	DEUXIEME BLOCS DEUXIEME BLOCS DEUXIEME BLOCS DEUXIEME BLOCS DEUXIEME BLOCS  -->
            <div class="conteneurmarchefiofoodUtilisateurAvantDisplay">
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM recette WHERE id_recette=:id LIMIT 12,2');
    	  $recuperation->bindParam(':id',$_SESSION['id']);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarcheRecette" style="min-height: 190px;max-height: 190px;">
 	  <a href="recettesfiofoodafricaineClient.php?recette=<?php echo(simple_encrypt($recuperationInfo['id'])) ?>&amp;pays=<?php echo(simple_encrypt($recuperationInfo['paysrecette'])); ?>">
		<div class="imagePosteMarche">
			<img src="<?php echo 'recettesfiofood/'.$recuperationInfo['imagerecette'];?>">
		</div>
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nomrecette']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nomrecette'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nomrecette']));
         }
				 ?>	
             <div style="color:black;">
             	<?php echo($recuperationInfo['paysrecette']); ?>
             </div>
			</div>
 	  </a>
      <div id="divContenantMS">
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?suppRecette=<?php echo $recuperationInfo['id']; ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompteRecette"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
	</section>
 	        <?php }?>
            	</div>
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM recette WHERE id_recette=:id LIMIT 14,2');
    	  $recuperation->bindParam(':id',$_SESSION['id']);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarcheRecette" style="min-height: 190px;max-height: 190px;">
 	  <a href="recettesfiofoodafricaineClient.php?recette=<?php echo(simple_encrypt($recuperationInfo['id'])) ?>&amp;pays=<?php echo(simple_encrypt($recuperationInfo['paysrecette'])); ?>">
		<div class="imagePosteMarche">
			<img src="<?php echo 'recettesfiofood/'.$recuperationInfo['imagerecette'];?>">
		</div>
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nomrecette']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nomrecette'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nomrecette']));
         }
				 ?>	
             <div style="color:black;">
             	<?php echo($recuperationInfo['paysrecette']); ?>
             </div>
			</div>
 	  </a>
      <div id="divContenantMS">
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?suppRecette=<?php echo $recuperationInfo['id']; ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompteRecette"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
	</section>
 	        <?php }?>
            	</div>
            </div>  
<script type="text/javascript" src="slider/boiteDialogueContact.js"></script>