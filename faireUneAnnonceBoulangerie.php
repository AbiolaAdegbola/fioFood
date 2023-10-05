<?php 
	include 'barreDeRecherche.php';
	 ?>
<div class="conteneurFaireUneAnnoncePrincipale">

	 <?php 
	 	if (isset($_SESSION['id'])) {
	 	
	      if (isset($_POST['publierAnnonceEnvoyer']) AND !isset($_POST['publierAnnonceEnvoyerModifier'])) {
                
	$titreAnnonce = htmlspecialchars($_POST['titreAnnonce']);
    $prixAnnonce = htmlspecialchars($_POST['prixAnnonce']);
    $categorie = htmlspecialchars($_POST['categorie']);
    $promotion = htmlspecialchars($_POST['promotion']);
    
    //VERIFIER SI L ANNONCEUR A UN COMPTE OU NON
    if (isset($_SESSION['id'])) {
    	$id_fiofood = $_SESSION['id'];
    }
    else{
    	$id_fiofood = 0;
        }

     $nom = $_FILES['file1Gratuit']['tmp_name'];
    $nomPropre1 = $_FILES['file1Gratuit']['name'];
    $destination1 = 'imagesupermarche/'.$nomPropre1;
    move_uploaded_file($nom, $destination1);


    //ENREGIUSTREMENT DES INFORMATION DANS LA BASE DE DONNEES fioFoodAnnonce
$ins = $bdd->prepare('INSERT INTO fiofoodsupermarket(id_fiofood,nomproduit,categorie,prixproduit,imageproduit,promo,datepublication) VALUES(:id_fiofood,:nomproduit,:categorie,:prixproduit,:imageproduit,:promo,NOW())');
            
            $ins->bindParam(':nomproduit',$titreAnnonce);
            $ins->bindParam(':prixproduit',$prixAnnonce);  
            $ins->bindParam(':imageproduit',$nomPropre1);  
            $ins->bindParam(':id_fiofood',$id_fiofood);
            $ins->bindParam(':categorie',$categorie);
            $ins->bindParam(':promo',$promotion);
            $ins->execute();
            echo "<script>window.location.href='compte.php';</script>";

	     }

	     //MODIFIER POSTE EXISTANT CODE SOURCE
	     elseif (isset($_POST['publierAnnonceEnvoyerModifier']) AND !isset($_POST['publierAnnonceEnvoyer'])) {

	$titreAnnonce = htmlspecialchars($_POST['titreAnnonce']);
    $prixAnnonce = htmlspecialchars($_POST['prixAnnonce']);
    $categorie = htmlspecialchars($_POST['categorie']);
    $promotion = htmlspecialchars($_POST['promotion']);
    
    //VERIFIER SI L ANNONCEUR A UN COMPTE OU NON
    if (isset($_SESSION['id_modifierPoste'])) {
    	$id_modifierPoste = $_SESSION['id_modifierPoste'];
    }
    else{}


    if (filesize($_FILES['file1Gratuit']['tmp_name'])) {
    $nom = $_FILES['file1Gratuit']['tmp_name'];
    $nomPropre1 = $_FILES['file1Gratuit']['name'];
    $destination1 = 'imagesupermarche/'.$nomPropre1;
    move_uploaded_file($nom, $destination1);
    }
    else
    {
    	$nomPropre1 = htmlspecialchars($_POST['imagemodifier']);
    }


    //ENREGIUSTREMENT DES INFORMATION DANS LA BASE DE DONNEES fioFoodAnnonce
$ins = $bdd->prepare('UPDATE fiofoodsupermarket SET nomproduit=:nomproduit,categorie=:categorie,prixproduit=:prixproduit,imageproduit=:imageproduit,promo=:promo WHERE id=:id');
            
            $ins->bindParam(':nomproduit',$titreAnnonce);
            $ins->bindParam(':prixproduit',$prixAnnonce);  
            $ins->bindParam(':imageproduit',$nomPropre1);
            $ins->bindParam(':id',$id_modifierPoste);
            $ins->bindParam(':categorie',$categorie);
            $ins->bindParam(':promo',$promotion);
            $ins->execute();
            echo "<script>window.location.href='compte.php';</script>";
	     }
	     elseif (!isset($_POST['publierAnnonceEnvoyer']) && (!isset($_GET['modifierPoste'])
	           && !isset($_GET['modifierPosteId_fioFood']))) { ?>
	                  
	 <form method="post" enctype="multipart/form-data" style="margin-top: 25px;">
<div class="annonce">
	<header>fioFood Annonce</header>
	<div id="photoPostesConteneur">
		<h2>Ajoutez des photos*</h2>
	    
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
  		<input type="text" name="titreAnnonce" placeholder="le nom complet de l'article" class="zoneInformation" required><br>
  	</div><br>
  	<div class="prixAnnonce">
  		Prix de l'article
  		<input type="text" name="prixAnnonce" placeholder="Prix de l'article" class="zoneInformation"><br>
  	</div><br>  
  	<div class="uniteMesureAnnonce">
  		type du rayon :
  		<select class="zoneInformation" name="categorie">
  			<option value="Patisérie">Patisérie</option>
  			<option value="Epicerie">Epicerie</option>
  			<option value="Boissons">Boissons</option>
  			<option value="Bio et forme">Bio et forme</option>
  			<option value="Soins et hygiène">Soins et hygiène</option>
  		</select>
  	</div><br>	
  	<div class="prixAnnonce">
  		Description de l'article
  		<textarea class="zoneInformation" name="description"></textarea>
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
	   	$_SESSION['id_modifierPoste'] = htmlspecialchars(simple_decrypt($_GET['modifierPoste']));
	   	$modifierPosteCon = $bdd->prepare('SELECT * FROM fiofoodsupermarket WHERE id_fiofood =? AND id=?');
	   	    $modifierPosteCon->execute(array(simple_decrypt($_GET['modifierPosteId_fioFood']),simple_decrypt($_GET['modifierPoste'])));
	   	    $modifierPosteInfo = $modifierPosteCon->fetch();
	   	?>
	 <form method="post" enctype="multipart/form-data" style="margin-top: 25px;">
<div class="annonce">
	<header>fioFood Annonce</header>
	<div id="photoPostesConteneur">
		<h2>Ajoutez des photos*</h2>
	    
	    <div class="ajouterPhotos">
	    	  <div class="photoPostesPrincipale">
	    	  	<input type="file" name="file1Gratuit" id="file1" class="photoPrincipale" accept="image/*" data-preview = "#preview1">
	    	  	<input type="text" name="imagemodifier" value="<?php echo($modifierPosteInfo['imageproduit']); ?>" style="display: none;">
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
  		<input type="text" name="titreAnnonce" placeholder="le nom complet de l'article" value="<?php echo($modifierPosteInfo['nomproduit']); ?>" class="zoneInformation"><br>
  	</div><br>
  	<div class="prixAnnonce">
  		Prix de l'article
  		<input type="text" name="prixAnnonce" placeholder="Prix de l'article" value="<?php echo($modifierPosteInfo['prixproduit']); ?>" class="zoneInformation"><br>
  	</div><br>
  	<div class="uniteMesureAnnonce">
  		type du rayon :
  		<select class="zoneInformation" name="categorie" value="<?php echo($modifierPosteInfo['categorie']); ?>">
  			<option value="Patisérie">Patisérie</option>
  			<option value="Epicerie">Epicerie</option>
  			<option value="Boissons">Boissons</option>
  			<option value="Bio et forme">Bio et forme</option>
  			<option value="Soins et hygiène">Soins et hygiène</option>
  		</select>
  	</div><br>  	
  	<div class="prixAnnonce">
  		Description de l'article
  		<textarea class="zoneInformation" name="description"></textarea>
  	</div><br>
  </div>
  <input type="submit" style="visibility: hidden;" id="publierAnnonceEnvoyer" name="publierAnnonceEnvoyerModifier">
  	<label for="publierAnnonceEnvoyer"id="publierAnnonce" style="cursor: pointer;">
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