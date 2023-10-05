<form action="compte.php" method="post">
<input type="text" name="nom" placeholder="nom" class="inputConnexion"><br><br>

<input type="text" name="prenom" placeholder="prenom" class="inputConnexion"><br><br>   

<input type="email" name="email" placeholder="exmple:abiola@gmail.com" class="inputConnexion">  <br><br>    

<select name="pays" class="inputConnexion">
   <?php include 'listedespaysvilles.php'; ?>            
</select> <br><br> 

<select name="localisationInscription" class="inputConnexion" id="nomville">
<?php include 'listedesvilles.php'; ?>
</select><br><br>

<input type="number" name="telephone" placeholder="Votre de téléphone numéro" class="inputConnexion"><br><br>   


<select name="profession" id="profession" class="inputConnexion">
    <option value="agriculteur">Agriculteurs</option>
    <option value="entreprise">Entreprises</option>
    <option value="Commerçant">Commerçant</option>
    <option value="supermarket">supermarket</option>
    <option value="Boulangerie">Boulangerie</option>
    <option value="Livreur">Livreur</option>
    <option value="Autres">Autres</option>
</select><br>

<!--code javascript dans boiteDialogueContact.Js -->
<label>Nom du marché : </label><br>
<select name="nomMarcheInscription" id="nomselectmarche" class="inputConnexion">
<?php include 'listedesmarche.php'; ?>
</select>

<div id="decristoi">
    <label>
        Décris-toi :
    </label><br>
    <textarea placeholder="Descris-toi en quelque mots pour vos visiteurs" name="descriptionProfil"  class="inputConnexion"></textarea>
</div><br>

<input type="password" name="mdp" placeholder="Mot de passe" class="inputConnexion"><br><br>


<input type="password" name="mdpv" placeholder="Confirmer mot de passe" class="inputConnexion"><br>

<input type="submit" name="EnvoyerInscription" style="display: none;" id="EnvoyerInscription">
<label for="EnvoyerInscription"  class="btn btn-outline-success" style="font-size: 32px;margin: 20px;border-radius: 20px;margin-left: 150px;margin-bottom: 0;">
    Inscription
</label>  
</form>