<?php
include 'barreDeRecherche.php';
?>
<div class="posteSelectionne">
<?php 
       $obtenir= htmlspecialchars(simple_decrypt($_GET['id']));
       $categorieChoisir = htmlspecialchars(simple_decrypt($_GET['categorie']));
	     $recu = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id=?');  
	     $recu->execute(array($obtenir));	     
	     while ($donnee = $recu->fetch()) {?>
	     		<div class="headerMarcheVirtuel">
 		     <div class="logofiofoodImg" align="center">
            <img src="icon/nameFioFood.png">
         </div>
 		<span class="iconVillemarche"><i class="fa fa-street-view" aria-hidden="true"></i></span>
 		<span class="lesMachesDisponibl" style="color: rgba(0, 0, 0, 0.4);"> <?php echo($donnee['localisationannonce']); ?> </span>
 		<span class="iconVillemarcheTerminel"><i class="fa fa-terminal" aria-hidden="true"></i></span>
 		<span style="color: rgba(0, 0, 0, 0.4);"><?php echo(" ".$donnee['categorie']); ?> </span>
 		<span class="iconVillemarcheTerminel"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span>
 		<span style="color: rgba(0, 0, 0, 0.4);"><?php echo($donnee['titreannonce']); ?></span>			
 	</div>
        <div class="chargement" style="margin-top: 10%;">
          <div class="spinner-border text-primary" role="status" >
            <span class="sr-only">Loading...</span>
          </div>
          <div class="spinner-border text-secondary" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <div class="spinner-border text-success" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <div class="spinner-border text-danger" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <div class="spinner-border text-warning" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <div class="spinner-border text-info" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <div class="spinner-border text-light" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <div class="spinner-border text-dark" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
	  <div class="posteSelectionneCarousel owl-carousel owl-theme">
		<?php 
		if (!empty($donnee['img1'])) {
			?>
			<div class="imageCarousel" align="center">
				<img src="<?php echo 'image/'.$donnee['img1']; ?>">
		</div>
		<?php }
		if (!empty($donnee['img2'])) {
			?>
			<div class="imageCarousel" align="center">
				<img src="<?php echo 'image/'.$donnee['img2']; ?>">
		</div>
		<?php }
		if (!empty($donnee['img3'])) {
			?>
			<div class="imageCarousel" align="center">
				<img src="<?php echo 'image/'.$donnee['img3']; ?>">
		</div>
		<?php }?>
	</div>

	<div class="posteSelectionneDescription">
		<div align="center" class="titreAnnonceAvant">
			<?php 
		        echo $donnee['titreannonce'];
		     ?>
		</div>
		<div class="prixAnnonceAvant">
				<div class="quantiteMin">
					<div style="font-size:15px;">Min < <?php echo("1 - ".$donnee['minquantite']); ?></div>
					<div class="quantiteMinMaxPrix"><?php echo($donnee['prixannonce']." cfa") ?></div>					
				</div>
				<div class="quantiteMax">
					<div style="font-size: 15px;">Max > <?php echo($donnee['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix"><?php echo($donnee['prixmax']." cfa") ?></div>	
				</div>
		 </div>
		 <div class="uniteMesure">
		 	  <span>unité : </span><?php echo(" ".$donnee['unitemesure']); ?>
		 </div>
		 <div class="VilleAnnonceAvant">
		 	<i class="fa fa-map-marker"></i>
		 	<?php 
		 	    echo $donnee['localisationannonce'];
		 	 ?>
		 </div>	
		 <div class="posteFairePar">
		 	<?php 
		 	if (isset($donnee['id_fiofood'])) {
		 		$fairePar =$bdd->prepare('SELECT photo,nom,vendeurpro FROM fiofood WHERE id=:id_fiofood');
        $fairePar->bindParam(':id_fiofood',$donnee['id_fiofood']);
        $fairePar->execute();
        $faireParInfo = $fairePar->fetch();
		 	?>

		 	<a href="compteUtilisateurDemanderClient.php?compteUtilisateurDemander=<?php echo(simple_encrypt($donnee['id_fiofood'])) ?>">
		 		<img src="photoProfilCouverture/<?php if($faireParInfo['photo'] !='') {echo($faireParInfo['photo']);}else {echo "iconDefault.png";} ?>">
			 	<?php 
		     if ($faireParInfo['vendeurpro'] !=0) { ?>
				<i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 135px;
		right: 55px;z-index: 9; font-size: 22px;"></i>
		    <?php }?>	
		 	</a>
		 	<?php } ?> 
		 	<div>Auteur : <span style="color:white;"><?php echo($faireParInfo['nom']); ?></span></div><br>
		 </div>	 
		 <div class="conteneurNumeroTw"><br>
		 	<span>Contact : </span><br>
		 	<a href="tel:<?php echo $donnee['numerotelephone'];?>">
		 		<span><i class="fa fa-mobile" aria-hidden="true" id="icontelePageDemander"></i>
		 	</span><strong><?php echo $donnee['numerotelephone'];?></strong>
		 	</a>
		 	<a href="https://wa.me/<?php if(strlen($donnee['numerowhatsapp'])<=10){echo '255'.$donnee['numerowhatsapp'];}else{echo $donnee['numerowhatsapp'];} ?>/?text=Je%20suis%20intéressé%20par%20votre%20annonce%20publiée%20sur%20fioFood.%20http://localhost/fioFood/pageDemanderClient.php?id=<?php echo (simple_encrypt($donnee['id'])); ?>&categorie=<?php echo (simple_encrypt($donnee['categorie'])); ?>">
		 		 <span><i class="fa fa-whatsapp" aria-hidden="true" id="iconwhatPageDemander"></i>
		 	</span><strong><?php echo $donnee['numerowhatsapp'];?></strong>
		 	</a>
		 	<a href="sms:<?php echo $donnee['numerotelephone'];?>;&body=Je%20suis%20intéressé%20par%20votre%20annonce%20publiée%20sur%20fioFood.%20http://localhost/fioFood/pageDemanderClient.php?id=<?php echo (simple_encrypt($donnee['id'])); ?>&categorie=<?php echo (simple_encrypt($donnee['categorie'])); ?>">
		 		<span><i class="fa fa-sms" aria-hidden="true" id="iconSMSPageDemander"></i></span>
		 	</a>
		 	<div class="panierRecherchePageDemandeClientProvendeur">
			    	
			</div>
		 	<div class="panierRecherchePageDemandeClient">		 				 	
		 	 <div data-id="<?php echo ($donnee['id']); ?>" class="ajouterPanierImageSansModification" >
		 	  <img src="icon/ajouterPanier.png" >
		 	 </div>
		 	</div>
		 </div><br>
		 <div class="descriptionAnnonceAVant">
		 	<header><span>
		 		<?php 
			    	 $recInfo6 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo6->bindParam(':id_fio',$donnee['id_fiofood']);
			    	 $recInfo6->execute();
			    	 $recDon6 = $recInfo6->fetch();
			    	 if ($recDon6['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/certifierfiofood.png">
			    	<?php }
			    	?>
		 	</span><br>
		 	Détails du produit</header>
		 	<?php 
		 	    echo $donnee['descriptionannonce'];
		 	 ?>
		 </div>
	</div>
</div>

	   <?php   }
	 ?>

	 <!-- POSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENT -->	
   <div id="PrincipalePosteConteneur">   
	<div style="color:rgba(0, 0, 0, 0.5); font-size: 22px; font-weight: bolder;font-style: italic;text-align: right;">
		Annonces sur <?php echo ($categorieChoisir); ?> <span>></span>
	</div>
<div class="conteneurPremierePrincipale">
<div class="postesConteneur">
	<div class="postesConteneurDisplay">
  <?php 
     $recuperation1 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 0,1');
     $recuperation1->bindParam(':categorie',$categorieChoisir);
     $recuperation1->execute();
    while ($donneRecu1 = $recuperation1->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu1['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu1['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(($donneRecu1['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu1['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu1['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu1['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu1['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu1['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu1['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu1['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu1['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo1 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo1->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo1->execute();
			    	 $recDon1 = $recInfo1->fetch();
			    	 if ($recDon1['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu1['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>

  <div class="postesConteneurDisplay">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 1,1');
     $recuperation2->bindParam(':categorie',$categorieChoisir);
     $recuperation2->execute();
    while ($donneRecu2 = $recuperation2->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu2['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu2['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 				  
				 if (strlen(strtolower($donneRecu2['titreannonce']))>=11) {
         	echo(substr(($donneRecu2['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu2['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu2['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu2['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu2['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(strtolower($donneRecu2['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu2['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu2['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu2['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(strtolower($donneRecu2['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu2['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu2['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu2['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>

   <!-- TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION -->
   <div class="postesConteneurDisplay troisiemeDivPremiereSession troisiemeDivPremiereSessionNavigateur">
  <?php 
     $recuperation3 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 2,1');
     $recuperation3->bindParam(':categorie',$categorieChoisir);
     $recuperation3->execute();
    while ($donneRecu3 = $recuperation3->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu3['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu3['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu3['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu3['titreannonce']))>=11) {
         	echo(substr(($donneRecu3['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu3['titreannonce']));
         }				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu3['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu3['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu3['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu3['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu3['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu3['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu3['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu3['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo3 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo3->bindParam(':id_fio',$donneRecu3['id_fiofood']);
			    	 $recInfo3->execute();
			    	 $recDon3 = $recInfo3->fetch();
			    	 if ($recDon3['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu3['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu3['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } ?>
   </div>
 </div>

 <!-- DEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONS -->
 <div class="postesConteneur">
	<div class="postesConteneurDisplay">
  <?php 
     $recuperation4 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 3,1');
     $recuperation4->bindParam(':categorie',$categorieChoisir);
     $recuperation4->execute();
    while ($donneRecu4 = $recuperation4->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu4['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu4['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu4['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu4['titreannonce']))>=11) {
         	echo(substr(($donneRecu4['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu4['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu4['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu4['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu4['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu4['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu4['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu4['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu4['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu4['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo4 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo4->bindParam(':id_fio',$donneRecu4['id_fiofood']);
			    	 $recInfo4->execute();
			    	 $recDon4 = $recInfo4->fetch();
			    	 if ($recDon4['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu4['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu4['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } $recuperation4->closeCursor(); ?>
   </div>
  <div class="postesConteneurDisplay">
  <?php 
     $recuperation5 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 4,1');
     $recuperation5->bindParam(':categorie',$categorieChoisir);
     $recuperation5->execute();
    while ($donneRecu5 = $recuperation5->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu5['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu5['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu5['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu5['titreannonce']))>=11) {
         	echo(substr(($donneRecu5['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu5['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu5['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu5['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu5['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu5['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu5['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu5['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu5['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu5['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo5 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo5->bindParam(':id_fio',$donneRecu5['id_fiofood']);
			    	 $recInfo5->execute();
			    	 $recDon5 = $recInfo5->fetch();
			    	 if ($recDon5['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu5['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu5['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } $recuperation5->closeCursor(); ?>
   </div>
   <!-- TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION -->
   <div class="postesConteneurDisplay troisiemeDivPremiereSession troisiemeDivPremiereSessionNavigateur">
  <?php 
     $recuperation6 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 5,1');
     $recuperation6->bindParam(':categorie',$categorieChoisir);
     $recuperation6->execute();
    while ($donneRecu6 = $recuperation6->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu6['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu6['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu6['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
         if (strlen(strtolower($donneRecu6['titreannonce']))>=11) {
         	echo(substr(($donneRecu6['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu6['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu6['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu6['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu6['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu6['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu6['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu6['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu6['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu6['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo6 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo6->bindParam(':id_fio',$donneRecu6['id_fiofood']);
			    	 $recInfo6->execute();
			    	 $recDon6 = $recInfo6->fetch();
			    	 if ($recDon6['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu6['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu6['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } $recuperation6->closeCursor();?>
   </div>
 </div>
</div>
</div>




	 <!-- POSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENT -->	
   <div id="PrincipalePosteConteneur">   
<div class="conteneurPremierePrincipale">
<div class="postesConteneur">
	<div class="postesConteneurDisplay">
  <?php 
     $recuperation1 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 6,1');
     $recuperation1->bindParam(':categorie',$categorieChoisir);
     $recuperation1->execute();
    while ($donneRecu1 = $recuperation1->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu1['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu1['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(($donneRecu1['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu1['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu1['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu1['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu1['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu1['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu1['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu1['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu1['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo1 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo1->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo1->execute();
			    	 $recDon1 = $recInfo1->fetch();
			    	 if ($recDon1['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu1['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>

  <div class="postesConteneurDisplay">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 7,1');
     $recuperation2->bindParam(':categorie',$categorieChoisir);
     $recuperation2->execute();
    while ($donneRecu2 = $recuperation2->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu2['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu2['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 				  
				 if (strlen(strtolower($donneRecu2['titreannonce']))>=11) {
         	echo(substr(($donneRecu2['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu2['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu2['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu2['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu2['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(strtolower($donneRecu2['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu2['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu2['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu2['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(strtolower($donneRecu2['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu2['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu2['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu2['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>

   <!-- TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION -->
   <div class="postesConteneurDisplay troisiemeDivPremiereSession troisiemeDivPremiereSessionNavigateur">
  <?php 
     $recuperation3 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 8,1');
     $recuperation3->bindParam(':categorie',$categorieChoisir);
     $recuperation3->execute();
    while ($donneRecu3 = $recuperation3->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu3['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu3['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu3['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu3['titreannonce']))>=11) {
         	echo(substr(($donneRecu3['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu3['titreannonce']));
         }				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu3['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu3['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu3['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu3['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu3['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu3['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu3['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu3['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo3 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo3->bindParam(':id_fio',$donneRecu3['id_fiofood']);
			    	 $recInfo3->execute();
			    	 $recDon3 = $recInfo3->fetch();
			    	 if ($recDon3['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu3['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu3['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } ?>
   </div>
 </div>

 <!-- DEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONS -->
 <div class="postesConteneur">
	<div class="postesConteneurDisplay">
  <?php 
     $recuperation4 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 9,1');
     $recuperation4->bindParam(':categorie',$categorieChoisir);
     $recuperation4->execute();
    while ($donneRecu4 = $recuperation4->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu4['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu4['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu4['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu4['titreannonce']))>=11) {
         	echo(substr(($donneRecu4['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu4['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu4['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu4['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu4['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu4['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu4['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu4['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu4['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu4['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo4 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo4->bindParam(':id_fio',$donneRecu4['id_fiofood']);
			    	 $recInfo4->execute();
			    	 $recDon4 = $recInfo1->fetch();
			    	 if ($recDon4['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu4['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu4['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } $recuperation4->closeCursor(); ?>
   </div>
  <div class="postesConteneurDisplay">
  <?php 
     $recuperation5 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 10,1');
     $recuperation5->bindParam(':categorie',$categorieChoisir);
     $recuperation5->execute();
    while ($donneRecu5 = $recuperation5->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu5['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu5['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu5['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu5['titreannonce']))>=11) {
         	echo(substr(($donneRecu5['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu5['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu5['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu5['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu5['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu5['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu5['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu5['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu5['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu5['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo5 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo5->bindParam(':id_fio',$donneRecu5['id_fiofood']);
			    	 $recInfo5->execute();
			    	 $recDon5 = $recInfo5->fetch();
			    	 if ($recDon5['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu5['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu5['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } $recuperation5->closeCursor(); ?>
   </div>
   <!-- TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION -->
   <div class="postesConteneurDisplay troisiemeDivPremiereSession troisiemeDivPremiereSessionNavigateur">
  <?php 
     $recuperation6 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 11,1');
     $recuperation6->bindParam(':categorie',$categorieChoisir);
     $recuperation6->execute();
    while ($donneRecu6 = $recuperation6->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu6['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu6['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu6['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
         if (strlen(strtolower($donneRecu6['titreannonce']))>=11) {
         	echo(substr(($donneRecu6['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu6['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu6['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu6['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu6['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu6['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu6['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu6['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu6['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu6['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo6 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo6->bindParam(':id_fio',$donneRecu6['id_fiofood']);
			    	 $recInfo6->execute();
			    	 $recDon6 = $recInfo6->fetch();
			    	 if ($recDon6['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu6['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu6['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } $recuperation6->closeCursor();?>
   </div>
 </div>
</div>
</div>




	 <!-- POSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENTPOSTE EN RELATION  AVEC LE POSTE SELSECTION PAR LE CLIENT -->	
   <div id="PrincipalePosteConteneur">   
<div class="conteneurPremierePrincipale">
<div class="postesConteneur">
	<div class="postesConteneurDisplay">
  <?php 
     $recuperation1 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 12,1');
     $recuperation1->bindParam(':categorie',$categorieChoisir);
     $recuperation1->execute();
    while ($donneRecu1 = $recuperation1->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu1['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu1['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(($donneRecu1['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu1['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu1['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu1['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu1['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu1['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu1['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu1['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu1['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo1 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo1->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo1->execute();
			    	 $recDon1 = $recInfo1->fetch();
			    	 if ($recDon1['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu1['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } $recuperation1->closeCursor(); ?>
   </div>

  <div class="postesConteneurDisplay">
  <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 13,1');
     $recuperation2->bindParam(':categorie',$categorieChoisir);
     $recuperation2->execute();
    while ($donneRecu2 = $recuperation2->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu2['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu2['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu2['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 				  
				 if (strlen(strtolower($donneRecu2['titreannonce']))>=11) {
         	echo(substr(($donneRecu2['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu2['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu2['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu2['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu2['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(strtolower($donneRecu2['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu2['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu2['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu2['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(strtolower($donneRecu2['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu2['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu2['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu2['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } $recuperation2->closeCursor();?>
   </div>

   <!-- TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION  TROISIEME div DE LA PREMIERE SESSION -->
   <div class="postesConteneurDisplay troisiemeDivPremiereSession troisiemeDivPremiereSessionNavigateur">
  <?php 
     $recuperation3 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 14,1');
     $recuperation3->bindParam(':categorie',$categorieChoisir);
     $recuperation3->execute();
    while ($donneRecu3 = $recuperation3->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu3['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu3['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu3['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu3['titreannonce']))>=11) {
         	echo(substr(($donneRecu3['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu3['titreannonce']));
         }				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu3['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu3['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu3['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu3['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu3['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu3['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu3['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu3['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo3 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo3->bindParam(':id_fio',$donneRecu3['id_fiofood']);
			    	 $recInfo3->execute();
			    	 $recDon3 = $recInfo3->fetch();
			    	 if ($recDon3['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu3['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu3['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } ?>
   </div>
 </div>

 <!-- DEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONSDEUXIEME SESSIONS -->
 <div class="postesConteneur">
	<div class="postesConteneurDisplay">
  <?php 
     $recuperation4 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 15,1');
     $recuperation4->bindParam(':categorie',$categorieChoisir);
     $recuperation4->execute();
    while ($donneRecu4 = $recuperation4->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu4['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu4['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu4['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu4['titreannonce']))>=11) {
         	echo(substr(($donneRecu4['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu4['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu4['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu4['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu4['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu4['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu4['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu4['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu4['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu4['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo4 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo4->bindParam(':id_fio',$donneRecu4['id_fiofood']);
			    	 $recInfo4->execute();
			    	 $recDon4 = $recInfo1->fetch();
			    	 if ($recDon4['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu4['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu4['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } $recuperation4->closeCursor(); ?>
   </div>
  <div class="postesConteneurDisplay">
  <?php 
     $recuperation5 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 16,1');
     $recuperation5->bindParam(':categorie',$categorieChoisir);
     $recuperation5->execute();
    while ($donneRecu5 = $recuperation5->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu5['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu5['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu5['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu5['titreannonce']))>=11) {
         	echo(substr(($donneRecu5['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu5['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu5['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu5['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu5['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu5['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu5['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu5['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu5['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu5['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo5 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo5->bindParam(':id_fio',$donneRecu5['id_fiofood']);
			    	 $recInfo5->execute();
			    	 $recDon5 = $recInfo5->fetch();
			    	 if ($recDon5['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu5['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu5['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } $recuperation5->closeCursor(); ?>
   </div>
   <!-- TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION  TROISIEME div DE LA DEUXIEME SESSION -->
   <div class="postesConteneurDisplay troisiemeDivPremiereSession troisiemeDivPremiereSessionNavigateur">
  <?php 
     $recuperation6 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie ORDER BY id DESC LIMIT 17,1');
     $recuperation6->bindParam(':categorie',$categorieChoisir);
     $recuperation6->execute();
    while ($donneRecu6 = $recuperation6->fetch()) { ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu6['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu6['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu6['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
         if (strlen(strtolower($donneRecu6['titreannonce']))>=11) {
         	echo(substr(($donneRecu6['titreannonce']), 0,11).''.'...');
         }
         else{
				   echo(($donneRecu6['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min < <?php echo("1 - ".$donneRecu6['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu6['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu6['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu6['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu6['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu6['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu6['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu6['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo6 = $bdd->prepare('SELECT nom,vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo6->bindParam(':id_fio',$donneRecu6['id_fiofood']);
			    	 $recInfo6->execute();
			    	 $recDon6 = $recInfo6->fetch();
			    	 if ($recDon6['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu6['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu6['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php } $recuperation6->closeCursor();?>
   </div>
 </div>
</div>
</div>
<?php
include 'footer.php';
?>