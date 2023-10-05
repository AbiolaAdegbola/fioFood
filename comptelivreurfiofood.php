<div class="conteneurPrincipaleLivreurfiofood">
	<div class="enteteCommandeLivreur">
		<div class="commandesEncours encourslivreur">
		 En cours
		</div>
		<div class="livrerlivreur commandesEncours">
			Livré
		</div>
	</div>
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
	<div class="conteneurPostesLivreur">
	<div class="conteneurCommandesLivreurfiofoodCompte">
		<div class="conteneurCommandesLivreurfiofoodCompteFlex">
			<div class="conteneurCommandesLivreurfiofoodCompteAvantFlex">
				<?php 
					$colis = $bdd->prepare('SELECT * FROM panier WHERE idlivreurcommande = :idlivreurcommande and livrer="0" LIMIT 0,2');
					$colis->bindParam(':idlivreurcommande', $_SESSION['id']);
					$colis->execute();
					
					while ($colisInfo = $colis->fetch()) {
						?>
						<section class="commandesPostesComptes">
							<div class="clientCommandes">
								nom du client :
							</div>
							<div class="clientCommandesNom">
								<?php echo($colisInfo['nomProduit']); ?>									
							</div>																
							 <div class="clientCommandesPrix">
							 	<span style="color:black">prix : </span>
							 	<?php echo(' '.$colisInfo['prixpanier'].' cfa'); ?>
							 </div>	
							<div class="clientCommandes">
								 Numéro colis :
							</div> 
							 <div class="numeroclois">
							 	<?php 
									$numerocommande = str_replace(' ', '', $colisInfo['dateCommande']);
									$numerocommande = str_replace(':', '', $numerocommande);
									$numerocommande = str_replace('-', '', $numerocommande);
									echo('fioFood'.$numerocommande);	
								?>
							 </div>														 
							<div class="clientCommandesNumero">
								<i class="fa fa-mobile" aria-hidden="true"></i>
								<a href="tel:<?php echo $colisInfo['contactClient'];?>">
					         		<?php echo $colisInfo['contactClient'];?>
					         	</a>
							</div>
							<div class="clientCommandes">
								clique pour voir le trajet : 
							</div>
								<div class="clientCommandesLieu">
									<?php echo($colisInfo['lieuLivraison']); ?>
								</div>
							<div class="etatdelacommande" align="center">
								<form method="post">
									<label for="colislivrer" style="color:black;">Est-ce que vous avez livrer le colis : </label><br>
									<input type="checkbox" name="colislivrer" value="true" id="colislivrer" style="transform: scale(3); margin: 20px;"><br>
									<input type="number" name="idColis" value="<?php echo $colisInfo['id']; ?>" style="display: none;">
									<input type="submit" name="colisOUI" value="Envoyer" class="boutonEnvoyerColis"style="padding: 10px;border-radius: 10px;">
								</form>
							</div>
						</section>
					<?php }	?>
			</div>

			<div class="conteneurCommandesLivreurfiofoodCompteAvantFlex">
				<?php 
					$colis = $bdd->prepare('SELECT * FROM panier WHERE idlivreurcommande = :idlivreurcommande and livrer="0" LIMIT 2,2');
					$colis->bindParam(':idlivreurcommande', $_SESSION['id']);
					$colis->execute();
					
					while ($colisInfo = $colis->fetch()) {
						?>
						<section class="commandesPostesComptes">
							<div class="clientCommandes">
								nom du client :
							</div>
							<div class="clientCommandesNom">
								<?php echo($colisInfo['nomProduit']); ?>									
							</div>																
							 <div class="clientCommandesPrix">
							 	<span style="color:black">prix : </span>
							 	<?php echo(' '.$colisInfo['prixpanier'].' cfa'); ?>
							 </div>	
							<div class="clientCommandes">
								 Numéro colis :
							</div> 
							 <div class="numeroclois">
							 	<?php 
									$numerocommande = str_replace(' ', '', $colisInfo['dateCommande']);
									$numerocommande = str_replace(':', '', $numerocommande);
									$numerocommande = str_replace('-', '', $numerocommande);
									echo('fioFood'.$numerocommande);	
								?>
							 </div>														 
							<div class="clientCommandesNumero">
								<i class="fa fa-mobile" aria-hidden="true"></i>
								<a href="tel:<?php echo $colisInfo['contactClient'];?>">
					         		<?php echo $colisInfo['contactClient'];?>
					         	</a>
							</div>
							<div class="clientCommandes">
								clique pour voir le trajet : 
							</div>
								<div class="clientCommandesLieu">
									<?php echo($colisInfo['lieuLivraison']); ?>
								</div>
							<div class="etatdelacommande" align="center">
								<form method="post">
									<label for="colislivrer" style="color:black;">Est-ce que vous avez livrer le colis : </label><br>
									<input type="checkbox" name="colislivrer" id="colislivrer" style="transform: scale(3); margin: 20px;"><br>
									<input type="submit" name="colisOUI" value="Envoyer" class="boutonEnvoyerColis"style="padding: 10px;border-radius: 10px;">
								</form>
							</div>
						</section>
					<?php }	?>
			</div>
		</div>


