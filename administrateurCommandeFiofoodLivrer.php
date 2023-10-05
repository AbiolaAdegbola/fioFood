<?php 
include 'connexionBaseDonnee.php';
?>
<table width="100%" border="1">
      <tr>
         <td style="font-weight: bold;">N°</td>
         <td width="30%" style="font-weight: bold;">
            NOM Prenom
         </td>
         <td width="18%" style="font-weight: bold;">Contact</td>
         <td width="35%" style="font-weight: bold;">Lieu de Livraison</td>
         <td width="10%" style="font-weight: bold;">Panier</td>
         <td width="28%" style="font-weight: bold;">prix</td>
         <td width="10%" style="font-weight: bold;">date</td>
         <td style="font-weight: bold;">Livrer</td>
      </tr>

<?php 
      $administrateurCommande = $bdd->query('SELECT * FROM panier ORDER BY dateCommande desc');
      $administrateurCommande->execute();
      $i = 1;
      $jour ='2023-01-22';
      while ($administrateurCommandeInfo = $administrateurCommande->fetch()) {
         if (empty($administrateurCommandeInfo['prixpromo']) and $administrateurCommandeInfo['livrer'] ==1) {            
         ?>
         <tr class="conteneurProduitPanier">
         <td align="center"><?php echo($i); ?></td>        
        <td align="center">
         <?php if (strlen($administrateurCommandeInfo['nomProduit'])>=24) {
            echo(substr($administrateurCommandeInfo['nomProduit'], 0,24).'...');
         } 
         else
         {
            echo($administrateurCommandeInfo['nomProduit']);
         }
         ?>
        </td>
        <td align="center">
         <div class="conteneurNumeroTw"><br>
         <a href="tel:<?php echo $administrateurCommandeInfo['contactClient'];?>">
            <span><i class="fa fa-mobile" aria-hidden="true" id="icontelePageDemander" style="font-size: 20px;margin-left: 2px;padding-left: 2px;"></i>
         </span>
         </a>
         <a href="https://wa.me/<?php if(strlen($administrateurCommandeInfo['contactClient'])<=10){echo '255'.$administrateurCommandeInfo['contactClient'];}else{echo $administrateurCommandeInfo['contactClient'];} ?>/?text=">
             <span><i class="fa fa-whatsapp" aria-hidden="true" id="iconwhatPageDemander" style="font-size: 20px;margin-left: 2px;padding-left: 2px;"></i>
         </span>
         </a>
         <a href="sms:<?php echo $administrateurCommandeInfo['contactClient'];?>;&body=">
            <span><i class="fa fa-sms" aria-hidden="true" id="iconSMSPageDemander" style="font-size: 20px;margin-left: 2px;padding-left: 2px;"></i></span>
         </a>
       </div>
        </td>
        <td align="center">
         <?php echo($administrateurCommandeInfo['lieuLivraison']); ?>
        </td>
        <td class="panierClientAdministrateur panierDetailClient" align="center" data-id="<?php echo ($administrateurCommandeInfo['id']); ?>" style="color: blue;cursor: pointer;">
            Panier
        </td>
        <td style="color: red;" align="center">
         <?php echo($administrateurCommandeInfo['prixpanier']." cfa"); ?>           
        </td>
        <td align="center">
         <?php 
         $heure = explode(' ', $administrateurCommandeInfo['dateCommande']);

         if ($heure[0] !=$jour) {
            $jour = $heure[0];
            echo($heure[0].'<br>');
         }
         echo($heure[1]); ?>
        </td>
        <td align="center">
           <!-- <a href="panierAdministrateurSupprimerCommande.php?id_element=<?php echo($administrateurCommandeInfo['id']); ?>" class="supprimerCommandePanier" onclick="return confirm('Supprimer');">
             <i class="fa fa-trash" aria-hidden="true"></i>
         </a> -->
            <input type="checkbox" data-id='<?php echo($administrateurCommandeInfo['id']); ?>' class="checkedLivrer">        
        </td>
     </tr>
     <?php
      $i++;
      }?>
   <?php }
      ?>

   </table>

   <script type="text/javascript">

//produit livrer produit livrer produit livrer produit livrer produit livrer produit livrer
$(document).ready(function() {
    $('.checkedLivrer').click(function() {
     var useridLivrer = $(this).data('id');
     var $td = $(this);
        $.ajax({
            url: 'administrateurGestionUserTraite.php',
            type: 'post',
            data: {useridLivrer: useridLivrer},
            success: function(){
            // $('.conteneurProduitPanier').fadeOut(); 
            $td.parents('.conteneurProduitPanier').fadeOut();

            }
        });
});
});
   </script>