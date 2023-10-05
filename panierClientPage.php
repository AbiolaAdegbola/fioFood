<?php 
    include 'connexionBaseDonnee.php';
    include 'barreDeRecherche.php';

    if (isset($_SESSION['nmtelephone']) and isset($_SESSION['nomUtilisateur'])) {
      echo "<script>window.location.href='panierClientContenu.php';</script>";
    }else{
      ?>
      <div class="conteneurGeneralPanierClientPage">
 <?php 
     $messageInfo = '';
     if (isset($_POST['connexionUtilisateur'])) {
        if (!empty($_POST['nomUtilisateur'])&& !empty($_POST['nmtelephone'])) {
         
       $nomUtilisateur = htmlspecialchars(rtrim($_POST['nomUtilisateur']));
       $nmtelephone = htmlspecialchars(rtrim($_POST['nmtelephone']));
       
       $compteComparaison = $bdd->prepare('SELECT * FROM panier');
       $compteComparaison->execute();
       while ($compteComparaisonInfo = $compteComparaison->fetch()) {
         if (rtrim($compteComparaisonInfo['nomProduit']) == $nomUtilisateur) {
           if (rtrim($compteComparaisonInfo['contactClient']) == $nmtelephone) {
              $_SESSION['nmtelephone'] = $nmtelephone;
              $_SESSION['nomUtilisateur'] = $nomUtilisateur;
              echo "<script>window.location.href='panierClientContenu.php';</script>";
           }
           else
           {
            $messageInfo = 'Numéro de téléphone n\'existe pas';
           }
         }
         else{
          $messageInfo = 'Nom du client n\'existe pas';
         }
       } 
        }
        else{
          $messageInfo = 'Veuillez remplir tous les champs';
        }
      ?>
      <div class="connexionPageConteneurPrincipale">
  <div class="connexionPageConteneur">
    <div style=" text-align:center; font-size: 32px; color:seagreen;">
                Vos commandes fioFood
              </div>
    <form method="post" action="" class="formConnexionPage">
    <div class="inputEmailTelephoneConnexionPage">
      <label for="emailUti">Nom :</label><br>
        <input type="text" name="nomUtilisateur" id="emailUti" required>
      </div>
      <div class="inputEmailTelephoneConnexionPage">
        <label for="mdput">Votre numéro de téléphone :</label><br>
         <input type="text" name="nmtelephone" id="mdput" required>
      </div>
      <input type="submit" value="Mes achats" name="connexionUtilisateur" class="submitConnexionPage">
  </form>
  </div>
</div> 
   <?php }
   elseif (isset($_SESSION['id'])) {
        $compteClient = $bdd->prepare('SELECT * FROM fiofood WHERE id = :id');
        $compteClient->bindParam(':id', $_SESSION['id']);
        $compteClient->execute();
        $compteClientInfo = $compteClient->fetch();
        $nomprenom = $compteClientInfo['nom'].' '.$compteClientInfo['prenom'];

        $compteClientpanier = $bdd->query('SELECT * FROM panier');
        $compteClientpanier->execute();
        while ($compteComparaisonInfo = $compteClientpanier->fetch()) {
         if ($compteComparaisonInfo['nomProduit'] == $nomprenom) {
           if ($compteComparaisonInfo['contactClient'] == $compteClientInfo['numero']) {
              $_SESSION['nmtelephone'] = $compteClientInfo['numero'];
              $_SESSION['nomUtilisateur'] = $nomprenom;
              echo "<script>window.location.href='panierClientContenu.php';</script>";
           }
           else
           {
            $messageInfo = 'Numéro de téléphone n\'existe pas';
           }
         }
         else{
          $messageInfo = 'Nom du client n\'existe pas';
         }
       }
      ?>
      <div class="connexionPageConteneurPrincipale">
  <div class="connexionPageConteneur">
    <div style=" text-align:center; font-size: 32px; color:seagreen;">
                Vos commandes fioFood
              </div>
    <form method="post" action="" class="formConnexionPage">
    <div class="inputEmailTelephoneConnexionPage">
      <label for="emailUti">Nom :</label><br>
        <input type="text" name="nomUtilisateur" id="emailUti" required>
      </div>
      <div class="inputEmailTelephoneConnexionPage">
        <label for="mdput">Votre numéro de téléphone :</label><br>
         <input type="text" name="nmtelephone" id="mdput" required>
      </div>
      <input type="submit" value="Mes achats" name="connexionUtilisateur" class="submitConnexionPage">
  </form>
  </div>
</div> 
   <?php 
        }
     
     else {?>

      <div class="connexionPageConteneurPrincipale">
  <div class="connexionPageConteneur">
    <div style=" text-align:center; font-size: 32px; color:seagreen;">
                Vos commandes fioFood
              </div>
    <form method="post" action="" class="formConnexionPage">
    <div class="inputEmailTelephoneConnexionPage">
      <label for="emailUti">Nom :</label><br>
        <input type="text" name="nomUtilisateur" id="emailUti" required>
      </div>
      <div class="inputEmailTelephoneConnexionPage">
        <label for="mdput">Votre numéro de téléphone :</label><br>
         <input type="text" name="nmtelephone" id="mdput" required>
      </div>
      <input type="submit" value="Mes achats" name="connexionUtilisateur" class="submitConnexionPage">
  </form>
  </div>
</div>      
    <?php }?>

  <!-- MESSAGE D'ERREUR -->
  <div>
    <?php if ($messageInfo != '') {?>
    <div style="background-color: red;font-size: 44px; text-align: center;">
      <?php echo($messageInfo); ?>
    </div>
 <?php } ?>  
  </div>
</div>
    <?php }
   include 'footer.php';
?>