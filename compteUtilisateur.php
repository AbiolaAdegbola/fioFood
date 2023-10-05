  <!-- CONTENEUR PRINCIPALE DES DIFFERENTES POSTES D'UN UTILISATEUR SUR Compte CONTENEUR PRINCIPALE DES DIFFERENTES POSTES D'UN UTILISATEUR SUR COMPTE CONTENEUR PRINCIPALE DES DIFFERENTES POSTES D'UN UTILISATEUR SUR COMPTE CONTENEUR PRINCIPALE DES DIFFERENTES POSTES D'UN UTILISATEUR SUR COMPTE CONTENEUR PRINCIPALE DES DIFFERENTES POSTES D'UN UTILISATEUR SUR COMPTE -->

  <div class="conteneurPrincipaleDesDifferentesPostes">
    <div class="conteneurContenantLesInformationsSurCompte">
      <div id="mesAnnonce">
        <header>Annonces</header>
        <div><a href="codePosteEnCoursDeVenteCompte.php" class="nonVendu">En cours</a></div>
        <div><a href="codePosteVenduCompte.php" class="vendu">Vendu</a></div>
      </div>

      <?php 
        if ($infoRecuCompte['certifierfiofood']==1) {
         ?>
      <div id="mesAnnonce">
        <header>Promotion</header>
        <div><a href="codePosteCollectionCompte.php" class="promotionCollectionCompte">Promo</a></div>
        <div><a href="codePosteRecettefiofood.php" class="promotionRecettefiofood">Recette</a></div>
      </div> 
       <?php } ?>
      <div id="mesAnnonceBooster">
        <a href="">Booster</a>
      </div>
    </div>

<!--CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES
  VOIR LA PAGE CODEPOSTEENCOURSDEVENTECOMPTE.PHP ET CODEPOSTEVENDUCOMPTE.PHP
 -->
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

          <div class="chargementUnique" style="margin-top: 10%;">
          <div class="spinner-border text-success" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>

   <div class="contenuCentralCompte contenuCentralCompteCss">

