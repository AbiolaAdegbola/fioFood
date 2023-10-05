<?php 
   session_start();
   include 'connexionBaseDonnee.php';
   include 'configOAuthAPI.php';
   include 'fonctionEncrypt.php';

   if (isset($_SESSION['id'])) {
   	$recuperationP = $bdd->prepare('SELECT * FROM fiofood WHERE id=?');
   	$recuperationP->execute(array($_SESSION['id']));
   	while($infoRecuperationP = $recuperationP->fetch()){ 
   		$_SESSION['nom'] = $infoRecuperationP['nom'];
   		$_SESSION['photo'] = $infoRecuperationP['photo'];
   		$_SESSION['vendeurpro'] = $infoRecuperationP['vendeurpro'];
   	}
   }
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>fioFood</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.8 maximum-scale=0.8">
	<meta name="description" content="" />
  <meta name="author" content="ADEGBOLA ABIOLA MANSOUROU" />
	<link rel="stylesheet" type="text/css" href="cssEntete.css">
	<link rel="stylesheet" type="text/css" href="cssPostes.css">
	<link rel="stylesheet" type="text/css" href="cssFooter.css">
	<link rel="stylesheet" type="text/css" href="slider/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="slider/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="cssAgriculteurs.css">
	<link rel="stylesheet" type="text/css" href="FairePosteCreerCompte.css">
	<link rel="stylesheet" type="text/css" href="inscription.css">
	<link rel="stylesheet" type="text/css" href="slider/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="compte.css">
	<link rel="stylesheet" type="text/css" href="Naturel.css">
	<link rel="stylesheet" type="text/css" href="pageDemanderClient.css">
	<link rel="stylesheet" type="text/css" href="banniereFioFood.css">
	<link rel="stylesheet" type="text/css" href="resultatRechercheFiofood.css">
	<link rel="stylesheet" type="text/css" href="panier.css">
	<link rel="stylesheet" type="text/css" href="marchevirtuelfioFood.css">
	<link rel="stylesheet" type="text/css" href="recettesfiofoodafricaines.css">
	<link rel="stylesheet" type="text/css" href="supermarchefioFood.css">
	<link rel="stylesheet" type="text/css" href="comptelivreurfiofood.css">
	<link rel="stylesheet" type="text/css" href="panierClientContenu.css">
	<link rel="stylesheet" type="text/css" href="administrateurGestionUser.css">

	<link rel="shortcut icon" href="icon/nameFioFood.png" />
 <!--[if lt IE 9]>
<script
src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body>
<div id="conteneurIconbarreRecherche">	
	<div id="iconFiofood">
		<a href="index.php"><img src="icon/nameFioFood.png"></a>
	</div>

<!-- code du panier acheteur sur fiofood -->
<div class="panierPrincipal">
  	<img src="icon/panierPrincipal.png" class="panierPrincipalImagesclick" data-toggle="modal" data-target="#panierModal">
</div>

  <form method="POST" id="barreDeRechercheForm" action="resultatRechercheFiofood.php">       
			<div id="barreDeRecherche">
				<input type="search" name="search" placeholder="Rechercher sur fioFood">
				<label for="envoyez" id="IconSearch">
					<i class="fa fa-search"></i>					
				</label>	
					<input type="submit" name="rechercherFiofood" id="envoyez" style="display: none;">	   
			</div>	
  </form>
  <div class="appelLaBarreDeRecherche">
					<i class="fa fa-search"></i>	
  </div>
  <div class="choixCategorieHeader">
  	<i class="fa fa-sliders" aria-hidden="true"></i>
  </div>
  <div id="barre">
  	<input type="checkbox" id="check" style="display: none;">
  	<label for="check">
  		  <i class="fa fa-bars" id="barreCheck"></i>
  	    <i class="fa fa-close" id="barreClose"></i>
  	</label>
  	<div id="enteteDeroulant">
		<ul>
		 <li><a href="index.php">Accueil</a></li>
		 <li><a href="entreprise.php">Entreprises</a></li>
		 <li><a href="Agriculteurs.php">Agriculteurs</a></li>
		  <li><a href="Naturel.php"><span style="font-size: 10px;">100%</span> Naturel</a></li>
		</ul>
	</div>
  </div>

