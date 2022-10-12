<html>
    <body> 
        <header>

            <figure>
                <left>
                                    
    <img src="images/Esme-sudria-logo.png" class ="image" alt ="logo esme"/>
    <link rel="stylesheet" href="mycss.css">
                </left>
                
            </figure>
            
            <?php
    include 'fonctions.php';
$connect= connexion();
if(isset($_GET["yes"])){
    valid($_GET["status"]);
    echo "La demande a été accepté"; 
    header('Location: consultationsalarie.php');
} 

if(isset($_GET["no"])){
    nonvalid($_GET["status"]);
    echo "La demande n'a pas été accepté"; 
    header('Location: consultationsalarie.php');
} 
?>
            
             <h1>Gestion des congés</h1>
        </header> <br>
        <br>
        <br>
        <br>
<head>
    <title>Espace validation</title>
    <meta charset="utf-8">
   
    <html>
<head>
<title>Exercice PHP</title>
<meta charset="utf-8">
<style type="text/css">
/* Des styles pour la mise en forme de la page*/
td,th{
width: 100px;
text-align: center;
border: 1px solid black;
}
</style>
</head>
<body>  
</head>

          <table>
          <tr>
          <th>Email</th>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Date de demande</th>
          <th>Date de début</th>
          <th>Date de fin</th>
          <th>Nombre de jours :</th>
          <th colspan="2">Opérations</th>
          </tr>
 
    <?php
     $sql = "SELECT * from conges_demande";
     
     $result = mysqli_query($connect, $sql);
     $row = $result->fetch_assoc();
        // Parcourir les lignes de résultat
        while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td> " . $row["email"]. "</td>".
             "<td>" . $row["nom"]."</td>"
                . "<td>".$row["prenom"]."</td>".
             "<td>". $row["date_demande"]."</td>".
                "<td>". $row["date_debut"]."</td>".
                "<td>". $row["date_fin"]."</td>".
                "<td>". $row["nombre"]."</td>".
                
                
        
        "<td><a onclick=\"return confirm('voulez vous vraiment  accepter la demande ?');href=\"valideconge.php?id=".$row["status"]."&yes=non accepter\">Accepter</a></td>"
        ."<td><a onclick=\"return confirm('voulez vous vraiment ne pas accepter la demande ?');\" href=\"valideconge.php?id=".$row["status"]."&no=non accepter\">Ne pas accepter</a></td></tr>";
        
        }
        
    // Le lien Modifier envoie vers la page modif.php avec l'id du salarié
    // Le lien Contacts envoie vers la page contacts.php avec l'id du salarié
   
     
    ?> 
          </table>
        
          
          
          
      <br>
          <br>
          <br>
          <br>
          
          <footer> 
     
        <address>
	&#9742;&nbsp;&nbsp;01 56 20 62 00
				</address>
        <br>
        
        Adresse : 38 Rue Molière, 94200 Ivry-sur-Seine</br>
    </footer>

          </html> 
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

