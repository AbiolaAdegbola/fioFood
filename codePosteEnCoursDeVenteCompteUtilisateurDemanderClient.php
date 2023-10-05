<?php 
    session_start();
    include 'connexionBaseDonnee.php';

         if (isset($_SESSION['compteUtilisateurDemander'])) {
            $id = $_SESSION['compteUtilisateurDemander'];
          }
?>

       <!--CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES -->
       <div class="contenuCentralCompteCss">
       <div class="conteneurContenantLesPostes contenuCentralCompte" align="center">
           <div class="compteUtilisateurPosteConteneurFlex">
               <div class="compteUtilisateurPosteApresFlex">
        <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 0,1');
          $jointu->execute(array($id,$id));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
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
          $jointu->execute(array($id,$id));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>      
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
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
           </div>

           <div class="compteUtilisateurPosteConteneurFlex">
               <div class="compteUtilisateurPosteApresFlex">
        <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 2,1');
          $jointu->execute(array($id,$id));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>      
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
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
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 3,1');
          $jointu->execute(array($id,$id));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
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
           </div>

           <div class="compteUtilisateurPosteConteneurFlex">
               <div class="compteUtilisateurPosteApresFlex">
        <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 4,1');
          $jointu->execute(array($id,$id));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
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
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 5,1');
          $jointu->execute(array($id,$id));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
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
           </div>

           <div class="compteUtilisateurPosteConteneurFlex">
               <div class="compteUtilisateurPosteApresFlex">
        <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 6,1');
          $jointu->execute(array($id,$id));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
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
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 7,1');
          $jointu->execute(array($id,$id));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>      
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
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
           </div>

           <div class="compteUtilisateurPosteConteneurFlex">
               <div class="compteUtilisateurPosteApresFlex">
        <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 8,1');
          $jointu->execute(array($id,$id));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
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
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" LIMIT 9,1');
          $jointu->execute(array($id,$id));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteUtilisateurDemandeDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>      
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
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
           </div>
       </div>
     </div>

<script type="text/javascript" src="slider/boiteDialogueContact.js"></script>