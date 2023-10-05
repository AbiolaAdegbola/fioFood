<?php 
    include 'connexionBaseDonnee.php';
    include 'barreDeRecherche.php';
    include 'codeModifierInformationCompte.php';
 ?>


 <!-- Connexion page fiofood -->
 <?php 
  if (isset($_POST['connexionUtilisateur']) && !empty($_POST['emailUtilisateur'])&& !empty($_POST['mdpUtilisateur'])) {

   $emailUtilisateur = htmlspecialchars(rtrim($_POST['emailUtilisateur']));
   $mdpUtilisateur = sha1($_POST['mdpUtilisateur']);
   
   //VERIFICATION SI LA PERSONNE A UN COMPTE EXISTANT
   $verificationCompte = $bdd->prepare('SELECT numero,email,mdp FROM fiofood');
   $verificationCompte->execute();
  while ( $verificationCompteInfo = $verificationCompte->fetch() ) {
     if ((rtrim($verificationCompteInfo['email']) == $emailUtilisateur) || (rtrim($verificationCompteInfo['numero']) == $emailUtilisateur)) {
     if ($verificationCompteInfo['mdp'] == $mdpUtilisateur) {
          $compte = $bdd->prepare('SELECT id FROM fiofood WHERE email=:email OR numero=:numero AND mdp=:mdp');
          $compte->bindParam(':email',$emailUtilisateur);
          $compte->bindParam(':numero',$emailUtilisateur);
          $compte->bindParam(':mdp',$mdpUtilisateur);
          $compte->execute();
         while ($compteExiste = $compte->fetch()) {
         $_SESSION['id']=$compteExiste['id'];
         //header('Location: http://localhost/fioFood/compte.php');
         echo "<script>window.location.href='compte.php';</script>";
         } 
        }
        else{
          $messageInfo = 'Mot de passe incorrecte';
        }
      }
      else{

        $messageInfo = 'E-mail ou numéro de téléphone n\'existe pas';
      }
  }
 }

 // Modification du photo de profil

     if (isset($_POST['envoyerPhotoProfilCouverture'])) {

      $photoProfil = $_FILES['photo1Profil']['tmp_name'];
        $photoProfil1 = $_FILES['photo1Profil']['name'];
        $destination = 'photoProfilCouverture/'.$photoProfil1;
        move_uploaded_file($photoProfil, $destination);

      $requet = $bdd->prepare('UPDATE fiofood SET photo=:photoProfil WHERE id=:id_fioFood');
      $requet->bindParam(':photoProfil',$photoProfil1);
      $requet->bindParam(':id_fioFood',$_SESSION['id']);
      $requet->execute();
      //header('Location: http://localhost/fioFood/compte.php');
       // echo "<script>window.location.href='compte.php';</script>";
     }

