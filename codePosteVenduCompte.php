<?php 
    session_start();
    include 'connexionBaseDonnee.php';
    include 'fonctionEncrypt.php';
?>
<!--CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES CONTENEUR DES DIFFERENTES POSTES -->
       <div class="conteneurContenantLesPostes" align="center">
           <div class="compteUtilisateurPosteConteneurFlex">
               <div class="compteUtilisateurPosteApresFlex">
        <?php 
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="1" LIMIT 0,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <!-- voir page  compteDescriptionAnnonce.php la boite de dialogue voir page  compteDescriptionAnnonce.php la boite de dialogue voir page  compteDescriptionAnnonce.php la boite de dialogue voir page  compteDescriptionAnnonce.php la boite de dialogue voir page  compteDescriptionAnnonce.php la boite de dialogue -->
      <div class="compteDescriptionBoutonVendu" data-id="<?php echo ($infoJointu['id']); ?>">
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
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="1" LIMIT 1,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBoutonVendu" data-id="<?php echo ($infoJointu['id']); ?>">
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
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="1" LIMIT 2,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBoutonVendu" data-id="<?php echo ($infoJointu['id']); ?>">
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
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="1" LIMIT 3,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBoutonVendu" data-id="<?php echo ($infoJointu['id']); ?>">
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
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="1" LIMIT 4,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBoutonVendu" data-id="<?php echo ($infoJointu['id']); ?>">
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
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="1" LIMIT 5,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBoutonVendu" data-id="<?php echo ($infoJointu['id']); ?>">
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
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="1" LIMIT 6,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBoutonVendu" data-id="<?php echo ($infoJointu['id']); ?>">
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
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="1" LIMIT 7,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBoutonVendu" data-id="<?php echo ($infoJointu['id']); ?>">
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
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="1" LIMIT 8,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBoutonVendu" data-id="<?php echo ($infoJointu['id']); ?>">
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
          $jointu = $bdd->prepare('SELECT fiofood.*,fiofoodannoceuranonyme.* FROM fiofood,fiofoodannoceuranonyme WHERE fiofoodannoceuranonyme.id_fiofood =? AND fiofood.id=? AND fiofoodannoceuranonyme.articlevendu="1" LIMIT 9,1');
          $jointu->execute(array($_SESSION['id'],$_SESSION['id']));
          while ($infoJointu = $jointu->fetch()) {?>
     <div class="sliderPostes">
      <div class="compteDescriptionBoutonVendu" data-id="<?php echo ($infoJointu['id']); ?>">
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

<script type="text/javascript" src="slider/boiteDialogueContact.js"></script>