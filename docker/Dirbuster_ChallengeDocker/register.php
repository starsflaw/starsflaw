<html>
    <body> 
        <header>

            
             <h1>Page Inscription</h1>
             </header> 
    
   
</html>

<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?> 

        <html>
<head>
    <title>Inscription</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="mycss.css">

  
<form action="register.php" method="POST" name="formu">
          
          <legend>Ajouter votre profil</legend>
          <br>
          <br>
          <label for="nom">Nom :  </label>
          <input type="text" id="nom" name="nom" required autofocus><br/>
          </br>
          <label for="prenom">Prénom :  </label>
          <input type="text" id="prenom" name="prenom" required autofocus><br/>
          <br>
          <label for="mail">Mail :  </label>
          <input type="text" id="mail" name="mail" required autofocus><br/>
          <br>
          <label for="mdp1">Mot de passe :  </label>
          <input type="password" id="mdp" name="mdp" required autofocus><br/>
          <br>
          <label for="poste">Salarié :  </label>
          <input type="radio" id="profession" name="profession" required autofocus><br/>
          <br>
          <label for="poste">Directeur :  </label>
          <input type="radio" id="profession" name="profession" required autofocus><br/>
          <br>
          <input type="submit" name ="AjouteUsers" value="Ajouter">
          
      </form>
  
</body> 

 <footer> 
      
        <address>
	&#9742;&nbsp;&nbsp;01 56 20 62 00
				</address>
        <br>
        
        Adresse : 38 Rue Molière, 94200 Ivry-sur-Seine</br>
 
    </footer> 

</html>

<?php
include('fonctions.php');
$connect = connexion();
if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["mdp1"]) && isset($_POST["profession"])){

    
    ajoutUsers($_POST["nom"],$_POST["prenom"],$_POST["mail"],$_POST["mdp1"],$_POST["profession"]);
}

?> 