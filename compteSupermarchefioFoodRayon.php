<?php 
    include 'barreDeRecherche.php';
    if (isset($_SESSION['id']) and $_SESSION['id'] == simple_decrypt($_GET['supermarche'])) {
        ?>
<?php 

    if (isset($_GET['rayon']) and isset($_GET['supermarche'])) {
        $supermarche = htmlspecialchars(simple_decrypt($_GET['supermarche']));
        $rayon = htmlspecialchars(simple_decrypt($_GET['rayon']));

        $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:id_fiofood');
        $recuperation2->bindParam(':id_fiofood',$supermarche);
        $recuperation2->execute();
        $donneRecu2 = $recuperation2->fetch();
            ?>
                <div class="conteneurGeneraleSupermarcheRayon">
                    
                        <div class="compteSumperMarche">
        <div class="compteCouvertureSupermarche">
            <img src="<?php echo 'photoProfilCouverture/'.$donneRecu2['couvertureCompte'];?>">
        </div>
        <div class="compteCompteSupermarche">
            <img src="<?php echo 'photoProfilCouverture/'.$donneRecu2['photo'];?>">
        </div>
        <div class="nomCompteSupermarche">
            <?php echo($donneRecu2['nom']." ".$donneRecu2['prenom']); ?>
        </div>
    </div>
                        <div class="contactCompteSupermarche" align="center">
        <div class="numeroCompteSupermarche">
            <img src="icon/contactSupermarche.png" width="30px"><a href="tel:<?php echo(" ".$donneRecu2['numero']); ?>"><?php echo(" ".$donneRecu2['numero']); ?></a>
        </div>
        <div class="EmailCompteSupermarche">
            <img src="icon/messagerie.png" width="30px"><a href="mailto:<?php echo(" ".$donneRecu2['email']); ?> "><?php echo(" ".$donneRecu2['email']); ?> </a>
        </div>
    </div>
    <div class="localisationCompteSupermarche">
        <div class="">
            <img src="icon/placeholder.png" width="30px"><?php echo($donneRecu2['paysmarche']." - ".$donneRecu2['localisationProfil']); ?>
        </div>
    </div>
       
        <div class="conteneurRayonChoisirPrincipale">
              <div class="conteneurRayonChoisirFlex">
                <div class="conteneurRayonChoisir">
        <?php 
        $article = $bdd->prepare('SELECT * FROM fiofoodsupermarket WHERE categorie=:categorie AND id_fiofood=:id_fiofood LIMIT 0,30');
        $article->bindParam(':categorie', $rayon);
        $article->bindParam(':id_fiofood', $supermarche);
        $article->execute();
        $uneFois  = true;
        while ($articleInfo = $article->fetch()) { 
         if ($uneFois) {
          $uneFois=false;
             ?>
                <div class="typeRayon">
                   <?php echo($articleInfo['categorie']); ?>
                </div>
           <?php } ?>
                   <div class="conteneurArticleRayonChoisir conteneurArticleRayonChoisirdescription" data-id="<?php echo($articleInfo['id']); ?>">
                    <div class="articleRayonImageChoisi">
                        <img src="imagesupermarche/<?php echo($articleInfo['imageproduit']); ?>">
                    </div>
                    <div class="descriptionArticleRayonChoisir">
                        <div class="descriptionArticleRayonChoisirNomproduit">
                            <?php echo($articleInfo['nomproduit']); ?>
                        </div>
                        <div class="descriptionArticleRayonChoisirPrixproduit">
                            <?php echo($articleInfo['prixproduit']." cfa"); ?>
                        </div>
                        <div id="divContenantMS" align="center" style="">
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?suppsupermarche=<?php echo simple_encrypt($articleInfo['id']); ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompteRayon"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
        <div style="font-size: 29px;color: black; font-weight: bold;margin-left: 5px;margin-right: 5px;">|</div>  
        <div class="modifierAnnonce"><a href="faireUneAnnonceSupermarche.php?modifierPosteId_fioFood=<?php echo(simple_encrypt($articleInfo['id_fiofood']));?>&amp;modifierPoste=<?php echo(simple_encrypt($articleInfo['id'])); ?>" onclick="return confirm('Voulez-vous Modifier votre annonce?');"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
      </div>
                    </div>
                   </div>
                   <?php } ?>
                    </div>  

            <div class="conteneurRayonChoisir conteneurRayonChoisir2">
                    <?php 
                        $article = $bdd->prepare('SELECT * FROM fiofoodsupermarket WHERE categorie=:categorie AND id_fiofood=:id_fiofood LIMIT 0,30');
        $article->bindParam(':categorie', $rayon);
        $article->bindParam(':id_fiofood', $supermarche);
        $article->execute();

                        while ($articleInfo = $article->fetch()) { 
                    ?>
                   <div class="conteneurArticleRayonChoisir conteneurArticleRayonChoisirdescription" data-id="<?php echo($articleInfo['id']); ?>">
                    <div class="articleRayonImageChoisi">
                        <img src="imagesupermarche/<?php echo($articleInfo['imageproduit']); ?>">
                    </div>
                    <div class="descriptionArticleRayonChoisir">
                        <div class="descriptionArticleRayonChoisirNomproduit">
                            <?php echo($articleInfo['nomproduit']); ?>
                        </div>
                        <div class="descriptionArticleRayonChoisirPrixproduit">
                            <?php echo($articleInfo['prixproduit']." cfa"); ?>
                        </div>
                        <div id="divContenantMS" align="center" style="">
        <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?suppsupermarche=<?php echo simple_encrypt($articleInfo['id']); ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompteRayon"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
        <div style="font-size: 29px;color: black; font-weight: bold;margin-left: 5px;margin-right: 5px;">|</div>  
        <div class="modifierAnnonce"><a href="faireUneAnnonceSupermarche.php?modifierPosteId_fioFood=<?php echo(simple_encrypt($articleInfo['id_fiofood']));?>&amp;modifierPoste=<?php echo(simple_encrypt($articleInfo['id'])); ?>" onclick="return confirm('Voulez-vous Modifier votre annonce?');"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
      </div>
                    </div>
                   </div>
                   <?php } ?>
                    </div>
              </div>
        </div>
                </div>
        <?php 
       
        }

include 'footer.php';
?>
    <?php }
 else{
    //header('Location: http://localhost/fioFood/compte.php');
     echo "<script>window.location.href='compte.php';</script>";
  }

?>