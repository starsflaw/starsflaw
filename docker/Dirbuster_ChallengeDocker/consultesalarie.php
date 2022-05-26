
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
if(isset($_GET["delete"])){
    suppcomm($_GET["email"]);
    echo "suppression réussie"; 
    header('Location: consultationsalarie.php');
} 
?>
            
             <h1>Gestion des congés</h1>
        </header> <br>
        <br>
        <br>
        
        <fieldset>
        <nav>
            <ul class="nav">
            <li>
                <a href="consultationCommentaires.php"> Commentaire</a>
            </li>
            <li>
                <a href="add.php"> Ajouter un salarié</a>
            </li>
            <li>
            <a href="valideconge.php">Valider des congés</a>
            </li>
            </ul>
            </nav> 
        </fieldset>
        <br>
        <br>
        <br>
        <br>
<head>
    <title>Page Dirceteur</title>
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
          <th>Poste</th>
          <th>Type de contrat</th>
          <th colspan="2">Opérations</th>
          </tr>
 
    <?php
     $sql = "SELECT * from users";
     $result = mysqli_query($connect, $sql);           
        // Parcourir les lignes de résultat
        while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td> " . $row["email"]. "</td>".
             "<td>" . $row["nom"]."</td>"
                . "<td>".$row["prenom"]."</td>".
             "<td>". $row["postes"]."</td>".
                "<td>". $row["contrat"]."</td>".
                
                
        
        "<td><a href=\"modif.php?id=".$row["email"]."\">Modifier</a></td>"
        ."<td><a onclick=\"return confirm('voulez vous vraiment supprimer cet employé ?');\" href=\"consultationsalarie.php?id=".$row["id"]."&delete=delete\">Supprimer</a></td></tr>";
        
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
          

