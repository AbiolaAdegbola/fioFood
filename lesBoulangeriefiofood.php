<?php
include 'barreDeRecherche.php';
?>
<div class="typeDeProduit" style="margin-top:36px">
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
<?php 
	include 'typeDeProduit.php';
?>
</div>

<div class="conteneur1Displays">
	<?php 
  	 $profession = 'Boulangerie';
     $recuperation2 = $bdd->prepare('SELECT * FROM fiofood WHERE profession=:profession');
     $recuperation2->bindParam(':profession',$profession);
     $recuperation2->execute();
     while ($donneRecu2 = $recuperation2->fetch()) {
     ?> 
	<div class="conteneur1">
  	<section class="postes conteneur1Postes">   
   
		<div class="imagePosteCollection conteneur1Image" style="position: relative;">  
			<a href="boulangeriefioFood.php?id=<?php echo simple_encrypt($donneRecu2['id']);?>">
			<img src="<?php echo 'photoProfilCouverture/'.$donneRecu2['couvertureCompte'];?>">
			<div class="titrePanierSpecial conteneur1Description">
     	       <?php echo($donneRecu2['nom']." ".$donneRecu2['prenom']); ?>
      </div>	
      </a>
		</div>

        <div class="compteCompteSupermarche">
            <img src="<?php echo 'photoProfilCouverture/'.$donneRecu2['photo'];?>">
            <?php 
             if ($donneRecu2['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;bottom: 4px;
        left: 98px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
        </div>
            <div class="localisationCompteSupermarche" style="position:absolute;bottom: 0;right: 2px;color:white;">
           <div class="">
            <img src="icon/placeholder.png" width="30px"><?php echo($donneRecu2['paysmarche']." - ".$donneRecu2['localisationProfil']); ?>
          </div>
          </div>
    		<?php 
       if ($donneRecu2['vendeurpro'] !=0) { ?>
       <img src="icon/topannonce.PNG" style="position:absolute; bottom: 22px;right: 2px;width: 30px;">
      <?php }?>
   </section>
  </div>

    <?php   } ?>
</div>


<?php 
include 'footer.php';
?>