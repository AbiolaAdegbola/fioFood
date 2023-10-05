<?php 
    include 'barreDeRecherche.php';
    if (isset($_GET['id'])) { 
     $id_fiofood = htmlspecialchars(simple_decrypt($_GET['id']));
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE id=:id_fiofood');
     $recuperation2->bindParam(':id_fiofood',$id_fiofood);
     $recuperation2->execute();
     $donneRecu2 = $recuperation2->fetch();
?>
<div class="conteneurGeneralSupermarche" style="margin-top: 34px;">
    <div class="compteSumperMarche">
        <div class="compteCouvertureSupermarche">
            <img src="<?php echo 'photoProfilCouverture/'.$donneRecu2['couvertureCompte'];?>">
        </div>
        <div class="compteCompteSupermarche">
            <img src="<?php echo 'photoProfilCouverture/'.$donneRecu2['photo'];?>">
            <?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;bottom: 4px;
        left: 100px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
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
    <div class="descriptionCompteSupermarche">
        <?php echo($donneRecu2['descriptionProfil']); ?>
    </div>
    <div class="conteneurPrincipaleSupermarche">       
    <section id="supermarcheRayon"> 
    <div style="font-size: 22px; margin-left: 10%;font-style: italic;">
        Les grands rayons :
    </div>  
    <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofoodsupermarket WHERE id_fiofood=:id_fiofood');
     $recuperation2->bindParam(':id_fiofood',$id_fiofood);
     $recuperation2->execute();
     $tabrayon = array();
     while ($donneRecu2 = $recuperation2->fetch()) 
     {
         array_push($tabrayon, $donneRecu2['categorie']);
     }
     $tabrayonunique = array_unique($tabrayon);   
     ?>
     <table align="center" class="grandRayonTable">
        <?php 
        foreach (array_chunk($tabrayonunique,2) as $row) {
              ?>
              <tr class="grandRayonLigne">
              <?php 
                    foreach ($row as $value) {
                        ?>
                        <td class="grandRayonColonne">
                            <a href="supermarchefioFoodRayon.php?rayon=<?= htmlentities(simple_encrypt($value));?>&amp;supermarche=<?php echo(simple_encrypt($id_fiofood)); ?>">
                                         <?php echo(htmlentities($value)); ?>  
                                 </a>
                        </td>
                        <?php   } ?>                  
              </tr>
          <?php } ?> 
     </table>        
  </section>

<div class="differentesRayonConteneur">
    <div class="rayonFlex">
        <?php 
            $recuperation2 = $bdd->prepare('SELECT * FROM fiofoodsupermarket WHERE id_fiofood=:id_fiofood');
            $recuperation2->bindParam(':id_fiofood',$id_fiofood);
            $recuperation2->execute();
            $tabrayon = array();
            while ($donneRecu2 = $recuperation2->fetch()) {
                array_push($tabrayon, $donneRecu2['categorie']);
            }
            $tabrayonunique = array_unique($tabrayon);
            foreach ($tabrayonunique as $value) {
         ?>
        <div class="rayonAvantFlex">
            <div class="headerRayon">
                <div class="headerRayon1"><?php echo($value); ?></div>
                <div class="headerRayon2"><a href="supermarchefioFoodRayon.php?rayon=<?php echo(simple_encrypt($value)); ?>&amp;supermarche=<?php echo(simple_encrypt($id_fiofood)); ?>">Voir plus<img src="icon/plusfiofood.png" width="20"></a></div>
            </div>
        <div class="chargement text-center" style="margin-top: 10%;">
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
            <div class="articleRayon owl-carousel">
                <?php 
                    $article = $bdd->prepare('SELECT * FROM fiofoodsupermarket WHERE id_fiofood=:id_fiofood and categorie=:categorie LIMIT 0,20');
                    $article->bindParam(':id_fiofood',$id_fiofood);
                    $article->bindParam(':categorie',$value);
                    $article->execute();
                    while ($articleInfo = $article->fetch()) {
                ?>
                <div class="conteneurArticleRayonClick">
                    <div class="conteneurArticleRayon" data-id="<?php echo($articleInfo['id']); ?>">
                        <div class="articleRayonImage">
                            <img src="imagesupermarche/<?php echo($articleInfo['imageproduit']); ?>">
                        </div>
                        <div class="articleRayonPrixproduit"> 
                            <?php echo($articleInfo['prixproduit']." cfa"); ?>
                        </div>
                        <div class="descriptionArticleRayon">
                            <?php 
                       if (strlen(strtolower($articleInfo['nomproduit']))>=38) {
                echo(substr(mb_strtolower($articleInfo['nomproduit'],'UTF-8'), 0,38).'...');
             }
             else{
                       echo($articleInfo['nomproduit']);
             }
                     ?> 
                        </div>
                    </div>
                    <div class="ajouterArticleRayon ajouterPanierArticleRayon" data-id="<?php echo($articleInfo['id']); ?>">
                        Panier
                    </div>
                </div>
                <?php } ?>
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