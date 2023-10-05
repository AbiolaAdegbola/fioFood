<?php 
	include 'barreDeRecherche.php';
?>

<div class="administrateurFiofood" style="margin-top: 40px;">
	<div class="administrateurFiofoodConnecter" align="center">
		<?php 
			if (isset($_SESSION['id'])) {
			$admin = htmlspecialchars($_SESSION['id']);
			$adminConnecter = $bdd->prepare('SELECT adminfiofood FROM fiofood WHERE id=:admin');
			$adminConnecter->bindParam(':admin', $admin);
			$adminConnecter->execute();

			$adminConnecterInfo = $adminConnecter->fetch();

			if ($adminConnecterInfo['adminfiofood'] =="1") {				
			?>
			<section class="administrateurFiofoodConnecterTableauBordStatiques">
				<header>
					Tous les panier fioFood
				</header>
				<div class="administrateurFiofoodConnecterTableauBordStatiquesTous">
					<div class="administrateurFiofoodConnecterTableauBordStatiquesTousAvantFlex">
						<div class="administrateurFiofoodConnecterTableauBordNombre">
							<?php 

								$nombreAll = 0;
								$nombreLivrer =0;
								$nombreNonLivrer=0;

								$allpanier = $bdd->query('SELECT id,livrer FROM panier WHERE nompanier="" and prixpromo=""');
								while ($allpanierInfo = $allpanier->fetch()) {
									if($allpanierInfo['livrer'] == 1){
										$nombreLivrer++;
									}
									elseif ($allpanierInfo['livrer'] ==0) {
										$nombreNonLivrer++;
									}

								$nombreAll++;
									
								}
								echo($nombreAll);
							?>
						</div>
						<div class="administrateurFiofoodConnecterTableauBordNom">
							All
						</div>
					</div>
					<div class="administrateurFiofoodConnecterTableauBordStatiquesTousAvantFlex">
						<div class="administrateurFiofoodConnecterTableauBordNombre">
							<?php echo($nombreNonLivrer); ?>
						</div>
						<div class="administrateurFiofoodConnecterTableauBordNom">
							Non livrer
						</div>
					</div>
					<div class="administrateurFiofoodConnecterTableauBordStatiquesTousAvantFlex">
						<div class="administrateurFiofoodConnecterTableauBordNombre">
							<?php echo($nombreLivrer); ?>
						</div>
						<div class="administrateurFiofoodConnecterTableauBordNom">
							livrer
						</div>
					</div>
				</div>
					<div class="administrateurFiofoodConnecterTableauBord">
							<a href="administrateurCommandeFiofood.php" target="_bank">Panier fioFood</a>
					</div>
				
			</section>



			<section class="administrateurFiofoodConnecterTableauBordStatiques">
				<header>
					Attribuer à un panier un livreur
				</header>
				<div class="administrateurFiofoodConnecterTableauBordStatiquesTous">
					<div class="administrateurFiofoodConnecterTableauBordStatiquesTousAvantFlex">
						<div class="administrateurFiofoodConnecterTableauBordNombre">
							<?php 

								$nombreAll = 0;
								$nombrePanierAvecLivreur =0;
								$nombrePanierSansLivreur =0;

								$allpanier = $bdd->query('SELECT idlivreurcommande,livrer FROM panier WHERE nompanier="" and prixpromo="" and livrer="0"');
								while ($allpanierInfo = $allpanier->fetch()) {
									if($allpanierInfo['idlivreurcommande'] != ' '){
										$nombrePanierAvecLivreur++;
									}
									elseif ($allpanierInfo['idlivreurcommande'] == ' ') {
										$nombrePanierSansLivreur++;
									}

								$nombreAll++;
									
								}
								echo($nombreAll);
							?>
						</div>
						<div class="administrateurFiofoodConnecterTableauBordNom">
							All
						</div>
					</div>
					<div class="administrateurFiofoodConnecterTableauBordStatiquesTousAvantFlex">
						<div class="administrateurFiofoodConnecterTableauBordNombre">
							<?php echo($nombrePanierSansLivreur); ?>
						</div>
						<div class="administrateurFiofoodConnecterTableauBordNom">
							Sans livreur
						</div>
					</div>
					<div class="administrateurFiofoodConnecterTableauBordStatiquesTousAvantFlex">
						<div class="administrateurFiofoodConnecterTableauBordNombre">
							<?php echo($nombrePanierAvecLivreur); ?>
						</div>
						<div class="administrateurFiofoodConnecterTableauBordNom">
							Avec livreur
						</div>
					</div>
				</div>
					<div class="administrateurFiofoodConnecterTableauBord">
							<a href="administrateurGestionPanier.php" target="_bank">Gestion des panier</a>
					</div>
			</section>



			<section class="administrateurFiofoodConnecterTableauBordStatiques">
				<header>
					Gestion des comptes
				</header>
				<div class="administrateurFiofoodConnecterTableauBordStatiquesTous">
					<div class="administrateurFiofoodConnecterTableauBordStatiquesTousAvantFlex">
						<div class="administrateurFiofoodConnecterTableauBordNombre">
							<?php 

								$nombreAll = 0;
								$nombreCompteCertifier =0;
								$nombreCompteNonCertifier =0;

								$allpanier = $bdd->query('SELECT vendeurpro FROM fiofood');
								while ($allpanierInfo = $allpanier->fetch()) {
									if($allpanierInfo['vendeurpro'] == 1){
										$nombreCompteCertifier++;
									}
									elseif ($allpanierInfo['vendeurpro'] == 0) {
										$nombreCompteNonCertifier++;
									}

								$nombreAll++;
									
								}
								echo($nombreAll);
							?>
						</div>
						<div class="administrateurFiofoodConnecterTableauBordNom">
							All
						</div>
					</div>
					<div class="administrateurFiofoodConnecterTableauBordStatiquesTousAvantFlex">
						<div class="administrateurFiofoodConnecterTableauBordNombre">
							<?php echo($nombreCompteNonCertifier); ?>
						</div>
						<div class="administrateurFiofoodConnecterTableauBordNom">
							Non certifié
						</div>
					</div>
					<div class="administrateurFiofoodConnecterTableauBordStatiquesTousAvantFlex">
						<div class="administrateurFiofoodConnecterTableauBordNombre">
							<?php echo($nombreCompteCertifier); ?>
						</div>
						<div class="administrateurFiofoodConnecterTableauBordNom">
							Certifié
						</div>
					</div>
				</div>
					<div class="administrateurFiofoodConnecterTableauBord">
							<a href="administrateurGestionUser.php" target="_bank">Gestion des compte</a>
					</div>
			</section>
		
<?php }
		else{
			echo "<script>window.location.href='index.php';</script>";
		}
	}else{
		?>

<?php     
 if (!isset($_SESSION['id'])) {
     $messageInfo = '';
     if (isset($_POST['connexionUtilisateur']) && !empty($_POST['emailUtilisateur'])&& !empty($_POST['mdpUtilisateur'])) {

     	 $emailUtilisateur = htmlspecialchars(rtrim($_POST['emailUtilisateur']));
     	 $mdpUtilisateur = sha1($_POST['mdpUtilisateur']);
       
       //VERIFICATION SI LA PERSONNE A UN COMPTE EXISTANT
       $verificationCompte = $bdd->prepare('SELECT numero,email,mdp FROM fiofood');
       $verificationCompte->execute();
      while ( $verificationCompteInfo = $verificationCompte->fetch() ) {
         if ((rtrim($verificationCompteInfo['email']) == $emailUtilisateur) || (rtrim($verificationCompteInfo['numero']) == $emailUtilisateur)) {
         if ($verificationCompteInfo['mdp'] == $mdpUtilisateur) {
              $compte = $bdd->prepare('SELECT id FROM fiofood WHERE email=:email OR numero=:numero AND mdp=:mdp');
              $compte->bindParam(':email',$emailUtilisateur);
              $compte->bindParam(':numero',$emailUtilisateur);
              $compte->bindParam(':mdp',$mdpUtilisateur);
              $compte->execute();
             while ($compteExiste = $compte->fetch()) {
             $_SESSION['id']=$compteExiste['id'];
             //header('Location: http://localhost/fioFood/compte.php');
             echo "<script>window.location.href='administrateurFiofood.php';</script>";
             } 
            }
            else{
              $messageInfo = 'Mot de passe incorrecte';
            }
          }
          else{

            $messageInfo = 'E-mail ou numéro de téléphone n\'existe pas';
          }
      }?>

      <div class="connexionPageConteneurPrincipale">
  <header>Bienvenu sur la page de connexion</header>  
  <div class="connexionPageConteneur">
    <img src="icon/nameFioFood.png">
    <form method="post" action="" class="formConnexionPage">
    <div class="inputEmailTelephoneConnexionPage">
      <label for="emailUti">E-mail ou numéro de téléphone :</label><br>
        <input type="text" name="emailUtilisateur" id="emailUti" required>
      </div>
      <div class="inputEmailTelephoneConnexionPage">
        <label for="mdput">Mot de passe :</label><br>
         <input type="password" name="mdpUtilisateur" id="mdput" required>
      </div>
      <input type="submit" value="connexion" name="connexionUtilisateur" class="submitConnexionPage">
  </form>
  </div>

  <!-- MESSAGE D'ERREUR -->
  <div>
    <?php if ($messageInfo != '') {?>
    <div style="background-color: red;font-size: 44px; text-align: center;">
      <?php echo($messageInfo); ?>
    </div>
 <?php } ?>  
  </div>
</div> 

   <?php }
     else {?>

     	<div class="connexionPageConteneurPrincipale">
	<header>Bienvenu sur la page de connexion</header>	
	<div class="connexionPageConteneur">
		<img src="icon/nameFioFood.png" >
    <form method="post" action="" class="formConnexionPage">
    <div class="inputEmailTelephoneConnexionPage">
      <label for="emailUti">E-mail ou numéro de téléphone :</label><br>
        <input type="text" name="emailUtilisateur" id="emailUti" required>
      </div>
      <div class="inputEmailTelephoneConnexionPage">
        <label for="mdput">Mot de passe :</label><br>
         <input type="password" name="mdpUtilisateur" id="mdput" required>
      </div>
      <input type="submit" value="connexion" name="connexionUtilisateur" class="submitConnexionPage">
  </form>
	</div>

  <!-- MESSAGE D'ERREUR -->
  <div>
    <?php if ($messageInfo != '') {?>
    <div style="background-color: red;font-size: 44px; text-align: center;">
      <?php echo($messageInfo); ?>
    </div>
 <?php } ?>  
  </div>
</div>     	
    <?php }?>
<?php 
 }
 else
 {
  echo "<script>window.location.href='administrateurFiofood.php';</script>";
 }
?>

	<?php }
?>
	</div>
</div>
<?php 
include 'footer.php';
?>
