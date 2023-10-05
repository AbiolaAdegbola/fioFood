<div style="display:none;">
<?php 
include 'barreDeRecherche.php';
?>
</div>
<?php 
if (isset($_SESSION['id'])) {
if (isset($_POST['commandeValiderCollection'])) {
   
   $id_recette = htmlspecialchars($_SESSION['id']);
   $nomrecette = htmlspecialchars($_POST['nompanier']);
   $paysrecette = htmlspecialchars($_POST['paysrecette']);
   $tempspreparat = htmlspecialchars($_POST['tempspreparat']);
   $tempscuisson = htmlspecialchars($_POST['tempscuisson']);
   $nombrepersonne = htmlspecialchars($_POST['nombrepersonne']);

   $nom = $_FILES['file1Gratuit']['tmp_name'];
    $nomPropre1 = $_FILES['file1Gratuit']['name'];
    $destination1 = 'recettesfiofood/'.$nomPropre1;
    move_uploaded_file($nom, $destination1);

   if (isset($_SESSION['ingredient'])) {
      $ingredients = serialize($_SESSION['ingredient']);
   }
   if (isset($_SESSION['preparation'])) {
   $preparation = serialize($_SESSION['preparation']);
   }

    $inserCommande = $bdd->prepare('INSERT INTO recette(id_recette,nomrecette,ingredients,preparation,imagerecette,paysrecette,tempsprepa,tempscuisson,nombrepersonne,date_recette) VALUES(:id_recette,:nomrecette,:ingredients,:preparation,:imagerecette,:paysrecette,:tempsprepa,:tempscuisson,:nombrepersonne,NOW())');
    $inserCommande->bindParam(':nomrecette',$nomrecette);
    $inserCommande->bindParam(':paysrecette',$paysrecette);
    $inserCommande->bindParam(':id_recette',$id_recette);
    $inserCommande->bindParam(':preparation',$preparation);
    $inserCommande->bindParam(':tempsprepa',$tempspreparat);
    $inserCommande->bindParam(':tempscuisson',$tempscuisson);
    $inserCommande->bindParam(':nombrepersonne',$nombrepersonne);
    $inserCommande->bindParam(':imagerecette',$nomPropre1);
    $inserCommande->bindParam(':ingredients',$ingredients);
    $inserCommande->execute();

   if (isset($_SESSION['ingredient'])) {
      unset($_SESSION['ingredient']);
   }
   if (isset($_SESSION['preparation'])) {
   unset($_SESSION['preparation']);
   }
    //header('Location: http://localhost/fioFood/compte.php');
    echo "<script>window.location.href='compte.php';</script>";
}
?>
    <div class="headerPanier">Recettes
       <img src="icon/nameFioFood.png">
    </div>
   <div class="conteneurPanierValider">
   <form method="post" action="" class="conteneurFormPanierValider" enctype="multipart/form-data">
      <h4>
         Image descriptive de la recettes
      </h4>
      <div class="ajouterPhotos">
           <div class="photoPostesPrincipale">
            <input type="file" name="file1Gratuit" id="file1" class="photoPrincipale" accept="image/*" data-preview = "#preview1">
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
      <div class="nomClient">
         <label for="nomClient">Nom de la recette : </label>
         <input type="text" name="nompanier" id="nomClient">
      </div>
      <div class="nomClient">
      <label for="tempspreparat">Temps de preparation : </label>
      <input type="text" name="tempspreparat" id="tempspreparat">         
      </div>
      <div class="nomClient">
      <label for="tempscuisson">Temps de cuisson : </label>
      <input type="text" name="tempscuisson" id="tempscuisson">         
      </div>
      <div class="nomClient">
      <label for="nombrepersonne">Nombre de personnes : </label>
      <input type="text" name="nombrepersonne" id="nombrepersonne">         
      </div>
         <div class="lieuLivraison">
            <label for="paysrecette">Pays : </label>
         <select name="paysrecette" id="paysrecette" class="paysrecetteSelect">
               <?php include 'listedespaysvilles.php'; ?>            
         </select>
         </div>
      <div class="ingredient lieuLivraison">
         <label>Ingrédient : </label>
            <input type="text" name="ingredientinput" class="ingredientinput" id="ingredientinput">
            <span id="ingredientinputvalider" style="cursor: pointer;">Valider l'ingredient</span>        
      </div><br>
      <div style="margin-left: 20px;margin-top: 20px;">
         Liste des Ingrédients :
      </div>
      <div class="listeIngredient">
         <ul>
            <?php 
            if (isset($_SESSION['ingredient'])) {
            foreach ($_SESSION['ingredient'] as $value) {
              ?>            
            <li>
               <span><?php echo($value); ?></span>
               <a href="panierSupprimerElement.php?id_ingredientsupp=<?php echo($value); ?>" class="supprimerIngredientPreparation" style="margin-left: 40px;"><i class="fa fa-trash" aria-hidden="true" style="font-size: 15px; color: red;"></i></a>
            </li>
            <?php }} ?>
         </ul>
      </div>
      <div class="preparation lieuLivraison">
         <label>Préparation : </label>
         <input type="text" name="preparation" class="preparationinput" placeholder="Décrire la méthode de préparation de la recette...">
         <span id="preparationinputvalider" style="cursor: pointer;">Valider l'étape</span> 
      </div>
      <div style="margin-left: 20px;margin-top: 20px;">
         Les Etapes de la préparation :
      </div>
      <div class="etapepreparation">
         <ol>
            <?php 
            if(isset($_SESSION['preparation'])){
            foreach ($_SESSION['preparation'] as $value) {
              ?>            
            <li>
               <span><?php echo($value); ?></span>
               <a href="panierSupprimerElement.php?id_preparation=<?php echo($value); ?>" class="supprimerIngredientPreparation" style="margin-left: 50px;"><i class="fa fa-trash" aria-hidden="true" style="font-size: 15px; color: red;"></i></a>
            </li>
            <?php }} ?>
         </ol>
      </div>
      <div class="confirmerCommander">
         <a href="compte.php">Annuler</a>
         <input type="submit" name="commandeValiderCollection">
      </div>
   </form>
   </div>

<?php  
 }
else{
echo "<script>window.location.href='index.php';</script>";
}
include 'footer.php';
?>
