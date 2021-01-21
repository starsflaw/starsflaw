<?php
    require('db/connexionDB.php'); // Fichier PHP contenant la connexion à la BDD
    session_start();
    if(isset($_SESSION['nickname']))
    { 
        ?>
        <script language="Javascript">
        document.location.replace("index.php");
        </script>
        <?php
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php // Balises meta responsive ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale-1">

        <?php // Bootstrap CSS ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <?php // jQuery and Bootstrap JS ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <?php // Feuille de style ?>
        <link rel="stylesheet" href="style.css">

        <?php // Titre principal et icône de la page ?>
        <title>Confirmation compte</title>
        <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
    </head>

    <body class="blue">
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
                    <h1 style="color:white"></h1>
                </div>
            </div>
        </div>
        <?php

        $id = (int)$_GET['id'];
        $token = (String)htmlspecialchars($_GET['token']);
        $valid = 1;

        if(!isset($id))
        {
            $valid = 0;
            ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="group col-sm-0">
                        <strong style="color: red;"> Le lien est erroné </strong>
                    </div>
                </div>
            </div>
            <?php
        }
        if(!isset($token))
        {
            $valid = 0;
            ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="group col-sm-0">
                        <strong style="color: red;"> Le lien est erroné </strong>
                    </div>
                </div>
            </div>
            <?php
        }

        if($valid == 1)
        {
            $result2 = $db->prepare('SELECT id, token, nickname FROM user WHERE id = :id AND token = :token');
            $result2->execute(array('id' => $id, 'token' => $token));
            $data_token = $result2->fetch();
            if($id == $data_token['id'] AND $token == $data_token['token'])
            {
                $req = $db->prepare('UPDATE user SET token = 0, confirmation_token = :confirmation_token WHERE id = :id');
                $req->execute(array('confirmation_token' => date('Y-m-d H:i:s'), 'id' => $data_token['id']));
                
                $_SESSION['nickname'] = $data_token['nickname'];
                ?>
                <script language="Javascript">
                document.location.replace("profil.php");
                </script>
                <?php
            }
            else
            {
                $valid = 0;
                ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="group col-sm-0">
                            <strong style="color: red;"> Le lien est erroné </strong>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </body>
</html>