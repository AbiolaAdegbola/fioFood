<?php
include 'barreDeRecherche.php';
?>
<div style="width: 100%;margin-top: 40px;margin-bottom: 20px;">
<?php 
	include 'typeDeProduit.php';
?>
</div>

<div class="conteneurPrincipaleResultatRechercheFiofood">
	<?php 
	     if (isset($_POST['rechercherFiofood'])) {
	     	$search = htmlspecialchars(rtrim($_POST['search']));
	     	$rechercher = $bdd->prepare("SELECT * FROM fiofoodannoceuranonyme WHERE titreannonce LIKE '%$search%' OR categorie LIKE '%$search%' OR descriptionannonce LIKE '%$search%'");
	     	$rechercher->execute();?>

	     	<ul class="conteneurResultatRechercheFiofoodUL">
	     		<header>Résultat sur <span><?php echo($search); ?></span></header>
	     <?php while ($rechercherInfo = $rechercher->fetch()) {	     
	     	?>
	     		<li>
	     		 <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($rechercherInfo['id']); ?>&amp;categorie=<?php echo simple_encrypt($rechercherInfo['categorie']); ?>">
	     			<div class="conteneurResultatRechercheFiofood">
	     				<div class="resultatRechercheFiofoodImage">
	     					<img src="image/<?php echo($rechercherInfo['img1']); ?>">
	     				</div>
	     			  <div class="resultatRechercheFiofoodDescriptionArticule">
	     			  	    <div align="center" style="font-size: 16px;">
	     			  			 			<?php echo($rechercherInfo['titreannonce']) ?>
	     			  			 </div>
	     			  		<div class="resultatRechercheFiofoodPrixAnnonce">
				             <div class="quantiteMaxRecherche">
					             <div class="quantiteMaxRechercheDiv">
						             Min <?php echo("1 - ".$rechercherInfo['minquantite']); ?>
						             </div>
					             <div class="quantiteMinMaxPrix" style="margin-left: 15px;">
				             <?php 
				                if (strlen(strtolower($rechercherInfo['prixannonce']))>=8) {
                      	echo(substr(mb_strtolower($rechercherInfo['prixannonce'],'UTF-8'), 0,8).''.'...');
                      }
                      else{
				                echo(strtolower($rechercherInfo['prixannonce'])." cfa");
                      }
				              ?>								
					             	</div>					
				             </div>
						          <div class="quantiteMaxRecherche">
					               <div class="quantiteMaxRechercheDiv">Max > <?php echo($rechercherInfo['maxquantite']); ?></div>
					                <div class="quantiteMinMaxPrix" style="margin-left: 15px;">
				                   <?php 
				                     if (strlen(strtolower($rechercherInfo['prixmax']))>=8) {
                   	            echo(substr(mb_strtolower($rechercherInfo['prixmax'],'UTF-8'), 0,8).''.'...');
                                }
                                else{
				                        echo(strtolower($rechercherInfo['prixmax']." cfa"));
                                }
				                        ?>	
						                </div>	
				                </div>
             
	     				    </div>
	     				    <div class="resultatRechercheFiofoodLocalisationannonce">
	     					    <i class="fa fa-map-marker" aria-hidden="true"></i><?php echo(" ".$rechercherInfo['localisationannonce']); ?>
	     				    </div>
	     				    <div class="resultatRechercheFiofoodDescription">
		                	<header>Détails du produit</header>
		 	                <?php echo(substr(mb_strtolower($rechercherInfo['descriptionannonce'],'UTF-8'), 0,80));?>
		 	            </div>
	     			  </div>
	     			</div>
	     		 </a>
			    <div class="contactPosteVendeurProfRecherche">
			    	<?php 
			    	 $recInfo2 = $bdd->prepare('SELECT vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo2->bindParam(':id_fio',$rechercherInfo['id_fiofood']);
			    	 $recInfo2->execute();
			    	 $recDon2 = $recInfo2->fetch();
			    	 if ($recDon2['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContactSansModification" data-id="<?php echo ($rechercherInfo['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
		 	      <div class="panierRecherche">
		 	       <div data-id="<?php echo ($rechercherInfo['id']); ?>" class="ajouterPanierImageSansModification">
		 	        <img src="icon/ajouterPanier.png" >
		 	       </div>
		 	      </div>
	     		</li>

	     	<?php }	?>
	       </ul>
	   <?php }
	     else
	     { ?>
	     	AUCUNS RESULTAT
	    <?php }
	 ?>
</div>

<?php 
  include 'footer.php';
?>