<div class="conteneur12">
<div class="conteneur1Special">
  	<section id="supermarche" class="postes conteneur1Postes owl-carousel">   
	<?php 
  	 $profession = 'supermarket';
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE profession=:profession');
     $recuperation2->bindParam(':profession',$profession);
     $recuperation2->execute();
     while ($donneRecu2 = $recuperation2->fetch()) {
     ?>    
		<div class="imagePosteCollection conteneur1Image">  
			<a href="supermarchefioFood.php?id=<?php echo simple_encrypt($donneRecu2['id']);?>">
			<img src="<?php echo 'photoProfilCouverture/'.$donneRecu2['couvertureCompte'];?>">
			<div class="titrePanierSpecial conteneur1Description">
     	<?php echo($donneRecu2['nom']." ".$donneRecu2['prenom']); ?>
      </div>	
      </a>
      <div class="compteCompteSupermarche">
            <img src="<?php echo 'photoProfilCouverture/'.$donneRecu2['photo'];?>" style="min-height: 100px;max-height: 100px;left: 10px;">
            <?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;bottom: 4px;
        left: 75px;z-index: 9; font-size: 22px;"></i>
            <?php }?>   
        </div>
            <div class="localisationCompteSupermarche" style="position:absolute;bottom: 0;right: 2px;color:white;">
        
            <img src="icon/placeholder.png" style="min-height: 30px;max-height: 30px; min-width: 30px;max-width: 30px"><?php echo($donneRecu2['paysmarche']." - ".$donneRecu2['localisationProfil']); ?>        
    </div>
		</div>
    <?php   } ?>
  </section>
</div>
	<div class="entetePostePublication" style="margin-top: 30px; position: relative;">
		<a href="lesBoulangeriefioFood.php">Vos boulangerie <img src="icon/plusfiofood.png" width="30"></a>
        <?php 
            if (!isset($_SESSION['id'])) {
                ?>
                <div class="conteneurSuivrePanier">
                    <a href="panierClientPage.php" target="_bank" style="color: white;">suivre mes achats</a>
                </div>
                <?php 
            }
            else
            {
            }
        ?>
	</div>
<div class="conteneur1Special" style="margin-bottom: 10px;">
  	<section id="boulangerie" class="postes conteneur1Postes owl-carousel">   
	<?php 
  	 $profession = 'Boulangerie';
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE profession=:profession');
     $recuperation2->bindParam(':profession',$profession);
     $recuperation2->execute();
     while ($donneRecu2 = $recuperation2->fetch()) {
     ?>    
		<div class="imagePosteCollection conteneur1Image" style="position: relative;">  
			<a href="boulangeriefioFood.php?id=<?php echo simple_encrypt($donneRecu2['id']);?>">
			<img src="<?php echo 'photoProfilCouverture/'.$donneRecu2['couvertureCompte'];?>">
			<div class="titrePanierSpecial conteneur1Description">
     	<?php echo($donneRecu2['nom']." ".$donneRecu2['prenom']); ?>
      </div>	
      </a>
      <div class="compteCompteSupermarche">
            <img src="<?php echo 'photoProfilCouverture/'.$donneRecu2['photo'];?>" style="min-height: 100px;max-height: 100px;left: 10px;">
            <?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;bottom: 4px;
        left: 75px;z-index: 9; font-size: 22px;"></i>
            <?php }?>   
        </div>
       <div class="localisationCompteSupermarche" style="position:absolute;bottom: 0;right: 2px;color:white;">
        
            <img src="icon/placeholder.png" style="min-height: 30px;max-height: 30px; min-width: 30px;max-width: 30px"><?php echo($donneRecu2['paysmarche']." - ".$donneRecu2['localisationProfil']); ?>
        
    </div>
		</div>

    <?php   } ?>
  </section>
</div>

<div class="conteneur2">
  	<section class="postes conteneur2Postes">
      <a href="pageDemanderClientCollectionspecial.php">
		<div class="imagePosteCollection">
			<img src="image/panierfruit1.jpg">
		</div>
		<div class="titrePanierSpecial">
			Panier Spécial fioFood >
		</div>
           </a>
	</section>

  	<section class="postes conteneur2Postes">
      <a href="recettesfiofoodafricaines.php">
		<div class="imagePosteCollection">
			<img src="recettesfiofood/recettesfiofoodafricaines.jpg">
		</div>
    <div class="titrePanierSpecial">
      Recettes Africaines fioFood 😋😍🙏 
    </div>
           </a>
	</section>
</div>
</div>

<style type="text/css">
@media (min-width: 1200px)
{
.conteneur1Special
{
    margin-left: 13%;
    margin-right: 13%;
}

}

}
</style>