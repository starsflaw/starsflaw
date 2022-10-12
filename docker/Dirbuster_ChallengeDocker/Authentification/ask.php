
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
    <title>Congés</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="mycss.css">

  
<form action="ask.php" method="POST" name="formu">
          
          <legend>Ajouter une demande de congés</legend>
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
          <label for="cong">RTT :  </label>
          <input type="radio" id="cong" name="cong" required autofocus><br/>
          <br>
          <label for="cong">Congés payés :  </label>
          <input type="radio" id="cong" name="cong" required autofocus><br/>
          <br>
          <label for="date1">Date de demande du congé :  </label>
          <input type="date" id="date1" name="date1" required autofocus><br/>
          <br>
          <label for="date2"> Date de début du congé :  </label>
          <input type="date" id="date2" name="date2" required autofocus><br/>
          <br>
          <label for="date3">Date de fin du congé :  </label>
          <input type="date" id="date3" name="date3" required autofocus><br/>
          <br>
          <label for="nbr">Nombre de jours :  </label>
          <input type="number" id="nbr" name="nbr" required autofocus><br/>
          <br>
          <input type="submit" name ="askCong" value="Ajouter">
          
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
if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["cong"]) && isset($_POST["date1"]) && isset($_POST["date2"])&& isset($_POST["date3"]) && isset($_POST["nbr"])){

    
    askCong($_POST["nom"],$_POST["prenom"], $_POST["mail"],$_POST["cong"],$_POST["date1"],$_POST["date2"],$_POST["date3"],$_POST["nbr"]);
}

?> 
