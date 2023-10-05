<?php 
include 'connexionBaseDonnee.php';

 if (isset($_POST['usercertifier'])) {
      $id = htmlspecialchars($_POST['usercertifier']);
      $vendeurpro = 0;
      $commandelivrer = $bdd->prepare('UPDATE fiofood SET vendeurpro=:vendeurpro WHERE id=:id');
      $commandelivrer->bindParam(':id', $id);
      $commandelivrer->bindParam(':vendeurpro', $vendeurpro);
      $commandelivrer->execute();
		}


   if (isset($_POST['usernoncertifier'])) {
      $id = htmlspecialchars($_POST['usernoncertifier']);
      $vendeurpro = 1;
      $commandelivrer = $bdd->prepare('UPDATE fiofood SET vendeurpro=:vendeurpro WHERE id=:id');
      $commandelivrer->bindParam(':id', $id);
      $commandelivrer->bindParam(':vendeurpro', $vendeurpro);
      $commandelivrer->execute();
   }
?>


<!-- administrateurCommandeFiofood.php traitement des produit livrer et non livrer -->
<?php 
   if (isset($_POST['userid'])) {
      $id = htmlspecialchars($_POST['userid']);
      $livrer = 1;
      $commandelivrer = $bdd->prepare('UPDATE panier SET livrer=:livrer WHERE id=:id');
      $commandelivrer->bindParam(':id', $id);
      $commandelivrer->bindParam(':livrer', $livrer);
      $commandelivrer->execute();
   }
 if (isset($_POST['useridLivrer'])) {
      $id = htmlspecialchars($_POST['useridLivrer']);
      $livrer = 0;
      $idlivreurcommande = ' ';
      $commandelivrer = $bdd->prepare('UPDATE panier SET livrer=:livrer, idlivreurcommande=:idlivreurcommande WHERE id=:id');
      $commandelivrer->bindParam(':id', $id);
      $commandelivrer->bindParam(':livrer', $livrer);
      $commandelivrer->bindParam(':idlivreurcommande', $idlivreurcommande);
      $commandelivrer->execute();
   }
?>

<!-- Attribution d'un panier a un livreur -->
<?php 
if (isset($_POST['idLivreur'])) {
   $idlivreur = htmlspecialchars($_POST['idLivreur']);
   $idpanier = htmlspecialchars($_POST['idpanier']);

   $commandelivrer = $bdd->prepare('UPDATE panier SET idlivreurcommande=:idlivreurcommande WHERE id=:idpanier');
   $commandelivrer->bindParam(':idpanier', $idpanier);
   $commandelivrer->bindParam(':idlivreurcommande', $idlivreur);
   $commandelivrer->execute();
}
?>

<!-- changer le livreur du panier -->
<?php 
if (isset($_POST['changelivreur'])) {
   $idpanier = htmlspecialchars($_POST['changelivreur']);

   $vide = ' ';

   $commandelivrer = $bdd->prepare('UPDATE panier SET idlivreurcommande=:idlivreurcommande WHERE id=:idpanier');
   $commandelivrer->bindParam(':idpanier', $idpanier);
   $commandelivrer->bindParam(':idlivreurcommande', $vide);
   $commandelivrer->execute();
}
?>
