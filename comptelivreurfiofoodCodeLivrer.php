<?php 
   session_start();
   include 'connexionBaseDonnee.php';
?>

	<div class="conteneurCommandesLivreurfiofoodCompte">
		<div class="conteneurCommandesLivreurfiofoodCompteFlex">
			<div class="conteneurCommandesLivreurfiofoodCompteAvantFlex">
				<?php 
					$colis = $bdd->prepare('SELECT * FROM panier WHERE idlivreurcommande = :idlivreurcommande and livrer="1" LIMIT 0,2');
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
						</section>
					<?php }	?>
			</div>

			<div class="conteneurCommandesLivreurfiofoodCompteAvantFlex">
				<?php 
					$colis = $bdd->prepare('SELECT * FROM panier WHERE idlivreurcommande = :idlivreurcommande and livrer="1" LIMIT 2,2');
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
						</section>
					<?php }	?>
			</div>
		</div>


<!-- session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux  session deux -->
		<div class="conteneurCommandesLivreurfiofoodCompteFlex">
			<div class="conteneurCommandesLivreurfiofoodCompteAvantFlex">
				<?php 
					$colis = $bdd->prepare('SELECT * FROM panier WHERE idlivreurcommande = :idlivreurcommande and livrer="1" LIMIT 4,2');
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
						</section>
					<?php }	?>
			</div>

			<div class="conteneurCommandesLivreurfiofoodCompteAvantFlex">
				<?php 
					$colis = $bdd->prepare('SELECT * FROM panier WHERE idlivreurcommande = :idlivreurcommande and livrer="1" LIMIT 6,2');
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
						</section>
					<?php }	?>
			</div>
		</div>
	</div>