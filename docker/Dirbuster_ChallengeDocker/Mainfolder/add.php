


<html>
    <body> 
        <header>

            <figure>
                <left>
                                    
    <img src="images/Esme-sudria-logo.png" class ="image" alt ="logo esme"/>
                </left>
                
            </figure>
            
             <h1>Gestion des congés</h1>
             </header> 
    
<head>
    <title>Ajout Employé</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="mycss.css">

  
<form action="add.php" method="POST" name="formu">
          
          <legend>Ajouter un employé</legend>
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
          <br>
          <label for="adresse">Adresse :  </label>
          <input type="text" id="adresse" name="adresse" required autofocus><br/>
          <br>
          <label for="mail">Ville :  </label>
          <input type="text" id="ville" name="ville" required autofocus><br/>
          <br>
          <label for="poste">Salarié :  </label>
          <input type="radio" id="profession" name="profession" required autofocus><br/>
          <br>
          <label for="poste">Directeur :  </label>
          <input type="radio" id="profession" name="profession" required autofocus><br/>
          <br>
          Type de contrat:
          <br>
          <br>
         <label for="contrat">CDI:  </label>
          <input type="radio" id="contrat" name="contrat" required autofocus><br/>
          <br>
          <label for="cong">CDD :  </label>
          <input type="radio" id="contrat" name="contrat" required autofocus><br/>
          <br>
          Type de Poste : 
          <br>
          <br>
          <label for="postes">Administration :  </label>
          <input type="radio" id="postes" name="postes" required autofocus><br/>
          <br>
          <label for="cong">Professeurs :  </label>
          <input type="radio" id="postes" name="postes" required autofocus><br/>
          <br>
          <br>
          
          <label for="phone">Phone :  </label>
          <input type="tel" id="phone" name="phone" required autofocus><br/>
          <br>
          <input type="submit" name ="addUsers" value="Ajouter">
          
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
if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["mdp"]) && isset($_POST["adresse"]) && isset($_POST["ville"]) && isset($_POST["profession"]) && isset($_POST["contrat"]) && isset($_POST["postes"]) && isset($_POST["phone"]) ){

    
    addUsers($_POST["nom"],$_POST["prenom"],$_POST["mail"],$_POST["mdp"],$_POST["adresse"],$_POST["ville"],$_POST["profession"],["contrat"],$_POST["postes"],$_POST["phone"]);
}

?> 






















<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
