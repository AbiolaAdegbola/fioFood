<div class="postesConteneur">
	<div class="postesConteneurDisplay">
  <?php 
     $villeChoixFiltreFiofoodSelect = htmlspecialchars($_POST['villeChoixFiltreFiofoodSelect']);
     $marcheChoixFiltreFiofoodSelect = htmlspecialchars($_POST['marcheChoixFiltreFiofoodSelect']);
     $categorieChoixFiltreFiofoodSelect = htmlspecialchars($_POST['categorieChoixFiltreFiofoodSelect']);
     $prixminFiltre = htmlspecialchars($_POST['prixminFiltre']);
     $prixmaxFiltre = htmlspecialchars($_POST['prixmaxFiltre']);
     $recuperation1 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie and localisationannonce=:localisationannonce LIMIT 0,3');
     $recuperation1->bindParam(':categorie',$categorieChoixFiltreFiofoodSelect);
     $recuperation1->bindParam(':localisationannonce',$villeChoixFiltreFiofoodSelect);
     $recuperation1->execute();

    while ($donneRecu1 = $recuperation1->fetch()) {

    $compamin = $donneRecu1['prixannonce'];
    $compamax = $donneRecu1['prixmax'];
    	if (($prixminFiltre>=$compamin and $prixminFiltre<=$prixmaxFiltre) or ($prixmaxFiltre>=$compamin and $prixmaxFiltre<=$compamax))
    		//PAS EFFICACE A 100% A CORRIGER
    		//PAS EFFICACE A 100% A CORRIGER
    		//PAS EFFICACE A 100% A CORRIGER
    	 {	
     ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu1['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu1['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(strtolower($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min <?php echo("1 - ".$donneRecu1['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu1['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu1['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(strtolower($donneRecu1['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu1['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu1['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu1['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(strtolower($donneRecu1['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo1 = $bdd->prepare('SELECT vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo1->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo1->execute();
			    	 $recDon1 = $recInfo1->fetch();
			    	 if ($recDon1['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu1['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php 
    }
 } ?>
   </div>

	<div class="postesConteneurDisplay">
  <?php 
     $villeChoixFiltreFiofoodSelect = htmlspecialchars($_POST['villeChoixFiltreFiofoodSelect']);
     $marcheChoixFiltreFiofoodSelect = htmlspecialchars($_POST['marcheChoixFiltreFiofoodSelect']);
     $categorieChoixFiltreFiofoodSelect = htmlspecialchars($_POST['categorieChoixFiltreFiofoodSelect']);
     $prixminFiltre = htmlspecialchars($_POST['prixminFiltre']);
     $prixmaxFiltre = htmlspecialchars($_POST['prixmaxFiltre']);
     $recuperation1 = $bdd->prepare('SELECT * FROM fiofoodannoceuranonyme WHERE categorie=:categorie and localisationannonce=:localisationannonce LIMIT 3,3');
     $recuperation1->bindParam(':categorie',$categorieChoixFiltreFiofoodSelect);
     $recuperation1->bindParam(':localisationannonce',$villeChoixFiltreFiofoodSelect);
     $recuperation1->execute();

    while ($donneRecu1 = $recuperation1->fetch()) {

    $compamin = $donneRecu1['prixannonce'];
    $compamax = $donneRecu1['prixmax'];
    	if (($prixminFiltre>=$compamin and $prixminFiltre<=$prixmaxFiltre) or ($prixmaxFiltre>=$compamin and $prixmaxFiltre<=$compamax))
    		//PAS EFFICACE A 100% A CORRIGER
    		//PAS EFFICACE A 100% A CORRIGER
    		//PAS EFFICACE A 100% A CORRIGER
    	 {	
     ?> 
  	<section class="postes">
      <a href="pageDemanderClient.php?id=<?php echo simple_encrypt($donneRecu1['id']); ?>&amp;categorie=<?php echo simple_encrypt($donneRecu1['categorie']); ?>">
		<div class="imagePoste">
			<img src="<?php echo 'image/'.$donneRecu1['img1'];?>">
		</div>
		<div class="descriptionsPoste">
			<div class="detailsPoste" align="center">
				<?php 
				   if (strlen(strtolower($donneRecu1['titreannonce']))>=11) {
         	echo(substr(mb_strtolower($donneRecu1['titreannonce'],'UTF-8'), 0,11).''.'...');
         }
         else{
				   echo(strtolower($donneRecu1['titreannonce']));
         }
				 ?>							
			</div>
			<div class="descriptionsPostePrixLocation">
			<div class="quantiteMinMax">
				<div class="quantiteMin">
					<div>
						Min <?php echo("1 - ".$donneRecu1['minquantite']); ?>
						</div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu1['prixannonce']))>=8) {
         	echo(substr(mb_strtolower($donneRecu1['prixannonce'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(strtolower($donneRecu1['prixannonce'])." cfa");
         }
				 ?>								
						</div>					
				</div>
				<div class="quantiteMax">
					<div>Max > <?php echo($donneRecu1['maxquantite']); ?></div>
					<div class="quantiteMinMaxPrix">
				<?php 
				   if (strlen(strtolower($donneRecu1['prixmax']))>=8) {
         	echo(substr(mb_strtolower($donneRecu1['prixmax'],'UTF-8'), 0,8).''.'...');
         }
         else{
				   echo(strtolower($donneRecu1['prixmax']." cfa"));
         }
				 ?>	
						</div>	
				</div>
			</div>
			</div>
		</div>
           </a>
		<div class="contactPoste">
			    <div class="contactPosteVendeurProf">
			    	<?php 
			    	 $recInfo1 = $bdd->prepare('SELECT vendeurpro FROM fiofood WHERE id=:id_fio');
			    	 $recInfo1->bindParam(':id_fio',$donneRecu1['id_fiofood']);
			    	 $recInfo1->execute();
			    	 $recDon1 = $recInfo1->fetch();
			    	 if ($recDon1['vendeurpro']!=0) {
			    	?>
			    	<img src="icon/vendeurPro.png">
			    	<?php }
			    	?>
			    </div>
					<div class="contactPosteBoutonContact" data-id="<?php echo ($donneRecu1['id']); ?>">
						<img src="icon/iconContact.png">
					</div>
	  </div>
	  <div class="ajouterPanier">
           	<div data-id="<?php echo ($donneRecu1['id']); ?>" class="ajouterPanierImage" id="ajouterPanierImageid" >
           		<img src="icon/ajouterPanier.png" >       		
           	</div>  	
	  </div>
	</section>
    <?php 
    }
 } ?>
   </div>
    
 </div>