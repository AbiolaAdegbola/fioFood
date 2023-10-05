<?php 
    include 'connexionBaseDonnee.php';
     include 'barreDeRecherche.php';
if (isset($_GET['id_element'])) {
   $suppre = $bdd->prepare('DELETE FROM panier WHERE id=:id_fiofoodannonceur');
                  $suppre->bindParam(':id_fiofoodannonceur',$_GET['id_element']);
                  $suppre->execute();
}
else
{
  echo "impossible";
}
?>