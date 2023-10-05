<?php
      session_start();
      include 'connexionBaseDonnee.php'; 
?>

<div>
	<?php 
   $prixTotal =0;
         $descrption = htmlspecialchars($_POST['descrption']);
	     $recu = $bdd->prepare('SELECT panierclient,prixelement,quantite FROM panier WHERE id=?');  
	     $recu->execute(array($descrption));	     
	     $donnee = $recu->fetch();

        $deux = false;
     $panier = unserialize($donnee['panierclient']);
     $quantite = unserialize($donnee['quantite']);
     $prixelement = unserialize($donnee['prixelement']);
     	foreach ($panier as $key => $value) {
               
               if ($value=='collecte') {
              $deux = true;
            }
            else{
            }

            if ($value == 'supermarche')  
               {
                }
            else{
         $recCommande = $bdd->prepare('SELECT imageproduit,nomproduit,id_fiofood FROM fiofoodsupermarket WHERE id=:idcommande');
         $recCommande->bindParam(':idcommande',$value);
         $recCommande->execute();
         while ($produitSelectInfo = $recCommande->fetch()) {
            if ($deux==true) {
              $key-=2;
            }
            else{
               $key--;
            }
            if ($_SESSION['id'] == $produitSelectInfo['id_fiofood']) {
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
               <?php 
            }
            
         }
      }
   }
?>
<div style="color:red;" align="center">
   <?php echo("Total panier ".$prixTotal." cfa"); ?>
</div>
</div>
<script type="text/javascript" src="slider/boiteDialogueContact.js"></script>