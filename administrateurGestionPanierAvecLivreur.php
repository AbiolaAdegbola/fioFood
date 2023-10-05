<?php include 'connexionBaseDonnee.php'; ?>

<div class="gestionPanierConteneurElement" align="center">
		<div>
		<?php 
			$colis = $bdd->prepare('SELECT * FROM panier WHERE nompanier=" " and livrer="0" and prixpromo=" " ');
			$colis->execute();
			while ($colisInfo = $colis->fetch()) {
				if ($colisInfo['idlivreurcommande'] !=" "){				
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
				<div class="gestionPanierSectionElementInfoLivreur">
					<header>Info livreur</header>
					<?php 
						$infoLivreur = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idlivreur');
						$infoLivreur->bindParam(':idlivreur', $colisInfo['idlivreurcommande']);
						$infoLivreur->execute();
						$infoLivreurResult = $infoLivreur->fetch();
					?>
					<div class="gestionPanierSectionElementInfoLivreurImage">
						<img src="photoProfilCouverture/<?php if($infoLivreurResult['photo'] !=''){echo($infoLivreurResult['photo']);}else{echo("iconDefault.png");} ?>">
					</div>
					<div class="gestionPanierSectionElementInfoLivreurNom">
						<?php echo($infoLivreurResult['nom'].' '.$infoLivreurResult['prenom']); ?>
					</div>
					<div class="gestionPanierSectionElementInfoLivreurNom">
						<span>Position : </span>
						<?php echo($infoLivreurResult['localisationProfil']); ?>
					</div>
					<div class="gestionPanierSectionElementInfoLivreurNom">
						<span>Changer le livreur : </span>
						<input type="checkbox" checked class="changerLivreur" data-id="<?php echo($colisInfo['id']); ?>">
					</div>
				</div>
			</section>
		<?php }}?>
		</div>

		<div>
			<?php 
			$colis = $bdd->prepare('SELECT * FROM panier WHERE nompanier=" " and livrer="0" and prixpromo=" " and profession="Livreur');
			$colis->execute();
			while ($colisInfo = $colis->fetch()) {
				if ($colisInfo['idlivreurcommande'] !=" "){				
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
				<div class="gestionPanierSectionElementInfoLivreur">
					<header>Info livreur</header>
					<?php 
						$infoLivreur = $bdd->prepare('SELECT * FROM fiofood WHERE id=:idlivreur');
						$infoLivreur->bindParam(':idlivreur', $colisInfo['idlivreurcommande']);
						$infoLivreur->execute();
						$infoLivreurResult = $infoLivreur->fetch();
					?>
					<div class="gestionPanierSectionElementInfoLivreurImage">
						<img src="photoProfilCouverture/<?php if($infoLivreurResult['photo'] !=''){echo($infoLivreurResult['photo']);}else{echo("iconDefault.png");} ?>">
					</div>
					<div class="gestionPanierSectionElementInfoLivreurNom">
						<?php echo($infoLivreurResult['nom'].' '.$infoLivreurResult['prenom']); ?>
					</div>
					<div class="gestionPanierSectionElementInfoLivreurNom">
						<span>Position : </span>
						<?php echo($infoLivreurResult['localisationProfil']); ?>
					</div>
					<div class="gestionPanierSectionElementInfoLivreurNom">
						<span>Changer le livreur : </span>
						<input type="checkbox" checked class="changerLivreur" data-id="<?php echo($colisInfo['id']); ?>">
					</div>
				</div>
			</section>
		<?php }}?>
		</div>
		</div>

<script type="text/javascript">
//gestion des livreur pour les colis ::::::::: pour changer le livreur
$(document).ready(function() {
    $('.changerLivreur').click(function() {
     var changelivreur = $(this).data('id');
     var divchange = $(this);
        $.ajax({
            url: 'administrateurGestionUserTraite.php',
            type: 'post',
            data: {changelivreur: changelivreur},
            success: function(response){ 
                divchange.parents('.gestionPanierSectionElement').fadeOut();
            }
        });
});
});
</script>