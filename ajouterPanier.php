<?php 
session_start();
 
 include 'connexionBaseDonnee.php';
if (isset($_POST['userid'])) {
   $userid = htmlspecialchars($_POST['userid']);
   $id_produitExiste = true;
   $nombreExiste = false;
    
   if (isset($_SESSION['panier'])) 
   {
   foreach ($_SESSION['panier'] as $value) 
   {
     $nombreExistePas = false;

        while ($id_produitExiste == true and $nombreExiste == false and $nombreExistePas == false) 
             {
              if (in_array($userid, $_SESSION['panier']))
               {
                //POUR POUVOIR QUITTER LA BOUCLE
                   $id_produitExiste = false;
                   $nombreExiste = true;
               }
               elseif(!in_array($userid, $_SESSION['panier']))
               {
                //POUR POUVOIR QUITTER LA BOUCLE
                   $nombreExistePas = true;
               }
             }           
   } 
         
   }
   elseif(!isset($_SESSION['panier']))
   {
    $_SESSION['panier'] = array();
   }
 
   //LORSQUE L ARTICLES N A PAS ENCORE ETE SELECTIONNE PAR LE CLIENT ALORS ON L AJOUTE AU PANIER
   if ($id_produitExiste == true) 
   {
       array_push($_SESSION['panier'],$userid);
     ?>
     <script type="text/javascript">
         confirm('a été ajouter avec succes');
     </script>
   <?php }
   //LORSQUE L ARTICLES EXISTE DEJA DANS LE PANIER
   elseif($id_produitExiste == false)
   {
    ?>
    <script type="text/javascript">
        alert('Existe déjà');
    </script>
  <?php }
}

//panier la collection paniercollecte
if (isset($_POST['usercollecte'])) {
   $usercollecte = htmlspecialchars($_POST['usercollecte']);

   $id_produitExiste = true;
   $nombreExiste = false;
    
   if (isset($_SESSION['paniercollecte'])) 
   {
   foreach ($_SESSION['paniercollecte'] as $value) 
   {
     $nombreExistePas = false;

        while ($id_produitExiste == true and $nombreExiste == false and $nombreExistePas == false) 
             {
              if (in_array($usercollecte, $_SESSION['paniercollecte']))
               {
                //POUR POUVOIR QUITTER LA BOUCLE
                   $id_produitExiste = false;
                   $nombreExiste = true;
               }
               elseif(!in_array($usercollecte, $_SESSION['paniercollecte']))
               {
                //POUR POUVOIR QUITTER LA BOUCLE
                   $nombreExistePas = true;
               }
             }           
   } 
         
   }
   elseif(!isset($_SESSION['paniercollecte']))
   {
      $us = 'collecte';
    $_SESSION['paniercollecte'] = array();
    array_push($_SESSION['paniercollecte'],$us);
   }
 
   //LORSQUE L ARTICLES N A PAS ENCORE ETE SELECTIONNE PAR LE CLIENT ALORS ON L AJOUTE AU PANIER
   if ($id_produitExiste == true) 
   {
       array_push($_SESSION['paniercollecte'],$usercollecte);
     ?>
     <script type="text/javascript">
         alert('a été ajouter avec succes');
     </script>
   <?php }
   //LORSQUE L ARTICLES EXISTE DEJA DANS LE PANIER
   elseif($id_produitExiste == false)
   {
    ?>
    <script type="text/javascript">
        alert('Existe déjà');
    </script>
  <?php }
}


//panier supermarché
if (isset($_POST['usersupermarche'])) {
   $usersupermarche = htmlspecialchars($_POST['usersupermarche']);

   $id_produitExiste = true;
   $nombreExiste = false;
    
   if (isset($_SESSION['paniersupermarche'])) 
   {
   foreach ($_SESSION['paniersupermarche'] as $value) 
   {
     $nombreExistePas = false;

        while ($id_produitExiste == true and $nombreExiste == false and $nombreExistePas == false) 
             {
              if (in_array($usersupermarche, $_SESSION['paniersupermarche']))
               {
                //POUR POUVOIR QUITTER LA BOUCLE
                   $id_produitExiste = false;
                   $nombreExiste = true;
               }
               elseif(!in_array($usersupermarche, $_SESSION['paniersupermarche']))
               {
                //POUR POUVOIR QUITTER LA BOUCLE
                   $nombreExistePas = true;
               }
             }           
   } 
         
   }
   elseif(!isset($_SESSION['paniersupermarche']))
   {
      $su = 'supermarche';
      $_SESSION['paniersupermarche'] = array();
    array_push($_SESSION['paniersupermarche'],$su);
   }
 
   //LORSQUE L ARTICLES N A PAS ENCORE ETE SELECTIONNE PAR LE CLIENT ALORS ON L AJOUTE AU PANIER
   if ($id_produitExiste == true) 
   {
       array_push($_SESSION['paniersupermarche'],$usersupermarche);
     ?>
     <script type="text/javascript">
         alert('a été ajouter avec succes');
     </script>
   <?php }
   //LORSQUE L ARTICLES EXISTE DEJA DANS LE PANIER
   elseif($id_produitExiste == false)
   {
    ?>
    <script type="text/javascript">
        alert('Existe déjà');
    </script>
  <?php }
}
?>


<!-- CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER CODE DU PANIER -->
 <form method="post" action="panierValider.php">
 <?php
 $_SESSION['quantiteProduitNombre'] = array();
 $_SESSION['quantiteProduitNombrecollecte'] = array();
 $_SESSION['quantiteProduitNombreSupermarche'] = array();
 $i=0;
 $u=0;
 $s=0;
if (isset($_SESSION['panier']) AND !empty($_SESSION['panier'])) {
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
            echo(substr(mb_strtolower($produitSelectInfo['nomproduit'],'UTF-8'), 0,19).'...');
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
<?php    }
      } 
   }
   if (isset($_SESSION['panier']) or isset($_SESSION['paniercollecte']) or isset($_SESSION['paniersupermarche'])) {   
 ?>
   <label for="envoyerCommanderPanier" class="passerCommander">        
         Commander
         <input type="submit" name="envoyerCommanderPanier" id="envoyerCommanderPanier" style="display: none;">
   </label>
      </form>
<?php }


     if (!isset($_SESSION['panier']) AND !isset($_SESSION['paniercollecte']) AND !isset($_SESSION['paniersupermarche'])
            AND empty($_SESSION['panier']) AND empty($_SESSION['paniercollecte']) AND empty($_SESSION['paniersupermarche']))
       { ?>
         <div class="totalPanier" style="text-align: center;">
            Votre panier est vide
         </div>
<?php }
?>   

<script type="text/javascript">
   //page supprimer un element du panier code javascript panierSupprimerElement.php
(function($){

    $('.supprimerElementPanier').on('click',function (e) {
        e.preventDefault();

        var $a = $(this);
        var url = $a.attr('href');

        $.ajax(url,{
            type: 'GET',
            success: function () {
                $a.parents('.conteneurPanier').fadeOut();
            }
        })
    });
})(jQuery);
</script>    
