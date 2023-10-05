<?php 
	include 'barreDeRecherche.php';
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
       
       <div class="conteneurPrincipaleBoulangerie">
<div class="differentesRayonConteneur">
    <div class="rayonFlex">
        <?php 
            $recuperation2 = $bdd->prepare('SELECT * FROM fiofoodsupermarket WHERE id_fiofood=:id_fiofood and categorie=:categorie');
            $recuperation2->bindParam(':id_fiofood',$supermarche);
            $recuperation2->bindParam(':categorie',$rayon);
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
            </div>
            <div class="articleBoulangerieConteneur">
                <div class="articleBoulangerieConteneurAvantFlex">
                    <div class="articleBoulangerieConteneurFlex">
                          <?php 
                    $article = $bdd->prepare('SELECT * FROM fiofoodsupermarket WHERE id_fiofood=:id_fiofood and categorie=:categorie LIMIT 0,6');
                    $article->bindParam(':id_fiofood',$supermarche);
                    $article->bindParam(':categorie',$value);
                    $article->execute();
                    while ($articleInfo = $article->fetch()) {
                ?>
                <div class="conteneurArticleRayonClick" style="position:relative;">
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

                    <div class="articleBoulangerieConteneurFlex">
                           <?php 
                    $article = $bdd->prepare('SELECT * FROM fiofoodsupermarket WHERE id_fiofood=:id_fiofood and categorie=:categorie LIMIT 0,6');
                    $article->bindParam(':id_fiofood',$supermarche);
                    $article->bindParam(':categorie',$value);
                    $article->execute();
                    while ($articleInfo = $article->fetch()) {
                ?>
                <div class="conteneurArticleRayonClick" style="position:relative;">
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
                    <div class="articleBoulangerieConteneurFlex">
                           <?php 
                    $article = $bdd->prepare('SELECT * FROM fiofoodsupermarket WHERE id_fiofood=:id_fiofood and categorie=:categorie LIMIT 0,6');
                    $article->bindParam(':id_fiofood',$supermarche);
                    $article->bindParam(':categorie',$value);
                    $article->execute();
                    while ($articleInfo = $article->fetch()) {
                ?>
                <div class="conteneurArticleRayonClick" style="position:relative;">
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
                    <div class="articleBoulangerieConteneurFlex">
                           <?php 
                    $article = $bdd->prepare('SELECT * FROM fiofoodsupermarket WHERE id_fiofood=:id_fiofood and categorie=:categorie LIMIT 0,6');
                    $article->bindParam(':id_fiofood',$supermarche);
                    $article->bindParam(':categorie',$value);
                    $article->execute();
                    while ($articleInfo = $article->fetch()) {
                ?>
                <div class="conteneurArticleRayonClick" style="position:relative;">
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