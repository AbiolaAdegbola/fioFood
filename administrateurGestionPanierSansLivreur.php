<?php include 'connexionBaseDonnee.php'; ?>

<div class="gestionPanierConteneurElement" align="center">
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

<script type="text/javascript">
    //gestion des livreur pour les colis appel boite de dialogue
$(document).ready(function() {
    $('.gestionPanierSectionElementLivreur').click(function() {
     var userid = $(this).data('id');
        userid = userid.split(' ');
        lieu = userid[0];
        idpanier = userid[1];
        $.ajax({
            url: 'administrateurGestionPanierBoiteLivreur.php',
            type: 'post',
            data: {lieu: lieu, idpanier: idpanier},
            success: function(response){ 
                $('.modal-body').html(response); 
                $('.monModal').modal('show'); 
            }
        });
});
});
</script>