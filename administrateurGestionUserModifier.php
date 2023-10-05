<?php 
    include 'connexionBaseDonnee.php';
    include 'barreDeRecherche.php';
    include 'codeModifierInformationCompte.php';
 ?>
 
<!-- compte utilisateurcompte utilisateurcompte utilisateurcompte utilisateurcompte utilisateurcompte utilisateurcompte utilisateurcompte utilisateurcompte utilisateurcompte utilisateur -->
  <?php 
  $_SESSION['id'] = htmlspecialchars(simple_decrypt($_GET['id']));
       if (isset($_SESSION['id'])) {
         $infoCompte = $bdd->prepare('SELECT * FROM fiofood WHERE id=?');
       $infoCompte->execute(array($_SESSION['id']));
        $infoRecuCompte = $infoCompte->fetch();
        ?>

   <div id="contenurCompte">
     <div class="conteneurCouvertureCompte" style="position: relative;">
       <img src="photoProfilCouverture/<?php if($infoRecuCompte['couvertureCompte'] != ''){echo($infoRecuCompte['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
       
      <div class="photoProfil">
       <img src="photoProfilCouverture/<?php if($infoRecuCompte['photo'] !=''){echo($infoRecuCompte['photo']);}else{echo("iconDefault.png");} ?>">
      </div>
      <div class="modifierCouverturePhotoProfil">
        <a href="inscriptionPhotoProfil.php"><i class="fa fa-camera" aria-hidden="true"></i></a>
      </div>
      <div class="modifierCouverturePhotoProfilCouverture">
        <a href="inscriptionPhotoProfilCouverture.php"><i class="fa fa-camera" aria-hidden="true"></i></a>
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
<?php  }
      
  include 'footer.php';
 ?>