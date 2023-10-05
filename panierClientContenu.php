<?php 
    include 'connexionBaseDonnee.php';
    include 'barreDeRecherche.php';
 ?>
<div class="conteneurGeneralPanierClientPage">
<?php 
   
     $unefois = true;
       $compte = $bdd->prepare('SELECT * FROM panier WHERE nomProduit=:nomProduit AND contactClient=:contactClient AND livrer=""');
      $compte->bindParam(':nomProduit',$_SESSION['nomUtilisateur']);
      $compte->bindParam(':contactClient',$_SESSION['nmtelephone']);
      $compte->execute();
     while ($mesCommandeInfo = $compte->fetch()) {
           if ($unefois == true) {
             ?>
              <div style="margin-top: 40px; text-align:center; font-size: 32px; color:seagreen;">
                Vos commandes fioFood
              </div>
              <header style="font-size: 16px; font-style: italic; margin-left: 20px; font-weight: bold;"> Votre identifiant : </header>
              <div class="mesAchatsInfoCompte">
                  <div style="margin-left: 90px; margin-right: 40px;">
                    <?php echo($mesCommandeInfo['nomProduit']); ?>
                  </div>
                  <div class="numeroMesCommandeCompte">
                    <?php echo($mesCommandeInfo['contactClient']); ?>
                  </div>
                </div>
             <?php 
             $unefois = false;
           }
     ?>

    <div class="conteneurMesAchats">
      <div class="descriptionDesCommande" style="border-top: 1px solid black;">
<div style="position:relative; margin-top: 90px;">
   <div class="livreurCommande" style="position: absolute; right: 30px; top: -90px;">
      <header style="font-weight: bold; font-style: italic;">Information du livreur: </header>

      <div class="profilLivreur">
            <?php 
               if (!empty($mesCommandeInfo['idlivreurcommande']) && strlen($mesCommandeInfo['idlivreurcommande'])>1) {
                  $comptelivreur = $bdd->prepare('SELECT photo,numero,nom FROM fiofood WHERE id =:id');
                  $comptelivreur->bindParam(':id', $mesCommandeInfo['idlivreurcommande']);
                  $comptelivreur->execute();
                  $comptelivreurInfo = $comptelivreur->fetch();
                  ?>
                     <img src="photoProfilCouverture/<?php echo($comptelivreurInfo['photo']); ?>">
                     <div class="nomlivreurDucolis">
                        <span style="font-size:14px;font-weight: bold;">Nom : </span>
                        <?php echo($comptelivreurInfo['nom']); ?>
                     </div>
                     <div class="contactLivreurColis">
                        <span style="font-size:14px;font-weight: bold;">Tel : </span>
                        <a href="tel:<?php echo($comptelivreurInfo['numero']); ?>"><?php echo($comptelivreurInfo['nom']); ?></a>
                     </div>
               <?php }
               else
               {
                 ?>
                     <div class="pasdelivreur">En cours de traitement........</div>
               <?php }               
            ?>
            
      </div>
 </div>

 <div class="numerocolispanierclient" style="font-size:22px; font-weight:bold;">
   <span style="font-size: 14px; font-weight:normal;">N° colis :</span>
      <?php 
         $numerocommande = str_replace(' ', '', $mesCommandeInfo['dateCommande']);
         $numerocommande = str_replace(':', '', $numerocommande);
         $numerocommande = str_replace('-', '', $numerocommande);
         echo(' fioFood'.$numerocommande); 
      ?> 
</div>
   <?php 
$prixTotal = 0;
     $collecte = false; 
     $supermarche = false;
     $trois = false;

   $panier = unserialize($mesCommandeInfo['panierclient']);
   $quantite = unserialize($mesCommandeInfo['quantite']);
   $prixelement = unserialize($mesCommandeInfo['prixelement']);

      foreach ($panier as $key => $value) {

         if (($value !='collecte') and ($collecte == false) and
             ($value !='supermarche') and ($supermarche == false)) {
         $recCommande = $bdd->prepare('SELECT img1,titreannonce,numerotelephone,numerowhatsapp,id_fiofood FROM fiofoodannoceuranonyme WHERE id=:idcommande');
         $recCommande->bindParam(':idcommande',$value);
         $recCommande->execute();
         while ($produitSelectInfo = $recCommande->fetch()) {
            ?>
            <div class="conteneurPanier">
      <div class="panierImage">
         <img src="image/<?php echo ($produitSelectInfo['img1']); ?>">
      </div>
      <div class="titrePanier">
         <?php echo($produitSelectInfo['titreannonce']); ?>
      </div>
      <div class="prixProduitPanier">
            <div class="quantiteMin">
               <div class="quantiteMinMaxPrix">
            <?php 
               echo($prixelement[$key]);
            ?>
                 <div style="margin-left: 20px;">
                  <?php 

               echo($quantite[$key]."x".$prixelement[$key]." => ".$quantite[$key]*$prixelement[$key]);
               $prixTotal += $quantite[$key]*$prixelement[$key];
                     
                  ?>
                 </div>                  
               </div>               
            </div>
    </div>
   </div>
<?php }
         }

         
      elseif(($value !='supermarche') and ($supermarche == false))
         {
            $collecte =true;
            if ($value == 'collecte') {
               ?>
            <div align="center" style="color: darkred; font-size: 18px;">panier promo</div>
         <?php }
            else
            {
         $recCommande = $bdd->prepare('SELECT imagepanier,nompanier,id_fiofood FROM panier WHERE id=:idcommande');
         $recCommande->bindParam(':idcommande',$value);
         $recCommande->execute();
         while ($produitSelectInfo = $recCommande->fetch()) {
            $key--;
            ?>
            <div class="conteneurPanier">
      <div class="panierImage collectioDetailPanier" data-id="<?php echo ($value); ?>" type="button">
         <img src="imagepanier/<?php echo ($produitSelectInfo['imagepanier']); ?>">
      </div>
      <div class="titrePanier">
         <?php echo($produitSelectInfo['nompanier']); ?>
      </div>
      <div class="prixProduitPanier">
            <div class="quantiteMin">
               <div class="quantiteMinMaxPrix">
            <?php 
               echo($prixelement[$key]);
            ?>
                 <div style="margin-left: 20px;">
                  <?php 

               echo($quantite[$key]."x".$prixelement[$key]." => ".$quantite[$key]*$prixelement[$key]);
               $prixTotal += $quantite[$key]*$prixelement[$key];
                     
                  ?>
                 </div>                  
               </div>               
            </div>
    </div>
   </div>
<?php    }
      }
   }

         else
         {
            $supermarche =true;
            if ($value == 'supermarche') {
               ?>
            <div align="center" style="color: darkred; font-size: 18px;">panier supermarché</div>
         <?php }
            else
            {
         $recCommande = $bdd->prepare('SELECT imageproduit,nomproduit,id_fiofood FROM fiofoodsupermarket WHERE id=:idcommande');
         $recCommande->bindParam(':idcommande',$value);
         $recCommande->execute();
         while ($produitSelectInfo = $recCommande->fetch()) {
            if ($collecte==true) {
              $key-=2;
            }
            else{
               $key--;
            }
            ?>
            <div class="conteneurPanier">
      <div class="panierImage">
         <img src="imagesupermarche/<?php echo ($produitSelectInfo['imageproduit']); ?>">
      </div>
      <div class="titrePanier">
         <?php echo($produitSelectInfo['nomproduit']); ?>
      </div>
      <div class="prixProduitPanier">
            <div class="quantiteMin">
               <div class="quantiteMinMaxPrix">
            <?php 
               echo($prixelement[$key]);
            ?>
                 <div style="margin-left: 20px;">
                  <?php 

               echo($quantite[$key]."x".$prixelement[$key]." => ".$quantite[$key]*$prixelement[$key]);
               $prixTotal += $quantite[$key]*$prixelement[$key];
                     
                  ?>
                 </div>                  
               </div>               
            </div>
    </div>
   </div>
<?php    }
      }
   }
} ?>
<div style="color:red; font-size:32px; margin-bottom: 20px;" align="center">
   <?php echo("Total panier ".$prixTotal." cfa"); ?>
</div>
</div>       
      </div>
    </div>
   <?php }
?>
</div>
<?php include 'footer.php'; ?>