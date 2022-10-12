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
         <nav>
                  <ul class="nav">
                      <li>
                        <a href="ask.php">Demande de congés</a>
                      </li>   
             </ul>
              </nav>
             

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

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 

?> 

<html>
<head>
    <title>Page Salarié</title>
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
          <table>
          <tr>
          <th>id</th>
          <th>nom</th>
          <th>prenom</th>
          <th>email</th>
          <th>mdp</th>
          <th>profession</th>
          <th colspan="2">Opérations</th>
          </tr>

       <link rel="stylesheet" href="mycss.css">
          <?php
         $sql = "SELECT * from users where id = '1'";
    $result = mysqli_query($connect, $sql);           
    if (mysqli_num_rows($result) > 0) {
        // Parcourir les lignes de résultat
        while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td> " . $row["id"]. "</td>".
             "<td>" . $row["nom"]."</td><td>".$row["prenom"]."</td>".
             "<td> " . $row["email"]. "</td><td>" . $row["mdp"]. 
             "</td><td>" . $row["profession"]."</td>". 
        "<td><a href=\"modif.php?id=".$row["id"]."\">Modifier</a></td>"
        ."<td><a href=\"contacts.php?id=".$row["id"]."\">Contacts</a></td></tr>";
        }
    // Le lien Modifier envoie vers la page modif.php avec l'id du salarié
    // Le lien Contacts envoie vers la page contacts.php avec l'id du salarié
   
    } 
    ?>    
   </table> 
</body>
</html> 

