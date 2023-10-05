<div>
	<?php 
   include 'connexionBaseDonnee.php';
      $descrption = htmlspecialchars($_POST['descrption']);
     $recu = $bdd->prepare('SELECT panierclient,prixelement,quantite FROM panier WHERE id=?');  
     $recu->execute(array($descrption));	     
     $donnee = $recu->fetch();

     $collecte = false; 
     $supermarche = false;
     $trois = false;
     $panier = unserialize($donnee['panierclient']);
     $quantite = unserialize($donnee['quantite']);
     $prixelement = unserialize($donnee['prixelement']);
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
                     
                  ?>
                 </div>                  
               </div>               
            </div>
    </div>
    <div class="vendeurCommandeAdministrateur">
       <?php 
       if ((!empty($produitSelectInfo['numerotelephone']) and $produitSelectInfo['numerotelephone']!='') and (!empty($produitSelectInfo['numerowhatsapp']) and $produitSelectInfo['numerowhatsapp']!='')) {
          ?>
             <a href="tel:<?php echo($produitSelectInfo['numerotelephone']); ?>"><i class="fa fa-mobile" aria-hidden="true" id="icontelePageDemander"></i></a><br>

             <a href="https://wa.me/<?php echo ($produitSelectInfo['numerowhatsapp']);?>">
             <i class="fa fa-whatsapp" aria-hidden="true" id="iconwhatPageDemander"></i>
         </a>

       <?php }
       else{
         $compteVendeur = $bdd->prepare('SELECT * FROM fiofood WHERE id = :id_fiofood');
         $compteVendeur->bindParam(':id_fiofood',$produitSelectInfo['id_fiofood']);
         $compteVendeur->execute();
         $compteVendeurInfo = $compteVendeur->fetch();
         ?>
         <a href="tel:<?php echo($compteVendeurInfo['numero']); ?>"><i class="fa fa-mobile" aria-hidden="true" id="icontelePageDemander"></i><?php echo($compteVendeurInfo['nom']); ?></a>
      <?php }
        ?>
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
                     
                  ?>
                 </div>                  
               </div>               
            </div>
    </div>
    <div class="vendeurCommandeAdministrateur">
       <?php 
         $compteVendeur = $bdd->prepare('SELECT * FROM fiofood WHERE id = :id_fiofood');
         $compteVendeur->bindParam(':id_fiofood',$produitSelectInfo['id_fiofood']);
         $compteVendeur->execute();
         $compteVendeurInfo = $compteVendeur->fetch();
         ?>
         <a href="tel:<?php echo($compteVendeurInfo['numero']); ?>"><i class="fa fa-mobile" aria-hidden="true" id="icontelePageDemander"></i><?php echo($compteVendeurInfo['nom']); ?></a>
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
                     
                  ?>
                 </div>                  
               </div>               
            </div>
    </div>
    <div class="vendeurCommandeAdministrateur">
       <?php 
         $compteVendeur = $bdd->prepare('SELECT * FROM fiofood WHERE id = :id_fiofood');
         $compteVendeur->bindParam(':id_fiofood',$produitSelectInfo['id_fiofood']);
         $compteVendeur->execute();
         $compteVendeurInfo = $compteVendeur->fetch();
         ?>
         <a href="tel:<?php echo($compteVendeurInfo['numero']); ?>"><i class="fa fa-mobile" aria-hidden="true" id="icontelePageDemander"></i><?php echo($compteVendeurInfo['nom']); ?></a>
    </div>
   </div>
<?php    }
      }
   }
} ?>
</div>
<script type="text/javascript" src="slider/boiteDialogueContact.js"></script>