// modification de la photo de couverture
     if (isset($_POST['envoyerPhotoCouverture'])) {

        $photoCouverture = $_FILES['photo1Couverture']['tmp_name'];
        $photoCouverture1 = $_FILES['photo1Couverture']['name'];
        $destination = 'photoProfilCouverture/'.$photoCouverture1;
        move_uploaded_file($photoCouverture, $destination);

      $requet = $bdd->prepare('UPDATE fiofood SET couvertureCompte=:photoCouverture WHERE id=:id_fioFood');
      $requet->bindParam(':photoCouverture',$photoCouverture1);
      $requet->bindParam(':id_fioFood',$_SESSION['id']);
      $requet->execute();
      //header('Location: http://localhost/fioFood/compte.php');
        echo "<script>window.location.href='compte.php';</script>";
     }
 ?>


 <!-- INSCRIPTION PAGE -->
 <?php 
  //include 'barreDeRecherche.php';

 if (!isset($_SESSION['id'])) {
    if (isset($_POST['EnvoyerInscription'])) {
$message='';
      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $email = htmlspecialchars($_POST['email']);
      $nom = htmlspecialchars($_POST['nom']);
      $telephone = htmlspecialchars($_POST['telephone']);
      $profession = htmlspecialchars($_POST['profession']);
        $pays = htmlspecialchars($_POST['pays']);
        $localisationInscription = htmlspecialchars($_POST['localisationInscription']);
        $descriptionProfil = htmlspecialchars($_POST['descriptionProfil']);
        $nomMarcheInscription = htmlspecialchars($_POST['nomMarcheInscription']);
      $mdp = sha1($_POST['mdp']);
      $mdpv = sha1($_POST['mdpv']);


        if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mdp']) AND !empty($_POST['mdpv']) AND !empty($_POST['telephone'])) {
          $ema = $bdd->query('SELECT nom,prenom,numero FROM fioFood');
               $ema->execute();
               $existe =false;

               /* A EXAMINER LE CODE A EXAMINER LE CODE A EXAMINER LE CODE A EXAMINER LE CODEA EXAMINER LE CODE A EXAMINER LE CODE A EXAMINER LE CODE A EXAMINER LE CODE A EXAMINER LE CODE A EXAMINER LE CODE A EXAMINER LE CODE A EXAMINER LE CODE A EXAMINER LE CODE */
               while ($resuEma = $ema->fetch()) {
                        if(($nom != $resuEma['nom']) AND ($prenom != $resuEma['prenom']) AND ($telephone != $resuEma['numero'])){
                            $existe = true;
                        }
                        else{
                          $existe = false;
                        }

                    }
                        if ($existe == true) {
              if ($mdp == $mdpv) {
                $req = $bdd->prepare('INSERT INTO fioFood(nom,prenom,email,localisationProfil,profession,descriptionProfil,numero,nommarche,paysmarche,mdp,datePublication) VALUES(:nom,:prenom,:email,:localisationInscription,:profession,:descriptionProfil,:numero,:nommarche,:paysmarche,:mdp,NOW())');
    
        $req->bindParam(':nom',$nom);
        $req->bindParam(':prenom',$prenom);
        $req->bindParam(':email',$email);
        $req->bindParam(':localisationInscription',$localisationInscription);
        $req->bindParam(':profession',$profession);
        $req->bindParam(':descriptionProfil',$descriptionProfil);
        $req->bindParam(':numero',$telephone);
        $req->bindParam(':nommarche',$nomMarcheInscription);
        $req->bindParam(':paysmarche',$pays);
        $req->bindParam(':mdp',$mdp);
        $req->execute();

         $recuperation = $bdd->prepare('SELECT nom,prenom,numero,id FROM fioFood WHERE nom=:nom and prenom=:prenom and numero=:numero');
         $recuperation->bindParam(':nom',$nom);
         $recuperation->bindParam(':prenom',$prenom);
         $recuperation->bindParam(':numero',$telephone);
         $recuperation->execute();
         $infoRecuperation = $recuperation->fetch();
                $_SESSION['id'] = $infoRecuperation['id'];
             
         $message = "Vous etes membres de fiofood";
        //header('Location: http://localhost/fioFood/inscriptionPhotoCouverture.php');
         echo "<script>window.location.href='inscriptionPhotoCouverture.php';</script>";
          }
          else
          {
            $message = "Vos mot de passe ne correspondent pas";
          } 
             }
             else
             {
              $message = "Il existe déjà un compte qui a le même Nom et Prenom et numéro de téléphone";
             }
        }           
        else
        {
           $message ="Veuillez remplir tout les champ";
        }
        
    }

}
 ?>
 
