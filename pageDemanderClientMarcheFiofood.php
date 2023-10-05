<?php
    include 'barreDeRecherche.php'; 
?>

<?php 
if (isset($_GET['id'])) {
	$utilisateur = htmlspecialchars(simple_decrypt($_GET['id']));
        	$infoUtilisateur = $bdd->prepare('SELECT * FROM fiofood WHERE id = :id_fiofood');
        	$infoUtilisateur->bindParam(':id_fiofood',$utilisateur);
        	$infoUtilisateur->execute();
        	$infoUtilisateurInfo = $infoUtilisateur->fetch();
        	?>
       	<div class="headerMarcheVirtuel">
 		     <div class="logofiofoodImg" align="center">
                 <img src="icon/nameFioFood.png">
               </div>
 		<span class="iconVillemarche"><i class="fa fa-street-view" aria-hidden="true"></i></span>
 		<span class="lesMachesDisponible" data-id="<?php echo ($infoUtilisateurInfo['localisationProfil']); ?>"> <?php echo($infoUtilisateurInfo['localisationProfil']); ?> </span>
 		<span class="iconVillemarcheTerminel"><i class="fa fa-terminal" aria-hidden="true"></i></span>
 		<span><?php echo(" ".$infoUtilisateurInfo['nommarche']); ?> </span>
 		<span class="iconVillemarcheTerminel"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span>
 		<span><?php echo($infoUtilisateurInfo['prenom']." ".$infoUtilisateurInfo['nom']); ?></span>			
 	</div>
        	<div class="infoUtilisateurMarche">
        		<div class="iconPhotoMarche">
        			<img src="photoProfilCouverture/<?php if(!empty($infoUtilisateurInfo['photo'])){echo($infoUtilisateurInfo['photo']);}else{echo("iconDefault.png");} ?>">
        			<?php 
             if ($infoUtilisateurInfo['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;bottom: 25px;
        left: 43px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
        		</div>
        		<div class="nomUtilisateurMarche">
        			<?php echo($infoUtilisateurInfo['prenom']." ".$infoUtilisateurInfo['nom']) ?>
        			<span an>
        		</div>
        		<div class="conteneurContactUtilisateur">
		 	<a href="tel:<?php echo $infoUtilisateurInfo['numero'];?>">
		 		<span><i class="fa fa-mobile" aria-hidden="true" id="icontelePageDemander"></i>
		 	</span><strong class="cacheNumero"><?php echo $infoUtilisateurInfo['numero'];?></strong>
		 	</a>
		 	<a href="https://wa.me/<?php echo $infoUtilisateurInfo['numero'];?>">
		 		 <span><i class="fa fa-whatsapp" aria-hidden="true" id="iconwhatPageDemander"></i>
		 	</span><strong class="cacheNumero"><?php echo $infoUtilisateurInfo['numero'];?></strong>
		 	</a>
		 	<a href="sms:<?php echo $infoUtilisateurInfo['numero'];?>">
		 		<span><i class="fa fa-sms" aria-hidden="true" id="iconSMSPageDemander"></i></span>
		 	</a>
		 </div>
        	</div>
       <div class="conteneurmarchefiofoodUtilisateur">
           <div class="conteneurmarchefiofoodUtilisateurAvantDisplay">
            <div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 0,2');
 	     	$recuperation->bindParam(':id',$utilisateur);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
		<div class="imagePosteMarche">
			<img src="<?php echo 'image/'.$recuperationInfo['img1'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($recuperationInfo['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($recuperationInfo['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div>
						Min <?php echo("1 - ".$recuperationInfo['minquantite']); ?>
					</div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div>Max > <?php echo($recuperationInfo['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixmax']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
	  <div class="ajouterPanierMarche">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
            <div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 2,2');
 	     	$recuperation->bindParam(':id',$utilisateur);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
		<div class="imagePosteMarche">
			<img src="<?php echo 'image/'.$recuperationInfo['img1'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($recuperationInfo['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($recuperationInfo['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div>
						Min <?php echo("1 - ".$recuperationInfo['minquantite']); ?>
					</div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixannonce'],'UTF-8'), 0,8).''.'...');
                 }else{
				   echo(($recuperationInfo['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div>Max > <?php echo($recuperationInfo['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixmax']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
	  <div class="ajouterPanierMarche">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
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
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 4,2');
 	     	$recuperation->bindParam(':id',$utilisateur);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
		<div class="imagePosteMarche">
			<img src="<?php echo 'image/'.$recuperationInfo['img1'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($recuperationInfo['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($recuperationInfo['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div>
						Min <?php echo("1 - ".$recuperationInfo['minquantite']); ?>
					</div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div>Max > <?php echo($recuperationInfo['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixmax']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
	  <div class="ajouterPanierMarche">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid">
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
            <div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 6,2');
 	     	$recuperation->bindParam(':id',$utilisateur);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
		<div class="imagePosteMarche">
			<img src="<?php echo 'image/'.$recuperationInfo['img1'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($recuperationInfo['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($recuperationInfo['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div>
						Min <?php echo("1 - ".$recuperationInfo['minquantite']); ?>
					</div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(strtolower($recuperationInfo['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div>Max > <?php echo($recuperationInfo['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixmax']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
	  <div class="ajouterPanierMarche">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid">
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
            </div>
      </div>

      <!-- session deux session deux  session deux session deux  session deux session deux  session deux session deux  session deux session deux  session deux session deux  session deux session deux  session deux session deux  session deux session deux  session deux session deux  session deux session deux  session deux session deux  session deux session deux  session deux session deux  session deux session deux  session deux session deux  session deux session deux  session deux session deux -->
       <div class="conteneurmarchefiofoodUtilisateur">
           <div class="conteneurmarchefiofoodUtilisateurAvantDisplay">
            <div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 8,2');
 	     	$recuperation->bindParam(':id',$utilisateur);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
		<div class="imagePosteMarche">
			<img src="<?php echo 'image/'.$recuperationInfo['img1'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($recuperationInfo['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($recuperationInfo['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div>
						Min <?php echo("1 - ".$recuperationInfo['minquantite']); ?>
					</div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div>Max > <?php echo($recuperationInfo['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixmax']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
	  <div class="ajouterPanierMarche">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid">
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
            <div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 10,2');
 	     	$recuperation->bindParam(':id',$utilisateur);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
		<div class="imagePosteMarche">
			<img src="<?php echo 'image/'.$recuperationInfo['img1'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($recuperationInfo['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($recuperationInfo['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div>
						Min <?php echo("1 - ".$recuperationInfo['minquantite']); ?>
					</div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixannonce'],'UTF-8'), 0,8).''.'...');
                 }else{
				   echo(($recuperationInfo['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div>Max > <?php echo($recuperationInfo['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixmax']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
	  <div class="ajouterPanierMarche">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid">
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
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 12,2');
 	     	$recuperation->bindParam(':id',$utilisateur);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
		<div class="imagePosteMarche">
			<img src="<?php echo 'image/'.$recuperationInfo['img1'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($recuperationInfo['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($recuperationInfo['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div>
						Min <?php echo("1 - ".$recuperationInfo['minquantite']); ?>
					</div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div>Max > <?php echo($recuperationInfo['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixmax']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
	  <div class="ajouterPanierMarche">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid">
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
            <div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 14,2');
 	     	$recuperation->bindParam(':id',$utilisateur);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
		<div class="imagePosteMarche">
			<img src="<?php echo 'image/'.$recuperationInfo['img1'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($recuperationInfo['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($recuperationInfo['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div>
						Min <?php echo("1 - ".$recuperationInfo['minquantite']); ?>
					</div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div>Max > <?php echo($recuperationInfo['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixmax']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
	  <div class="ajouterPanierMarche">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid">
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
            </div>
      </div>
<!-- session trois session trois session trois session trois session trois session trois session trois session trois session trois session trois session trois session trois session trois session trois session trois session trois session trois session trois session trois session trois session trois session trois session trois session trois session trois -->
       <div class="conteneurmarchefiofoodUtilisateur">
           <div class="conteneurmarchefiofoodUtilisateurAvantDisplay">
            <div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 16,2');
 	     	$recuperation->bindParam(':id',$utilisateur);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
		<div class="imagePosteMarche">
			<img src="<?php echo 'image/'.$recuperationInfo['img1'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($recuperationInfo['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($recuperationInfo['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div>
						Min <?php echo("1 - ".$recuperationInfo['minquantite']); ?>
					</div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div>Max > <?php echo($recuperationInfo['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixmax']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
	  <div class="ajouterPanierMarche">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid">
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
            <div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 18,2');
 	     	$recuperation->bindParam(':id',$utilisateur);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
		<div class="imagePosteMarche">
			<img src="<?php echo 'image/'.$recuperationInfo['img1'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($recuperationInfo['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($recuperationInfo['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div>
						Min <?php echo("1 - ".$recuperationInfo['minquantite']); ?>
					</div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixannonce'],'UTF-8'), 0,8).''.'...');
                 }else{
				   echo(($recuperationInfo['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div>Max > <?php echo($recuperationInfo['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixmax']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
	  <div class="ajouterPanierMarche">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid">
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
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 20,2');
 	     	$recuperation->bindParam(':id',$utilisateur);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
		<div class="imagePosteMarche">
			<img src="<?php echo 'image/'.$recuperationInfo['img1'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($recuperationInfo['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($recuperationInfo['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div>
						Min <?php echo("1 - ".$recuperationInfo['minquantite']); ?>
					</div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div>Max > <?php echo($recuperationInfo['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixmax']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
	  <div class="ajouterPanierMarche">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid">
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
            <div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 22,2');
 	     	$recuperation->bindParam(':id',$utilisateur);
 	     	$recuperation->execute();
 	     	while ($recuperationInfo = $recuperation->fetch()) {
 	     		?>
  	<section class="postesMarche">
		<div class="imagePosteMarche">
			<img src="<?php echo 'image/'.$recuperationInfo['img1'];?>">
		</div>
		<div class="descriptionsPosteMarche">
			<div class="detailsPosteMarche" align="center">
				<?php 				  
				 if (strlen(strtolower($recuperationInfo['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($recuperationInfo['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($recuperationInfo['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocationMarche">
			<div class="quantiteMinMaxMarche">
				<div class="quantiteMinMarche">
					<div>
						Min <?php echo("1 - ".$recuperationInfo['minquantite']); ?>
					</div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMaxMarche">
					<div>Max > <?php echo($recuperationInfo['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrixMarche">
				<?php 
				   if (strlen(strtolower($recuperationInfo['prixmax']))>=8) {
         	echo(substr(mb_strtolower($recuperationInfo['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($recuperationInfo['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
	  <div class="ajouterPanierMarche">
           	<div data-id="<?php echo ($recuperationInfo['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid">
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
 	        <?php }?>
            	</div>
            </div>
      </div>
<!-- LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE -->
      	<div class="headerMemeMarche">
      		Le marché <?php echo($infoUtilisateurInfo['nommarche']); ?>
      	</div>



  <div class="conteneurGeneralMemeMarche" align="center">
  	<div class="postesConteneur postesConteneurMemeMarche">
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT id FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 0,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) { 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
    	?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 2,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) {
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
     ?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 4,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) {
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
     ?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
  	</div>

  	<div class="postesConteneur postesConteneurMemeMarche">
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 6,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) {
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
     ?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 8,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) {
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
     ?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 10,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) { 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
    	?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
  	</div>
  </div>

  <!-- LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX-->

  <div class="conteneurGeneralMemeMarche" align="center">
  	<div class="postesConteneur postesConteneurMemeMarche">
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT id FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 12,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) { 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
    	?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 14,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) {
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
     ?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 16,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) {
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
     ?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
  	</div>

  	<div class="postesConteneur postesConteneurMemeMarche">
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 18,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) {
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
     ?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 20,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) {
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
     ?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 22,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) { 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
    	?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
  	</div>
  </div>
 <!-- LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE LES VENDEUSES DU MEME MARCHE SESSION TROIS SESSION TROIS SESSION DEUX SESSION TROIS SESSION TROIS SESSION TROIS SESSION TROIS SESSION TROIS SESSION TROIS SESSION TROIS SESSION TROIS SESSION TROIS SESSION TROIS-->
<div class="conteneurGeneralMemeMarche" align="center">
  	<div class="postesConteneur postesConteneurMemeMarche">
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT id FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 24,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) { 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
    	?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 26,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) {
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
     ?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 28,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) {
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
     ?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
  	</div>

  	<div class="postesConteneur postesConteneurMemeMarche">
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 30,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) {
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
     ?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 32,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) {
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
     ?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
   <div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE nommarche=:nommarche and paysmarche=:paysmarche and localisationProfil=:villemarche LIMIT 34,2');
     $recuperation2->bindParam(':nommarche',$infoUtilisateurInfo['nommarche']);
     $recuperation2->bindParam(':paysmarche',$infoUtilisateurInfo['paysmarche']);
     $recuperation2->bindParam(':villemarche',$infoUtilisateurInfo['localisationProfil']);
     $recuperation2->execute();
     $tab = array();
     while ($donneRecu2 = $recuperation2->fetch()){
     	if ($donneRecu2['id'] != $infoUtilisateurInfo['id']) {
     		array_push($tab, $donneRecu2['id']);
     	}
     }
    foreach ($tab as $value) { 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idMeme');
     $recuperation2->bindParam(':idMeme',$value);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
    	?> 
  	<section class="postesNaturel">
		<div class="imagePosteNaturel">
			<img src="photoProfilCouverture/<?php if($donneRecu2['couvertureCompte'] != ''){echo($donneRecu2['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
		</div>
		<div class="conteneurPhotoMemeMarche">
			<img src="photoProfilCouverture/<?php if($donneRecu2['photo'] !=''){echo($donneRecu2['photo']);}else{echo("iconDefault.png");} ?>">
			<?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 80px;
        left: 60px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
		</div>
		<div class="nomUtilisateurMarcheMeme">
			<?php 				  
				 if (strlen(strtolower($donneRecu2['nom']." ".$donneRecu2['prenom']))>=18) {
         	echo(substr(mb_strtolower($donneRecu2['nom']." ".$donneRecu2['prenom'],'UTF-8'), 0,14).''.'...');
         }
         else{
				   echo($donneRecu2['nom']." ".$donneRecu2['prenom']);
         }
				 ?>	
		</div>
		<div class="visiteTableUtilisateurMemeMarche">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo $donneRecu2['id']; ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>
  	</div>
  </div>


 
<?php }
    include 'footer.php'; 
?>