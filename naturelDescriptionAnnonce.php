<div style="color:black;">
<?php 

   include 'connexionBaseDonnee.php';
   include 'fonctionEncrypt.php';

         $descrption = htmlspecialchars($_POST['descrption']);
	     $recu = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id=?');  
	     $recu->execute(array($descrption));	     
	     while ($donnee = $recu->fetch()) {?>

	<div class="posteSelectionneDescriptionNaturel">
		<div align="center" class="titreAnnonceAvant">
			<?php 
		        echo $donnee['titreannonce'];
		     ?>
		</div>
		<div class="prixAnnonceAvant">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min <?php echo("1 - ".$donnee['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donnee['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donnee['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donnee['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donnee['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donnee['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donnee['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(($donnee['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
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
		 		$fairePar =$bdd->prepare('SELECT photo,nom FROM fiofood WHERE id=:id_fiofood');
        $fairePar->bindParam(':id_fiofood',$donnee['id_fiofood']);
        $fairePar->execute();
        $faireParInfo = $fairePar->fetch();
		 	?>
		 	<a  href="compteUtilisateurDemanderClient.php?compteUtilisateurDemander=<?php echo(simple_encrypt($donnee['id_fiofood'])); ?>"><img src="photoProfilCouverture/<?php if($faireParInfo['photo'] !='') {echo($faireParInfo['photo']);}else {echo "iconDefault.png";} ?>"></a>
		 	<?php } ?>
		 	<div><span style="color:rgba(0, 0, 254, 0.7);"><?php echo($faireParInfo['nom']); ?></span></div>
		 </div><br><br> 
		 <div id="conteneurNumeroTw">
		 	<a href="tel:<?php echo $donnee['numerotelephone'];?>">
		 		<span><i class="fa fa-mobile" aria-hidden="true" id="icontelePageDemander"></i>
		 	</span><strong class="cacheNumero"><?php echo $donnee['numerotelephone'];?></strong>
		 	</a>
		 	<a href="https://wa.me/<?php echo $donnee['numerowhatsapp'];?>">
		 		 <span><i class="fa fa-whatsapp" aria-hidden="true" id="iconwhatPageDemander"></i>
		 	</span><strong class="cacheNumero"><?php echo $donnee['numerowhatsapp'];?></strong>
		 	</a>		 	
		 	<a href="sms:<?php echo $donnee['numerotelephone'];?>">
		 		<span><i class="fa fa-sms" aria-hidden="true" id="iconSMSPageDemander"></i></span>
		 	</a>
		 </div>
		 <div class="descriptionAnnonceAVant">
		 	<header>Détails du produit</header>
		 	<?php 
		 	    echo $donnee['descriptionannonce'];
		 	 ?>
		 </div>
	</div>
</div>

	   <?php   }
	 ?>