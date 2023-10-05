<?php 
    include 'barreDeRecherche.php';
if (isset($_GET['supp']) AND isset($_SESSION['id'])) {
   $supp = htmlspecialchars(simple_decrypt($_GET['supp']));
   $suppre = $bdd->prepare('DELETE FROM fiofoodannoceuranonyme WHERE id=:id_fiofoodannonceur');
                  $suppre->bindParam(':id_fiofoodannonceur', $supp);
                  $suppre->execute();
                  //header('Location: http://localhost/fioFood/compte.php');
                  echo "<script>window.location.href='compte.php';</script>";
}
if (isset($_GET['suppCollection']) AND isset($_SESSION['id'])) {
   $suppCollection = htmlspecialchars(simple_decrypt($_GET['suppCollection']));
   $suppre = $bdd->prepare('DELETE FROM panier WHERE id=:id_fiofoodannonceur');
                  $suppre->bindParam(':id_fiofoodannonceur',$suppCollection);
                  $suppre->execute();
                  //header('Location: http://localhost/fioFood/compte.php');
                  echo "<script>window.location.href='compte.php';</script>";
}
if (isset($_GET['suppRecette']) AND isset($_SESSION['id'])) {
   $suppRecette = htmlspecialchars(simple_decrypt($_GET['suppRecette']));
   $suppre = $bdd->prepare('DELETE FROM recette WHERE id=:id_fiofoodannonceur');
                  $suppre->bindParam(':id_fiofoodannonceur',$suppRecette);
                  $suppre->execute();
                  //header('Location: http://localhost/fioFood/compte.php');
                  echo "<script>window.location.href='compte.php';</script>";
}
if (isset($_GET['suppsupermarche']) AND isset($_SESSION['id'])) {
   $suppsupermarche = htmlspecialchars(simple_decrypt($_GET['suppsupermarche']));
   $suppre = $bdd->prepare('DELETE FROM fiofoodsupermarket WHERE id=:id_fiofoodannonceur');
                  $suppre->bindParam(':id_fiofoodannonceur',$suppsupermarche);
                  $suppre->execute();
                  //header('Location: http://localhost/fioFood/compte.php');
                  echo "<script>window.location.href='compte.php';</script>";
}
?>