<?php
include 'entete.php';
?>
<div class="typeDeProduit">
<?php 
	include 'typeDeProduit.php';
?>
</div> 
	<div class="entetePostePublication" style="margin-left: 10px;margin-right: 10px; color: rgb(56,146,199);">
		Nos Agriculteurs <span>></span>
	</div>

	<div class="grandesEntrepriseFiofood">
	 	<div class="grandesConteneurFlex">
		<?php 
      $agr = $bdd->query('SELECT * FROM fiofood WHERE profession = \'Agriculteurs\' LIMIT 0,2');
      $agr->execute();
      $i = 0;
      while ($agrDonn = $agr->fetch()) {
      	//AND $agrDonn['id_fiofood'] != isset($_SESSION['id'])
      	if ($i != $agrDonn['id']) {    
      	    $i = $agrDonn['id'];  		
      		?>  
<a href="compteUtilisateurDemanderClient.php?compteUtilisateurDemander=<?php echo(simple_encrypt($agrDonn['id']));?>" style="text-decoration: none;color: black;">  	
	<div class="idAgriculteur">
			 <div class="itemsCouverture">
			 	<img src="photoProfilCouverture/<?php if($agrDonn['couvertureCompte'] != ''){echo($agrDonn['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
			 </div>
	   	   <div class="iconProfile">
	   	   	 <div class="imageProfil">
	   	   	 	<img src="photoProfilCouverture/<?php if($agrDonn['photo']!=''){echo($agrDonn['photo']);}else{ echo("iconDefault.png");} ?>">
	   	   	 	<?php 
             if ($agrDonn['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;bottom: 84px;
        left: 75px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
	   	   	 </div>
	   	   </div>
	   	   <div class="nomUtilisateurDescriptionconteneur">
	   	   <div class="nomUtilisateur"> 
	   	   	<?php 
	   	   	   echo $agrDonn['nom'].' '.$agrDonn['prenom'];
	   	   	 ?>
	   	   </div>
	   	   <div class="descriptionUtilisateur">
	   	   	   	<?php 				  
				 if (strlen(strtolower($agrDonn['descriptionProfil']))>=40) {
         	echo(substr(mb_strtolower($agrDonn['descriptionProfil'],'UTF-8'), 0,40).''.'...');
         }
         else{
				   echo($agrDonn['descriptionProfil']);
         }
				 ?>	
	   	   </div>
	   	</div>
	</div>
  </a> 
     <?php
      }
     else{?>
         <div>
         </div>
   <?php }
 }?>
	</div>
	</div>

<div class="conteneurPrincipaleAvantFlex">
	<div class="conteneurFlex">
		<?php 
      $agr = $bdd->query('SELECT * FROM fiofood WHERE profession = \'Agriculteurs\' LIMIT 0,6');
      $agr->execute();
      $i = 0;
      while ($agrDonn = $agr->fetch()) {
      	//AND $agrDonn['id_fiofood'] != isset($_SESSION['id'])
      	if ($i != $agrDonn['id']) {    
      	    $i = $agrDonn['id'];  		
      		?>  
<a href="compteUtilisateurDemanderClient.php?compteUtilisateurDemander=<?php echo(simple_encrypt($agrDonn['id']));?>" style="text-decoration: none;color: black;">  	
	<div class="idAgriculteur">
			 <div class="itemsCouverture">
			 	<img src="photoProfilCouverture/<?php if($agrDonn['couvertureCompte'] != ''){echo($agrDonn['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
			 </div>
	   	   <div class="iconProfile">
	   	   	 <div class="imageProfil">
	   	   	 	<img src="photoProfilCouverture/<?php if($agrDonn['photo']!=''){echo($agrDonn['photo']);}else{ echo("iconDefault.png");} ?>">
	   	   	 	<?php 
             if ($agrDonn['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;bottom: 84px;
        left: 75px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
	   	   	 </div>
	   	   </div>
	   	   <div class="nomUtilisateurDescriptionconteneur" >
	   	   <div class="nomUtilisateur"> 
	   	   	<?php 
	   	   	   echo $agrDonn['nom'].' '.$agrDonn['prenom'];
	   	   	 ?>
	   	   </div>
	   	   <div class="descriptionUtilisateur">
	   	   	   <?php 				  
				 if (strlen(strtolower($agrDonn['descriptionProfil']))>=40) {
         	echo(substr(mb_strtolower($agrDonn['descriptionProfil'],'UTF-8'), 0,40).''.'...');
         }
         else{
				   echo($agrDonn['descriptionProfil']);
         }
				 ?>	
	   	   </div>
	   	</div>
	</div>
  </a> 
     <?php
      }
     else{?>
         <div>
         </div>
   <?php }
 }?>
	</div>

	<div class="conteneurFlex">
		<?php 
      $agr = $bdd->query('SELECT * FROM fiofood WHERE profession = \'Agriculteurs\' ORDER BY id desc LIMIT 0,6');
      $agr->execute();
      $i = 0;
      while ($agrDonn = $agr->fetch()) {
      	//AND $agrDonn['id_fiofood'] != isset($_SESSION['id'])
      	if ($i != $agrDonn['id']) {    
      	    $i = $agrDonn['id'];  		
      		?>  
<a href="compteUtilisateurDemanderClient.php?compteUtilisateurDemander=<?php echo(simple_encrypt($agrDonn['id']));?>" style="text-decoration: none;color: black;">  	
<div class="conteneurAgriculteur">
	<div class="idAgriculteur">
		<div class="couverture">
			 <div class="itemsCouverture">
			 	<img src="photoProfilCouverture/<?php if($agrDonn['couvertureCompte'] != ''){echo($agrDonn['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
			 </div>
		</div>
	   	   <div class="iconProfile">
	   	   	 <div class="imageProfil">
	   	   	 	<img src="photoProfilCouverture/<?php if($agrDonn['photo']!=''){echo($agrDonn['photo']);}else{ echo("iconDefault.png");} ?>">
	   	   	 	<?php 
             if ($agrDonn['vendeurpro'] !=0) { ?>
                <i class="fas fa-check-circle" style="color:seagreen;position: absolute;bottom: 84px;
        left: 75px;z-index: 9; font-size: 22px;"></i>
            <?php }?>
	   	   	 </div>
	   	   </div>
	   	   <div class="nomUtilisateurDescriptionconteneur">
	   	   <div class="nomUtilisateur"> 
	   	   	<?php 
	   	   	   echo $agrDonn['nom'].' '.$agrDonn['prenom'];
	   	   	 ?>
	   	   </div>
	   	   <div class="descriptionUtilisateur">
	   	   	 <?php 				  
				 if (strlen(strtolower($agrDonn['descriptionProfil']))>=40) {
         	echo(substr(mb_strtolower($agrDonn['descriptionProfil'],'UTF-8'), 0,40).''.'...');
         }
         else{
				   echo($agrDonn['descriptionProfil']);
         }
				 ?>		
	   	   </div>
	   	</div>
	</div>
  </div>
  </a> 
     <?php
      }
     else{?>
         <div>
         </div>
   <?php }
 }?>
	</div>
</div>

<?php
include 'footer.php';
?>