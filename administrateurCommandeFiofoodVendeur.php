<div>
   <?php
   include 'barreDeRecherche.php';
   
   if (isset($_SESSION['id'])) {   
?>
</div>
<center>
            <div class="headerPanier" style="padding-top: 20px;">
               Panier
               <img src="icon/nameFioFood.png">
            </div>
   <table width="100%" border="1">
      <tr>
         <td>N°</td>
         <td width="30%">
            NOM Prenom
         </td>
         <td width="20%">Contact</td>
         <td width="25%">Lieu de Livraison</td>
         <td width="15%">Panier</td>
         <td width="25%">date</td>
         <td width="25%">Supp</td>
      </tr>
         <?php 
      $administrateurCommande = $bdd->query('SELECT * FROM panier ORDER BY dateCommande desc');
      $administrateurCommande->execute();
      $i = 1;
      while ($administrateurCommandeInfo = $administrateurCommande->fetch()) {
            if (empty($administrateurCommandeInfo['prixpromo'])) 
            { 

     $panier = unserialize($administrateurCommandeInfo['panierclient']);
               foreach ($panier as $value) {
                  if ($value =='supermarche') {
                     $administrateurCommandeSupermarche = $bdd->prepare('SELECT panierclient FROM panier WHERE id=:id');
                     $administrateurCommandeSupermarche->bindParam(':id',$administrateurCommandeInfo['id']);
                     $administrateurCommandeSupermarche->execute();

                     $administrateurCommandeSupermarcheInfo = $administrateurCommandeSupermarche->fetch();

                      $panier = unserialize($administrateurCommandeSupermarcheInfo['panierclient']);
                      $u = 0;
                      foreach ($panier as $valu) {
                         
                              $recCommande = $bdd->prepare('SELECT id_fiofood FROM fiofoodsupermarket WHERE id=:idcommande');
                              $recCommande->bindParam(':idcommande',$valu);
                              $recCommande->execute();
                              $produitSelectInfo = $recCommande->fetch();
                        
                     if ($_SESSION['id'] == $produitSelectInfo['id_fiofood'] and $u==0) {
                     $u=1;
            ?>
        <tr>
         <td><?php echo($i."-"); ?></td>        
        <td>
         <?php echo($administrateurCommandeInfo['nomProduit']); ?>
        </td>
        <td>
         <a href="tel:<?php echo($administrateurCommandeInfo['contactClient']); ?>"><?php echo($administrateurCommandeInfo['contactClient']); ?></a>
        </td>
        <td>
         <?php echo($administrateurCommandeInfo['lieuLivraison']); ?>
        </td>
        <td class="panierClientAdministrateur panierDetailClientSupermarche" data-id="<?php echo ($administrateurCommandeInfo['id']); ?>" style="color: blue;cursor: pointer;">
            Voir panier
        </td>
        <td>
         <?php echo($administrateurCommandeInfo['dateCommande']); ?>
        </td>
        <td>
           <a href="panierAdministrateurSupprimerCommande.php?id_element=<?php echo($administrateurCommandeInfo['id']); ?>" class="supprimerCommandePanier" onclick="return confirm('Supprimer');">
             <i class="fa fa-trash" aria-hidden="true"></i>
         </a>
        </td>
     <?php
      $i++;
      }?>
      </tr>
   <?php  
                      
                    }
                  }
               }
            }
         }
  
      ?>
   </table>
</center>
<div style="padding-top:40px">
<?php 
   }
include 'footer.php';
?>
</div>
