<?php
require('db/connexionDB.php');                // Fichier PHP contenant la connexion à la BDD
session_start();                              // On démarre la session
if(!isset($_SESSION['nickname']))             // S'il n'y a pas d'utilisateur connecté => redirection vers la page de connexion
{ 
    ?>
    <script language="Javascript">
        document.location.replace("login.php");
    </script>
    <?php
}
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
        <title>Supprimer mon compte</title>
        <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
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
                    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="profil.php"><?php echo $data2['nickname']; ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Supprimer mon compte</li>
                    </ol>
                </nav>
            </div> 
            <h1>Supprimer mon compte</h1>
            </br>
            </br>
        </div>
        </br>
        </br>
        <?php // Formulaire de suppression du compte ?>
        <form action="delete.php" method="POST">
            <div class="container">
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-0">
                        </br>
                        </br>
                        <p style="color: white">Vous voulez supprimer votre compte ?</p>
                        <p style="color: white; font-weight: bold">Cette action est définitive.</p>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-0">
                        </br>
                        <button type="submit" class="btn btn-danger" id="modify" name="modify">Valider</button>
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
                    document.location.replace("index.php");
                </script>
                <?php
            }
            ?>
        </form>   
    </body>
</html>