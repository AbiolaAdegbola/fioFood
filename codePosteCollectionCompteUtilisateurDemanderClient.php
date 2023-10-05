<?php 
session_start();
	include 'connexionBaseDonnee.php';
	if (isset($_SESSION['compteUtilisateurDemander'])) {
            $id = $_SESSION['compteUtilisateurDemander'];
          }
 ?>
        	
        	<div class="conteneurmarchefiofoodUtilisateurCompte">
            <div class="conteneurmarchefiofoodUtilisateurAvantDisplay">
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM panier WHERE id_fiofood=:id LIMIT 0,1');
 	     	$recuperation->bindParam(':id',$id);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche" data-id="<?php echo ($recuperationInfo['id']); ?>" >
  		<div class="collectioDetailPanier" data-id="<?php echo ($recuperationInfo['id']); ?>" >
		<div class="imagePosteMarche">
			<img src="<?php echo 'imagepanier/'.$recuperationInfo['imagepanier'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nompanier']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nompanier'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nompanier']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div class="quantiteMinMaxPrixMarche">
					<?php echo((round($recuperationInfo['prixpanier']*( 1 - $recuperationInfo['prixpromo']/100)))." cfa"); ?>		
					</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div class="quantiteMinMaxPrixMarche" style="text-decoration: line-through;">				
					<?php echo($recuperationInfo['prixpanier']." cfa"); ?>
					</div>	
				</div>
			</div>
				<div class="tauxreductionpanier">
					<?php echo($recuperationInfo['prixpromo']."%") ?>
				</div>
			</div>
		</div>
	</div>
	  <div class="ajouterPanierMarcheCollection">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImageCollection" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM panier WHERE id_fiofood=:id LIMIT 1,1');
 	     	$recuperation->bindParam(':id',$id);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
  		<div class="collectioDetailPanier" data-id="<?php echo ($recuperationInfo['id']); ?>" >
		<div class="imagePosteMarche">
			<img src="<?php echo 'imagepanier/'.$recuperationInfo['imagepanier'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nompanier']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nompanier'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nompanier']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div class="quantiteMinMaxPrixMarche">
					<?php echo((round($recuperationInfo['prixpanier']*( 1 - $recuperationInfo['prixpromo']/100)))." cfa"); ?>			
					</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div class="quantiteMinMaxPrixMarche" style="text-decoration: line-through;">				
					<?php echo($recuperationInfo['prixpanier']." cfa"); ?>
					</div>	
				</div>
			</div>
				<div class="tauxreductionpanier">
					<?php echo($recuperationInfo['prixpromo']."%") ?>
				</div>
			</div>
		</div>
	</div>
	  <div class="ajouterPanierMarcheCollection">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImageCollection" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
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
    	  $recuperation = $bdd->prepare('SELECT * FROM panier WHERE id_fiofood=:id LIMIT 2,1');
 	     	$recuperation->bindParam(':id',$id);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
  		<div class="collectioDetailPanier" data-id="<?php echo ($recuperationInfo['id']); ?>" >
		<div class="imagePosteMarche">
			<img src="<?php echo 'imagepanier/'.$recuperationInfo['imagepanier'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nompanier']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nompanier'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nompanier']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div class="quantiteMinMaxPrixMarche">
					<?php echo((round($recuperationInfo['prixpanier']*( 1 - $recuperationInfo['prixpromo']/100)))." cfa"); ?>			
					</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div class="quantiteMinMaxPrixMarche" style="text-decoration: line-through;">				
					<?php echo($recuperationInfo['prixpanier']." cfa"); ?>
					</div>	
				</div>
			</div>
				<div class="tauxreductionpanier">
					<?php echo($recuperationInfo['prixpromo']."%") ?>
				</div>
			</div>
		</div>
	</div>
	  <div class="ajouterPanierMarcheCollection">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImageCollection" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM panier WHERE id_fiofood=:id LIMIT 3,1');
 	     	$recuperation->bindParam(':id',$id);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
  		<div class="collectioDetailPanier" data-id="<?php echo ($recuperationInfo['id']); ?>" >
		<div class="imagePosteMarche">
			<img src="<?php echo 'imagepanier/'.$recuperationInfo['imagepanier'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nompanier']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nompanier'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nompanier']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div class="quantiteMinMaxPrixMarche">
					<?php echo((round($recuperationInfo['prixpanier']*( 1 - $recuperationInfo['prixpromo']/100)))." cfa"); ?>			
					</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div class="quantiteMinMaxPrixMarche" style="text-decoration: line-through;">				
					<?php echo($recuperationInfo['prixpanier']." cfa"); ?>
					</div>	
				</div>
			</div>
				<div class="tauxreductionpanier">
					<?php echo($recuperationInfo['prixpromo']."%") ?>
				</div>
			</div>
		</div>
	</div>
	  <div class="ajouterPanierMarcheCollection">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImageCollection" id="ajouterPanierImageid" type="button">
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
             </div>       		
        	</div>

