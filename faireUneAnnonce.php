<?php 
	include 'barreDeRecherche.php';
	
	if (isset($_SESSION['id'])) {
		?>

<div class="conteneurFaireUneAnnoncePrincipale">

	 <?php 
	      if (isset($_POST['publierAnnonceEnvoyer']) AND !isset($_POST['publierAnnonceEnvoyerModifier'])) {
                
	$titreAnnonce = htmlspecialchars($_POST['titreAnnonce']);
    $prixAnnonce = htmlspecialchars($_POST['prixAnnonce']);
    $quantiteMin = htmlspecialchars($_POST['quantiteMin']);
    $quantiteMax = htmlspecialchars($_POST['quantiteMax']);
    $prixAnnonceMax = htmlspecialchars($_POST['prixAnnonceMax']);
    $unitemesure = htmlspecialchars($_POST['unitemesure']);
    $unitemesureDefinir = htmlspecialchars($_POST['unitemesureDefinir']);
    $categorieAnnonce = htmlspecialchars($_POST['categorieAnnonce']);
    $VilleAnnonce = htmlspecialchars($_POST['VilleAnnonce']);
    $descriptionAnnonce = htmlspecialchars($_POST['descriptionAnnonce']);
    $numeroTelephone = htmlspecialchars($_POST['numeroTelephone']);
    $numeroWhatsapp = htmlspecialchars($_POST['numeroWhatsapp']);


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
    	$id_fiofood = $numeroTelephone;
    }

     $nom = $_FILES['file1Gratuit']['tmp_name'];
    $nomPropre1 = $_FILES['file1Gratuit']['name'];
    $destination1 = 'image/'.$nomPropre1;
    move_uploaded_file($nom, $destination1);
   
    $nom = $_FILES['file2Gratuit']['tmp_name'];
    $nomPropre2 = $_FILES['file2Gratuit']['name'];
    $destination2 = 'image/'.$nomPropre2;
    move_uploaded_file($nom, $destination2);

    $nom = $_FILES['file3Gratuit']['tmp_name'];
    $nomPropre3 = $_FILES['file3Gratuit']['name'];
    $destination3 = 'image/'.$nomPropre3;
    move_uploaded_file($nom, $destination3);


    //ENREGIUSTREMENT DES INFORMATION DANS LA BASE DE DONNEES fioFoodAnnonce
$ins = $bdd->prepare('INSERT INTO fiofoodannoceuranonyme(titreannonce,prixannonce,categorie,localisationannonce,descriptionannonce,numerotelephone,numerowhatsapp,img1,img2,img3,minquantite,maxquantite,prixmax,unitemesure,id_fiofood,datePoste) VALUES(:titreannonce,:prixannonce,:categorie,:localisationannonce,:descriptionannonce,:numerotelephone,:numerowhatsapp,:img1,:img2,:img3,:minquantite,:maxquantite,:prixmax,:unitemesure,:id_fiofood,NOW())');
            
            $ins->bindParam(':titreannonce',$titreAnnonce);
            $ins->bindParam(':prixannonce',$prixAnnonce);
            $ins->bindParam(':categorie',$categorieAnnonce);
            $ins->bindParam(':localisationannonce',$VilleAnnonce);
            $ins->bindParam(':descriptionannonce',$descriptionAnnonce);            
            $ins->bindParam(':numerotelephone',$numeroTelephone);
            $ins->bindParam(':numerowhatsapp',$numeroWhatsapp);
            $ins->bindParam(':img1',$nomPropre1);
            $ins->bindParam(':img2',$nomPropre2);
            $ins->bindParam(':img3',$nomPropre3);
            $ins->bindParam(':minquantite',$quantiteMin);
            $ins->bindParam(':maxquantite',$quantiteMax);
            $ins->bindParam(':prixmax',$prixAnnonceMax);
            $ins->bindParam(':unitemesure',$unitemesurePropre);
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
    $categorieAnnonce = htmlspecialchars($_POST['categorieAnnonce']);
    $VilleAnnonce = htmlspecialchars($_POST['VilleAnnonce']);
    $descriptionAnnonce = htmlspecialchars($_POST['descriptionAnnonce']);
    $numeroTelephone = htmlspecialchars($_POST['numeroTelephone']);
    $numeroWhatsapp = htmlspecialchars($_POST['numeroWhatsapp']);

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
   
    if (filesize($_FILES['file2Gratuit']['tmp_name'])) {
    $nom = $_FILES['file2Gratuit']['tmp_name'];
    $nomPropre2 = $_FILES['file2Gratuit']['name'];
    $destination2 = 'image/'.$nomPropre2;
    move_uploaded_file($nom, $destination2);
    }
    else
    {
    	$nomPropre2 = htmlspecialchars($_POST['imagemodifier2']);
    }

    if (filesize($_FILES['file3Gratuit']['tmp_name'])) {
    $nom = $_FILES['file3Gratuit']['tmp_name'];
    $nomPropre3 = $_FILES['file3Gratuit']['name'];
    $destination3 = 'image/'.$nomPropre3;
    move_uploaded_file($nom, $destination3);
    }
    else
    {
    	$nomPropre3 = htmlspecialchars($_POST['imagemodifier3']);
    }


    //ENREGIUSTREMENT DES INFORMATION DANS LA BASE DE DONNEES fioFoodAnnonce
$ins = $bdd->prepare('UPDATE fiofoodannoceuranonyme SET titreannonce=:titreannonce,prixannonce=:prixannonce,categorie=:categorie,localisationannonce=:localisationannonce,descriptionannonce=:descriptionannonce,numerotelephone=:numerotelephone,numerowhatsapp=:numerowhatsapp,img1=:img1,img2=:img2,img3=:img3,minquantite=:minquantite,maxquantite=:maxquantite,prixmax=:prixmax,unitemesure=:unitemesure WHERE id=:id_fiofood');
            
            $ins->bindParam(':titreannonce',$titreAnnonce);
            $ins->bindParam(':prixannonce',$prixAnnonce);
            $ins->bindParam(':categorie',$categorieAnnonce);
            $ins->bindParam(':localisationannonce',$VilleAnnonce);
            $ins->bindParam(':descriptionannonce',$descriptionAnnonce);            
            $ins->bindParam(':numerotelephone',$numeroTelephone);
            $ins->bindParam(':numerowhatsapp',$numeroWhatsapp);
            $ins->bindParam(':img1',$nomPropre1);
            $ins->bindParam(':img2',$nomPropre2);
            $ins->bindParam(':img3',$nomPropre3);
            $ins->bindParam(':minquantite',$quantiteMin);
            $ins->bindParam(':maxquantite',$quantiteMax);
            $ins->bindParam(':prixmax',$prixAnnonceMax);
            $ins->bindParam(':unitemesure',$unitemesurePropre);
            $ins->bindParam(':id_fiofood',$id_modifierPoste);
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
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file2Gratuit" id="file2" class="photoPrincipale" accept="image/*" data-preview = "#preview2">
	    	  	<label for="file2">
				  <div class="Principale" >
					 <div class="appareilPhotoIcon"> <i class="fa fa-camera" aria-hidden="true"></i></div>
	    	  			<img id="preview2">
	    	  	    </div>
	    	  	</label>
	    	  </div>
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file3Gratuit" id="file3" class="photoPrincipale" accept="image/*" data-preview = "#preview3">
	    	  	<label for="file3">
				  <div class="Principale" >
					 <div class="appareilPhotoIcon"> <i class="fa fa-camera" aria-hidden="true"></i></div>
	    	  			<img id="preview3">
	    	  	    </div>
	    	  	</label>
	    	  </div>
	    </div>
	    <div class="ajouterPhotos">
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file4Payant" id="file4" class="photoPrincipale" accept="image/*" data-preview = "#preview4">
	    	  	<label for="file4">
				  <div class="PrincipalePayant" >
					 <div class="appareilPhotoIcon"> <i class="fa fa-camera" aria-hidden="true"></i></div>
	    	  			<img id="preview4">
	    	  	    </div>
	    	  	</label>
	    	  </div>
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file5Payant" id="file5" class="photoPrincipale" accept="image/*" data-preview = "#preview5">
	    	  	<label for="file5">
				  <div class="PrincipalePayant" >
					 <div class="appareilPhotoIcon"> <i class="fa fa-camera" aria-hidden="true"></i></div>
	    	  			<img id="preview5">
	    	  	    </div>
	    	  	</label>
	    	  </div>
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file6Payant" id="file6" class="photoPrincipale" accept="image/*" data-preview = "#preview6">
	    	  	<label for="file6">
				  <div class="PrincipalePayant" >
					 <div class="appareilPhotoIcon"> <i class="fa fa-camera" aria-hidden="true"></i></div>
	    	  			<img id="preview6">
	    	  	    </div>
	    	  	</label>
	    	  </div>
	    </div>

	    <div class="ajouterPhotos">
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file7Payant" id="file7" class="photoPrincipale" accept="image/*" data-preview = "#preview7">
	    	  	<label for="file7">
				  <div class="PrincipalePayant" >
					 <div class="appareilPhotoIcon"> <i class="fa fa-camera" aria-hidden="true"></i></div>
	    	  			<img id="preview7">
	    	  	    </div>
	    	  	</label>
	    	  </div>
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file8Payant" id="file8" class="photoPrincipale" accept="image/*" data-preview = "#preview8">
	    	  	<label for="file8">
				  <div class="PrincipalePayant" >
					 <div class="appareilPhotoIcon"> <i class="fa fa-camera" aria-hidden="true"></i></div>
	    	  			<img id="preview8">
	    	  	    </div>
	    	  	</label>
	    	  </div>
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file9Payant" id="file9" class="photoPrincipale" accept="image/*" data-preview = "#preview9">
	    	  	<label for="file9">
				  <div class="PrincipalePayant" >
					 <div class="appareilPhotoIcon"> <i class="fa fa-camera" aria-hidden="true"></i></div>
	    	  			<img id="preview9">
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
  	</div><br>
  	<div class="quantiteMinAnnonce">
  		Quantite minimale
  		<input type="number" name="quantiteMin" placeholder="Exemple: 8" class="zoneInformation">
  	</div><br>
  	<div class="prixAnnonce">
  		Prix de la quantite minimale
  		<input type="text" name="prixAnnonce" placeholder="Le prix de la quantité minimale" class="zoneInformation" required><br>
  	</div><br>
  	<div class="quantiteMaxAnnonce">
  		Quantite maximale
  		<input type="number" name="quantiteMax" placeholder="Exemple: 9" class="zoneInformation">
  	</div><br>
  	<div class="prixAnnonceMax">
  		Prix de la quantite maximale
  		<input type="text" name="prixAnnonceMax" placeholder="Le prix de la quantité maximale" class="zoneInformation"><br>
  	</div><br>
  	<div class="uniteMesureAnnonce">
  		Unité de mesure :
  		<select class="zoneInformation" id="modeventeProduitSelection" name="unitemesure">
  			<option>Gramme</option>
  			<option>Kilogramme</option>
  			<option>Tonne</option>
  			<option>Autre</option>
  		</select>
  		<div class="titreAnnonce" id="modeventeProduit" >
  			<span>Definissez votre mode de vente exemple: deux (02) tomates à 100f</span>
  			<input type="text" name="unitemesureDefinir" placeholder="Exemple: deux (02) tomates à 100f" class="zoneInformation"><br>
  		</div>
  	</div><br>

  	<div class="categorieAnnonce">
  		Type du produit
  	    <select class="zoneInformation" name="categorieAnnonce">
  	    	<?php include 'listeproduitfiofood.php'; ?>  	
  	    </select>         
  	</div><br>
  	<div class="VilleAnnonce">
  		Localisation 
        <select name="VilleAnnonce" class="zoneInformation">
        	<?php include 'listedesvilles.php'; ?>
        </select>
  	</div><br>
  	<div class="descriptionAnnonce">
  		Description de l'annonce 
  		<textarea placeholder="Description" name="descriptionAnnonce" class="zoneInformation" style="padding: 55px;padding-top:2px;padding-left: 65px;padding-top: 22px;"></textarea>
  	</div>
  </div>
  <div id="contactAnnonceConteneur">
  	<div class="contactAnnonce">
		  <h2>Contact</h2>
		  <div class="numeroTelephoneIconTelephone"> 
		  <i class="fa fa-mobile" aria-hidden="true" id="IconTele"></i>
		  <input type="number" name="numeroTelephone" placeholder="Numéro téléphone" class="zoneInformation">
		  </div><br>
  		<div class="numeroTelephoneIconTelephone"> 
		  <i class="fa fa-whatsapp" aria-hidden="true" id="Iconwhat"></i>
		  <input type="number" name="numeroWhatsapp" placeholder="Numéro whatsApp" class="zoneInformation">
		  </div>  		
  	</div>
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
	   	$_SESSION['id_modifierPoste'] = htmlspecialchars(simple_decrypt($_GET['modifierPoste']));
	   	$modifierPosteCon = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofoodannoceuranonyme.id=?');
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
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file2Gratuit" id="file2" class="photoPrincipale" accept="image/*" data-preview = "#preview2">
	    	  	<input type="text" name="imagemodifier2" value="<?php echo($modifierPosteInfo['img2']); ?>" style="display: none;">
	    	  	<label for="file2">
				  <div class="Principale" >
					 <div class="appareilPhotoIcon"> <i class="fa fa-camera" aria-hidden="true"></i></div>
	    	  			<img id="preview2">
	    	  	    </div>
	    	  	</label>
	    	  </div>
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file3Gratuit" id="file3" class="photoPrincipale" accept="image/*" data-preview = "#preview3">
	    	  	<input type="text" name="imagemodifier3" value="<?php echo($modifierPosteInfo['img3']); ?>" style="display: none;">
	    	  	<label for="file3">
				  <div class="Principale" >
					 <div class="appareilPhotoIcon"> <i class="fa fa-camera" aria-hidden="true"></i></div>
	    	  			<img id="preview3">
	    	  	    </div>
	    	  	</label>
	    	  </div>
	    </div>
	    <div class="ajouterPhotos">
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file4Payant" id="file4" class="photoPrincipale" accept="image/*" data-preview = "#preview4">
	    	  	<label for="file4">
				  <div class="PrincipalePayant" >
					 <div class="appareilPhotoIcon"> <i class="fa fa-camera" aria-hidden="true"></i></div>
	    	  			<img id="preview4">
	    	  	    </div>
	    	  	</label>
	    	  </div>
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file5Payant" id="file5" class="photoPrincipale" accept="image/*" data-preview = "#preview5">
	    	  	<label for="file5">
				  <div class="PrincipalePayant" >
					 <div class="appareilPhotoIcon"> <i class="fa fa-camera" aria-hidden="true"></i></div>
	    	  			<img id="preview5">
	    	  	    </div>
	    	  	</label>
	    	  </div>
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file6Payant" id="file6" class="photoPrincipale" accept="image/*" data-preview = "#preview6">
	    	  	<label for="file6">
				  <div class="PrincipalePayant" >
					 <div class="appareilPhotoIcon"> <i class="fa fa-camera" aria-hidden="true"></i></div>
	    	  			<img id="preview6">
	    	  	    </div>
	    	  	</label>
	    	  </div>
	    </div>

	    <div class="ajouterPhotos">
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file7Payant" id="file7" class="photoPrincipale" accept="image/*" data-preview = "#preview7">
	    	  	<label for="file7">
				  <div class="PrincipalePayant" >
					 <div class="appareilPhotoIcon"> <i class="fa fa-camera" aria-hidden="true"></i></div>
	    	  			<img id="preview7">
	    	  	    </div>
	    	  	</label>
	    	  </div>
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file8Payant" id="file8" class="photoPrincipale" accept="image/*" data-preview = "#preview8">
	    	  	<label for="file8">
				  <div class="PrincipalePayant" >
					 <div class="appareilPhotoIcon"> <i class="fa fa-camera" aria-hidden="true"></i></div>
	    	  			<img id="preview8">
	    	  	    </div>
	    	  	</label>
	    	  </div>
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file9Payant" id="file9" class="photoPrincipale" accept="image/*" data-preview = "#preview9">
	    	  	<label for="file9">
				  <div class="PrincipalePayant" >
					 <div class="appareilPhotoIcon"> <i class="fa fa-camera" aria-hidden="true"></i></div>
	    	  			<img id="preview9">
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
  	</div><br>
  	<div class="quantiteMinAnnonce">
  		Quantite minimale
  		<input type="number" name="quantiteMin" placeholder="Exemple: 8" class="zoneInformation" value="<?php echo($modifierPosteInfo['minquantite']) ?>">
  	</div><br>
  	<div class="prixAnnonce">
  		Prix de la quantite minimale
  		<input type="text" name="prixAnnonce" placeholder="Le prix de la quantité minimale" class="zoneInformation" value="<?php echo($modifierPosteInfo['prixannonce']) ?>"><br>
  	</div><br>
  	<div class="quantiteMaxAnnonce">
  		Quantite maximale
  		<input type="number" name="quantiteMax" placeholder="Exemple: 9" class="zoneInformation" value="<?php echo($modifierPosteInfo['maxquantite']) ?>">
  	</div><br>
  	<div class="prixAnnonceMax">
  		Prix de la quantite maximale
  		<input type="text" name="prixAnnonceMax" placeholder="Le prix de la quantité maximale" class="zoneInformation" value="<?php echo($modifierPosteInfo['prixmax']) ?>"><br>
  	</div><br>
  	<div class="uniteMesureAnnonce">
  		Unité de mesure :
  		<select class="zoneInformation" id="modeventeProduitSelection" name="unitemesure">
  			<option>Gramme</option>
  			<option>Kilogramme</option>
  			<option>Tonne</option>
  			<option>Autre</option>
  		</select>
  		<div class="titreAnnonce" id="modeventeProduit" >
  			<span>Definissez votre mode de vente exemple: deux (02) tomates à 100f</span>
  			<input type="text" name="unitemesureDefinir" placeholder="Exemple: deux (02) tomates à 100f" class="zoneInformation"><br>
  		</div>
  	</div><br>
  	<div class="categorieAnnonce">
  		Type du produit
  	    <select class="zoneInformation" name="categorieAnnonce" value="<?php echo $modifierPosteInfo['categorie']; ?>">
  	    	<?php include 'listeproduitfiofood.php'; ?> 	    	
  	    </select>         
  	</div><br>
  	<div class="VilleAnnonce">
  		Localisation 
        <select name="VilleAnnonce" class="zoneInformation" value="<?php echo($modifierPosteInfo['localisationannonce
        ']); ?>">
        	<?php include 'listedesvilles.php'; ?>
        </select>
  	</div><br>
  	<div class="descriptionAnnonce">
  		Description de l'annonce 
  		<textarea placeholder="Description" name="descriptionAnnonce" class="zoneInformation" style="padding: 55px;padding-top:2px;padding-left: 12px;" ><?php echo $modifierPosteInfo['descriptionannonce'] ?></textarea>
  	</div>
  </div>
  <div id="contactAnnonceConteneur">
  	<div class="contactAnnonce">
		  <h2>Contact</h2>
		  <div class="numeroTelephoneIconTelephone"> 
		  <i class="fa fa-mobile" aria-hidden="true" id="IconTele"></i>
		  <input type="text" name="numeroTelephone" placeholder="Numéro téléphone" class="zoneInformation" value="<?php echo $modifierPosteInfo['numerotelephone'] ?>">
		  </div><br>
  		<div class="numeroTelephoneIconTelephone"> 
		  <i class="fa fa-whatsapp" aria-hidden="true" id="Iconwhat"></i>
		  <input type="text" name="numeroWhatsapp" placeholder="Numéro whatsApp" class="zoneInformation" value="<?php echo $modifierPosteInfo['numerowhatsapp'] ?>">
		  </div>  		
  	</div>
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

<?php  }
 else{
 	echo "<script>window.location.href='index.php';</script>";
 }

include 'footer.php';
?>