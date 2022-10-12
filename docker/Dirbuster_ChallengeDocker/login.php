<!DOCTYPE html>

<html>
    <body> 
        <header>

            
             <h1>Page Identification</h1>
             </header> 

    
</html>


<html>
    <head>
        <title>Identification</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="mycss.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="container">
        <form action="identification.php" method='post'>
        <table align="center" border="0">
           <tr>
            <td>Catégorie:</td>
            <td><select name="prof" >
                    <option value="directeur">Directeur </option>
                    <option value="salarie">Salarié </option>
                </select></td>
           
           
          </tr>
          <tr>
            <td>Login :</td>
            <td><input type="text" name="mail" maxlength="250"></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="password" name="mdp" maxlength="10"></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="identification" value="log in"></td>
          </tr>
        </table> 
        </form>
    </body> 
    <br>
    <br>
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
</div>
</html>









<?php 

  // La variable globale $_POST vous donne accès aux données envoyées avec la méthode POST par leur nom
  // Pour avoir accès aux données envoyées avec la méthode GET, utilisez $_GET
  //$say = htmlspecialchars($_POST['say']);
  //$to  = htmlspecialchars($_POST['to']);
  //echo  $say, ' ', $to; 
 ?>