<!-- session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux session deux -->
        	<div class="conteneurmarchefiofoodUtilisateurCompte">
            <div class="conteneurmarchefiofoodUtilisateurAvantDisplay">
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM panier WHERE id_fiofood=:id LIMIT 4,1');
 	     	$recuperation->bindParam(':id',$id);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche" data-id="<?php echo ($recuperationInfo['id']); ?>" >
  		<div class="collectioDetailPanier" data-id="<?php echo ($recuperationInfo['id']); ?>" >
		<div class="imagePosteMarche">
			<img src="<?php echo 'imagepanier/'.$recuperationInfo['imagepanier'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nompanier']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nompanier'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nompanier']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div class="quantiteMinMaxPrixMarche">
					<?php echo((round($recuperationInfo['prixpanier']*( 1 - $recuperationInfo['prixpromo']/100)))." cfa"); ?>			
					</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div class="quantiteMinMaxPrixMarche" style="text-decoration: line-through;">				
					<?php echo($recuperationInfo['prixpanier']." cfa"); ?>
					</div>	
				</div>
			</div>
				<div class="tauxreductionpanier">
					<?php echo($recuperationInfo['prixpromo']."%") ?>
				</div>
			</div>
		</div>
	</div>
	  <div class="ajouterPanierMarcheCollection">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImageCollection" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM panier WHERE id_fiofood=:id LIMIT 5,1');
 	     	$recuperation->bindParam(':id',$id);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
  		<div class="collectioDetailPanier" data-id="<?php echo ($recuperationInfo['id']); ?>" >
		<div class="imagePosteMarche">
			<img src="<?php echo 'imagepanier/'.$recuperationInfo['imagepanier'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nompanier']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nompanier'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nompanier']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div class="quantiteMinMaxPrixMarche">
					<?php echo((round($recuperationInfo['prixpanier']*( 1 - $recuperationInfo['prixpromo']/100)))." cfa"); ?>			
					</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div class="quantiteMinMaxPrixMarche" style="text-decoration: line-through;">				
					<?php echo($recuperationInfo['prixpanier']." cfa"); ?>
					</div>	
				</div>
			</div>
				<div class="tauxreductionpanier">
					<?php echo($recuperationInfo['prixpromo']."%") ?>
				</div>
			</div>
		</div>
	</div>
	  <div class="ajouterPanierMarcheCollection">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImageCollection" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
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
    	  $recuperation = $bdd->prepare('SELECT * FROM panier WHERE id_fiofood=:id LIMIT 6,1');
 	     	$recuperation->bindParam(':id',$id);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
  		<div class="collectioDetailPanier" data-id="<?php echo ($recuperationInfo['id']); ?>" >
		<div class="imagePosteMarche">
			<img src="<?php echo 'imagepanier/'.$recuperationInfo['imagepanier'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nompanier']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nompanier'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nompanier']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div class="quantiteMinMaxPrixMarche">
					<?php echo((round($recuperationInfo['prixpanier']*( 1 - $recuperationInfo['prixpromo']/100)))." cfa"); ?>		
					</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div class="quantiteMinMaxPrixMarche" style="text-decoration: line-through;">				
					<?php echo($recuperationInfo['prixpanier']." cfa"); ?>
					</div>	
				</div>
			</div>
				<div class="tauxreductionpanier">
					<?php echo($recuperationInfo['prixpromo']."%") ?>
				</div>
			</div>
		</div>
	</div>
	  <div class="ajouterPanierMarcheCollection">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImageCollection" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM panier WHERE id_fiofood=:id LIMIT 7,1');
 	     	$recuperation->bindParam(':id',$id);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
  		<div class="collectioDetailPanier" data-id="<?php echo ($recuperationInfo['id']); ?>" >
		<div class="imagePosteMarche">
			<img src="<?php echo 'imagepanier/'.$recuperationInfo['imagepanier'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nompanier']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nompanier'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nompanier']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div class="quantiteMinMaxPrixMarche">
					<?php echo((round($recuperationInfo['prixpanier']*( 1 - $recuperationInfo['prixpromo']/100)))." cfa"); ?>			
					</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div class="quantiteMinMaxPrixMarche" style="text-decoration: line-through;">				
					<?php echo($recuperationInfo['prixpanier']." cfa"); ?>
					</div>	
				</div>
			</div>
				<div class="tauxreductionpanier">
					<?php echo($recuperationInfo['prixpromo']."%") ?>
				</div>
			</div>
		</div>
	</div>
	  <div class="ajouterPanierMarcheCollection">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImageCollection" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
             </div>       		
        	</div>

