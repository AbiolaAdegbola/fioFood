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
			 
		 <div id="conteneurNumeroTw">
		 	<a href="tel:<?php echo $donnee['numerotelephone'];?>">
		 		<span><i class="fa fa-mobile" aria-hidden="true" id="icontelePageDemander"></i>
		 	</span><?php echo $donnee['numerotelephone'];?>
		 	</a>
		 	<a href="https://wa.me/<?php echo $donnee['numerowhatsapp'];?>">
		 		 <span><i class="fa fa-whatsapp" aria-hidden="true" id="iconwhatPageDemander"></i>
		 	</span><?php echo $donnee['numerowhatsapp'];?>
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
        	<div align="center">
        		<form method="post" action="">
        		<div >
        			<label>Voulez-vous mettre l'article sur le marché: </label><br>
        			<input type="checkbox" name="articleVendu" value="true" id="commeVendu">
        			<label for="commeVendu">OUI</label>
        			<input type="number" name="idVendeur" value="<?php echo $donnee['id']; ?>" style="display: none;">
        		</div>
        		<input type="submit" name="articleVenduSoumettreRemettre" onclick="return confirm('Voulez-vous mettre l\'article sur le marché?');">
        	</form>
        	</div>
	</div>

</div>

	   <?php   }
	 ?>