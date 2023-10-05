<?php
session_start();
	if (isset($_POST['userid'])) {
		$get = htmlspecialchars($_POST['userid']);
	 	if (isset($_SESSION['ingredient']) and !empty($_SESSION['ingredient'])) {
	 		
	 		array_push($_SESSION['ingredient'], $get);
	 	}
	 	else
	 	{
	 		$_SESSION['ingredient'] = array();
	 		array_push($_SESSION['ingredient'], $get);	
	 	}
	 }

?>

         <ul>
            <?php 
            foreach ($_SESSION['ingredient'] as $value) {
              ?>            
            <li>
            	<span><?php echo($value); ?></span>
            	<a href="panierSupprimerElement.php?id_ingredientsupp=<?php echo($value); ?>" class="supprimerIngredientPreparation" style="margin-left: 50px;"><i class="fa fa-trash" aria-hidden="true" style="font-size: 15px; color: red;"></i></a>
            </li>
            <?php } ?>
         </ul>

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