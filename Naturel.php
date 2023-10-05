<?php
include 'entete.php';
?>
<div class="typeDeProduit">
<?php 
	include 'typeDeProduit.php';
?>
</div>

<!-- LES DIFFERENTES MARCHE DU PAYS LES DIFFERENTES MARCHE DU PAYS LES DIFFERENTES MARCHE DU PAYS LES DIFFERENTES MARCHE DU PAYS -->
<div>
	<?php include 'carousel.php'; ?>
</div>

<div id="PrincipalePosteConteneurNaturel">   
	<div class="entetePostePublication">
		<a href="">Faites votre marché sur fioFood <span>></span></a>
	</div>
<div class="conteneurPremierePrincipale">
<div class="postesConteneur">
	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 0,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>

	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 2,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>

   <!-- TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION -->
	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 4,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>
 </div>

 <!-- DEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONS -->
<div class="postesConteneur">
	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 6,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>

	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 8,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>

   <!-- TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION -->
	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 10,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>
 </div>
</div>
</div>


<!--SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX SESSION DEUX -->
<div id="PrincipalePosteConteneurNaturel">   
<div class="conteneurPremierePrincipale">
<div class="postesConteneur">
	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 12,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>

	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 14,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>

   <!-- TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION -->
	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 16,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>
 </div>

 <!-- DEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONS -->
<div class="postesConteneur">
	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 18,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>

	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 20,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>

   <!-- TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION -->
	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 22,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>
 </div>
</div>
</div>

<!--SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS SESSION TOIS -->
<div id="PrincipalePosteConteneurNaturel">   
<div class="conteneurPremierePrincipale">
<div class="postesConteneur">
	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 24,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>

	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 26,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>

   <!-- TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION -->
	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 28,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>
 </div>

 <!-- DEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONS -->
<div class="postesConteneur">
	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 30,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>

	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 32,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>

   <!-- TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION -->
	<div class="postesConteneurDisplayNaturel">
  <?php 
     $recuperation1 = $bdd->query('SELECT fiofood.adminfiofood,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofood.adminfiofood="1" and fiofoodannoceuranonyme.id_fiofood=fiofood.id ORDER BY id DESC LIMIT 34,2');
    while ($donneRecu1 = $recuperation1->fetch()) {?> 
  	<section class="postesNaturel">
      <div class="naturelDescriptionBouton" data-id="<?php echo ($donneRecu1['id']); ?>">
		<div class="imagePosteNaturel">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div align="center">
					<?php echo($donneRecu1['prixannonce']." cfa"); ?>
			</div>
		</div>
           </div>
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImageNaturel">
           		Panier      		
           	</div>

           	<div class="CertifierfiofoodNaturel">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,adminfiofood FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['adminfiofood'] != 0) {
			    	?>		    	
			    	<img src="icon/vendeurPro.PNG">
			    	<?php }
			    	?>
			    </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>
 </div>
</div>
</div>
<!-- SAUT DE PAGE SAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGE -->
<div class="sautDePage" align="center">
	<ul>
		<li><a href="">2</a></li>
		<li><a href="">3</a></li>
		<li><a href="">4</a></li>
		<li><a href="">5</a></li>
		<li><a href="">6</a></li>
		<li><a href="">7</a></li>
		<li><a href="">></a></li>
	</ul>
</div>
<?php 
include 'footer.php';
?>