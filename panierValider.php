<div style="display:none;">
<?php 
include 'barreDeRecherche.php';
?>
</div>
<?php 
$message ='';
$affiche = false;
if (isset($_POST['commandeValider']) AND !isset($_POST['commandeValiderCollection'])) {
	if (!empty($_POST['nomClient']) AND !empty($_POST['contactClient']) AND !empty($_POST['lieuLivraison'])) {
   $nomClient = htmlspecialchars($_POST['nomClient']);
   $contactClient = htmlspecialchars($_POST['contactClient']);
   $lieuLivraison = htmlspecialchars($_POST['lieuLivraison']);
   $prixpanier = htmlspecialchars($_POST['prixpanierTotal']);

   $quantiteSerialize = serialize($_SESSION['quantite']);
   $prixelementSerialize = serialize($_SESSION['prixelement']);

    if (isset($_SESSION['panier'])) {
       $tableSerialise = serialize($_SESSION['panier']);
    }
    if (isset($_SESSION['paniercollecte'])) {
       $tableSerialise = serialize($_SESSION['paniercollecte']);
    }
    if (isset($_SESSION['paniersupermarche'])) {
       $tableSerialise = serialize($_SESSION['paniersupermarche']);
    }
    if (isset($_SESSION['paniercollecte']) and isset($_SESSION['panier'])) {
      $tableSerialiseFusionne = array_merge($_SESSION['panier'],$_SESSION['paniercollecte']);
       $tableSerialise = serialize($tableSerialiseFusionne);
    }
    if (isset($_SESSION['panier']) and isset($_SESSION['paniersupermarche'])) {
       $tableSerialiseFusionne = array_merge($_SESSION['panier'],$_SESSION['paniersupermarche']);
       $tableSerialise = serialize($tableSerialiseFusionne);
    }
    if (isset($_SESSION['paniercollecte']) and isset($_SESSION['paniersupermarche'])) {
       $tableSerialiseFusionne = array_merge($_SESSION['paniercollecte'],$_SESSION['paniersupermarche']);
       $tableSerialise = serialize($tableSerialiseFusionne);
    }
    if (isset($_SESSION['panier']) and isset($_SESSION['paniercollecte']) and isset($_SESSION['paniersupermarche'])) {
       $tableSerialiseFusionne1 = array_merge($_SESSION['panier'],$_SESSION['paniercollecte']);
       $tableSerialiseFusionne = array_merge($tableSerialiseFusionne1,$_SESSION['paniersupermarche']);
       $tableSerialise = serialize($tableSerialiseFusionne);
    }

    unset($_SESSION['paniercollecte']);
    unset($_SESSION['panier']);
    unset($_SESSION['quantite']);
    unset($_SESSION['prixelement']);
    unset($_SESSION['paniersupermarche']);

    $inserCommande = $bdd->prepare('INSERT INTO panier(nomProduit,lieuLivraison,contactClient,prixpanier,panierClient,quantite,prixelement,dateCommande) VALUES(:nomClient,:lieuLivraison,:contactClient,:prixpanier,:panierclient,:quantite,:prixelement,NOW())');
    $inserCommande->bindParam(':nomClient',$nomClient);
    $inserCommande->bindParam(':lieuLivraison',$lieuLivraison);
    $inserCommande->bindParam(':contactClient',$contactClient);
    $inserCommande->bindParam(':prixpanier',$prixpanier);
    $inserCommande->bindParam(':panierclient',$tableSerialise);
    $inserCommande->bindParam(':prixelement',$prixelementSerialize);
    $inserCommande->bindParam(':quantite',$quantiteSerialize);
    $inserCommande->execute();
    //header('Location: http://localhost/fioFood/');
    echo "<script>window.location.href='index.php';</script>";
   }
   else
   {
      $affiche =true;
      $message = 'Veuillez reprendre l\'opération et remplissez tous les champs';
   }
}
elseif (!isset($_POST['commandeValider']) AND isset($_POST['commandeValiderCollection'])) {
   if (!empty($_POST['nompanier'])) {
   $id_vendeur = htmlspecialchars($_SESSION['id']);
   $prixpromo = htmlspecialchars($_POST['prixpromo']);
   $prixpanier = htmlspecialchars($_POST['prixpanierTotal']);
   $nompanier = htmlspecialchars($_POST['nompanier']);

   
   $quantiteSerialize = serialize($_SESSION['quantite']);
   $prixelementSerialize = serialize($_SESSION['prixelement']);

   $nom = $_FILES['file1Gratuit']['tmp_name'];
    $nomPropre1 = $_FILES['file1Gratuit']['name'];
    $destination1 = 'imagepanier/'.$nomPropre1;
    move_uploaded_file($nom, $destination1);

    if (isset($_SESSION['panier']) and !isset($_SESSION['paniercollecte'])) {
       $tableSerialise = serialize($_SESSION['panier']);
    }
    elseif (isset($_SESSION['paniercollecte']) and !isset($_SESSION['panier'])) {
       $tableSerialise = serialize($_SESSION['paniercollecte']);
    }
    elseif (isset($_SESSION['paniercollecte']) and isset($_SESSION['panier'])) {
      $tableSerialiseFusionne = array_merge($_SESSION['panier'],$_SESSION['paniercollecte']);
       $tableSerialise = serialize($tableSerialiseFusionne);
    }

    unset($_SESSION['panier']);
    unset($_SESSION['paniercollecte']);
    unset($_SESSION['quantite']);
    unset($_SESSION['prixelement']);

    $inserCommande = $bdd->prepare('INSERT INTO panier(prixpanier,panierclient,id_fiofood,prixpromo,nompanier,imagepanier,quantite,prixelement,dateCommande) VALUES(:prixpanier,:panierclient,:id_fiofood,:prixpromo,:nompanier,:imagepanier,:quantite,:prixelement,NOW())');
    $inserCommande->bindParam(':nompanier',$nompanier);
    $inserCommande->bindParam(':prixpanier',$prixpanier);
    $inserCommande->bindParam(':id_fiofood',$id_vendeur);
    $inserCommande->bindParam(':prixpromo',$prixpromo);
    $inserCommande->bindParam(':imagepanier',$nomPropre1);
    $inserCommande->bindParam(':panierclient',$tableSerialise);
    $inserCommande->bindParam(':prixelement',$prixelementSerialize);
    $inserCommande->bindParam(':quantite',$quantiteSerialize);
    $inserCommande->execute();
    //header('Location: http://localhost/fioFood/compte.php');
    echo "<script>window.location.href='compte.php';</script>";
   }
   else
   {
      $affiche =true;
      $message = 'Veuillez reprendre l\'opération et remplissez tous les champs';
   }
}