<!-- compte utilisateurcompte utilisateurcompte utilisateurcompte utilisateurcompte utilisateurcompte utilisateurcompte utilisateurcompte utilisateurcompte utilisateurcompte utilisateur -->
  <?php 
       if (isset($_SESSION['id'])) {
         $infoCompte = $bdd->prepare('SELECT * FROM fiofood WHERE id=?');
         $infoCompte->execute(array(htmlspecialchars($_SESSION['id'])));
         $infoRecuCompte = $infoCompte->fetch();
        ?>

   <div id="contenurCompte">
     <div class="conteneurCouvertureCompte" style="position: relative;">
       <img src="photoProfilCouverture/<?php if($infoRecuCompte['couvertureCompte'] != ''){echo($infoRecuCompte['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
       
      <div class="photoProfil">
       <img src="photoProfilCouverture/<?php if($infoRecuCompte['photo'] !=''){echo($infoRecuCompte['photo']);}else{echo("iconDefault.png");} ?>">
       <div class="modifierCouverturePhotoProfil boutonProfileDialogue" style="cursor:pointer;color: white;">
          <i class="fa fa-camera" aria-hidden="true"></i>
      </div>
      </div>
      
      <div class="modifierCouverturePhotoProfilCouverture boutonCouvertureModfier" style="cursor:pointer;color: seagreen;">
          <i class="fa fa-camera" aria-hidden="true"></i>
      </div>
     </div>
    <div class="photoProfilNomPrenomContenuer">
      <div class="NomPrenomContenuer">
      <div class="nomPrenom" id="modifierNomPrenomCompte" align="center">
        <?php 
             echo $infoRecuCompte['nom'].' '.$infoRecuCompte['prenom'];
         ?>
      </div>
      <div class="descriptionProfil" align="center" id="modifierDescriptionProfilIdAfficher">
        <div>
           <?php if ($infoRecuCompte['descriptionProfil'] != '') {
          echo $infoRecuCompte['descriptionProfil'];
        }else{echo '';}
        ?>
        </div>
        <h6 style="cursor: pointer;" id="modifierDescriptionProfilId"><i class="fa fa-pencil" aria-hidden="true"></i></h6>
<script type="text/javascript">
          var modifierDescriptionProfil = document.getElementById('modifierDescriptionProfilId');
          modifierDescriptionProfil.addEventListener('click',modifir);

          function modifir(){
              document.getElementById('modifierDescriptionProfilIdAfficher').innerHTML +='<div><div id="descriptionp"><form method="post" action=""><input type="text" name="descriptionProfil"><input type="submit" name="descriptionpEnregistrer" id="envoi" style="display: none;"></form><div><div id="descriptionpAnnuler"><a href="compte.php">Annuler</a></div><label for="envoi"><div id="descriptionpEnregistrer">Enregistrer</div></label></div></div></div>';        
          }
</script>
      </div>
      <div class="CordonneeUtilisateurCompte">
        <div style="font-weight: bolder;" class="CordonneeUtilisateurCompteInformationTitre">Téléphone/Mobile : </div> 
        <div class="CordonneeUtilisateurCompteInformation"><?php echo $infoRecuCompte['numero']; ?><i class="fa fa-pencil" aria-hidden="true" id="modifierNumeroCompte"></i></div>
        <div id="modifierNumeroCompteAffficherZone"></div>
<script type="text/javascript">
  var modifierNumeroCompte = document.getElementById('modifierNumeroCompte');
          modifierNumeroCompte.addEventListener('click',modifierNumeroCompteFonction);

          function modifierNumeroCompteFonction() {
            document.getElementById('modifierNumeroCompteAffficherZone').innerHTML = '<div class="modifierInformationCompte"><form method="post"><input type="tel" name="modifierNumeroTelephoneCompte"><input type="submit" name="envoyerModifierNumeroTelephoneCompte" id="envoyerModifierNumeroTelephoneComptep" style="display:none;"><label for="envoyerModifierNumeroTelephoneComptep">Enregistrer</label><span><a href="compte.php">Annuler</a></span></form></div>';
          }
</script>
      </div>

      <div class="CordonneeUtilisateurCompte">
        <div style="font-weight: bolder;" class="CordonneeUtilisateurCompteInformationTitre">E-mail : </div> <div class="CordonneeUtilisateurCompteInformation"><?php echo $infoRecuCompte['email'];?><i class="fa fa-pencil" aria-hidden="true" id="modifierAddressEmailCompte"></i> </div> 
        <div id="modifierAddressEmailCompteAfficher">
          
        </div>  
<script type="text/javascript">
  var modifierAddressEmailCompte = document.getElementById('modifierAddressEmailCompte');
          modifierAddressEmailCompte.addEventListener('click',modifierEmailFonction);

          function modifierEmailFonction() {
            document.getElementById('modifierAddressEmailCompteAfficher').innerHTML = '<div class="modifierInformationCompte"><form method="post"><input type="email" name="modifierEmailCompte"><input type="submit" name="envoyerModifierEmailCompte" id="envoyerModifierEmailCompte" style="display:none;"><label for="envoyerModifierEmailCompte">Enregistrer</label><span><a href="compte.php">Annuler</a></span></form></div>';
          }
</script>    
      </div>

      <div class="CordonneeUtilisateurCompte">
         <div style="font-weight: bolder;" class="CordonneeUtilisateurCompteInformationTitre">Statut : </div><div class="CordonneeUtilisateurCompteInformation"> <?php echo $infoRecuCompte['profession']; ?></div>
      </div>

      <div class="CordonneeUtilisateurCompte">
        <div style="font-weight: bolder;" class="CordonneeUtilisateurCompteInformationTitre">Localisation : </div><div class="CordonneeUtilisateurCompteInformation"> <?php echo $infoRecuCompte['localisationProfil']; ?><i class="fa fa-pencil" aria-hidden="true" id="modifierLocalisationCompte"></i></div>
        <div id="modifierLocalisationCompteAfficher">
          
        </div>
<script type="text/javascript">
  var modifierLocalisationCompte = document.getElementById('modifierLocalisationCompte');
          modifierLocalisationCompte.addEventListener('click',modifierLocalisationCompteFonction);

          function modifierLocalisationCompteFonction() {
            document.getElementById('modifierLocalisationCompteAfficher').innerHTML = '<div class="modifierInformationCompte"><form method="post"><input type="text" name="modifierLocalisationCompte"><input type="submit" id="envoyerModifieLocalisationCompte" name="envoyerModifieLocalisationCompte" style="display:none;"><label for="envoyerModifieLocalisationCompte">Enregistrer</label><span><a href="compte.php">Annuler</a></span></form></div>';
          }
</script>
      </div>
      </div>
    </div>

<!-- POUR LES SUPERMARCHES FIOFOOD POUR LES SUPERMARCHES FIOFOOD POUR LES SUPERMARCHES FIOFOOD POUR LES SUPERMARCHES FIOFOOD POUR LES SUPERMARCHES FIOFOOD POUR LES SUPERMARCHES FIOFOOD POUR LES SUPERMARCHES FIOFOOD POUR LES SUPERMARCHES FIOFOOD POUR LES SUPERMARCHES FIOFOOD POUR LES SUPERMARCHES FIOFOOD POUR LES SUPERMARCHES FIOFOOD POUR LES SUPERMARCHES FIOFOOD POUR LES SUPERMARCHES FIOFOOD POUR LES SUPERMARCHES FIOFOOD POUR LES SUPERMARCHES FIOFOOD -->
<?php 
  if ($infoRecuCompte['profession'] == 'supermarket') {
    include 'compteUtilisateurSupermarket.php';
  }

/* POUR TOUS LES UTILISATEURS BOULANGERIE  POUR TOUS LES UTILISATEURS BOULANGERIEPOUR TOUS LES UTILISATEURS BOULANGERIEPOUR TOUS LES UTILISATEURS BOULANGERIEPOUR TOUS LES UTILISATEURS BOULANGERIEPOUR TOUS LES UTILISATEURS BOULANGERIEPOUR TOUS LES UTILISATEURS BOULANGERIEPOUR TOUS LES UTILISATEURS BOULANGERIEPOUR TOUS LES UTILISATEURS BOULANGERIEPOUR TOUS LES UTILISATEURS BOULANGERIEPOUR TOUS LES UTILISATEURS BOULANGERIEPOUR TOUS LES UTILISATEURS BOULANGERIEPOUR TOUS LES UTILISATEURS BOULANGERIEPOUR TOUS LES UTILISATEURS BOULANGERIEPOUR TOUS LES UTILISATEURS BOULANGERIEPOUR TOUS LES UTILISATEURS BOULANGERIEPOUR TOUS LES UTILISATEURS BOULANGERIE  */

  elseif ($infoRecuCompte['profession'] == 'Boulangerie') {
    include 'compteUtilisateurBoulangerie.php';
  }

  /* POUR TOUS LES UTILISATEURS LIVREURS POUR TOUS LES UTILISATEURS LIVREURS POUR TOUS LES UTILISATEURS LIVREURS POUR TOUS LES UTILISATEURS LIVREURS POUR TOUS LES UTILISATEURS LIVREURS POUR TOUS LES UTILISATEURS LIVREURS POUR TOUS LES UTILISATEURS LIVREURS POUR TOUS LES UTILISATEURS LIVREURS POUR TOUS LES UTILISATEURS LIVREURS POUR TOUS LES UTILISATEURS LIVREURS POUR TOUS LES UTILISATEURS LIVREURS POUR TOUS LES UTILISATEURS LIVREURS POUR TOUS LES UTILISATEURS LIVREURS POUR TOUS LES UTILISATEURS LIVREURS POUR TOUS LES UTILISATEURS LIVREURS*/
  elseif ($infoRecuCompte['profession'] == 'Livreur') {
    include 'comptelivreurfiofood.php';
  }

/* POUR TOUS LES UTILISATEURS FIOFOOD   POUR TOUS LES UTILISATEURS FIOFOOD   POUR TOUS LES UTILISATEURS FIOFOOD   POUR TOUS LES UTILISATEURS FIOFOOD   POUR TOUS LES UTILISATEURS FIOFOOD   POUR TOUS LES UTILISATEURS FIOFOOD   POUR TOUS LES UTILISATEURS FIOFOOD   POUR TOUS LES UTILISATEURS FIOFOOD   POUR TOUS LES UTILISATEURS FIOFOOD   POUR TOUS LES UTILISATEURS FIOFOOD   POUR TOUS LES UTILISATEURS FIOFOOD   POUR TOUS LES UTILISATEURS FIOFOOD   POUR TOUS LES UTILISATEURS FIOFOOD   POUR TOUS LES UTILISATEURS FIOFOOD   POUR TOUS LES UTILISATEURS FIOFOOD   POUR TOUS LES UTILISATEURS FIOFOOD   POUR TOUS LES UTILISATEURS FIOFOOD  */
  else
  {
    include 'compteUtilisateur.php';
  }
?>


  </div>
<?php  }else{
 }?> 
      
<?php 
  include 'footer.php';
 ?>