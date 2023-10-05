<?php 
     //include 'barreDeRecherche.php';
     session_start();
     if (isset($_SESSION['id'])) {
?>

<div id="conteneurPhotoCouverture">
	<form method="post" enctype="multipart/form-data">
        <div id="conteneuurPhotoCouverture">
        	<input type="file" name="photo1Couverture" id="photoCouverture" style="display: none;" accept="image/*" data-preview = "#couverturePhoto">
            <div class="" style="padding: 50px;" align="center">
                    <i class="fa fa-camera" aria-hidden="true"></i>
            </div>
        	<label for="photoCouverture">        		
				<img id="couverturePhoto">
        	</label>
        </div>
        <div style="margin-left: 155px;">photo couverture</div>
        <div align="center">
        	<label for="envoyerPhotoProfilCouverture" style="padding: 20px;font-size: 22px;color: white;font-weight: bold;background-color: seagreen;border-radius: 20px;cursor: pointer;">
        		Modifier
        	</label>
        	<input type="submit" name="envoyerPhotoCouverture" id="envoyerPhotoProfilCouverture" style="display: none;">
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