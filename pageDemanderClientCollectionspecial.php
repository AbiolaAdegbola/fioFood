<?php
     include 'barreDeRecherche.php'; 
?>

<div class="headerPanier" style="margin-top: 40px;">
       <img src="icon/nameFioFood.png">
    </div>

<div class="conteneurGeneralmarchVirtuel">
	<div class="conteneurmarchefiofood">
 <div class="conteneurCarouselMarche" >
<div>
  <?php 
  	$certifierfiofood =1;
     $recG = $bdd->prepare('SELECT id,localisationProfil,nommarche,paysmarche FROM fiofood WHERE certifierfiofood=:certifierfiofood');
     	$recG->bindParam(':certifierfiofood',$certifierfiofood);
 	     $recG->execute();
 	     $tableau = array();
 	     while ($recGInfo = $recG->fetch()) {
 	     	$paniercollection =$bdd->prepare('SELECT id_fiofood FROM panier WHERE id_fiofood=:id');
 	     	$paniercollection->bindParam(':id',$recGInfo['id']);
 	     	$paniercollection->execute();
 	     	$paniercollectioninfo = $paniercollection->fetch();
 	     	if ($paniercollectioninfo['id_fiofood'] == $recGInfo['id']) {
 	     		array_push($tableau, $recGInfo['id']);
 	     	} 	     	     	
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
        			<span class="vendeurProfessionnelleMarche"><?php 
        			if ($infoUtilisateurInfo['vendeurpro'] !=0) {
        				?>
        				<img src="icon/topannonce.PNG">
        				<?php }?></span>
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
        			<a href="compteUtilisateurDemanderClient.php?compteUtilisateurDemander=<?php echo simple_encrypt($infoUtilisateurInfo['id']); ?>">
        		   	<i class="fa fa-plus" aria-hidden="true"></i>
        		  </a>
        		</div>
        	</div>
        	<div class="conteneurmarchefiofoodUtilisateur">
            <div class="conteneurmarchefiofoodUtilisateurAvantDisplay">
            	<div class="conteneurmarchefiofoodUtilisateurDisplay">
        	<?php
    	  $recuperation = $bdd->prepare('SELECT * FROM panier WHERE id_fiofood=:id LIMIT 0,1');
 	     	$recuperation->bindParam(':id',$value);
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
					<?php echo(($recuperationInfo['prixpanier']*( 1 - $recuperationInfo['prixpromo']/100))." cfa"); ?>		
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
 	     	$recuperation->bindParam(':id',$value);
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
					<?php echo(($recuperationInfo['prixpanier']*( 1 - $recuperationInfo['prixpromo']/100))." cfa"); ?>		
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
 	     	$recuperation->bindParam(':id',$value);
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
					<?php echo(($recuperationInfo['prixpanier']*( 1 - $recuperationInfo['prixpromo']/100))." cfa"); ?>		
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
 	     	$recuperation->bindParam(':id',$value);
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
					<?php echo(($recuperationInfo['prixpanier']*( 1 - $recuperationInfo['prixpromo']/100))." cfa"); ?>		
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

 	      <?php } ?>



</div>

 </div>
	</div>
</div>

<?php
     include 'footer.php'; 
?>