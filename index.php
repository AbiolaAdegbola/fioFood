<?php
include 'entete.php';
?>
<div class="typeDeProduit">
        <div class="chargement" style="margin-top: 10%;">
          <div class="spinner-border text-primary" role="status">
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
<?php 
	include 'typeDeProduit.php';
?>
</div>
<div class="conteneurCarousel">
        <div class="chargement" style="margin-top: 10%;">
          <div class="spinner-border text-primary" role="status">
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
<?php
include 'carousel.php';
?>
</div>

<div id="PrincipalePosteConteneur">   
	<div class="entetePostePublication" >
		<a href="lesSupermarchefioFood.php">Vos supermarchés <img src="icon/plusfiofood.png" width="30"></a>
	</div>

	<?php 
		include 'collectionspecial.php';
   ?>

	<div class="entetePostePublication">
		<a href="">Dernières Annonces <span>></span></a>
	</div>

<div class="conteneurPremierePrincipale">
<div class="postesConteneur">
	<div class="postesConteneurDisplay">
  <?php 
     $recuperation1 = $bdd->query('SELECT * FROM fiofoodannoceuranonyme WHERE articlevendu="" ORDER BY id DESC LIMIT 0,6');
    while ($donneRecu1 = $recuperation1->fetch()) {
     ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu1['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu1['categorie']); ?>">
		<div class="imagePoste">
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
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min <?php echo("1 - ".$donneRecu1['minquantite']); ?>
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
			    	 $recInfo1 = $bdd->prepare('SELECT vendeurpro FROM fiofood WHERE id=:id_fio');
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
     $recuperation2 = $bdd->query('SELECT * FROM fiofoodannoceuranonyme WHERE articlevendu="" ORDER BY id DESC LIMIT 6,6');
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
         	echo(substr(mb_strtolower($donneRecu2['titreannonce'],'UTF-8'), 0,11).''.'...');
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
						Min <?php echo("1 - ".$donneRecu2['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu2['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu2['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donneRecu2['prixannonce'])." cfa");
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
				   echo(($donneRecu2['prixmax']." cfa"));
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
			    	 $recInfo2 = $bdd->prepare('SELECT vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$donneRecu2['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu2['id']); ?>" >
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
     $recuperation3 = $bdd->query('SELECT * FROM fiofoodannoceuranonyme WHERE articlevendu="" ORDER BY id DESC LIMIT 12,6');
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
         	echo(substr(mb_strtolower($donneRecu3['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(strtolower($donneRecu3['titreannonce']));
         }				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min <?php echo("1 - ".$donneRecu3['minquantite']); ?>
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
			    	 $recInfo3 = $bdd->prepare('SELECT vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo3->bindParam(':id_fio',$donneRecu3['id_fiofood']);
			    	 $recInfo3->execute();
			    	 $recDon3= $recInfo3->fetch();
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
     $recuperation4 = $bdd->query('SELECT * FROM fiofoodannoceuranonyme WHERE articlevendu="" ORDER BY id DESC LIMIT 12,6');
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
         	echo(substr(mb_strtolower($donneRecu4['titreannonce'],'UTF-8'), 0,11).''.'...');
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
						Min <?php echo("1 - ".$donneRecu4['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu4['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu4['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(strtolower($donneRecu4['prixannonce'])." cfa");
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
			    	 $recInfo4 = $bdd->prepare('SELECT vendeurpro FROM fiofood WHERE id=:id_fio');
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
     $recuperation5 = $bdd->query('SELECT * FROM fiofoodannoceuranonyme WHERE articlevendu="" ORDER BY id DESC LIMIT 18,6');
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
         	echo(substr(mb_strtolower($donneRecu5['titreannonce'],'UTF-8'), 0,11).''.'...');
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
						Min <?php echo("1 - ".$donneRecu5['minquantite']); ?>
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
			    	 $recInfo5 = $bdd->prepare('SELECT vendeurpro FROM fiofood WHERE id=:id_fio');
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
     $recuperation6 = $bdd->query('SELECT * FROM fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.articlevendu="" ORDER BY id DESC LIMIT 0,6');
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
         	echo(substr(mb_strtolower($donneRecu6['titreannonce'],'UTF-8'), 0,11).''.'...');
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
						Min <?php echo("1 - ".$donneRecu6['minquantite']); ?>
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
			    	 $recInfo6 = $bdd->prepare('SELECT vendeurpro FROM fiofood WHERE id=:id_fio');
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
</div>
<!-- SAUT DE PAGE SAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGE -->
<div class="sautDePage" align="center">
	<ul>
		<a href=""><li>2</li></a>
		<a href=""><li>3</li></a>
		<a href=""><li>4</li></a>
		<a href=""><li>5</li></a>
		<a href=""><li>6</li></a>
		<a href=""><li>7</li></a>
		<a href=""><li>></li></a>
	</ul>
</div>
<?php 
include 'footer.php';
?>