<!-- session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux -->
		<div class="conteneurCommandesLivreurfiofoodCompteFlex">
			<div class="conteneurCommandesLivreurfiofoodCompteAvantFlex">
				<?php 
					$colis = $bdd->prepare('SELECT * FROM panier WHERE idlivreurcommande = :idlivreurcommande and livrer="" LIMIT 4,2');
					$colis->bindParam(':idlivreurcommande', $_SESSION['id']);
					$colis->execute();
					
					while ($colisInfo = $colis->fetch()) {
						?>
						<section class="commandesPostesComptes">
							<div class="clientCommandes">
								nom du client :
							</div>
							<div class="clientCommandesNom">
								<?php echo($colisInfo['nomProduit']); ?>									
							</div>																
							 <div class="clientCommandesPrix">
							 	<span style="color:black">prix : </span>
							 	<?php echo(' '.$colisInfo['prixpanier'].' cfa'); ?>
							 </div>	
							<div class="clientCommandes">
								 Numéro colis :
							</div> 
							 <div class="numeroclois">
							 	<?php 
									$numerocommande = str_replace(' ', '', $colisInfo['dateCommande']);
									$numerocommande = str_replace(':', '', $numerocommande);
									$numerocommande = str_replace('-', '', $numerocommande);
									echo('fioFood'.$numerocommande);	
								?>
							 </div>														 
							<div class="clientCommandesNumero">
								<i class="fa fa-mobile" aria-hidden="true"></i>
								<a href="tel:<?php echo $colisInfo['contactClient'];?>">
					         		<?php echo $colisInfo['contactClient'];?>
					         	</a>
							</div>
							<div class="clientCommandes">
								clique pour voir le trajet : 
							</div>
								<div class="clientCommandesLieu">
									<?php echo($colisInfo['lieuLivraison']); ?>
								</div>
							<div class="etatdelacommande" align="center">
								<form method="post">
									<label for="colislivrer" style="color:black;">Est-ce que vous avez livrer le colis : </label><br>
									<input type="checkbox" name="colislivrer" id="colislivrer" style="transform: scale(3); margin: 20px;"><br>
									<input type="submit" name="colisOUI" value="Envoyer" class="boutonEnvoyerColis"style="padding: 10px;border-radius: 10px;">
								</form>
							</div>
						</section>
					<?php }	?>
			</div>

			<div class="conteneurCommandesLivreurfiofoodCompteAvantFlex">
				<?php 
					$colis = $bdd->prepare('SELECT * FROM panier WHERE idlivreurcommande = :idlivreurcommande and livrer="" LIMIT 6,2');
					$colis->bindParam(':idlivreurcommande', $_SESSION['id']);
					$colis->execute();
					
					while ($colisInfo = $colis->fetch()) {
						?>
						<section class="commandesPostesComptes">
							<div class="clientCommandes">
								nom du client :
							</div>
							<div class="clientCommandesNom">
								<?php echo($colisInfo['nomProduit']); ?>									
							</div>																
							 <div class="clientCommandesPrix">
							 	<span style="color:black">prix : </span>
							 	<?php echo(' '.$colisInfo['prixpanier'].' cfa'); ?>
							 </div>	
							<div class="clientCommandes">
								 Numéro colis :
							</div> 
							 <div class="numeroclois">
							 	<?php 
									$numerocommande = str_replace(' ', '', $colisInfo['dateCommande']);
									$numerocommande = str_replace(':', '', $numerocommande);
									$numerocommande = str_replace('-', '', $numerocommande);
									echo('fioFood'.$numerocommande);	
								?>
							 </div>														 
							<div class="clientCommandesNumero">
								<i class="fa fa-mobile" aria-hidden="true"></i>
								<a href="tel:<?php echo $colisInfo['contactClient'];?>">
					         		<?php echo $colisInfo['contactClient'];?>
					         	</a>
							</div>
							<div class="clientCommandes">
								clique pour voir le trajet : 
							</div>
								<div class="clientCommandesLieu">
									<?php echo($colisInfo['lieuLivraison']); ?>
								</div>
							<div class="etatdelacommande" align="center">
								<form method="post">
									<label for="colislivrer" style="color:black;">Est-ce que vous avez livrer le colis : </label><br>
									<input type="checkbox" name="colislivrer" id="colislivrer" style="transform: scale(3); margin: 20px;"><br>
									<input type="submit" name="colisOUI" value="Envoyer" class="boutonEnvoyerColis"style="padding: 10px;border-radius: 10px;">
								</form>
							</div>
						</section>
					<?php }	?>
			</div>
		</div>
	</div>
	</div>


</div>