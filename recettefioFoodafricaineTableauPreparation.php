<?php
session_start();
	if (isset($_POST['userid'])) {
		$get = htmlspecialchars($_POST['userid']);
	 	if (isset($_SESSION['preparation']) and !empty($_SESSION['preparation'])) {
	 		
	 		array_push($_SESSION['preparation'], $get);
	 	}
	 	else
	 	{
	 		$_SESSION['preparation'] = array();
	 		array_push($_SESSION['preparation'], $get);	
	 	}
	 }

?>

         <ol>
            <?php 
            foreach ($_SESSION['preparation'] as $value) {
              ?>            
            <li>
            	<span><?php echo($value); ?></span>
            	<a href="panierSupprimerElement.php?id_preparation=<?php echo($value); ?>" class="supprimerIngredientPreparation" style="margin-left: 50px;"><i class="fa fa-trash" aria-hidden="true" style="font-size: 15px; color: red;"></i></a>
            </li>
            <?php } ?>
         </ol>

  <script type="text/javascript">
  	//page supprimer une ingredient ou preparation 
(function($){

    $('.supprimerIngredientPreparation').on('click',function (e) {
        e.preventDefault();

        var $a = $(this);
        var url = $a.attr('href');

        $.ajax(url,{
            success: function () {
                $a.parents('li').fadeOut();
            },
            error: function(){
            }
        })
    });
})(jQuery);
  </script>