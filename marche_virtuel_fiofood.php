<?php
     include 'barreDeRecherche.php'; 
?>

<div class="conteneurGeneralmarchVirtuel">
	<div class="conteneurmarchefiofood">
		<?php 
		     if (isset($_GET['nommarche']) AND isset($_GET['villemarche']) AND isset($_GET['paysmarche'])) {
     	        $nommarche = htmlspecialchars($_GET['nommarche']);
     	        $villemarche = htmlspecialchars($_GET['villemarche']);
     	        $paysmarche = htmlspecialchars($_GET['paysmarche']);
     	        ?>

 	<div class="headerMarcheVirtuel">
 		     <div class="logofiofoodImg" align="center" >
                 <img src="icon/nameFioFood.png">
               </div>
 		<span class="iconVillemarche"><i class="fa fa-street-view" aria-hidden="true"></i></span><span> <?php echo($villemarche); ?> </span> <span class="iconVillemarcheTerminel"><i class="fa fa-terminal" aria-hidden="true"></i></span><?php echo(" ".$nommarche); ?> 			
 	</div>
 <div class="conteneurCarouselMarche">
<div>
  <?php 
     $recG = $bdd->prepare('SELECT id,localisationProfil,nommarche,paysmarche FROM fiofood WHERE localisationProfil=:villemarche and paysmarche=:paysmarche and nommarche=:nommarche');
     	$recG->bindParam(':nommarche',$nommarche);
     	$recG->bindParam(':paysmarche',$paysmarche);
          $recG->bindParam(':villemarche',$villemarche);
 	     $recG->execute();
 	     $tableau = array();
 	     while ($recGInfo = $recG->fetch()) {
 	     	array_push($tableau, $recGInfo['id']);
 	      } 
        foreach ($tableau as $value) {
        	$infoUtilisateur = $bdd->prepare('SELECT * FROM fiofood WHERE id = :id_fiofood');
        	$infoUtilisateur->bindParam(':id_fiofood',$value);
        	$infoUtilisateur->execute();
        	$infoUtilisateurInfo = $infoUtilisateur->fetch();
        	?>
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
        		<div class="visiteTableUtilisateur">
        			<a href="pageDemanderClientMarcheFiofood.php?id=<?php echo simple_encrypt($infoUtilisateurInfo['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
        	</div>
        	<div class="conteneurmarchefiofoodUtilisateur">
            <div class="conteneurmarchefiofoodUtilisateurAvantDisplay">
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 0,1');
 	     	$recuperation->bindParam(':id',$value);
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
         	echo(substr($recuperationInfo['titreannonce'], 0,11).'...');
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
         	echo(substr($recuperationInfo['prixannonce'], 0,8).'...');
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
         	echo(substr($recuperationInfo['prixmax'], 0,8).'...');
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
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 1,1');
 	     	$recuperation->bindParam(':id',$value);
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
         	echo(substr($recuperationInfo['titreannonce'], 0,11).'...');
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
         	echo(substr($recuperationInfo['prixannonce'], 0,8).'...');
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
         	echo(substr($recuperationInfo['prixmax'], 0,8).'...');
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
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 2,1');
 	     	$recuperation->bindParam(':id',$value);
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
         	echo(substr($recuperationInfo['titreannonce'], 0,11).'...');
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
         	echo(substr($recuperationInfo['prixannonce'], 0,8).'...');
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
         	echo(substr($recuperationInfo['prixmax'], 0,8).'...');
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
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 3,1');
 	     	$recuperation->bindParam(':id',$value);
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
         	echo(substr($recuperationInfo['titreannonce'], 0,11).'...');
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
         	echo(substr($recuperationInfo['prixannonce'], 0,8).'...');
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
         	echo(substr($recuperationInfo['prixmax'], 0,8).'...');
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
        	</div>



<!-- session deux -->
        	<div class="conteneurmarchefiofoodUtilisateur">
            <div class="conteneurmarchefiofoodUtilisateurAvantDisplay">
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 4,1');
 	     	$recuperation->bindParam(':id',$value);
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
         	echo(substr($recuperationInfo['titreannonce'], 0,11).'...');
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
         	echo(substr($recuperationInfo['prixannonce'], 0,8).'...');
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
         	echo(substr($recuperationInfo['prixmax'], 0,8).'...');
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
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 5,1');
 	     	$recuperation->bindParam(':id',$value);
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
         	echo(substr($recuperationInfo['titreannonce'], 0,11).'...');
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
         	echo(substr($recuperationInfo['prixannonce'], 0,8).'...');
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
         	echo(substr($recuperationInfo['prixmax'], 0,8).'...');
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
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 6,1');
 	     	$recuperation->bindParam(':id',$value);
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
         	echo(substr($recuperationInfo['titreannonce'], 0,11).'...');
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
         	echo(substr($recuperationInfo['prixannonce'], 0,8).'...');
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
         	echo(substr($recuperationInfo['prixmax'], 0,8).'...');
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
    	  $recuperation = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=:id and articlevendu="" LIMIT 7,1');
 	     	$recuperation->bindParam(':id',$value);
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
         	echo(substr($recuperationInfo['titreannonce'], 0,11).'...');
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
         	echo(substr($recuperationInfo['prixannonce'], 0,8).''.'...');
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
         	echo(substr($recuperationInfo['prixmax'], 0,8).'...');
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
        	</div>

 	      <?php } ?>



</div>

 </div>
   <?php }?>
	</div>
</div>

<?php
     include 'footer.php'; 
?>