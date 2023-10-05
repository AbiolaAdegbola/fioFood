<?php 
	include 'barreDeRecherche.php';
	 ?>
<div class="conteneurFaireUneAnnoncePrincipale">

	 <?php 
	 if (isset($_SESSION['id'])) {

	      if (isset($_POST['publierAnnonceEnvoyer']) AND !isset($_POST['publierAnnonceEnvoyerModifier'])) {
                
	$titreAnnonce = htmlspecialchars($_POST['titreAnnonce']);
    $prixAnnonce = htmlspecialchars($_POST['prixAnnonce']);
    $quantiteMin = htmlspecialchars($_POST['quantiteMin']);
    $quantiteMax = htmlspecialchars($_POST['quantiteMax']);
    $prixAnnonceMax = htmlspecialchars($_POST['prixAnnonceMax']);
    $unitemesure = htmlspecialchars($_POST['unitemesure']);
    $unitemesureDefinir = htmlspecialchars($_POST['unitemesureDefinir']);

    //VERIFICATION DE L'UNITE DE MESURE
    if ($unitemesure != 'Autre') {
    	$unitemesurePropre = $unitemesure;
    }
    else
    {
    	$unitemesurePropre = $unitemesureDefinir;
    }
    
    //VERIFIER SI L ANNONCEUR A UN COMPTE OU NON
    if (isset($_SESSION['id'])) {
    	$id_fiofood = $_SESSION['id'];
    }
    else{
    	$id_fiofood = 0;
        }

     $nom = $_FILES['file1Gratuit']['tmp_name'];
    $nomPropre1 = $_FILES['file1Gratuit']['name'];
    $destination1 = 'image/'.$nomPropre1;
    move_uploaded_file($nom, $destination1);


    //ENREGIUSTREMENT DES INFORMATION DANS LA BASE DE DONNEES fioFoodAnnonce
$ins = $bdd->prepare('INSERT INTO fiofoodannoceuranonyme(id_fiofood,titreannonce,prixannonce,prixmax,minquantite,maxquantite,img1,unitemesure,datePoste) VALUES(:id_fiofood,:nomproduitmarche,:prixminmarche,:prixmaxmarche,:quantiteminmarche,:quantitemaxmarche,:img1marche,:unitemesuremarche,NOW())');
            
            $ins->bindParam(':nomproduitmarche',$titreAnnonce);
            $ins->bindParam(':prixminmarche',$prixAnnonce);  
            $ins->bindParam(':img1marche',$nomPropre1);
            $ins->bindParam(':quantiteminmarche',$quantiteMin);
            $ins->bindParam(':quantitemaxmarche',$quantiteMax);
            $ins->bindParam(':prixmaxmarche',$prixAnnonceMax);
            $ins->bindParam(':unitemesuremarche',$unitemesurePropre);
            $ins->bindParam(':id_fiofood',$id_fiofood);
            $ins->execute();
        //header('Location: http://localhost/fioFood/index.php');
            echo "<script>window.location.href='index.php';</script>";

	     }

	     //MODIFIER POSTE EXISTANT CODE SOURCE
	     elseif (isset($_POST['publierAnnonceEnvoyerModifier']) AND !isset($_POST['publierAnnonceEnvoyer'])) {

	$titreAnnonce = htmlspecialchars($_POST['titreAnnonce']);
    $prixAnnonce = htmlspecialchars($_POST['prixAnnonce']);
    $quantiteMin = htmlspecialchars($_POST['quantiteMin']);
    $quantiteMax = htmlspecialchars($_POST['quantiteMax']);
    $prixAnnonceMax = htmlspecialchars($_POST['prixAnnonceMax']);
    $unitemesure = htmlspecialchars($_POST['unitemesure']);
    $unitemesureDefinir = htmlspecialchars($_POST['unitemesureDefinir']);

    //VERIFICATION DE L'UNITE DE MESURE
    if ($unitemesure != 'Autre') {
    	$unitemesurePropre = $unitemesure;
    }
    else
    {
    	$unitemesurePropre = $unitemesureDefinir;
    }
    
    //VERIFIER SI L ANNONCEUR A UN COMPTE OU NON
    if (isset($_SESSION['id_modifierPoste'])) {
    	$id_modifierPoste = $_SESSION['id_modifierPoste'];
    }
    else{
    }

    if (filesize($_FILES['file1Gratuit']['tmp_name'])) {
    $nom = $_FILES['file1Gratuit']['tmp_name'];
    $nomPropre1 = $_FILES['file1Gratuit']['name'];
    $destination1 = 'image/'.$nomPropre1;
    move_uploaded_file($nom, $destination1);
    }
    else
    {
    	$nomPropre1 = htmlspecialchars($_POST['imagemodifier']);
    }

    //ENREGIUSTREMENT DES INFORMATION DANS LA BASE DE DONNEES fioFoodAnnonce
$ins = $bdd->prepare('UPDATE fiofoodannoceuranonyme SET titreannonce=:titreannonce,prixannonce=:prixannonce,prixmax=:prixmax,minquantite=:minquantite,maxquantite=:maxquantite,img1=:img1marche,unitemesure=:unitemesuremarche WHERE id=:id');
            
            $ins->bindParam(':titreannonce',$titreAnnonce);
            $ins->bindParam(':prixannonce',$prixAnnonce);  
            $ins->bindParam(':img1marche',$nomPropre1);
            $ins->bindParam(':minquantite',$quantiteMin);
            $ins->bindParam(':maxquantite',$quantiteMax);
            $ins->bindParam(':prixmax',$prixAnnonceMax);
            $ins->bindParam(':unitemesuremarche',$unitemesurePropre);
            $ins->bindParam(':id',$id_modifierPoste);
            $ins->execute();
        //header('Location: http://localhost/fioFood/compte.php');
         echo "<script>window.location.href='compte.php';</script>";
	     }
	     elseif (!isset($_POST['publierAnnonceEnvoyer']) && (!isset($_GET['modifierPoste'])
	           && !isset($_GET['modifierPosteId_fioFood']))) { ?>
	                  
	 <form method="post" enctype="multipart/form-data" style="margin-top: 25px;">
<div class="annonce">
	<header>fioFood Annonce</header>
	<div id="photoPostesConteneur">
		<h2>Ajoutez des photos*</h2>
	 <div class="precisionConteneur">
		Ajoutez plusieurs photos pour augmenter vos chances d'être contacté
	 </div>
	    
	    <div class="ajouterPhotos">
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file1Gratuit" id="file1" class="photoPrincipale" accept="image/*" data-preview = "#preview1" required>
	    	  	<label for="file1">
	    	  		<div class="Principale" >
					 <div class="appareilPhotoIcon">
					  <i class="fa fa-camera" aria-hidden="true">					  	
					  </i></div>
	    	  			<img id="preview1">
	    	  	    </div>
	    	  	</label>	    	  	
	    	  </div>
	    </div>   
	</div>

  <div id="descriptionPostesConteneur">
  	<h2>Décrivez votre annonce</h2>
  	<div class="titreAnnonce">
  		Titre de l'annonce
  		<input type="text" name="titreAnnonce" placeholder="Exemple: Vente de cacao" class="zoneInformation" required><br>
  		<span>choississez un titre court et précis. Ne mentionnez pas le prix</span>
  	</div>
  	<div class="quantiteMinAnnonce">
  		Quantite minimale
  		<input type="number" name="quantiteMin" placeholder="Exemple: 8" class="zoneInformation">
  	</div>
  	<div class="prixAnnonce">
  		Prix de la quantite minimale
  		<input type="text" name="prixAnnonce" placeholder="Le prix de la quantité minimale" class="zoneInformation" required><br>
  	</div>
  	<div class="quantiteMaxAnnonce">
  		Quantite maximale
  		<input type="number" name="quantiteMax" placeholder="Exemple: 9" class="zoneInformation">
  	</div>
  	<div class="prixAnnonceMax">
  		Prix de la quantite maximale
  		<input type="text" name="prixAnnonceMax" placeholder="Le prix de la quantité maximale" class="zoneInformation"><br>
  	</div>
  	<div class="uniteMesureAnnonce">
  		Unité de mesure :
  		<select class="zoneInformation" id="modeventeProduitSelection" name="unitemesure">
  			<option>Gramme</option>
  			<option>Kilogramme</option>
  			<option>Tonne</option>
  			<option>Autre</option>
  		</select><br>
  		<div class="titreAnnonce" id="modeventeProduit" >
  			<span>Definissez votre mode de vente exemple: deux (02) tomates à 100f</span>
  			<input type="text" name="unitemesureDefinir" placeholder="Exemple: deux (02) tomates à 100f" class="zoneInformation"><br>
  		</div>
  	</div><br>
  </div>
  <input type="submit" style="visibility: hidden;" id="publierAnnonceEnvoyer" name="publierAnnonceEnvoyer">
  	<label for="publierAnnonceEnvoyer"id="publierAnnonce" style="cursor: pointer;">
  		Publiez votre Annonce
  	</label>
  	<a href="index.php" style="text-decoration: none;"><div id="annulerAnnonce">
  		Annuler
  	</div></a>
</div>
</form>

	   <?php }
	   elseif ((!isset($_POST['publierAnnonceEnvoyer'])) && (isset($_GET['modifierPoste'])
	           && isset($_GET['modifierPosteId_fioFood']))) {
	   	$_SESSION['id_modifierPoste'] = simple_decrypt($_GET['modifierPoste']);
	   	$modifierPosteCon = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id_fiofood=? AND id=?');
	   	    $modifierPosteCon->execute(array(simple_decrypt($_GET['modifierPosteId_fioFood']),simple_decrypt($_GET['modifierPoste'])));
	   	    $modifierPosteInfo = $modifierPosteCon->fetch();
	   	?>
<form method="post" enctype="multipart/form-data" style="margin-top: 25px;">
<div class="annonce">
	<header>fioFood Annonce</header>
	<div id="photoPostesConteneur">
		<h2>Ajoutez des photos*</h2>
	 <div class="precisionConteneur">
		Ajoutez plusieurs photos pour augmenter vos chances d'être contacté
	 </div>
	    
	    <div class="ajouterPhotos">
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file1Gratuit" id="file1" class="photoPrincipale" accept="image/*" data-preview = "#preview1">
	    	  	<input type="text" name="imagemodifier" value="<?php echo($modifierPosteInfo['img1']); ?>" style="display: none;">
	    	  	<label for="file1">
	    	  		<div class="Principale" >
					 <div class="appareilPhotoIcon">
					  <i class="fa fa-camera" aria-hidden="true">					  	
					  </i></div>
	    	  			<img id="preview1">
	    	  	    </div>
	    	  	</label>	    	  	
	    	  </div>
	    </div>	    
	</div>

  <div id="descriptionPostesConteneur">
  	<h2>Décrivez votre annonce</h2>
  	<div class="titreAnnonce">
  		<input type="text" name="titreAnnonce" placeholder="Titre de l'annonce" class="zoneInformation" value="<?php echo $modifierPosteInfo['titreannonce']; ?>"><br>
  		<span>choississez un titre court et précis. Ne mentionnez pas le prix</span>
  	</div>
  	<div class="quantiteMinAnnonce">
  		Quantite minimale
  		<input type="number" name="quantiteMin" placeholder="Exemple: 8" class="zoneInformation" value="<?php echo $modifierPosteInfo['minquantite']; ?>">
  	</div>
  	<div class="prixAnnonce">
  		Prix de la quantite minimale
  		<input type="text" name="prixAnnonce" placeholder="Le prix de la quantité minimale" class="zoneInformation" value="<?php echo $modifierPosteInfo['prixannonce']; ?>"><br>
  	</div>
  	<div class="quantiteMaxAnnonce">
  		Quantite maximale
  		<input type="number" name="quantiteMax" placeholder="Exemple: 9" class="zoneInformation" value="<?php echo $modifierPosteInfo['maxquantite']; ?>">
  	</div>
  	<div class="prixAnnonceMax">
  		Prix de la quantite maximale
  		<input type="text" name="prixAnnonceMax" placeholder="Le prix de la quantité maximale" class="zoneInformation" value="<?php echo $modifierPosteInfo['prixmax']; ?>"><br>
  	</div>
  	<div class="uniteMesureAnnonce">
  		Unité de mesure :
  		<select class="zoneInformation" id="modeventeProduitSelection" name="unitemesure">
  			<option>Gramme</option>
  			<option>Kilogramme</option>
  			<option>Tonne</option>
  			<option>Autre</option>
  		</select><br>
  		<div class="titreAnnonce" id="modeventeProduit" >
  			<span>Definissez votre mode de vente exemple: deux (02) tomates à 100f</span>
  			<input type="text" name="unitemesureDefinir" placeholder="Exemple: deux (02) tomates à 100f" class="zoneInformation"><br>
  		</div>
  	</div><br>
  </div>
  <input type="submit" style="visibility: hidden;" id="publierAnnonceEnvoyerModifier" name="publierAnnonceEnvoyerModifier">
  	<label for="publierAnnonceEnvoyerModifier" id="publierAnnonce" style="cursor: pointer;">
  		Publiez votre Annonce
  	</label>
  	<a href="index.php" style="text-decoration: none;"><div id="annulerAnnonce">
  		Annuler
  	</div></a>
</div>
</form>
	  <?php }?>
</div>
<?php 
 }
 else{
 	echo "<script>window.location.href='index.php';</script>";
 }
include 'footer.php';
 ?>