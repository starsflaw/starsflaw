<html>
    <link rel="stylesheet" href="mycss.css">
    <body> 
        <header>

            <figure>
                <left>
                                    
    <img src="images/Esme-sudria-logo.png" class ="image" alt ="logo esme"/>
                </left>
                
            </figure>
            
             <h1>Gestion des congés</h1>
             </header> 

    <footer> 
     
        <address>
	&#9742;&nbsp;&nbsp;01 56 20 62 00
				</address>
        <br>
        
        Adresse : 38 Rue Molière, 94200 Ivry-sur-Seine</br>

    </footer>
</html>


<?php

include 'fonctions.php';
$connect= connexion();

 $sql = "SELECT * from users where id = '1'";
    $result = mysqli_query($connect, $sql);           
    if (mysqli_num_rows($result) > 0) {
        // Parcourir les lignes de résultat
    $row = mysqli_fetch_assoc($result); 
    var_dump($row); 
    echo '<form action="modif.php" method="post">'; 
    echo "<input type=\"hidden\" id=\"id\" name=\"id\" value=\"".$row["id"]."\">";
    echo "<input type=\"text\" nom=\"nom\" name=\"id\" value=\"".$row["nom"]."\">";
    echo "<input type=\"text\" prenom=\"prenom\" name=\"prenom\" value=\"".$row["prenom"]."\">";
    echo $row["email"];
    echo "<input type=\"text\" mdp=\"mdp\" name=\"id\" value=\"".$row["mdp"]."\">";
    echo "<input type=\"text\" profession=\"profession\" name=\"id\" value=\"".$row["profession"]."\">";
    echo '<input type="submit" name="identification" value="log in">'; 
    echo '</form>'; 
    
    }
  
  
  
?> 

