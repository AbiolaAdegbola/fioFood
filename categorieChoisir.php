<?php
include 'entete.php';
?>
<div class="typeDeProduit">
<?php 
	include 'typeDeProduit.php';
?>
</div>

<div id="PrincipalePosteConteneur">   
	<div class="entetePostePublication">
		<a href="">Dernières Annonces <span>></span></a>
	</div>
<div class="conteneurPremierePrincipale">
<?php 
     if (isset($_GET['categorie']) AND !isset($_POST['filtreAnnonceEnvoyer'])) {
     	//include 'categorieChoisirGetCategorieExiste.php';
     }
     elseif (isset($_POST['filtreAnnonceEnvoyer']) AND !isset($_GET['categorie'])) {
     	//include 'categorieChoisirPostEnvoyerExiste.php';
     }
?>
</div>
</div>
<!-- SAUT DE PAGE SAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGESAUT DE PAGE -->
<div class="sautDePage" align="center">
	<ul>
		<li><a href="">2</a></li>
		<li><a href="">3</a></li>
		<li><a href="">4</a></li>
		<li><a href="">5</a></li>
		<li><a href="">6</a></li>
		<li><a href="">7</a></li>
		<li><a href="">></a></li>
	</ul>
</div>
<?php 
include 'footer.php';
?>