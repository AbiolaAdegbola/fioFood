 <!--DECLARER UN ARTICLE VENDU DECLARER UN ARTICLE VENDU DECLARER UN ARTICLE VENDU DECLARER UN ARTICLE VENDU DECLARER UN ARTICLE VENDU -->

 <?php 
    if (isset($_POST['articleVenduSoumettre']) and isset($_POST['articleVendu'])) {
    $articleVendu = htmlspecialchars($_POST['articleVendu']);
    $idVendeur = htmlspecialchars($_POST['idVendeur']);
    if ($articleVendu == true) {
        $articleVend =1;
        $recup = $bdd->prepare('UPDATE fiofoodannoceuranonyme SET articlevendu=:articlevendu WHERE id=:id');
        $recup->bindParam(':articlevendu',$articleVend); 
        $recup->bindParam(':id',$idVendeur);
        $recup->execute();
    }
   }
 ?>


  <!--REMETTRE UN ARTICLE VENDU SUR LE MARCHE REMETTRE UN ARTICLE VENDU SUR LE MARCHE REMETTRE UN ARTICLE VENDU SUR LE MARCHE REMETTRE UN ARTICLE VENDU SUR LE MARCHE REMETTRE UN ARTICLE VENDU SUR LE MARCHE -->

 <?php 
    if (isset($_POST['articleVenduSoumettreRemettre']) and isset($_POST['articleVendu'])) {
    $articleVendu = htmlspecialchars($_POST['articleVendu']);
    $idVendeur = htmlspecialchars($_POST['idVendeur']);
    if ($articleVendu == true) {
        $articleVend =0;
        $recup = $bdd->prepare('UPDATE fiofoodannoceuranonyme SET articlevendu=:articlevendu WHERE id=:id');
        $recup->bindParam(':articlevendu',$articleVend); 
        $recup->bindParam(':id',$idVendeur);
        $recup->execute();
    }
   }
 ?>



 <!--DECLARER UN COLIS LIVRER DECLARER UN COLIS LIVRER DECLARER UN COLIS LIVRER DECLARER UN COLIS LIVRER DECLARER UN COLIS LIVRER DECLARER UN COLIS LIVRER DECLARER UN COLIS LIVRER DECLARER UN COLIS LIVRER DECLARER UN COLIS LIVRER DECLARER UN COLIS LIVRER DECLARER UN COLIS LIVRER DECLARER UN COLIS LIVRER DECLARER UN COLIS LIVRER DECLARER UN COLIS LIVRER DECLARER UN COLIS LIVRER -->

 <?php 
    if (isset($_POST['colisOUI']) and isset($_POST['colislivrer'])) {
    $colislivrer = htmlspecialchars($_POST['colislivrer']);
    $idColis = htmlspecialchars($_POST['idColis']);
    if ($colislivrer == true) {
        $livrer =1;
        $recup = $bdd->prepare('UPDATE panier SET livrer=:livrer WHERE id=:id');
        $recup->bindParam(':livrer',$livrer); 
        $recup->bindParam(':id',$idColis);
        $recup->execute();
    }
   }
 ?>



  <!-- description compte modifierdescription compte modifierdescription compte modifierdescription compte modifierdescription compte modifierdescription compte modifierdescription compte modifierdescription compte modifier -->
        <?php 
           if (isset($_POST['descriptionpEnregistrer'])) {

             $descriptionProfil = htmlspecialchars($_POST['descriptionProfil']);
             if ($descriptionProfil !='') {
               $modifierDescription = $bdd->prepare('UPDATE fiofood SET descriptionProfil=:descriptionProfil WHERE id=:id_compte');
             $modifierDescription->bindParam(':descriptionProfil',$descriptionProfil);
             $modifierDescription->bindParam(':id_compte',$_SESSION['id']);
             $modifierDescription->execute();
             //header('Location: http://localhost/fioFood/compte.php');
             echo "<script>window.location.href='compte.php';</script>";
             }
             else{

             }
           }
           else{ 
            
           }
         ?>


<!-- modifier numero de telephone modifier numero de telephone modifier numero de telephone modifier numero de telephone modifier numero de telephone -->
<?php 
   if (isset($_POST['envoyerModifierNumeroTelephoneCompte'])) {
     $modifierNumeroTelephoneCompte = htmlspecialchars($_POST['modifierNumeroTelephoneCompte']);
     if ($modifierNumeroTelephoneCompte != '') {
         $recuperationNumero = $bdd->prepare('UPDATE fiofood SET numero=:numeroTelephone WHERE id=:id_compte');
         $recuperationNumero->bindParam(':numeroTelephone',$modifierNumeroTelephoneCompte);
         $recuperationNumero->bindParam(':id_compte',$_SESSION['id']);
         $recuperationNumero->execute();
         //header('Location: http://localhost/fioFood/compte.php');
         echo "<script>window.location.href='compte.php';</script>";
     }
   }
?>

<!-- modifier email compte utilisateur  modifier email compte utilisateur  modifier email compte utilisateur  modifier email compte utilisateur modifier email compte utilisateur modifier email compte utilisateur modifier email compte utilisateur -->
<?php 
   if (isset($_POST['envoyerModifierEmailCompte'])) {
     $modifierEmailCompte = htmlspecialchars($_POST['modifierEmailCompte']);
     if ($modifierEmailCompte != '') {
         $recuperationEamil = $bdd->prepare('UPDATE fiofood SET email=:numeroTelephone WHERE id=:id_compte');
         $recuperationEamil->bindParam(':numeroTelephone',$modifierEmailCompte);
         $recuperationEamil->bindParam(':id_compte',$_SESSION['id']);
         $recuperationEamil->execute();
         //header('Location: http://localhost/fioFood/compte.php');
         echo "<script>window.location.href='compte.php';</script>";
     }
   }
?>

<!-- modifier localisation  modifier localisation  modifier localisation  modifier localisation  modifier localisation  modifier localisation  modifier localisation  modifier localisation  modifier localisation  modifier localisation -->
<?php 
   if (isset($_POST['envoyerModifieLocalisationCompte'])) {
     $modifierLocalisationCompte = htmlspecialchars($_POST['modifierLocalisationCompte']);
     if ($modifierLocalisationCompte != '') {
         $recuperationLocalisation = $bdd->prepare('UPDATE fiofood SET localisationProfil=:numeroTelephone WHERE id=:id_compte');
         $recuperationLocalisation->bindParam(':numeroTelephone',$modifierLocalisationCompte);
         $recuperationLocalisation->bindParam(':id_compte',$_SESSION['id']);
         $recuperationLocalisation->execute();
         //header('Location: http://localhost/fioFood/compte.php');
         echo "<script>window.location.href='compte.php';</script>";
     }
   }
?>