<!-- session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois  session trois -->
        	<div class="conteneurmarchefiofoodUtilisateurCompte">
            <div class="conteneurmarchefiofoodUtilisateurAvantDisplay">
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM panier WHERE id_fiofood=:id LIMIT 8,1');
 	     	$recuperation->bindParam(':id',$id);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche" data-id="<?php echo ($recuperationInfo['id']); ?>" >
  		<div class="collectioDetailPanier" data-id="<?php echo ($recuperationInfo['id']); ?>" >
		<div class="imagePosteMarche">
			<img src="<?php echo 'imagepanier/'.$recuperationInfo['imagepanier'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nompanier']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nompanier'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nompanier']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div class="quantiteMinMaxPrixMarche">
					<?php echo((round($recuperationInfo['prixpanier']*( 1 - $recuperationInfo['prixpromo']/100)))." cfa"); ?>			
					</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div class="quantiteMinMaxPrixMarche" style="text-decoration: line-through;">				
					<?php echo($recuperationInfo['prixpanier']." cfa"); ?>
					</div>	
				</div>
			</div>
				<div class="tauxreductionpanier">
					<?php echo($recuperationInfo['prixpromo']."%") ?>
				</div>
			</div>
		</div>
	</div>
	  <div class="ajouterPanierMarcheCollection">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImageCollection" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM panier WHERE id_fiofood=:id LIMIT 9,1');
 	     	$recuperation->bindParam(':id',$id);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
  		<div class="collectioDetailPanier" data-id="<?php echo ($recuperationInfo['id']); ?>" >
		<div class="imagePosteMarche">
			<img src="<?php echo 'imagepanier/'.$recuperationInfo['imagepanier'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nompanier']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nompanier'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nompanier']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div class="quantiteMinMaxPrixMarche">
					<?php echo((round($recuperationInfo['prixpanier']*( 1 - $recuperationInfo['prixpromo']/100)))." cfa"); ?>			
					</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div class="quantiteMinMaxPrixMarche" style="text-decoration: line-through;">				
					<?php echo($recuperationInfo['prixpanier']." cfa"); ?>
					</div>	
				</div>
			</div>
				<div class="tauxreductionpanier">
					<?php echo($recuperationInfo['prixpromo']."%") ?>
				</div>
			</div>
		</div>
	</div>
	  <div class="ajouterPanierMarcheCollection">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImageCollection" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
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
    	  $recuperation = $bdd->prepare('SELECT * FROM panier WHERE id_fiofood=:id LIMIT 10,1');
 	     	$recuperation->bindParam(':id',$id);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
  		<div class="collectioDetailPanier" data-id="<?php echo ($recuperationInfo['id']); ?>" >
		<div class="imagePosteMarche">
			<img src="<?php echo 'imagepanier/'.$recuperationInfo['imagepanier'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nompanier']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nompanier'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nompanier']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div class="quantiteMinMaxPrixMarche">
					<?php echo((round($recuperationInfo['prixpanier']*( 1 - $recuperationInfo['prixpromo']/100)))." cfa"); ?>			
					</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div class="quantiteMinMaxPrixMarche" style="text-decoration: line-through;">				
					<?php echo($recuperationInfo['prixpanier']." cfa"); ?>
					</div>	
				</div>
			</div>
				<div class="tauxreductionpanier">
					<?php echo($recuperationInfo['prixpromo']."%") ?>
				</div>
			</div>
		</div>
	</div>
	  <div class="ajouterPanierMarcheCollection">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImageCollection" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM panier WHERE id_fiofood=:id LIMIT 11,1');
 	     	$recuperation->bindParam(':id',$id);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
  		<div class="collectioDetailPanier" data-id="<?php echo ($recuperationInfo['id']); ?>" >
		<div class="imagePosteMarche">
			<img src="<?php echo 'imagepanier/'.$recuperationInfo['imagepanier'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['nompanier']))>=16) {
         	echo(substr(mb_strtolower($recuperationInfo['nompanier'],'UTF-8'), 0,16).''.'...');
         }
         else{
				   echo(($recuperationInfo['nompanier']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div class="quantiteMinMaxPrixMarche">
					<?php echo((round($recuperationInfo['prixpanier']*( 1 - $recuperationInfo['prixpromo']/100)))." cfa"); ?>		
					</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div class="quantiteMinMaxPrixMarche" style="text-decoration: line-through;">				
					<?php echo($recuperationInfo['prixpanier']." cfa"); ?>
					</div>	
				</div>
			</div>
				<div class="tauxreductionpanier">
					<?php echo($recuperationInfo['prixpromo']."%") ?>
				</div>
			</div>
		</div>
	</div>
	  <div class="ajouterPanierMarcheCollection">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImageCollection" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
             </div>       		
        	</div>

<script type="text/javascript" src="slider/boiteDialogueContact.js"></script>