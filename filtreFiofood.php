<div class="modal fade" id="choixCategoriedialogue" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
            <button class="close" data-dismiss="modal">fermer</button>
         </div>
			<div class="" style="padding: 20px;">
		<form method="POST" action="categorieChoisir.php">       
			 <div class="conteneurGeneralFiltreFiofood" id="descriptionPostesConteneur" style="color: black;">
			 	<!-- code css dans FairePosteCreerCompte.css -->
			 	<header>Selectionnez les filtres</header>
			 	<div class="villeChoixFiltreFiofood">
			 		<div>
			 			Ville*
			 		</div>
			 		<select class="zoneInformation" name="villeChoixFiltreFiofoodSelect">			 		
			 		<?php 
                      $elementmarche = $bdd->query('SELECT localisationProfil FROM fiofood');
                      $elementmarche->execute();
                      $tab=array();
                      while($elementmarcheInfo = $elementmarche->fetch())
                      {
                         if (!empty($elementmarcheInfo['localisationProfil']) and strlen($elementmarcheInfo['localisationProfil'])>=2) {
                            array_push($tab, $elementmarcheInfo['localisationProfil']); 
                          }                        
                      }
                      $tabUnique = array_unique($tab);
                      foreach ($tabUnique as $elementmarcheInfo) 
                      { ?>
 	                  <option><?php echo($elementmarcheInfo); ?></option>        
                    <?php }?>
                    </select>
			 	</div><br>
			 	<div class="marcheChoixFiltreFiofood">
			 		<div>
			 			Nom du marché
			 		</div>
			 		<select class="zoneInformation" name="marcheChoixFiltreFiofoodSelect">
			 		<?php 
                      $elementmarche = $bdd->query('SELECT nommarche FROM fiofood');
                      $elementmarche->execute();
                      $tab = array();
                      while($elementmarcheInfo = $elementmarche->fetch())
                      {
    				   if (!empty($elementmarcheInfo['nommarche']) and strlen($elementmarcheInfo['nommarche'])>=2) {
    					  array_push($tab,$elementmarcheInfo['nommarche']);
    					}
                      }
                      $tabUnique = array_unique($tab);
                      foreach ($tabUnique as $elementmarcheInfo) { 
                  
                    ?>
 	                  <option><?php echo($elementmarcheInfo); ?></option>     
                    <?php }?>	
			 		</select>
			 	</div><br>
			 	<div class="categorieChoixFiltreFiofood">			 	
			 		<div>
			 			Categorie*
			 		</div>			 		
			 		<select class="zoneInformation" name="categorieChoixFiltreFiofoodSelect">
			 		<?php 
			 		$categ = $bdd->query('SELECT categorie FROM fiofoodannoceuranonyme');
			 		$categ->execute();
			 		$tab = array();
                      while($elementmarcheInfo = $categ->fetch())
                      {
    				   if (!empty($elementmarcheInfo['categorie']) and strlen($elementmarcheInfo['categorie'])>=2) {
    					  array_push($tab,$elementmarcheInfo['categorie']);
    					}
                      }
                      $tabUnique = array_unique($tab);
                      foreach ($tabUnique as $elementmarcheInfo) {
			 			?>
			 			<option><?php echo($elementmarcheInfo); ?></option>
			 		<?php }?>
			 		</select>
			 	</div><br>
			 	<div class="prixProduitChoixFiltreFiofood" style="display:flex;">
			 		<div class="prixProduitChoixFiltreFiofoodAvantDisplay">
			 		<div>
			 			Prix min
			 		</div>
			 		<input type="number" class="zoneInformation" name="prixminFiltre">
			 		</div>
			 		<div class="prixProduitChoixFiltreFiofoodAvantDisplay">
			 		<div>
			 			Prix max
			 		</div>
			 		<input type="number" name="prixmaxFiltre" class="zoneInformation">	
			 		</div>
			 	</div><br>
                <input type="submit" style="visibility: hidden;" id="filtreAnnonceEnvoye" name="filtreAnnonceEnvoyer">
  	              <label for="filtreAnnonceEnvoye"id="publierAnnonce" style="cursor: pointer;">
  		              Valider le filtre
  	              </label>
			 </div>
        </form>			
			</div>
		</div>
	</div>
</div>