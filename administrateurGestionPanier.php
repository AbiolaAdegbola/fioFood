<?php include 'barreDeRecherche.php'; ?>

<div class="gestionPanierAdministrateur">
	<header style="color:seagreen; padding: 10px;font-size: 20px; text-align: center;">Gestion des panier et livreur</header>
	<div class="headerPanierType">
       <a href="administrateurGestionPanierSansLivreur.php" class="sanslivreur">Sans livreur</a>
       <a href="administrateurGestionPanierAvecLivreur.php" class="aveclivreur">Avec livreur</a>
    </div>
	<div class="gestionPanierConteneur">
<div class="gestionPanierConteneurElement" align="center">
	<div>
		<?php 
				$colis = $bdd->prepare('SELECT * FROM panier WHERE nompanier="" and livrer="0" and prixpromo="" and idlivreurcommande=""');
				$colis->execute();
				while ($colisInfo = $colis->fetch()) {
					?>
			<section class="gestionPanierSectionElement">
				<div class="gestionPanierSectionElementNumerColis">
					<span class="gestionPanierSectionElementNumerColisNom">N° colis : </span>
					<?php 
				         $numerocommande = str_replace(' ', '', $colisInfo['dateCommande']);
				         $numerocommande = str_replace(':', '', $numerocommande);
				         $numerocommande = str_replace('-', '', $numerocommande);
				         echo(' fioFood'.$numerocommande); 
				    ?> 
				</div>
				<div class="gestionPanierSectionElementNumerColis">
					<span class="gestionPanierSectionElementNumerColisNom">Lieu : </span><?php echo($colisInfo['lieuLivraison']); ?>
				</div>
				<div class="gestionPanierSectionElementLivreur" data-id="<?php echo($colisInfo['lieuLivraison'].' '.$colisInfo['id']); ?>">
					Livreur dans la zone
				</div>
			</section>
		<?php }?>
	</div>
	<div>
		<?php 
			$colis = $bdd->prepare('SELECT * FROM panier WHERE nompanier=" " and livrer="0" and prixpromo=" " and idlivreurcommande=" "');
			$colis->execute();
			while ($colisInfo = $colis->fetch()) {
				?>
			<section class="gestionPanierSectionElement">
				<div class="gestionPanierSectionElementNumerColis">
					<span class="gestionPanierSectionElementNumerColisNom">N° colis : </span>
					<?php 
				         $numerocommande = str_replace(' ', '', $colisInfo['dateCommande']);
				         $numerocommande = str_replace(':', '', $numerocommande);
				         $numerocommande = str_replace('-', '', $numerocommande);
				         echo(' fioFood'.$numerocommande); 
				    ?> 
				</div>
				<div class="gestionPanierSectionElementNumerColis">
					<span class="gestionPanierSectionElementNumerColisNom">Lieu : </span><?php echo($colisInfo['lieuLivraison']); ?>
				</div>
				<div class="gestionPanierSectionElementLivreur" data-id="<?php echo($colisInfo['lieuLivraison'].' '.$colisInfo['id']); ?>">
					Livreur dans la zone
				</div>
			</section>
		<?php }?>
	</div>			
</div>
	</div>
</div>

<style type="text/css">
.headerPanierType
{
   display: flex;
   font-size: 20px;
   margin: 10px;
}

.headerPanierType a
{
   padding:20px;
   background-color: seagreen;
   border-radius: 10px;
   color: white;
   margin: 10px;
}

.headerPanierType a:active
{
   background-color: white;
}


</style>

<?php include 'footer.php'; ?>