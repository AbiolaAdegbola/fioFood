<!-- <div style="">                  -->
<div id="seConnecterConteneur">
  <a href="#"><div id="viaFacebook">
    <i class="fab fa-facebook"></i>
    Via facebook
  </div></a>
  <a  href="#"><div id="viaGoogle">
    <i class="fab fa-google-plus"></i>
    <!-- pages concernes connectOAuth.php, configOAuthAPI.php -->
    Via email
  </div></a>
  <a href="#"><div id="viaTelephone">
    <i class="fab fa-mobile"></i>
    Via votre numéro de téléphone
  </div></a>
  <div id="seConnecterFormulaire">
    <label ><div class="inscrireBouton btn btn-outline-secondary" style="margin: 10px; font-size: 22px;border-radius: 20px;">S'inscrire</div></label> 
    <label><div class="seconnecterBouton btn btn-outline-dark" style="margin: 10px; font-size: 22px;border-radius: 20px;">Se connecter</div></label>
  </div>
</div>
     <!-- </div> -->

<script type="text/javascript">
//PAGE DE CONNEXION
$(document).ready(function() {
    $('.seconnecterBouton').click(function() {
     // var userid = $(this).data('id');
        $.ajax({
            url: 'connexion.php',
            type: 'post',
            // data: {userid: userid},
            success: function(response){ 
                $('.modal-body').html(response); 
                $('.monModal').modal('show'); 
            }
        });
});
});


//s'inscrire page
$(document).ready(function() {
    $('.inscrireBouton').click(function() {
     // var userid = $(this).data('id');
        $.ajax({
            url: 'inscription.php',
            type: 'post',
            // data: {userid: userid},
            success: function(response){ 
                $('.modal-body').html(response); 
                $('.monModal').modal('show'); 
            }
        });
});
});
</script>