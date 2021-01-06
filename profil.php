<?php
  require('db/connexionDB.php'); // Fichier PHP contenant la connexion à la BDD
  session_start();
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

    <body>
        <?php require_once('menu.php'); ?>
        <div class="container">
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-0">
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
                <h1>Profil</h1>
                </br>
                </div>
            </div>
        </div>

        <?php
        $nickname = $_SESSION['nickname'];
        $result2 = $db->query("SELECT nickname, email, point FROM user WHERE nickname = '$nickname'");
        $data_profil = $result2->fetch();
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="group col-sm-1.5">
                    <strong style="color: black;"> Nom/pseudo : <?php echo $data_profil['nickname'];?></strong>
                    </br>
                    </br>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="group col-sm-1.5">
                    <strong style="color: black;"> Email : <?php echo $data_profil['email'];?></strong>
                    </br>
                    </br>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="group col-sm-1.5">
                    <strong style="color: black;"> Score : <?php echo $data_profil['point'];?></strong>
                    </br>
                    </br>
                </div>
            </div>
        </div>
        
    </body>
</html>