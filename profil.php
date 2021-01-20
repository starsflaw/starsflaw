<?php
  require('db/connexionDB.php'); // Fichier PHP contenant la connexion à la BDD
  session_start();
  if(!isset($_SESSION['nickname']))
  { 
    ?>
    <script language="Javascript">
    document.location.replace("register.php");
    </script>
    <?php
  }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale-1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
       
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Profil</title>
        <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
    </head>

    <body style="background-color: rgba(61,72,92)">
        <?php require_once('menu.php'); 
        $nickname = $_SESSION['nickname'];
        $result2 = $db->query("SELECT nickname, email, point FROM user WHERE nickname = '$nickname'");
        $data_profil = $result2->fetch();
        ?>
        <div class="centrer" style="box-shadow: 0 5px 5px rgba(0, 0, 0, .2);">  
            <div class="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $data_profil['nickname']; ?></li>
                    </ol>
                </nav>
            </div> 
            <h1>Profil</h1>
            </br>
            </br>
        </div>
        </br>
        </br>
        </br>
        </br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="group col-sm-0">
                    <table class="table" style="background-color: rgba(61,72,92)">
                        <tbody>
                        <tr>
                            <th scope="col" style="color: white;">Pseudo</th>
                            <th scope="col" style="color: white; font-weight: normal"><?php echo $data_profil['nickname'];?></th>
                            <th scope="col"><a href="modifyName.php" style="color: rgba(55,150,255); font-weight: normal">Modifier</a></th>
                        </tr>
                        <tr>
                            <th scope="col" style="color: white;">Email</th>
                            <th scope="col" style="color: white; font-weight: normal"><?php echo $data_profil['email'];?></th>
                            <th scope="col"><a href="modifyMail.php" style="color: rgba(55,150,255); font-weight: normal">Modifier</a></th>
                        </tr>
                        <tr>
                            <th scope="col" style="color: white;">Mot de passe</th>
                            <th scope="col" style="color: white; font-weight: normal">##########################</th>
                            <th scope="col"><a href="modifyPassword.php" style="color: rgba(55,150,255); font-weight: normal">Modifier</a></th>
                        </tr>
                        <tr>
                            <th scope="col" style="color: white;">Score</th>
                            <th colspan="2" style="color: white; font-weight: normal"><?php echo $data_profil['point'];?> pts</th>
                        </tr>
                        <tr>
                            <th colspan="3"> </th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-0">
                    <a class="btn btn-danger" href="delete.php" role="button">Supprimer mon compte</a>
                </div>
            </div>
        </div>
    </body>
</html>