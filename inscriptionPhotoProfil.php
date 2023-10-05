<?php
session_start(); 
     //include 'barreDeRecherche.php';

     if (isset($_SESSION['id'])) {
     
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
        <div align="center">
        	<label for="envoyerPhotoProfilCouverture"  style="padding: 20px;font-size: 22px;color: white;font-weight: bold;background-color: seagreen;border-radius: 20px;cursor: pointer;">
        		Modifier
        	</label>
        	<input type="submit" name="envoyerPhotoProfilCouverture" id="envoyerPhotoProfilCouverture" style="display: none;">
        </div>
	</form>
</div>
<?php 
}
else
{
echo "<script>window.location.href='compte.php';</script>";
}
//include 'footer.php';
?>


<script type="text/javascript">
$("input[data-preview]").change(function () {
    var $input = $(this);
    var fileReader = new FileReader();

    fileReader.readAsDataURL(this.files[0]);
    fileReader.onload =function (fileEvent){
        $($input.data('preview')).attr('src',fileEvent.target.result);
    };
});

</script>