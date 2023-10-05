<div>
	<?php 
   include 'connexionBaseDonnee.php';
         $descrption = htmlspecialchars($_POST['descrption']);
	     $recu = $bdd->prepare('SELECT panierclient,prixelement,quantite FROM panier WHERE id=?');  
	     $recu->execute(array($descrption));	     
	     $donnee = $recu->fetch();

     $panier = unserialize($donnee['panierclient']);
     $quantite = unserialize($donnee['quantite']);
     $prixelement = unserialize($donnee['prixelement']);
     	foreach ($panier as $key => $value) {
			    		
   		$recCommande = $bdd->prepare('SELECT img1,titreannonce FROM fiofoodannoceuranonyme WHERE id=:idcommande');
   		$recCommande->bindParam(':idcommande',$value);
   		$recCommande->execute();
   		while ($produitSelectInfo = $recCommande->fetch()) {
   			?>
	     	   <div class="conteneurPanier">
      <div class="panierImage">
         <img src="image/<?php echo ($produitSelectInfo['img1']); ?>">
      </div>
      <div class="titrePanier">
         <?php echo($produitSelectInfo['titreannonce']); ?>
      </div>
      <div class="prixProduitPanier">
         <div class="quantiteMinMax">
            <div class="quantiteMin">
               <div class="quantiteMinMaxPrix">
  				<?php 
  					echo($prixelement[$key]);
  				?>
                 <div style="margin-left: 20px;">
                  <?php 

  					echo($quantite[$key]."x".$prixelement[$key]." => ".$quantite[$key]*$prixelement[$key]);
                  	
                  ?>
                 </div>                  
               </div>               
            </div>
        </div>
    </div>
   </div>
<?php }} ?>
</div>