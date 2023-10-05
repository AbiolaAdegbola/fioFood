<?php
    if (isset($_SESSION['id'])) {
      ?>
<div class="conteneurSupermarketCompte">
        <section id="supermarcheRayon"> 
    <div style="font-size: 22px; margin-left: 10%;font-style: italic;">
        Les grands rayons :
    </div>  
    <?php 
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofoodsupermarket WHERE id_fiofood=:id_fiofood');
     $recuperation2->bindParam(':id_fiofood',$infoRecuCompte['id']);
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
                            <a href="compteSupermarchefioFoodRayon.php?rayon=<?php echo (htmlentities(simple_encrypt($value)));?>&amp;supermarche=<?php echo(simple_encrypt($infoRecuCompte['id'])); ?>">
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
            $recuperation2->bindParam(':id_fiofood',$infoRecuCompte['id']);
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
                <div class="headerRayon2"><a href="compteSupermarchefioFoodRayon.php?rayon=<?php echo(simple_encrypt($value)); ?>&amp;supermarche=<?php echo(simple_encrypt($infoRecuCompte['id'])); ?>">Voir plus</a></div>
            </div>
            <div class="articleRayon owl-carousel">
                <?php 
                    $article = $bdd->prepare('SELECT * FROM fiofoodsupermarket WHERE id_fiofood=:id_fiofood and categorie=:categorie');
                    $article->bindParam(':id_fiofood',$infoRecuCompte['id']);
                    $article->bindParam(':categorie',$value);
                    $article->execute();
                    while ($articleInfo = $article->fetch()) {
                ?>
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
             <div id="divContenantMS" align="center" style="position: absolute;bottom: 0px;">
                <div class="suprimerAnnonce"><a href="http://localhost/fioFood/compteSuprimerPoste.php?suppsupermarche=<?php echo simple_encrypt($articleInfo['id']); ?>" style="color: red;" onclick="return confirm('Voulez-vous supprimer votre annonce?');" class="suprimerAnnonceCompteRayon"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                <div style="font-size: 29px;color: black; font-weight: bold;margin-left: 5px;margin-right: 5px;">|</div>  
                <div class="modifierAnnonce"><a href="faireUneAnnonceSupermarche.php?modifierPosteId_fioFood=<?php echo(simple_encrypt($articleInfo['id_fiofood']));?>&amp;modifierPoste=<?php echo(simple_encrypt($articleInfo['id'])); ?>" onclick="return confirm('Voulez-vous Modifier votre annonce?');"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
              </div>
                </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
</div>
  <?php  } 
 else{
    header('Location: http://localhost/fioFood/compte.php');
  }

?>