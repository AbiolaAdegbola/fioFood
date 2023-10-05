<?php 
	include 'connexionBaseDonnee.php';

	if (isset($_POST['idpanier'])) {
		//pour verifier l'etat de la boucle while
		$u = true;
		$idpanier = htmlspecialchars($_POST['idpanier']);
		$lieu = htmlspecialchars($_POST['lieu']);
		$recuperationlivreur = $bdd->prepare('SELECT * FROM fiofood WHERE localisationProfil=:localisation and profession="Livreur"');
		$recuperationlivreur->bindParam(':localisation', $lieu);
		$recuperationlivreur->execute();
		
		while ($recuperationlivreurInfo = $recuperationlivreur->fetch()) {
			$u = false;
		?>
		<header class="livreurDisponibleHeader">Livreur</header>
		<?php 
		?>
		<div class="livreurDisponible">			
			<div class="livreurDisponibleNom">
				<?php echo($recuperationlivreurInfo['nom'].' '.$recuperationlivreurInfo['prenom']); ?>
			</div>
			<div class="livreurDisponibleInformation">
				<span>position : </span> <?php echo($recuperationlivreurInfo['localisationProfil']); ?>
			</div>
			<div class="livreurDisponibleInformation">
				<span>Etat du profil : </span><?php echo($recuperationlivreurInfo['profession']); ?>
			</div>
			<div class="livreurDisponibleInformationInput">
				<input type="checkbox" data-id="<?php echo($recuperationlivreurInfo['id'].' '.$idpanier); ?>" class="livreurDisponibleInformationInputChecked">
			</div>
		</div>
<?php }
	if($u == true){
		?>
		<header class="livreurDisponibleHeader">Tous les livreur</header>
		<?php 
		$recuperationlivreur = $bdd->prepare('SELECT * FROM fiofood WHERE profession="Livreur"');
		$recuperationlivreur->bindParam(':localisation', $livreur);
		$recuperationlivreur->execute();
		while ($recuperationlivreurInfo = $recuperationlivreur->fetch()) {
		?>
		<div class="livreurDisponible">			
			<div class="livreurDisponibleNom">
				<?php echo($recuperationlivreurInfo['nom'].' '.$recuperationlivreurInfo['prenom']); ?>
			</div>
			<div class="livreurDisponibleInformation">
				<span>position : </span> <?php echo($recuperationlivreurInfo['localisationProfil']); ?>
			</div>
			<div class="livreurDisponibleInformation">
				<span>Etat du profil : </span><?php echo($recuperationlivreurInfo['profession']); ?>
			</div>
			<div class="livreurDisponibleInformationInput">
				<input type="checkbox" data-id="<?php echo($recuperationlivreurInfo['id'].' '.$idpanier); ?>" class="livreurDisponibleInformationInputChecked">
			</div>
		</div>
<?php 		}
		}
	}
?>

<script type="text/javascript">
	//attribution d'un colis au livreur disponible
$(document).ready(function() {
    $('.livreurDisponibleInformationInputChecked').click(function() {
     var livreurdisponible = $(this).data('id');
        livreurdisponible = livreurdisponible.split(' ');
        idLivreur = livreurdisponible[0];
        idpanier = livreurdisponible[1];
        
    var supp = $(this);

        $.ajax({
            url: 'administrateurGestionUserTraite.php',
            type: 'post',
            data: {idLivreur: idLivreur, idpanier:idpanier},
            success: function(response){ 
            	supp.parents('.gestionPanierSectionElement').fadeOut();
            }
        });
});
});
</script>