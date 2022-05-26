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

include 'fonctions.php';
$connect= connexion();
if(isset($_POST["AjouterCommentaire"])){
    ajoutCommentaire($_POST["nom"],$_POST["prenom"],$_POST["mail"],$_POST["commentaire"]);
    echo "insertion réussie"; 
 }
 
    
          

  
    
?> 

<html>
<head>
    <title>Ajout Commentaire</title>
    <meta charset="utf-8">
</head>
<body>
    
     <form action="contacts.php" method="POST">
  Mail : <input type="mail" name="mail" ><br/>
  Nom : <input type="nom" name="nom"><br/>
  Prénom : <input type="text" name="prenom"><br/>
  <label for="commentaire">Commentaire</label>
          <textarea id="commentaire" name="commentaire"></textarea>
  <input type="submit" name ="AjouterCommentaire" value="Ajouter">
</form>
  
</body>
</html>


<html>
  <footer> 
   
        <address>
	&#9742;&nbsp;&nbsp;01 56 20 62 00
				</address>
        <br>
        
        Adresse : 38 Rue Molière, 94200 Ivry-sur-Seine</br>

    </footer>
</html>