<?php
require('db/connexionDB.php');                  // Fichier PHP contenant la connexion à la BDD
session_start();                                // On démarre la session
?>

<!DOCTYPE html>
<html lang="fr">
    <?php // En-tête de la page ?>
    <head>
        <?php // Balises meta responsive ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale-1">

        <?php // Bootstrap CSS ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <?php // jQuery et Bootstrap JS ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <?php // Feuille de style ?>
        <link rel="stylesheet" href="style.css">

        <?php // Titre principal et icône de la page ?>
        <title>Confirmation e-mail</title>
        <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
    </head>

    <?php // Corps de la page ?>
    <body class="blue">
        <?php 
        // Inclusion de la barre de navigation
        require_once('menu.php'); 
        ?>
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
        // Si absence du paramètre id dans l'url => redirection vers la page d'accueil
        if(!isset($_GET['id']))
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
            <script language="Javascript">
                document.location.replace("index.php");
            </script>
            <?php
        }
        // Sinon récupération de la variable id
        else
        {
            $id = (int)$_GET['id'];
            $valid = 1;
        }
        // Si absence du paramètre token dans l'url => redirection vers la page d'accueil
        if(!isset($_GET['token']))
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
            <script language="Javascript">
                document.location.replace("index.php");
            </script>
            <?php
        }
        // Sinon récupération de la variable token
        else
        {
            $token = (String)htmlspecialchars($_GET['token']);
            $valid = 1;
        }

        // Si id vide => message d'erreur
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
            <script language="Javascript">
                document.location.replace("index.php");
            </script>
            <?php
        }
        // Si token vide => message d'erreur
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
            <script language="Javascript">
                document.location.replace("index.php");
            </script>
            <?php
        }

        // Si toutes les conditions sont remplies alors on fait le traitement
        if($valid == 1)
        {
            // Requête préparée avec marqueurs nominatifs : Sélectionner les champs id, token, validation de la table user lorsque id = $id AND token = $token
            // $data_token est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
            $result2 = $db->prepare('SELECT id, token, validation FROM user WHERE id = :id AND token = :token');
            $result2->execute(array('id' => $id, 'token' => $token));
            $data_token = $result2->fetch();
            $confirmation_token = date('Y-m-d H:i:s');
            /* Si l'id et le token récupérés dans le GET correspondent aux valeurs présentes dans la ligne sélectionnée de la table,
            alors mise à jour de la ligne selectionnée */
            if($id == $data_token['id'] AND $token == $data_token['token'])
            {
                $valid_email = $data_token['validation'];
                // Requête préparée avec marqueurs nominatifs : Mettre à jour les champs token, validation et confirmation_token de la table user lorsque id = $data_token['id'], puis redirection vers la page d'accueil
                $req = $db->prepare('UPDATE user SET token = 0, validation = NULL, confirmation_token = :confirmation_token, email =:email WHERE id = :id');
                $req->execute(array('confirmation_token' => $confirmation_token, 'email' => $valid_email, 'id' => $data_token['id']));
                ?>
                <script language="Javascript">
                    document.location.replace("profil.php");
                </script>
                <?php
            }
            /*
            elseif()
            {
                TEMPS LIMITE A LA CONFIRMATION DU TOKEN (DATE TOKEN - CONFIRMATION TOKEN =< 10min)
            }
            */
            // Si le couple id, token ne correspond à aucun couple id, token de la base => message d'erreur
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