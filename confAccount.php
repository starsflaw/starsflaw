<?php
require('db/connexionDB.php');                // Fichier PHP contenant la connexion à la BDD
session_start();                              // On démarre la session
if(isset($_SESSION['nickname']))              // S'il y a un utilisateur connecté => redirection vers la page d'accueil
include "lang_config.php"                     // Ajout langues
{ 
    ?>
    <script language="Javascript">
        document.location.replace("index");
    </script>
    <?php
}
?>

<!DOCTYPE html>
<html lang="fr">
    <?php // En-tête de la page ?>
    <head>
        <?php include "header.php"?>
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
                        <strong style="color: red;"> <?php echo $conf['wrong'] ?> </strong>
                    </div>
                </div>
            </div>
            <script language="Javascript">
                document.location.replace("index");
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
                        <strong style="color: red;"> <?php echo $conf['wrong'] ?> </strong>
                    </div>
                </div>
            </div>
            <script language="Javascript">
                document.location.replace("index");
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
                        <strong style="color: red;"> <?php echo $conf['wrong'] ?> </strong>
                    </div>
                </div>
            </div>
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
                        <strong style="color: red;"> <?php echo $conf['wrong'] ?> </strong>
                    </div>
                </div>
            </div>
            <?php
        }

        // Si toutes les conditions sont remplies alors on fait le traitement
        if($valid == 1)
        {
            // Requête préparée avec marqueurs nominatifs : Sélectionner les champs id, token, nickname de la table user lorsque id = $id AND token = $token
            // $data_token est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
            $result2 = $db->prepare('SELECT id, token, nickname FROM user WHERE id = :id AND token = :token');
            $result2->execute(array('id' => $id, 'token' => $token));
            $data_token = $result2->fetch();

            /* Si l'id et le token récupérés dans le GET correspondent aux valeurs présentes dans la ligne sélectionnée de la table,
            alors mise à jour de la ligne selectionnée */
            if($id == $data_token['id'] AND $token == $data_token['token'])
            {
                // Requête préparée avec marqueurs nominatifs : Mettre à jour les champs token et confirmation_token de la table user lorsque id = $data_token['id'], puis redirection vers la page du Profil
                $req = $db->prepare('UPDATE user SET token = 0, confirmation_token = :confirmation_token WHERE id = :id');
                $req->execute(array('confirmation_token' => date('Y-m-d H:i:s'), 'id' => $data_token['id']));
                
                $_SESSION['nickname'] = $data_token['nickname'];
                ?>
                <script language="Javascript">
                    document.location.replace("profil");
                </script>
                <?php
            }
            // Si le couple id, token ne correspond à aucun couple id, token de la base => message d'erreur
            else
            {
                $valid = 0;
                ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="group col-sm-0">
                            <strong style="color: red;"> <?php echo $conf['wrong'] ?> </strong>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </body>
</html>