<div id="iconFontawesomeCompte">
	<?php 
	    if (isset($_SESSION['photo'])) {?>
	    		<input type="checkbox" id="compteCheck" style="display:none;">
        <label for="compteCheck">
       		 <img src="<?php if($_SESSION['photo']!=''){echo 'photoProfilCouverture/'.$_SESSION['photo'];}else{ echo("photoProfilCouverture/iconDefault.png");} ?>" id="compteCheckOuvert">
       		 <?php 
       if ($_SESSION['vendeurpro'] !=0) { ?>
       		 <i class="fas fa-check-circle" id="compteApprouver" style="color:blue;position: absolute;bottom: 1px;
	right: 12px;z-index: 9;"></i>	
      <?php }?>	 
  	       <i class="fa fa-close" id="compteCheckFermer"></i> 
        	</label>

<div class="compteBoiteDialogue">
	<?php 
	   if (isset($_SESSION['id'])) {
   	$recuperationP = $bdd->prepare('SELECT * FROM fiofood WHERE id=?');
   	$recuperationP->execute(array($_SESSION['id']));
   	$infoRecuperationP = $recuperationP->fetch();
   		?>
	<div class="enteteBoitedialogueCompte">
		<div class="iconFontawesomeCompteBoitedialogue">
			<img src="<?php if($infoRecuperationP['photo']!=''){echo 'photoProfilCouverture/'.$infoRecuperationP['photo'];}else{ echo("photoProfilCouverture/iconDefault.png");} ?>">
			<?php 
       if ($infoRecuperationP['vendeurpro'] !=0) { ?>
			<i class="fas fa-check-circle" style="color:blue;position: absolute;bottom: 0px;
	right: 30px;z-index: 9; font-size: 18px;margin: 0;padding: 0;"></i>
      <?php }?>	 
		</div>
		<div class="nomPrenomBoiteDialogueCompte">
			<?php echo($infoRecuperationP['nom']." ".$infoRecuperationP['prenom']); ?>
		</div>
		<div class="VoirProfil">
			<a href="compte.php" style="color: white;">Voir mon profil</a>
		</div>
	</div>	


	<?php 
		if ($infoRecuperationP['profession'] != 'Livreur') {
			?>
				  <div class="fairePosteUtlisateurBoiteDialogue">
  		 <div>
  		 	<i class="fas fa-bullhorn"></i> 
      <a href="<?php if(($infoRecuperationP['profession']=='Commerçant') and ($infoRecuperationP['nommarche']!='')){echo("faireUneAnnonceMarcheVirtuel.php");}elseif($infoRecuperationP['profession']=='supermarket'){echo("faireUneAnnonceSupermarche.php");}elseif($infoRecuperationP['profession']=='Boulangerie'){echo("faireUneAnnonceBoulangerie.php");}else{echo("faireUneAnnonce.php");} ?>" style="text-decoration: none; color: white;">faire une annonce</a>
   </div>
   <?php if ($infoRecuperationP['certifierfiofood']==1) { ?>
   <div>    
   <i class="fas fa-bullhorn"></i>   
        <a href="recettesfiofoodPublierAnnonce.php" style="text-decoration: none; color: white;">Nouvelle recette</a>      
   </div>
   <?php } ?>
  </div>
   <div class="boutonSuivrePanier">
     <a href="panierClientPage.php" target="_bank" style="color: white;">suivre mes achats</a>
   </div>

      <div class="conteneurContenantLesInformationsSurCompteBoitedialogue" style="display:flex;">
      <div id="mesAnnonce">
        <header>Annonces</header>
        <div><a href="codePosteEnCoursDeVenteCompte.php" class="nonVendu" style="color:white;">En cours</a></div>
        <div><a href="codePosteVenduCompte.php" class="vendu" style="color:white;">Vendu</a></div>
      </div>

      <?php 
        if ($infoRecuperationP['certifierfiofood']==1) {
         ?>
      <div id="mesAnnonce">
        <header>Promotion</header>
        <div><a href="codePosteCollectionCompte.php" class="promotionCollectionCompte" style="color:white;">Promo</a></div>
        <div><a href="codePosteRecettefiofood.php" class="promotionRecettefiofood" style="color:white;">Recette</a></div>
      </div> 
       <?php } ?>
      <div id="mesAnnonceBooster">
        <a href="">Booster</a>
      </div>
    </div>
		<?php }
		/*
			POUR LES LIVREURS FIOFOOD	POUR LES LIVREURS FIOFOOD	POUR LES LIVREURS FIOFOOD	POUR LES LIVREURS FIOFOOD	POUR LES LIVREURS FIOFOOD	POUR LES LIVREURS FIOFOOD	POUR LES LIVREURS FIOFOOD	POUR LES LIVREURS FIOFOOD	POUR LES LIVREURS FIOFOOD	POUR LES LIVREURS FIOFOOD	POUR LES LIVREURS FIOFOOD	POUR LES LIVREURS FIOFOOD	POUR LES LIVREURS FIOFOOD	POUR LES LIVREURS FIOFOOD	POUR LES LIVREURS FIOFOOD	POUR LES LIVREURS FIOFOOD	POUR LES LIVREURS FIOFOOD
		*/
		else
				{?>
					<div>
						
					</div>
		<?php }	?>











      <div style="position: absolute; right: 10%;bottom: 10%;font-size: 22px;font-weight: bold;" onclick="return confirm('Se deconnecter');"><a href="seDeconneter.php" style="color:white;">se deconnecter</a></div> 

   	<?php  } ?>
</div>
        	   <?php }else {?>
        <div class="boutonConnexion" style="font-size: 32px;color: white;position: absolute;right: 10px;top: -7px;"><i class="fas fa-user-circle"></i></div> 
	  <?php }?>
</div>
</div>