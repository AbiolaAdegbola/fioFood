<?php 
	include 'connexionBaseDonnee.php';
	if (isset($_POST['descrption'])) {
		$descrption = htmlspecialchars($_POST['descrption']);
        $article = $bdd->prepare('SELECT * FROM fiofoodsupermarket WHERE id=:id');
        $article->bindParam(':id',$descrption);
        $article->execute();
        while ($articleInfo = $article->fetch()) {
    ?>
    <div data-id="<?php echo($articleInfo['id']); ?>" align="center" style="color: black;">
        <div class="boitedialogueImageDesciptionSupermaket">
            <img src="imagesupermarche/<?php echo($articleInfo['imageproduit']); ?>">
        </div>
        <div class="articleRayonPrixproduitDesciptionSupermaket"> 
            <?php echo($articleInfo['prixproduit']." cfa"); ?>
        </div>
        <div class="descriptionArticleRayonDesciptionSupermaket">
            <?php echo($articleInfo['nomproduit']);   ?> 
        </div>
        <div style="margin-top: 10px; text-align: left;color: rgba(0, 0, 0, 0.5);text-decoration: underline; border-top: 1px solid rgba(0, 0, 0, 0.2);font-size: 22px;">Description du produit</div>
        <div style="font-size: 16px; margin-bottom: 20px;">
            <?php echo($articleInfo['description']); ?>
        </div><br>
        <div class="ajouterArticleRayon ajouterPanierArticleRay" data-id="<?php echo($articleInfo['id']); ?>" style="width: 80%;padding: 10px; font-size: 16px; margin-left: 26px;">
            Panier
        </div>
    </div>
    <?php } 
	}
?>
<style type="text/css">
.boitedialogueImageDesciptionSupermaket img
{
    min-width: 200px;
    max-width: 200px;
    min-height: 200px;
    max-height: 200px;
}

.articleRayonPrixproduitDesciptionSupermaket
{
    font-size: 22px;
    color: RED;
}

.descriptionArticleRayonDesciptionSupermaket
{
    font-size: 20px;
    font-weight: bold;
}
</style>


<script type="text/javascript">
//AJOUTER UN ELEMENT SUPERMARCHE
$(document).ready(function() {
    $('.ajouterPanierArticleRay').click(function() {
     var usersupermarche = $(this).data('id');
                    $.ajax({
                        url: 'ajouterPanier.php',
                        type: 'post',
                        data: {usersupermarche: usersupermarche},
                        success: function(response){ 
                            $('.panier-body').html(response);
                        }
                    });
});
});
</script>