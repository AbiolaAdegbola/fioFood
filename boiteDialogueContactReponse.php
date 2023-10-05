<?php 
   include 'connexionBaseDonnee.php';
   include 'fonctionEncrypt.php';
   $userid = $_POST['userid'];
   $recuDonne = $bdd->prepare('SELECT numeroTelephone, numeroWhatsapp,categorie,id FROM fiofoodannoceuranonyme WHERE id=:id_user');
   $recuDonne->bindParam(':id_user',$userid);
   $recuDonne->execute();

   $recuDonneInfo = $recuDonne->fetch();
?>


<div class="conteneurNumeroTwAccueil" align="center">
       <div class="conteneurNumeroTw"><br>
         <span>Contact : </span><br>
         <a href="tel:<?php echo $recuDonneInfo['numeroTelephone'];?>">
            <span><i class="fa fa-mobile" aria-hidden="true" id="icontelePageDemander"></i>
         </span><strong><?php echo $recuDonneInfo['numeroTelephone'];?></strong>
         </a>
         <a href="https://wa.me/<?php if(strlen($recuDonneInfo['numeroWhatsapp'])<=10){echo '225'.$recuDonneInfo['numeroWhatsapp'];}else{echo $recuDonneInfo['numeroWhatsapp'];} ?>/?text=Je%20suis%20intéressé%20par%20votre%20annonce%20publiée%20sur%20fioFood.%20http://localhost/fioFood/pageDemanderClient.php?id=<?php echo (simple_encrypt($recuDonneInfo['id'])); ?>">
             <span><i class="fa fa-whatsapp" aria-hidden="true" id="iconwhatPageDemander"></i>
         </span><strong><?php echo $recuDonneInfo['numeroWhatsapp'];?></strong>
         </a>
         <a href="sms:<?php echo $recuDonneInfo['numeroTelephone'];?>&body=Je%20suis%20intéressé%20par%20votre%20annonce%20publiée%20sur%20fioFood.%20http://localhost/fioFood/pageDemanderClient.php?id=<?php echo (simple_encrypt($recuDonneInfo['id'])); ?>&categorie=<?php echo (simple_encrypt($recuDonneInfo['categorie'])); ?>">
            <span><i class="fa fa-sms" aria-hidden="true" id="iconSMSPageDemander"></i></span>
         </a>
       </div>
</div>