<!--CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES -->
       <div class="conteneurContenantLesPostes" align="center">
           <div class="compteUtilisateurPosteConteneurFlex">
               <div class="compteUtilisateurPosteApresFlex">
        <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" ORDER BY fiofoodannoceuranonyme.id DESC  LIMIT 0,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <!-- voir page  compteDescriptionAnnonce.php la boite de dialogue voir page  compteDescriptionAnnonce.php la boite de dialogue voir page  compteDescriptionAnnonce.php la boite de dialogue voir page  compteDescriptionAnnonce.php la boite de dialogue voir page  compteDescriptionAnnonce.php la boite de dialogue -->
      <div class="compteDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>
      </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
      <div id="divContenantMS">
        <div class="modifierAnnonce"><a href="<?php if($infoJointu['profession']=='Commerçant'){echo('faireUneAnnonceMarcheVirtuel');}else{echo('faireUneAnnonce');} ?>.php?modifierPosteId_fioFood=<?php echo(simple_encrypt($infoJointu['id_fiofood']));?>&amp;modifierPoste=<?php echo(simple_encrypt($infoJointu['id'])); ?>"  onclick="return confirm('Voulez-vous Modifier votre annonce?');"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
        <div style="font-size: 29px;color: white; font-weight: bold;">|</div>
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?supp=<?php echo simple_encrypt($infoJointu['id']); ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompte"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
     </div> 
   </div>     
        <?php }?>
               </div>
       <div class="compteUtilisateurPosteApresFlex">
                         <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" ORDER BY fiofoodannoceuranonyme.id DESC LIMIT 1,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>
      </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
      <div id="divContenantMS">
        <div class="modifierAnnonce"><a href="<?php if($infoJointu['profession']=='Commerçant'){echo('faireUneAnnonceMarcheVirtuel');}else{echo('faireUneAnnonce');} ?>.php?modifierPosteId_fioFood=<?php echo(simple_encrypt($infoJointu['id_fiofood']));?>&amp;modifierPoste=<?php echo(simple_encrypt($infoJointu['id'])); ?>" onclick="return confirm('Voulez-vous Modifier votre annonce?');"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
        <div style="font-size: 29px;color: white; font-weight: bold;">|</div>
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?supp=<?php echo simple_encrypt($infoJointu['id']); ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompte"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
     </div> 
   </div>     
        <?php }?>
               </div>
           </div>

           <div class="compteUtilisateurPosteConteneurFlex">
               <div class="compteUtilisateurPosteApresFlex">
        <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" ORDER BY fiofoodannoceuranonyme.id DESC LIMIT 2,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>
      </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
      <div id="divContenantMS">
        <div class="modifierAnnonce"><a href="<?php if($infoJointu['profession']=='Commerçant'){echo('faireUneAnnonceMarcheVirtuel');}else{echo('faireUneAnnonce');} ?>.php?modifierPosteId_fioFood=<?php echo(simple_encrypt($infoJointu['id_fiofood']));?>&amp;modifierPoste=<?php echo(simple_encrypt($infoJointu['id'])); ?>"  onclick="return confirm('Voulez-vous Modifier votre annonce?');"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
        <div style="font-size: 29px;color: white; font-weight: bold;">|</div>
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?supp=<?php echo simple_encrypt($infoJointu['id']); ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompte"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
     </div> 
   </div>     
        <?php }?>
               </div>
       <div class="compteUtilisateurPosteApresFlex">
                         <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" ORDER BY fiofoodannoceuranonyme.id DESC LIMIT 3,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>
      </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
      <div id="divContenantMS">
        <div class="modifierAnnonce"><a href="<?php if($infoJointu['profession']=='Commerçant'){echo('faireUneAnnonceMarcheVirtuel');}else{echo('faireUneAnnonce');} ?>.php?modifierPosteId_fioFood=<?php echo(simple_encrypt($infoJointu['id_fiofood']));?>&amp;modifierPoste=<?php echo(simple_encrypt($infoJointu['id'])); ?>" onclick="return confirm('Voulez-vous Modifier votre annonce?');"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
        <div style="font-size: 29px;color: white; font-weight: bold;">|</div>
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?supp=<?php echo simple_encrypt($infoJointu['id']); ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompte"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
     </div> 
   </div>     
        <?php }?>
               </div>
           </div>

           <div class="compteUtilisateurPosteConteneurFlex">
               <div class="compteUtilisateurPosteApresFlex">
        <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" ORDER BY fiofoodannoceuranonyme.id DESC LIMIT 4,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>
      </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
      <div id="divContenantMS">
        <div class="modifierAnnonce"><a href="<?php if($infoJointu['profession']=='Commerçant'){echo('faireUneAnnonceMarcheVirtuel');}else{echo('faireUneAnnonce');} ?>.php?modifierPosteId_fioFood=<?php echo(simple_encrypt($infoJointu['id_fiofood']));?>&amp;modifierPoste=<?php echo(simple_encrypt($infoJointu['id'])); ?>"  onclick="return confirm('Voulez-vous Modifier votre annonce?');"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
        <div style="font-size: 29px;color: white; font-weight: bold;">|</div>
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?supp=<?php echo simple_encrypt($infoJointu['id']); ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompte"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
     </div> 
   </div>     
        <?php }?>
               </div>
       <div class="compteUtilisateurPosteApresFlex">
                         <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" ORDER BY fiofoodannoceuranonyme.id DESC LIMIT 5,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>
      </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
      <div id="divContenantMS">
        <div class="modifierAnnonce"><a href="<?php if($infoJointu['profession']=='Commerçant'){echo('faireUneAnnonceMarcheVirtuel');}else{echo('faireUneAnnonce');} ?>.php?modifierPosteId_fioFood=<?php echo(simple_encrypt($infoJointu['id_fiofood']));?>&amp;modifierPoste=<?php echo(simple_encrypt($infoJointu['id'])); ?>" onclick="return confirm('Voulez-vous Modifier votre annonce?');"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
        <div style="font-size: 29px;color: white; font-weight: bold;">|</div>
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?supp=<?php echo simple_encrypt($infoJointu['id']); ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompte"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
     </div> 
   </div>     
        <?php }?>
               </div>
           </div>

           <div class="compteUtilisateurPosteConteneurFlex">
               <div class="compteUtilisateurPosteApresFlex">
        <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" ORDER BY fiofoodannoceuranonyme.id DESC LIMIT 6,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>
      </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
      <div id="divContenantMS">
        <div class="modifierAnnonce"><a href="<?php if($infoJointu['profession']=='Commerçant'){echo('faireUneAnnonceMarcheVirtuel');}else{echo('faireUneAnnonce');} ?>.php?modifierPosteId_fioFood=<?php echo(simple_encrypt($infoJointu['id_fiofood']));?>&amp;modifierPoste=<?php echo(simple_encrypt($infoJointu['id'])); ?>"  onclick="return confirm('Voulez-vous Modifier votre annonce?');"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
        <div style="font-size: 29px;color: white; font-weight: bold;">|</div>
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?supp=<?php echo simple_encrypt($infoJointu['id']); ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompte"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
     </div> 
   </div>     
        <?php }?>
               </div>
       <div class="compteUtilisateurPosteApresFlex">
                         <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" ORDER BY fiofoodannoceuranonyme.id DESC LIMIT 7,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>
      </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
      <div id="divContenantMS">
        <div class="modifierAnnonce"><a href="<?php if($infoJointu['profession']=='Commerçant'){echo('faireUneAnnonceMarcheVirtuel');}else{echo('faireUneAnnonce');} ?>.php?modifierPosteId_fioFood=<?php echo(simple_encrypt($infoJointu['id_fiofood']));?>&amp;modifierPoste=<?php echo(simple_encrypt($infoJointu['id'])); ?>" onclick="return confirm('Voulez-vous Modifier votre annonce?');"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
        <div style="font-size: 29px;color: white; font-weight: bold;">|</div>
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?supp=<?php echo simple_encrypt($infoJointu['id']); ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompte"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
     </div> 
   </div>     
        <?php }?>
               </div>
           </div>

           <div class="compteUtilisateurPosteConteneurFlex">
               <div class="compteUtilisateurPosteApresFlex">
        <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" ORDER BY fiofoodannoceuranonyme.id DESC LIMIT 8,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>
      </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
      <div id="divContenantMS">
        <div class="modifierAnnonce"><a href="<?php if($infoJointu['profession']=='Commerçant'){echo('faireUneAnnonceMarcheVirtuel');}else{echo('faireUneAnnonce');} ?>.php?modifierPosteId_fioFood=<?php echo(simple_encrypt($infoJointu['id_fiofood']));?>&amp;modifierPoste=<?php echo(simple_encrypt($infoJointu['id'])); ?>"  onclick="return confirm('Voulez-vous Modifier votre annonce?');"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
        <div style="font-size: 29px;color: white; font-weight: bold;">|</div>
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?supp=<?php echo simple_encrypt($infoJointu['id']); ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompte"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
      </div>
     </div> 
   </div>     
        <?php }?>
               </div>
       <div class="compteUtilisateurPosteApresFlex">
                         <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="" ORDER BY fiofoodannoceuranonyme.id DESC LIMIT 9,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBouton" data-id="<?php echo ($infoJointu['id']); ?>">
        <div class="sliderPostesImage">
              <img src="<?php echo 'image/'.$infoJointu['img1']; ?>"> 
            </div>
      </div>       
      <div class="sliderPostesDescription">
      <span class="detailsSliderPoste"><?php echo $infoJointu['titreannonce']; ?></span><br>
      <span class="localisationSlider"><?php echo $infoJointu['localisationannonce']; ?></span>
      <div id="divContenantMS">
        <div class="modifierAnnonce"><a href="<?php if($infoJointu['profession']=='Commerçant'){echo('faireUneAnnonceMarcheVirtuel');}else{echo('faireUneAnnonce');} ?>.php?modifierPosteId_fioFood=<?php echo(simple_encrypt($infoJointu['id_fiofood']));?>&amp;modifierPoste=<?php echo(simple_encrypt($infoJointu['id'])); ?>" onclick="return confirm('Voulez-vous Modifier votre annonce?');"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
        <div style="font-size: 29px;color: white; font-weight: bold;">|</div>
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?supp=<?php echo simple_encrypt($infoJointu['id']); ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompte"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
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