<?php 
    include 'connexionBaseDonnee.php';
     include 'barreDeRecherche.php';
 ?>
  <?php 
       if (isset($_GET['compteUtilisateurDemander'])) {
        $_SESSION['compteUtilisateurDemander'] = simple_decrypt($_GET['compteUtilisateurDemander']);
        $id_recu = simple_decrypt($_GET['compteUtilisateurDemander']);
         $infoCompteUtilisateurDemander = $bdd->prepare('SELECT * FROM fiofood WHERE id=?');
       $infoCompteUtilisateurDemander->execute(array($id_recu));
        $infoRecuCompteUtilisateurDemander = $infoCompteUtilisateurDemander->fetch();?>

   <div id="contenurCompte">
    <div class="conteneurCouvertureCompte" style="position: relative;">
        <img src="photoProfilCouverture/<?php if ($infoRecuCompteUtilisateurDemander['couvertureCompte'] != '') {echo($infoRecuCompteUtilisateurDemander['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
        
      <div class="photoProfil">
        <img src="photoProfilCouverture/<?php if($infoRecuCompteUtilisateurDemander['photo']!=''){echo($infoRecuCompteUtilisateurDemander['photo']);}else{echo("iconDefault.png");} ?>">

        <?php 
         if ($infoRecuCompteUtilisateurDemander['vendeurpro'] !=0) { ?>
        <i class="fas fa-check-circle" style="color:seagreen;position: absolute;bottom: 1px;
    right: 15px;z-index: 9; font-size: 22px;"></i>
        <?php }?> 
      </div>
    
    <div class="photoProfilNomPrenomContenuer">
      <div class="NomPrenomContenuer">
      <div class="nomPrenom" align="center">
        <?php 
             echo $infoRecuCompteUtilisateurDemander['nom'].' '.$infoRecuCompteUtilisateurDemander['prenom'];
         ?>
      </div>
      <div class="descriptionProfil" align="center">
        <?php echo $infoRecuCompteUtilisateurDemander['descriptionProfil']; ?>
      </div>
      <div class="descriptionInformaionCompte">
        <div style="font-weight: bolder;" class="titredescriptionInformaionCompte">Téléphone/Mobile : </div>
        <div class="contenudescriptionInformaionCompte"><?php echo $infoRecuCompteUtilisateurDemander['numero']; ?></div>        
      </div>
      <div class="descriptionInformaionCompte">
        <div style="font-weight: bolder;" class="titredescriptionInformaionCompte">E-mail : </div>
         <div class="contenudescriptionInformaionCompte"><?php echo $infoRecuCompteUtilisateurDemander['email']; ?>  </div>      
      </div>
      <div class="professionProfil">
        <div style="font-weight: bolder;" class="titredescriptionInformaionCompte">Statut : </div>
        <div class="contenudescriptionInformaionCompte"><?php echo $infoRecuCompteUtilisateurDemander['profession']; ?></div>
      </div>
      <div class="localisationProfil">
        <div style="font-weight: bolder;" class="titredescriptionInformaionCompte">Localisation : </div>
        <div class="contenudescriptionInformaionCompte"><?php echo ($infoRecuCompteUtilisateurDemander['paysmarche']." - ".$infoRecuCompteUtilisateurDemander['localisationProfil']); ?></div>
      </div>              
      </div>
    </div>
  </div>
  <!-- CONTENEUR PRINCIPALE DES DIFFERENTES POSTES D'UN UTILISATEUR SUR Compte CONTENEUR PRINCIPALE DES DIFFERENTES POSTES D'UN UTILISATEUR SUR COMPTE CONTENEUR PRINCIPALE DES DIFFERENTES POSTES D'UN UTILISATEUR SUR COMPTE CONTENEUR PRINCIPALE DES DIFFERENTES POSTES D'UN UTILISATEUR SUR COMPTE CONTENEUR PRINCIPALE DES DIFFERENTES POSTES D'UN UTILISATEUR SUR COMPTE -->

  <div class="conteneurPrincipaleDesDifferentesPostes">
    <div class="conteneurContenantLesInformationsSurCompte">
      <div id="mesAnnonce">
        <header><a href="codePosteEnCoursDeVenteCompteUtilisateurDemanderClient.php" class="nonVenduCilent">Annonces</a></header>
      </div>
      <?php 
        if ($infoRecuCompteUtilisateurDemander['certifierfiofood']==1) {
         ?>
      <div id="mesAnnonce">
        <header><a href="codePosteCollectionCompteUtilisateurDemanderClient.php" class="promotionCollectionCompteDemanderClient">Promotion</a></header>
      </div> 
       <?php } ?>
    </div>



<?php } ?>

        <div class="chargement" style="margin-top: 10%;">
          <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <div class="spinner-border text-secondary" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <div class="spinner-border text-success" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <div class="spinner-border text-danger" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <div class="spinner-border text-warning" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <div class="spinner-border text-info" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <div class="spinner-border text-light" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <div class="spinner-border text-dark" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
       <!--CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES -->
       <div class="contenuCentralCompteCss" >
       <div class="conteneurContenantLesPostes contenuCentralCompte" align="center">
           <div class="compteUtilisateurPosteConteneurFlex">
               <div class="compteUtilisateurPosteApresFlex">
        <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 0,1');
          $jointu->execute(array($id_recu,$id_recu));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
        </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php if (strlen($infoJointu['titreannonce'])<=18) {
        echo $infoJointu['titreannonce'];
      }else{ echo(substr($infoJointu['titreannonce'], 0,14)."...");} ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
     </div>
   </div>
    <div class="contactCompteUtilisateurDemande">           
        <div data-id="<?php echo ($infoJointu['id']); ?>" class="ajouterPanierImageSansModification cssContactCompteUtilisateurDemande" >
        <img src="icon/ajouterPanier.png" >
        </div>
      <div class="contactCompteUtilisateurDemandeBoutonContact cssContactCompteUtilisateurDemande" data-id="<?php echo ($infoJointu['id']); ?>" >
        <img src="icon/iconContact.png">
      </div> 
    </div> 
   </div> 
 
   <?php }?>
      </div>
       <div class="compteUtilisateurPosteApresFlex">
          <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 1,1');
          $jointu->execute(array($id_recu,$id_recu));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>      
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php if (strlen($infoJointu['titreannonce'])<=18) {
        echo $infoJointu['titreannonce'];
      }else{ echo(substr($infoJointu['titreannonce'], 0,14)."...");} ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
     </div> 
   </div>
    <div class="contactCompteUtilisateurDemande">           
        <div data-id="<?php echo ($infoJointu['id']); ?>" class="ajouterPanierImageSansModification cssContactCompteUtilisateurDemande" >
        <img src="icon/ajouterPanier.png" >
        </div>
      <div class="contactCompteUtilisateurDemandeBoutonContact cssContactCompteUtilisateurDemande" data-id="<?php echo ($infoJointu['id']); ?>">
        <img src="icon/iconContact.png">
      </div> 
    </div> 
   </div>     
        <?php }?>
               </div>
           </div>

           <div class="compteUtilisateurPosteConteneurFlex">
               <div class="compteUtilisateurPosteApresFlex">
        <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 2,1');
          $jointu->execute(array($id_recu,$id_recu));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>      
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php if (strlen($infoJointu['titreannonce'])<=18) {
        echo $infoJointu['titreannonce'];
      }else{ echo(substr($infoJointu['titreannonce'], 0,14)."...");} ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
     </div> 
   </div>
    <div class="contactCompteUtilisateurDemande">           
        <div data-id="<?php echo ($infoJointu['id']); ?>" class="ajouterPanierImageSansModification cssContactCompteUtilisateurDemande">
        <img src="icon/ajouterPanier.png" >
        </div>
      <div class="contactCompteUtilisateurDemandeBoutonContact cssContactCompteUtilisateurDemande" data-id="<?php echo ($infoJointu['id']); ?>">
        <img src="icon/iconContact.png">
      </div> 
    </div> 
   </div>     
        <?php }?>
               </div>
       <div class="compteUtilisateurPosteApresFlex">
          <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 3,1');
          $jointu->execute(array($id_recu,$id_recu));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php if (strlen($infoJointu['titreannonce'])<=18) {
        echo $infoJointu['titreannonce'];
      }else{ echo(substr($infoJointu['titreannonce'], 0,14)."...");} ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
     </div> 
   </div>
    <div class="contactCompteUtilisateurDemande">           
        <div data-id="<?php echo ($infoJointu['id']); ?>" class="ajouterPanierImageSansModification cssContactCompteUtilisateurDemande">
        <img src="icon/ajouterPanier.png" >
        </div>
      <div class="contactCompteUtilisateurDemandeBoutonContact cssContactCompteUtilisateurDemande" data-id="<?php echo ($infoJointu['id']); ?>">
        <img src="icon/iconContact.png">
      </div> 
    </div> 
   </div>     
        <?php }?>
               </div>
           </div>

           <div class="compteUtilisateurPosteConteneurFlex">
               <div class="compteUtilisateurPosteApresFlex">
        <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 4,1');
          $jointu->execute(array($id_recu,$id_recu));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php if (strlen($infoJointu['titreannonce'])<=18) {
        echo $infoJointu['titreannonce'];
      }else{ echo(substr($infoJointu['titreannonce'], 0,14)."...");} ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
     </div> 
   </div>
    <div class="contactCompteUtilisateurDemande">           
        <div data-id="<?php echo ($infoJointu['id']); ?>" class="ajouterPanierImageSansModification cssContactCompteUtilisateurDemande">
        <img src="icon/ajouterPanier.png" >
        </div>
      <div class="contactCompteUtilisateurDemandeBoutonContact cssContactCompteUtilisateurDemande" data-id="<?php echo ($infoJointu['id']); ?>">
        <img src="icon/iconContact.png">
      </div> 
    </div> 
   </div>     
        <?php }?>
               </div>
       <div class="compteUtilisateurPosteApresFlex">
          <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 5,1');
          $jointu->execute(array($id_recu,$id_recu));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php if (strlen($infoJointu['titreannonce'])<=18) {
        echo $infoJointu['titreannonce'];
      }else{ echo(substr($infoJointu['titreannonce'], 0,14)."...");} ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
     </div>
   </div>
    <div class="contactCompteUtilisateurDemande">           
        <div data-id="<?php echo ($infoJointu['id']); ?>" class="ajouterPanierImageSansModification cssContactCompteUtilisateurDemande">
        <img src="icon/ajouterPanier.png" >
        </div>
      <div class="contactCompteUtilisateurDemandeBoutonContact cssContactCompteUtilisateurDemande" data-id="<?php echo ($infoJointu['id']); ?>">
        <img src="icon/iconContact.png">
      </div> 
    </div>  
   </div>     
        <?php }?>
               </div>
           </div>

           <div class="compteUtilisateurPosteConteneurFlex">
               <div class="compteUtilisateurPosteApresFlex">
        <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 6,1');
          $jointu->execute(array($id_recu,$id_recu));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php if (strlen($infoJointu['titreannonce'])<=18) {
        echo $infoJointu['titreannonce'];
      }else{ echo(substr($infoJointu['titreannonce'], 0,14)."...");} ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
     </div>
   </div>
    <div class="contactCompteUtilisateurDemande">           
        <div data-id="<?php echo ($infoJointu['id']); ?>" class="ajouterPanierImageSansModification cssContactCompteUtilisateurDemande">
        <img src="icon/ajouterPanier.png" >
        </div>
      <div class="contactCompteUtilisateurDemandeBoutonContact cssContactCompteUtilisateurDemande" data-id="<?php echo ($infoJointu['id']); ?>">
        <img src="icon/iconContact.png">
      </div> 
    </div>  
   </div>     
        <?php }?>
               </div>
       <div class="compteUtilisateurPosteApresFlex">
          <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 7,1');
          $jointu->execute(array($id_recu,$id_recu));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>      
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php if (strlen($infoJointu['titreannonce'])<=18) {
        echo $infoJointu['titreannonce'];
      }else{ echo(substr($infoJointu['titreannonce'], 0,14)."...");} ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
     </div>
   </div>
    <div class="contactCompteUtilisateurDemande">           
        <div data-id="<?php echo ($infoJointu['id']); ?>" class="ajouterPanierImageSansModification cssContactCompteUtilisateurDemande">
        <img src="icon/ajouterPanier.png" >
        </div>
      <div class="contactCompteUtilisateurDemandeBoutonContact cssContactCompteUtilisateurDemande" data-id="<?php echo ($infoJointu['id']); ?>">
        <img src="icon/iconContact.png">
      </div> 
    </div>  
   </div>     
        <?php }?>
               </div>
           </div>

           <div class="compteUtilisateurPosteConteneurFlex">
               <div class="compteUtilisateurPosteApresFlex">
        <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 8,1');
          $jointu->execute(array($id_recu,$id_recu));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php if (strlen($infoJointu['titreannonce'])<=18) {
        echo $infoJointu['titreannonce'];
      }else{ echo(substr($infoJointu['titreannonce'], 0,14)."...");} ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
     </div> 
   </div>
    <div class="contactCompteUtilisateurDemande">           
        <div data-id="<?php echo ($infoJointu['id']); ?>" class="ajouterPanierImageSansModification cssContactCompteUtilisateurDemande">
        <img src="icon/ajouterPanier.png" >
        </div>
      <div class="contactCompteUtilisateurDemandeBoutonContact cssContactCompteUtilisateurDemande" data-id="<?php echo ($infoJointu['id']); ?>">
        <img src="icon/iconContact.png">
      </div> 
    </div> 
   </div>     
        <?php }?>
               </div>
       <div class="compteUtilisateurPosteApresFlex">
          <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 9,1');
          $jointu->execute(array($id_recu,$id_recu));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>      
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php if (strlen($infoJointu['titreannonce'])<=18) {
        echo $infoJointu['titreannonce'];
      }else{ echo(substr($infoJointu['titreannonce'], 0,14)."...");} ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
     </div> 
   </div>
    <div class="contactCompteUtilisateurDemande">           
        <div data-id="<?php echo ($infoJointu['id']); ?>" class="ajouterPanierImageSansModification cssContactCompteUtilisateurDemande" >
        <img src="icon/ajouterPanier.png" >
        </div>
      <div class="contactCompteUtilisateurDemandeBoutonContact cssContactCompteUtilisateurDemande" data-id="<?php echo ($infoJointu['id']); ?>">
        <img src="icon/iconContact.png">
      </div> 
    </div> 
   </div>     
        <?php }?>
               </div>
           </div>
       </div>
     </div>
 <div class="conteneurPublicitesCompte" style="width:35%;">
      <div class="publiciteSectionCompte">      
      <img src="image/IMG_6574.JPG">
    <div class="descriptionPubliciteCompte">
      <div style="position: absolute;top: 40%;left: 35%; text-align: center;">
        Nos Partenaires
      </div>
    </div>
  </div>
  </div>
  </div>
</div>
<div>
 <?php 
  include 'footer.php';
 ?> 
</div>
