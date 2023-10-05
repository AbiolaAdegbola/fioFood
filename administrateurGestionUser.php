<?php include 'barreDeRecherche.php'; ?>
<div class="ConteneurGestionCompteUserAdmin" style="margin-top: 40px;">
	<header style="color:seagreen; padding: 10px;font-size: 20px; text-align: center;">Gestion des comptes</header>
	<div class="headerPanierType">
       <a href="administrateurGestionUserNonCertifier.php" class="noncertifierAdmin">NON Certifier</a>
       <a href="administrateurGestionUserCertifier.php" class="certifierAdmin">Certifier</a>
    </div>
	<div class="conteneurGeneralCompteUserAdmin">
	<div class="conteneurGeneralCompteUserAdminAvecFlex">
		<div class="compteUserAdmin">			
				<?php 
					$infoUser = $bdd->query('SELECT * FROM fiofood WHERE vendeurpro="0" ORDER BY id desc LIMIT 0,8');
					while ($infoUserInfo = $infoUser->fetch()) {
						?>
					<section class="compteUserAdminSection">
						<div class="compteUserAdmincouvertureCompte">
							<img src="photoProfilCouverture/<?php if($infoUserInfo['couvertureCompte'] != ''){echo($infoUserInfo['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
						</div>
						<div class="compteUserAdminPhoto">
							<img src="photoProfilCouverture/<?php if($infoUserInfo['photo'] != ''){echo($infoUserInfo['photo']);}else{echo("iconDefault.png");} ?>">
							<?php 
					     if ($infoUserInfo['vendeurpro'] !=0) { ?>
							    <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 120px;
							left: 90px;z-index: 9; font-size: 22px;"></i>
					    <?php }?>
						</div>
						<div class="compteUserAdminNomPrenom">
							<?php echo($infoUserInfo['nom'].' '.$infoUserInfo['prenom']); ?>
						</div>

						<div class="compteUserAdminInfo">				
								Non certifier:
							<input type="checkbox" data-id="<?php echo($infoUserInfo['id']); ?>" class="compteUserNonProf">
							
						</div>
						<div class="compteUserAdminModifier">
							<div class="boutonModifierCompte">
								<a href="administrateurGestionUserModifier.php?id=<?php echo(simple_encrypt($infoUserInfo['id'])); ?>" onclick="return confirm(Vous voulez modifier le compte);">
									<img src="icon/write.png" width="30px">
								</a>
							</div>
							<div class="boutonModifierCompte">
								<a href="administrateurGestionUserSupprimer.php" onclick="return confirm(Vous voulez supprimer le compte definitivement sur fioFood);">
									<img src="icon/delete.png" width="30px">
								</a>
							</div>
						</div>
					</section>
					<?php }	?>
			</div>