if (isset($_SESSION['panier']) || isset($_SESSION['paniercollecte']) || isset($_SESSION['paniersupermarche'])) {
      $i= array();
      $u = array();
      $s = array();
      $_SESSION['prixelement'] = array();
      $_SESSION['quantite'] = array();
      $prixTotal= 0;

      $autorise_collection = false;
      $nombre_cle = 0;

	if (isset($_SESSION['id'])) {
		$identiteClient = $bdd->prepare('SELECT nom,prenom,numero,localisationProfil,certifierfiofood FROM fiofood WHERE id=:id_client');
		$identiteClient->bindParam(':id_client',$_SESSION['id']);
		$identiteClient->execute();
		$identiteClientInfo = $identiteClient->fetch();

      //ON VERIFIE SI L'UTILISATEUR EST AUTORISE A FAIRE UNE COLLECTION PANIER SPECIALON VERIFIE SI L'UTILISATEUR EST AUTORISE A FAIRE UNE COLLECTION PANIER SPECIALON VERIFIE SI L'UTILISATEUR EST AUTORISE A FAIRE UNE COLLECTION PANIER SPECIALON VERIFIE SI L'UTILISATEUR EST AUTORISE A FAIRE UNE COLLECTION PANIER SPECIAL
      if (isset($_SESSION['panier'])) {
         foreach ($_SESSION['panier'] as $value) {
            $recCommande = $bdd->prepare('SELECT id_fiofood FROM fiofoodannoceuranonyme WHERE id=:idcommande');
            $recCommande->bindParam(':idcommande',$value);
            $recCommande->execute();
            $verification = $recCommande->fetch();
               if ($_SESSION['id'] == $verification['id_fiofood']) {
                  $autorise_collection = true;
               }
               else
               {
                  $autorise_collection = false;
                  break;
               }            
         }
      }

      //LORSQUE L UTILISA²TEUR EST CERTIFIER FIOFOOD ALORS IL NE PEUX PAS AJOUTER DES PRODUIT SPECIAL
      //LORSQUE L UTILISA²TEUR EST CERTIFIER FIOFOOD ALORS IL NE PEUX PAS AJOUTER DES PRODUIT SPECIAL
      //LORSQUE L UTILISA²TEUR EST CERTIFIER FIOFOOD ALORS IL NE PEUX PAS AJOUTER DES PRODUIT SPECIAL
      //LORSQUE L UTILISA²TEUR EST CERTIFIER FIOFOOD ALORS IL NE PEUX PAS AJOUTER DES PRODUIT SPECIAL

      if ($autorise_collection == true) {
       ?>
    <div class="headerPanier">Panier
       <img src="icon/nameFioFood.png">
    </div>
 <?php
if (isset($_POST['envoyerCommanderPanier'])) { 

if (isset($_SESSION['panier'])) {
       foreach ($_SESSION['quantiteProduitNombre'] as $val) {
         $val = htmlspecialchars($_POST['quantiteNumber'.$val]);
         array_push($i,$val);
      }
  foreach ($_SESSION['panier'] as $key=>$value)
   {
   $id_produit = $value;

   $produitSelect = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id=:id_produit');
   $produitSelect->bindParam(':id_produit',$id_produit);
   $produitSelect->execute();
   $produitSelectInfo = $produitSelect->fetch();
    
   ?>
   <div class="conteneurPanier">
      <div class="panierImage">
         <img src="image/<?php echo ($produitSelectInfo['img1']); ?>">
      </div>
      <div class="titrePanier">
         <?php echo($produitSelectInfo['titreannonce']); ?>
      </div>
      <div class="prixProduitPanier">
         <div class="quantiteMinMax">
            <?php 
            if ($i[$key] <= $produitSelectInfo['minquantite']) {
               echo($i[$key].'x');
            ?>
            <div class="quantiteMin">
               <div>
                  Min <?php echo("1 - ".$produitSelectInfo['minquantite']); ?>
               </div>
               <div class="quantiteMinMaxPrix">
            <?php 
               if (strlen(strtolower($produitSelectInfo['prixannonce']))>=8) {
            echo(substr(mb_strtolower($produitSelectInfo['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
               echo(strtolower($produitSelectInfo['prixannonce'])." cfa");
         }
             ?>  
                 <div style="margin-left: 20px;">
                  <?php 
                  echo($i[$key]*$produitSelectInfo['prixannonce']);
                  $prixTotal +=$i[$key]*$produitSelectInfo['prixannonce'];
                  array_push($_SESSION['prixelement'],$produitSelectInfo['prixannonce']);
                  ?>
                 </div>                  
               </div>               
            </div>
            <?php }else{
               echo($i[$key].'x');
               ?>
            <div class="quantiteMax">
               <div>Max > <?php echo($produitSelectInfo['maxquantite']); ?></div>
               <div class="quantiteMinMaxPrix">
            <?php 
               if (strlen(strtolower($produitSelectInfo['prixmax']))>=8) {
            echo(substr(mb_strtolower($produitSelectInfo['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
               echo(strtolower($produitSelectInfo['prixmax']." cfa"));
         }
             ?>  
             <div style="margin-left: 20px;">
               <?php 
                  echo($i[$key]*$produitSelectInfo['prixmax']);
                  $prixTotal += $i[$key]*$produitSelectInfo['prixmax'];
            array_push($_SESSION['prixelement'],$produitSelectInfo['prixmax']);
                  ?>
             </div> 
               </div>   
            </div>
            <?php }
             ?>
         </div><br>
      </div>
   </div>
<?php
   array_push($_SESSION['quantite'],$i[$key]);
    }   
 } 


 if (isset($_SESSION['paniercollecte'])) {
 
        foreach ($_SESSION['quantiteProduitNombrecollecte'] as $val) {
         $val = htmlspecialchars($_POST['quantiteNumbercollecte'.$val]);
         array_push($u,$val);
      }
  foreach ($_SESSION['paniercollecte'] as $key=>$value)
   {
      if ($value !='collecte') {
   $id_produit = $value;
   $key--;
   $produitSelect = $bdd->prepare('SELECT * FROM panier WHERE id=:id_produit');
   $produitSelect->bindParam(':id_produit',$id_produit);
   $produitSelect->execute();
   $produitSelectInfo = $produitSelect->fetch();
    
   ?>
   <div class="conteneurPanier">
      <div class="panierImage">
         <img src="imagepanier/<?php echo ($produitSelectInfo['imagepanier']); ?>">
      </div>
      <div class="titrePanier">
         <?php echo($produitSelectInfo['nompanier']); ?>
      </div>
      <div class="prixProduitPanier">
         <div class="quantiteMinMax">
            <?php 
               echo($u[$key].'x');
            ?>
            <div class="quantiteMin">
               <div class="quantiteMinMaxPrix">
            <?php echo(round($produitSelectInfo['prixpanier']*( 1 - $produitSelectInfo['prixpromo']/100))); ?> 
                 <div style="margin-left: 20px;">
                  <?php 
                  echo($u[$key]*(round($produitSelectInfo['prixpanier']*( 1 - $produitSelectInfo['prixpromo']/100))));
                  $prixTotal +=$u[$key]*(round($produitSelectInfo['prixpanier']*( 1 - $produitSelectInfo['prixpromo']/100)));
                  array_push($_SESSION['prixelement'],(round($produitSelectInfo['prixpanier']*( 1 - $produitSelectInfo['prixpromo']/100))));
                  ?>
                 </div>                  
               </div>               
            </div>
         </div><br>
      </div>
   </div>
<?php
   array_push($_SESSION['quantite'],$u[$key]);
       }
      } 
     }
 }
?>
  <div class="totalPanier">
          <?php echo('Total du panier : '.$prixTotal.' cfa'); ?>
   </div> 
   <div class="conteneurPanierValider">
   <form method="post" action="" class="conteneurFormPanierValider" enctype="multipart/form-data">
      <h4>
         Image descriptive du panier
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
         <label for="nomClient">Nom du panier : </label>
         <input type="text" name="nompanier" id="nomClient" required>
      </div>
      <div class="lieuLivraison">
         <label>Taux de réduction du panier : </label>
         <input type="number" name="prixpromo" id="tauxReduction" min="1" value="1" max="100" required>
         <span style="padding: 10px; color: white;background-color: seagreen; margin-left: 20%;">VALIDER</span><br>
         Prix promo : <span id="prixPromoAffiche" style="font-size: 22px; color: red;padding: 2px; border-radius: 10px;"></span>
      </div>
      <div style="display:none;">
         <input type="number" name="prixpanierTotal" id="prixpanierTotal" value="<?php echo($prixTotal);  ?>">
      </div>
      <div class="confirmerCommander">
         <a href="Naturel.php">Annuler</a>
         <input type="submit" name="commandeValiderCollection">
      </div>
   </form>
   </div>
    <?php }
	
   //LORSQUE L UTILISATEUR N EST PAS CERTIFIERFIOFOOD
   //LORSQUE L UTILISATEUR N EST PAS CERTIFIERFIOFOOD
   //LORSQUE L UTILISATEUR N EST PAS CERTIFIERFIOFOOD
   //LORSQUE L UTILISATEUR N EST PAS CERTIFIERFIOFOOD
	else
	{
   ?>
    <div class="headerPanier">Panier
       <img src="icon/nameFioFood.png">
    </div>
 <?php
if (isset($_POST['envoyerCommanderPanier'])) { 
if (isset($_SESSION['panier'])) {
       foreach ($_SESSION['quantiteProduitNombre'] as $val) {
         $val = htmlspecialchars($_POST['quantiteNumber'.$val]);
         array_push($i,$val);
      }
  foreach ($_SESSION['panier'] as $key=>$value)
   {
   $id_produit = $value;

   $produitSelect = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id=:id_produit');
   $produitSelect->bindParam(':id_produit',$id_produit);
   $produitSelect->execute();
   $produitSelectInfo = $produitSelect->fetch();
    
   ?>
   <div class="conteneurPanier">
      <div class="panierImage">
         <img src="image/<?php echo ($produitSelectInfo['img1']); ?>">
      </div>
      <div class="titrePanier">
         <?php echo($produitSelectInfo['titreannonce']); ?>
      </div>
      <div class="prixProduitPanier">
         <div class="quantiteMinMax">
            <?php 
            if ($i[$key] <= $produitSelectInfo['minquantite']) {
               echo($i[$key].'x');
            ?>
            <div class="quantiteMin">
               <div>
                  Min <?php echo("1 - ".$produitSelectInfo['minquantite']); ?>
               </div>
               <div class="quantiteMinMaxPrix">
            <?php 
               if (strlen(strtolower($produitSelectInfo['prixannonce']))>=8) {
            echo(substr(mb_strtolower($produitSelectInfo['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
               echo(strtolower($produitSelectInfo['prixannonce'])." cfa");
         }
             ?>  
                 <div style="margin-left: 20px;">
                  <?php 
                  echo($i[$key]*$produitSelectInfo['prixannonce']);
                  $prixTotal +=$i[$key]*$produitSelectInfo['prixannonce'];
                  array_push($_SESSION['prixelement'],$produitSelectInfo['prixannonce']);
                  ?>
                 </div>                  
               </div>               
            </div>
            <?php }else{
               echo($i[$key].'x');
               ?>
            <div class="quantiteMax">
               <div>Max > <?php echo($produitSelectInfo['maxquantite']); ?></div>
               <div class="quantiteMinMaxPrix">
            <?php 
               if (strlen(strtolower($produitSelectInfo['prixmax']))>=8) {
            echo(substr(mb_strtolower($produitSelectInfo['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
               echo(strtolower($produitSelectInfo['prixmax']." cfa"));
         }
             ?>  
             <div style="margin-left: 20px;">
               <?php 
                  echo($i[$key]*$produitSelectInfo['prixmax']);
                  $prixTotal += $i[$key]*$produitSelectInfo['prixmax'];
            array_push($_SESSION['prixelement'],$produitSelectInfo['prixmax']);
                  ?>
             </div> 
               </div>   
            </div>
            <?php }
             ?>
         </div><br>
      </div>
   </div>
<?php
   array_push($_SESSION['quantite'],$i[$key]);
    }   
 } 


 if (isset($_SESSION['paniercollecte'])) {
 
        foreach ($_SESSION['quantiteProduitNombrecollecte'] as $val) {
         $val = htmlspecialchars($_POST['quantiteNumbercollecte'.$val]);
         array_push($u,$val);
      }
  foreach ($_SESSION['paniercollecte'] as $key=>$value)
   {
      if ($value !='collecte') {
   $id_produit = $value;
   $key--;
   $produitSelect = $bdd->prepare('SELECT * FROM panier WHERE id=:id_produit');
   $produitSelect->bindParam(':id_produit',$id_produit);
   $produitSelect->execute();
   $produitSelectInfo = $produitSelect->fetch();
    
   ?>
   <div class="conteneurPanier">
      <div class="panierImage">
         <img src="imagepanier/<?php echo ($produitSelectInfo['imagepanier']); ?>">
      </div>
      <div class="titrePanier">
         <?php echo($produitSelectInfo['nompanier']); ?>
      </div>
      <div class="prixProduitPanier">
         <div class="quantiteMinMax">
            <?php 
               echo($u[$key].'x');
            ?>
            <div class="quantiteMin">
               <div class="quantiteMinMaxPrix">
            <?php echo(($produitSelectInfo['prixpanier']*( 1 - $produitSelectInfo['prixpromo']/100))); ?> 
                 <div style="margin-left: 20px;">
                  <?php 
                  echo($u[$key]*($produitSelectInfo['prixpanier']*( 1 - $produitSelectInfo['prixpromo']/100)));
                  $prixTotal +=$u[$key]*($produitSelectInfo['prixpanier']*( 1 - $produitSelectInfo['prixpromo']/100));
                  array_push($_SESSION['prixelement'],($produitSelectInfo['prixpanier']*( 1 - $produitSelectInfo['prixpromo']/100)));
                  ?>
                 </div>                  
               </div>               
            </div>
         </div><br>
      </div>
   </div>
<?php
   array_push($_SESSION['quantite'],$u[$key]);
    }}
     }

 if (isset($_SESSION['paniersupermarche'])) {
 
        foreach ($_SESSION['quantiteProduitNombreSupermarche'] as $val) {
         $val = htmlspecialchars($_POST['quantiteNumbersupermarche'.$val]);
         array_push($s,$val);
      }
  foreach ($_SESSION['paniersupermarche'] as $key=>$value)
   {
      if ($value !='supermarche') {
   $id_produit = $value;
   $key--;
   $produitSelect = $bdd->prepare('SELECT * FROM fiofoodsupermarket WHERE id=:id_produit');
   $produitSelect->bindParam(':id_produit',$id_produit);
   $produitSelect->execute();
   $produitSelectInfo = $produitSelect->fetch();
    
   ?>
   <div class="conteneurPanier">
      <div class="panierImage">
         <img src="imagesupermarche/<?php echo ($produitSelectInfo['imageproduit']); ?>">
      </div>
      <div class="titrePanier">
         <?php echo($produitSelectInfo['nomproduit']); ?>
      </div>
      <div class="prixProduitPanier">
         <div class="quantiteMinMax">
            <?php 
               echo($s[$key].'x');
            ?>
            <div class="quantiteMin">
               <div class="quantiteMinMaxPrix">
            <?php echo(($produitSelectInfo['prixproduit'])); ?> 
                 <div style="margin-left: 20px;">
                  <?php 
                  echo($s[$key]*($produitSelectInfo['prixproduit']));
                  $prixTotal +=$s[$key]*($produitSelectInfo['prixproduit']);
                  array_push($_SESSION['prixelement'],($produitSelectInfo['prixproduit']));
                  ?>
                 </div>                  
               </div>               
            </div>
         </div><br>
      </div>
   </div>
<?php
   array_push($_SESSION['quantite'],$s[$key]);
    }} 
     }
      } ?>
  <div class="totalPanier">
          <?php echo('Total du panier : '.$prixTotal.' cfa'); ?>
   </div> 
   <div class="conteneurPanierValider">
   <form method="post" action="" class="conteneurFormPanierValider">
      <div class="nomClient">
         <label for="nomClient">Nom : </label>
         <input type="text" name="nomClient" id="nomClient" value="<?php if(isset($_SESSION['id'])){echo($identiteClientInfo['nom'].' '.$identiteClientInfo['prenom']);} ?>" required>
      </div>
      <div class="contactClient">
         <label for="contactClient">Contact : </label>
         <input type="text" name="contactClient" id="contactClient" value="<?php if(isset($_SESSION['id'])){echo($identiteClientInfo['numero']);} ?>" required>
      </div>
      <div class="lieuLivraison">
         <label for="lieuLivraison">Lieu de Livraison : </label>
         <input type="text" name="lieuLivraison" id="lieuLivraison" value="<?php if(isset($_SESSION['id'])){echo($identiteClientInfo['localisationProfil']);} ?>" required>
      </div>
      <div style="display:none;">
         <input type="number" name="prixpanierTotal" value="<?php echo($prixTotal);  ?>">
      </div>
      <div class="confirmerCommander">
         <a href="Naturel.php">Annuler</a>
         <input type="submit" name="commandeValider">
      </div>
   </form>
   </div>
<?php }}
   //LORSQUE L UTILISA²TEUR N EST PAS COMPTE FIOFOOD ALORS IL NE PEUX PAS AJOUTER DES PRODUIT SPECIAL
   //LORSQUE L UTILISA²TEUR N EST PAS COMPTE FIOFOOD ALORS IL NE PEUX PAS AJOUTER DES PRODUIT SPECIAL
   //LORSQUE L UTILISA²TEUR N EST PAS COMPTE FIOFOOD ALORS IL NE PEUX PAS AJOUTER DES PRODUIT SPECIAL
   //LORSQUE L UTILISA²TEUR N EST PAS COMPTE FIOFOOD ALORS IL NE PEUX PAS AJOUTER DES PRODUIT SPECIAL
else{
   ?>
    <div class="headerPanier">Panier
       <img src="icon/nameFioFood.png">
    </div>
 <?php
if (isset($_POST['envoyerCommanderPanier'])) {    
if (isset($_SESSION['panier'])) {
       foreach ($_SESSION['quantiteProduitNombre'] as $val) {
         $val = htmlspecialchars($_POST['quantiteNumber'.$val]);
         array_push($i,$val);
      }
  foreach ($_SESSION['panier'] as $key=>$value)
   {
   $id_produit = $value;

   $produitSelect = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE id=:id_produit');
   $produitSelect->bindParam(':id_produit',$id_produit);
   $produitSelect->execute();
   $produitSelectInfo = $produitSelect->fetch();
    
   ?>
   <div class="conteneurPanier">
      <div class="panierImage">
         <img src="image/<?php echo ($produitSelectInfo['img1']); ?>">
      </div>
      <div class="titrePanier">
         <?php echo($produitSelectInfo['titreannonce']); ?>
      </div>
      <div class="prixProduitPanier">
         <div class="quantiteMinMax">
            <?php 
            if ($i[$key] <= $produitSelectInfo['minquantite']) {
               echo($i[$key].'x');
            ?>
            <div class="quantiteMin">
               <div>
                  Min <?php echo("1 - ".$produitSelectInfo['minquantite']); ?>
               </div>
               <div class="quantiteMinMaxPrix">
            <?php 
               if (strlen(strtolower($produitSelectInfo['prixannonce']))>=8) {
            echo(substr(mb_strtolower($produitSelectInfo['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
               echo(strtolower($produitSelectInfo['prixannonce'])." cfa");
         }
             ?>  
                 <div style="margin-left: 20px;">
                  <?php 
                  echo($i[$key]*$produitSelectInfo['prixannonce']);
                  $prixTotal +=$i[$key]*$produitSelectInfo['prixannonce'];
                  array_push($_SESSION['prixelement'],$produitSelectInfo['prixannonce']);
                  ?>
                 </div>                  
               </div>               
            </div>
            <?php }else{
               echo($i[$key].'x');
               ?>
            <div class="quantiteMax">
               <div>Max > <?php echo($produitSelectInfo['maxquantite']); ?></div>
               <div class="quantiteMinMaxPrix">
            <?php 
               if (strlen(strtolower($produitSelectInfo['prixmax']))>=8) {
            echo(substr(mb_strtolower($produitSelectInfo['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
               echo(strtolower($produitSelectInfo['prixmax']." cfa"));
         }
             ?>  
             <div style="margin-left: 20px;">
               <?php 
                  echo($i[$key]*$produitSelectInfo['prixmax']);
                  $prixTotal += $i[$key]*$produitSelectInfo['prixmax'];
            array_push($_SESSION['prixelement'],$produitSelectInfo['prixmax']);
                  ?>
             </div> 
               </div>   
            </div>
            <?php }
             ?>
         </div><br>
      </div>
   </div>
<?php
   array_push($_SESSION['quantite'],$i[$key]);
    }   
 } 


 if (isset($_SESSION['paniercollecte'])) {
 
        foreach ($_SESSION['quantiteProduitNombrecollecte'] as $val) {
         $val = htmlspecialchars($_POST['quantiteNumbercollecte'.$val]);
         array_push($u,$val);
      }
  foreach ($_SESSION['paniercollecte'] as $key=>$value)
   {
      if ($value !='collecte') {
   $id_produit = $value;
   $key--;
   $produitSelect = $bdd->prepare('SELECT * FROM panier WHERE id=:id_produit');
   $produitSelect->bindParam(':id_produit',$id_produit);
   $produitSelect->execute();
   $produitSelectInfo = $produitSelect->fetch();
    
   ?>
   <div class="conteneurPanier">
      <div class="panierImage">
         <img src="imagepanier/<?php echo ($produitSelectInfo['imagepanier']); ?>">
      </div>
      <div class="titrePanier">
         <?php echo($produitSelectInfo['nompanier']); ?>
      </div>
      <div class="prixProduitPanier">
         <div class="quantiteMinMax">
            <?php 
               echo($u[$key].'x');
            ?>
            <div class="quantiteMin">
               <div class="quantiteMinMaxPrix">
            <?php echo(($produitSelectInfo['prixpanier']*( 1 - $produitSelectInfo['prixpromo']/100))); ?> 
                 <div style="margin-left: 20px;">
                  <?php 
                  echo($u[$key]*($produitSelectInfo['prixpanier']*( 1 - $produitSelectInfo['prixpromo']/100)));
                  $prixTotal +=$u[$key]*($produitSelectInfo['prixpanier']*( 1 - $produitSelectInfo['prixpromo']/100));
                  array_push($_SESSION['prixelement'],($produitSelectInfo['prixpanier']*( 1 - $produitSelectInfo['prixpromo']/100)));
                  ?>
                 </div>                  
               </div>               
            </div>
         </div><br>
      </div>
   </div>
<?php
   array_push($_SESSION['quantite'],$u[$key]);
    }} 
     }

 if (isset($_SESSION['paniersupermarche'])) {
 
        foreach ($_SESSION['quantiteProduitNombreSupermarche'] as $val) {
         $val = htmlspecialchars($_POST['quantiteNumbersupermarche'.$val]);
         array_push($s,$val);
      }
  foreach ($_SESSION['paniersupermarche'] as $key=>$value)
   {
      if ($value !='supermarche') {
   $id_produit = $value;
   $key--;
   $produitSelect = $bdd->prepare('SELECT * FROM fiofoodsupermarket WHERE id=:id_produit');
   $produitSelect->bindParam(':id_produit',$id_produit);
   $produitSelect->execute();
   $produitSelectInfo = $produitSelect->fetch();
    
   ?>
   <div class="conteneurPanier">
      <div class="panierImage">
         <img src="imagesupermarche/<?php echo ($produitSelectInfo['imageproduit']); ?>">
      </div>
      <div class="titrePanier">
         <?php echo($produitSelectInfo['nomproduit']); ?>
      </div>
      <div class="prixProduitPanier">
         <div class="quantiteMinMax">
            <?php 
               echo($s[$key].'x');
            ?>
            <div class="quantiteMin">
               <div class="quantiteMinMaxPrix">
            <?php echo(($produitSelectInfo['prixproduit'])); ?> 
                 <div style="margin-left: 20px;">
                  <?php 
                  echo($s[$key]*($produitSelectInfo['prixproduit']));
                  $prixTotal +=$s[$key]*($produitSelectInfo['prixproduit']);
                  array_push($_SESSION['prixelement'],($produitSelectInfo['prixproduit']));
                  ?>
                 </div>                  
               </div>               
            </div>
         </div><br>
      </div>
   </div>
<?php
   array_push($_SESSION['quantite'],$s[$key]);
    }} 
     }
      } ?>
  <div class="totalPanier">
          <?php echo('Total du panier : '.$prixTotal.' cfa'); ?>
   </div> 
   <div class="conteneurPanierValider">
   <form method="post" action="" class="conteneurFormPanierValider">
      <div class="nomClient">
         <label for="nomClient">Nom : </label>
         <input type="text" name="nomClient" id="nomClient" value="<?php if(isset($_SESSION['id'])){echo($identiteClientInfo['nom'].' '.$identiteClientInfo['prenom']);} ?>" required>
      </div>
      <div class="contactClient">
         <label for="contactClient">Contact : </label>
         <input type="text" name="contactClient" id="contactClient" value="<?php if(isset($_SESSION['id'])){echo($identiteClientInfo['numero']);} ?>" required>
      </div>
      <div class="lieuLivraison">
         <label for="lieuLivraison">Lieu de Livraison : </label>
         <input type="text" name="lieuLivraison" id="lieuLivraison" value="<?php if(isset($_SESSION['id'])){echo($identiteClientInfo['localisationProfil']);} ?>" required>
      </div>
      <div style="display:none;">
         <input type="number" name="prixpanierTotal" value="<?php echo($prixTotal);  ?>">
      </div>
      <div class="confirmerCommander">
         <a href="Naturel.php">Annuler</a>
         <input type="submit" name="commandeValider">
      </div>
   </form>
   </div>
<?php
    }   
      }
      if ($affiche==true) {
        ?>
        <div style="width: 100%;padding: 20px;color: white;text-align: center;background-color: red;font-size: 22px;">
         <?php echo($message); ?>
      </div>
     <?php  }   ?>
      
<div style="display: none;">
<?php  
include 'footer.php';
?>
</div>
