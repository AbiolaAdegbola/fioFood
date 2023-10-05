<div class="modal fade" id="panierModal" role="dialog">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <button class="close" data-dismiss="modal" type="button" arial-hidden="true" style="margin-top: 10px;">Fermer</button>
         </div>
         <div class="body">
            <div class="headerPanier">
               Panier
               <img src="icon/nameFioFood.png">
            </div>
            <div class="panier-body">
         <form method="post" action="panierValider.php">
<?php
      $_SESSION['quantiteProduitNombre'] = array();
      $_SESSION['quantiteProduitNombrecollecte'] = array();
      $_SESSION['quantiteProduitNombreSupermarche'] = array();
      $u=0;
      $i=0;
      $s=0;

if (isset($_SESSION['panier']) AND !empty($_SESSION['panier'])) { ?>
   <?php 
  foreach ($_SESSION['panier'] as $value)
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
         <?php
         $i++;
         array_push($_SESSION['quantiteProduitNombre'],$i);
         ?>
         <div class="quantiteMinMax">
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
                  </div>               
            </div>
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
                  </div>   
            </div>
         </div><br>
         <div class="quantiteProduitAugmente">
            <label>
               Quantité : 
            </label>
            <input type="number" name="quantiteNumber<?php echo($i); ?>" class="quantiteNumber" min="1" value="1">
         </div>
      </div>
      <div>
         <a href="panierSupprimerElement.php?id_element=<?php echo($produitSelectInfo['id']); ?>" class="supprimerElementPanier">
             <i class="fa fa-trash" aria-hidden="true"></i>
         </a>
      </div>
   </div>
<?php }
         }
/* CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte CODE DU paniercollecte*/
 
   if (isset($_SESSION['paniercollecte']) AND count($_SESSION['paniercollecte'])>=2) {
        
  foreach ($_SESSION['paniercollecte'] as $value)
   {
      if ($value !='collecte') {
   $id_produit = $value;

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
         <?php
         $u++;
         array_push($_SESSION['quantiteProduitNombrecollecte'],$u);
         ?>
         <div class="quantiteMinMax">
            <div class="quantiteMin">
               <div class="quantiteMinMaxPrix" style="text-decoration: line-through;">
            <?php              
               echo(strtolower($produitSelectInfo['prixpanier'])." cfa");         
             ?>                        
            </div>               
            </div>
            <div class="quantiteMax">
               <div class="quantiteMinMaxPrix">
            <?php
            echo((round($produitSelectInfo['prixpanier']*( 1 - $produitSelectInfo['prixpromo']/100)))." cfa");         
             ?>   
                  </div>   
            </div>
         </div><br>
         <div class="quantiteProduitAugmente">
            <label>
               Quantité : 
            </label>
            <input type="number" name="quantiteNumbercollecte<?php echo($u); ?>" class="quantiteNumber" min="1" value="1">
         </div>
      </div>
      <div>
         <a href="panierSupprimerElement.php?id_elementcollecte=<?php echo($produitSelectInfo['id']); ?>" class="supprimerElementPanier">
             <i class="fa fa-trash" aria-hidden="true"></i>
         </a>
      </div>
   </div>
<?php } 
   }
}


/* CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche CODE DU paniersupermarche*/
 
   if (isset($_SESSION['paniersupermarche']) AND count($_SESSION['paniersupermarche'])>=2) {
       
  foreach ($_SESSION['paniersupermarche'] as $value)
   {
      
      if ($value !='supermarche') {
   $id_produit = $value;
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
         <?php 
               if (strlen(strtolower($produitSelectInfo['nomproduit']))>=19) {
            echo(substr(mb_strtolower($produitSelectInfo['nomproduit'],'UTF-8'), 0,19).''.'...');
         }
         else{
               echo($produitSelectInfo['nomproduit']);
         }
             ?>   
      </div>
      <div class="prixProduitPanier">
         <?php
         $s++;
         array_push($_SESSION['quantiteProduitNombreSupermarche'],$s);
         ?>
         <div class="quantiteMinMax">
            <div class="quantiteMin">
               <div class="quantiteMinMaxPrix">
            <?php              
               echo(strtolower($produitSelectInfo['prixproduit'])." cfa");         
             ?>                        
            </div>               
            </div>
           <!-- <div class="quantiteMax">
               <div class="quantiteMinMaxPrix">
            <?php
           // echo(($produitSelectInfo['prixpanier']*( 1 - $produitSelectInfo['prixpromo']/100))." cfa");         
             ?>   
                  </div>   
            </div>-->
         </div><br>
         <div class="quantiteProduitAugmente">
            <label>
               Quantité : 
            </label>
            <input type="number" name="quantiteNumbersupermarche<?php echo($s); ?>" class="quantiteNumber" min="1" value="1">
         </div>
      </div>
      <div>
         <a href="panierSupprimerElement.php?id_elementsupermarche=<?php echo($produitSelectInfo['id']); ?>" class="supprimerElementPanier">
             <i class="fa fa-trash" aria-hidden="true"></i>
         </a>
      </div>
   </div>
<?php }
}
}
   if (isset($_SESSION['panier']) or isset($_SESSION['paniercollecte']) or isset($_SESSION['paniersupermarche']))
   {  
 ?>
   <label for="envoyerCommanderPanier" class="passerCommander">        
         Commander
         <input type="submit" name="envoyerCommanderPanier" id="envoyerCommanderPanier" style="display: none;">
   </label>
      </form>
<?php  }

     if (!isset($_SESSION['panier']) AND !isset($_SESSION['paniercollecte']) AND !isset($_SESSION['paniersupermarche'])
            AND empty($_SESSION['panier']) AND empty($_SESSION['paniercollecte']) AND empty($_SESSION['paniersupermarche'])) 
       { ?>
         <div class="totalPanier" style="text-align: center;">
            Votre panier est vide
         </div>
<?php }
?>        
            </div>
         </div>
      </div>
   </div>
</div>