<div class="compteUserAdmin">
	<?php 
		$infoUser = $bdd->query('SELECT * FROM fiofood WHERE vendeurpro="0" ORDER BY id desc LIMIT 8,8');
		while ($infoUserInfo = $infoUser->fetch()) {
			?>
		<section class="compteUserAdminSection">
			<div class="compteUserAdmincouvertureCompte">
				<img src="photoProfilCouverture/<?php if($infoUserInfo['couvertureCompte'] != ''){echo($infoUserInfo['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
			</div>
			<div class="compteUserAdminPhoto">
				<img src="photoProfilCouverture/<?php if($infoUserInfo['photo'] != ''){echo($infoUserInfo['photo']);}else{echo("iconDefault.png");} ?>">
				<?php 
			     if ($infoUserInfo['vendeurpro'] !=0) { ?>
					    <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 120px;
					left: 90px;z-index: 9; font-size: 22px;"></i>
			    <?php }?>
			</div>

			<div class="compteUserAdminNomPrenom">
				<?php echo($infoUserInfo['nom'].' '.$infoUserInfo['prenom']); ?>
			</div>
			<div class="compteUserAdminInfo">				
					Non certifier:
				<input type="checkbox" data-id="<?php echo($infoUserInfo['id']); ?>" class="compteUserNonProf">
				
			</div>
			<div class="compteUserAdminModifier">
				<div class="boutonModifierCompte">
					<a href="administrateurGestionUserModifier.php?id=<?php echo(simple_encrypt($infoUserInfo['id'])); ?>" onclick="return confirm(Vous voulez modifier le compte);">
						<img src="icon/write.png" width="30px">
					</a>
				</div>
				<div class="boutonModifierCompte">
					<a href="administrateurGestionUserSupprimer.php" onclick="return confirm(Vous voulez supprimer le compte definitivement sur fioFood);">
						<img src="icon/delete.png" width="30px">
					</a>
				</div>
			</div>
			</section>
					<?php }	?>
			
		</div>
		</div>

		<!-- DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS  DEUX SESSIONS -->
		<div class="conteneurGeneralCompteUserAdminAvecFlex">
		<div class="compteUserAdmin">			
			<?php 
				$infoUser = $bdd->query('SELECT * FROM fiofood WHERE vendeurpro="0" ORDER BY id desc LIMIT 16,8');
				while ($infoUserInfo = $infoUser->fetch()) {
					?>
				<section class="compteUserAdminSection">
					<div class="compteUserAdmincouvertureCompte">
						<img src="photoProfilCouverture/<?php if($infoUserInfo['couvertureCompte'] != ''){echo($infoUserInfo['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
					</div>
					<div class="compteUserAdminPhoto">
						<img src="photoProfilCouverture/<?php if($infoUserInfo['photo'] != ''){echo($infoUserInfo['photo']);}else{echo("iconDefault.png");} ?>">
						<?php 
					     if ($infoUserInfo['vendeurpro'] !=0) { ?>
							    <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 120px;
							left: 90px;z-index: 9; font-size: 22px;"></i>
					    <?php }?>
					</div>

					<div class="compteUserAdminNomPrenom">
						<?php echo($infoUserInfo['nom'].' '.$infoUserInfo['prenom']); ?>
					</div>
					<div class="compteUserAdminInfo">				
							Non certifier:
						<input type="checkbox" data-id="<?php echo($infoUserInfo['id']); ?>" class="compteUserNonProf">
						
					</div>
					<div class="compteUserAdminModifier">
						<div class="boutonModifierCompte">
							<a href="administrateurGestionUserModifier.php?id=<?php echo(simple_encrypt($infoUserInfo['id'])); ?>" onclick="return confirm(Vous voulez modifier le compte);">
								<img src="icon/write.png" width="30px">
							</a>
						</div>
						<div class="boutonModifierCompte">
							<a href="administrateurGestionUserSupprimer.php" onclick="return confirm(Vous voulez supprimer le compte definitivement sur fioFood);">
								<img src="icon/delete.png" width="30px">
							</a>
						</div>
					</div>
				</section>
				<?php }	?>
			</div>


<div class="compteUserAdmin">
	<?php 
		$infoUser = $bdd->query('SELECT * FROM fiofood WHERE vendeurpro="0" ORDER BY id desc LIMIT 24,8');
		while ($infoUserInfo = $infoUser->fetch()) {
			?>
		<section class="compteUserAdminSection">
			<div class="compteUserAdmincouvertureCompte">
				<img src="photoProfilCouverture/<?php if($infoUserInfo['couvertureCompte'] != ''){echo($infoUserInfo['couvertureCompte']);}else{echo("couvertureParDefault.png");} ?>">
			</div>
			<div class="compteUserAdminPhoto">
				<img src="photoProfilCouverture/<?php if($infoUserInfo['photo'] != ''){echo($infoUserInfo['photo']);}else{echo("iconDefault.png");} ?>">
				<?php 
			     if ($infoUserInfo['vendeurpro'] !=0) { ?>
					    <i class="fas fa-check-circle" style="color:seagreen;position: absolute;top: 120px;
					left: 90px;z-index: 9; font-size: 22px;"></i>
			    <?php }?>
			</div>

			<div class="compteUserAdminNomPrenom">
				<?php echo($infoUserInfo['nom'].' '.$infoUserInfo['prenom']); ?>
			</div>
			<div class="compteUserAdminInfo">				
					Non certifier:
				<input type="checkbox" data-id="<?php echo($infoUserInfo['id']); ?>" class="compteUserNonProf">
				
			</div>
			<div class="compteUserAdminModifier">
				<div class="boutonModifierCompte">
					<a href="administrateurGestionUserModifier.php?id=<?php echo(simple_encrypt($infoUserInfo['id'])); ?>" onclick="return confirm(Vous voulez modifier le compte);">
						<img src="icon/write.png" width="30px">
					</a>
				</div>
				<div class="boutonModifierCompte">
					<a href="administrateurGestionUserSupprimer.php" onclick="return confirm(Vous voulez supprimer le compte definitivement sur fioFood);">
						<img src="icon/delete.png" width="30px">
					</a>
				</div>
			</div>
			</section>
					<?php }	?>
			
		</div>
		</div>
	</div>
</div>
<style type="text/css">
.headerPanierType
{
   display: flex;
   font-size: 20px;
   margin: 10px;
}

.headerPanierType a
{
   padding:20px;
   background-color: seagreen;
   border-radius: 10px;
   color: white;
   margin: 10px;
}

.headerPanierType a:active
{
   background-color: white;
}


</style>
<?php include 'footer.php'; ?>