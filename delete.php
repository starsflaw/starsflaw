<?php
require('db/connexionDB.php');                // Fichier PHP contenant la connexion à la BDD
session_start();                              // On démarre la session
if(!isset($_SESSION['nickname']))             // S'il n'y a pas d'utilisateur connecté => redirection vers la page de connexion
{ 
    ?>
    <script language="Javascript">
        document.location.replace("login");
    </script>
    <?php
}
include "lang_config.php" // Ajout langues
?>

<!DOCTYPE html>
<html lang="fr">
    <?php // En-tête de la page ?>
    <head>
        <?php include "header.php" ?>
        <title><?php echo $delete['delete'] ?></title>
    </head>

    <?php // Corps de la page ?>
    <body style="background-color: rgba(45,54,69)">
        <?php 
        // Inclusion de la barre de navigation
        require_once('menu.php'); 
        $nickname = $_SESSION['nickname'];
        // Requête préparée avec marqueurs nominatifs : Sélectionner les champs id, nickname de la table user lorsque nickname = $nickname 
        // $data2 est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
        $result2 = $db->prepare('SELECT id, nickname FROM user WHERE nickname = :nickname');
        $result2->execute(array('nickname' => $nickname));
        $data2 = $result2->fetch();

        // Mise en place d'un fil d'Arianne
        ?>
        <div class="centrer" style="box-shadow: 0 5px 5px rgba(0, 0, 0, .2);">  
            <div class="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index"><?php echo $menu['home'] ?></a></li>
                    <li class="breadcrumb-item"><a href="profil"><?php echo $data2['nickname']; ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $delete['delete'] ?></li>
                    </ol>
                </nav>
            </div> 
            <h1><?php echo $delete['delete'] ?></h1>
            </br>
            </br>
        </div>
        </br>
        </br>
        <?php // Formulaire de suppression du compte ?>
        <form action="delete" method="POST">
            <div class="container">
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-0">
                        </br>
                        </br>
                        <p style="color: white"><?php echo $delete['sure'] ?></p>
                        <p style="color: white; font-weight: bold"><?php echo $delete['definitive'] ?></p>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-0">
                        </br>
                        <button type="submit" class="btn btn-danger" id="modify" name="modify"><?php echo $delete['confirm'] ?></button>
                    </div>
                </div>
            </div>
            <?php
            // Vérification du formulaire de suppression du compte
            if(isset($_POST['modify']))
            {
                $idUser = $data2['id'];
                // Requête préparée avec marqueurs nominatifs : Supprimer la ligne de la table user lorsque id = $idUser, puis redirection vers page d'accueil
                $req = $db->prepare('DELETE FROM user WHERE id = :id');
                $req->execute(array('id' => $idUser));
                session_destroy();
                ?>
                <script language="Javascript">
                    document.location.replace("index");
                </script>
                <?php
            }
            ?>
        </form>   
    </body>
</html>