<?php 
     include 'barreDeRecherche.php';

     if (isset($_SESSION['id'])) {
     
     if (isset($_POST['envoyerPhotoProfilCouverture'])) {

     	$photoProfil = $_FILES['photo1Profil']['tmp_name'];
        $photoProfil1 = $_FILES['photo1Profil']['name'];
        $destination = 'photoProfilCouverture/'.$photoProfil1;
        move_uploaded_file($photoProfil, $destination);

        $photoCouverture = $_FILES['photo1Couverture']['tmp_name'];
        $photoCouverture1 = $_FILES['photo1Couverture']['name'];
        $destination1 = 'photoProfilCouverture/'.$photoCouverture1;
        move_uploaded_file($photoCouverture, $destination1);

     	$requet = $bdd->prepare('UPDATE fiofood SET photo=:photoProfil,couvertureCompte=:photoCouverture WHERE id=:id_fioFood');
     	$requet->bindParam(':photoProfil',$photoProfil1);
     	$requet->bindParam(':photoCouverture',$photoCouverture1);
     	$requet->bindParam(':id_fioFood',$_SESSION['id']);
     	$requet->execute();
     	//header('Location: http://localhost/fioFood/compte.php');
        echo "<script>window.location.href='compte.php';</script>";
     }
?>

<div id="conteneurPhotoCouverture">
	<form method="post" enctype="multipart/form-data">
		<div id="conteneurPhotoProfil">
			<input type="file" name="photo1Profil" id="photoProfil" style="display: none;" accept="image/*" data-preview="#profilPhoto">
                <div class="iconAPPareilphoto">
                    <i class="fa fa-camera" aria-hidden="true" ></i>
                </div>
			<label for="photoProfil">
				<img id="profilPhoto">				
		    </label>
		</div>
		<div>photo profil</div>
        <div id="conteneuurPhotoCouverture">
        	<input type="file" name="photo1Couverture" id="photoCouverture" style="display: none;" accept="image/*" data-preview = "#couverturePhoto">
            <div class="iconAPPareilphotoCouverture">
                    <i class="fa fa-camera" aria-hidden="true"></i>
                </div>
        	<label for="photoCouverture">        		
				<img id="couverturePhoto">
        	</label>
        </div>
        <div style="margin-left: 155px;">photo couverture</div>
       <div id="conteneurEnvoyerIgnorer" align="center">
        <div id="conteneurIgnorerEtape">
        	<label>
        		<a href="compte.php">Ignorer</a>
        	</label>  	
        </div>
        <div id="contenurEnvoyerProfilCouverture">
        	<label for="envoyerPhotoProfilCouverture">
        		Terminer
        	</label>
        	<input type="submit" name="envoyerPhotoProfilCouverture" id="envoyerPhotoProfilCouverture" style="display: none;">
        </div>
       </div>
	</form>
</div>
<?php 
}
else
{
echo "<script>window.location.href='compte.php';</script>";
}
include 'footer.php';
?>