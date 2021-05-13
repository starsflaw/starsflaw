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
        <title>Profil</title>
        <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
    </head>

    <?php // Corps de la page ?>
    <body style="background-color: rgba(45,54,69)">
        <?php 
        // Inclusion de la barre de navigation
        require_once('menu.php');
        $nickname = $_SESSION['nickname'];
        // Requête préparée avec marqueurs nominatifs : Sélectionner les champs nickname, email, point de la table user lorsque nickname = $nickname 
        // $data_profil est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
        $result2 = $db->prepare('SELECT nickname, email, point FROM user WHERE nickname = :nickname');
        $result2->execute(array('nickname' => $nickname));
        $data_profil = $result2->fetch();
        
        // Mise en place d'un fil d'Arianne
        ?>
        <div class="centrer" style="box-shadow: 0 5px 5px rgba(0, 0, 0, .2);">  
            <div class="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index">Accueil</a></li>
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
                    <?php // Tableau regroupant les informations de l'utilisateur connecté ?>
                    <table class="table" style="background-color: rgba(45,54,69)">
                        <tbody>
                        <tr>
                            <th scope="col" style="color: white;">Pseudo</th>
                            <th scope="col" style="color: white; font-weight: normal"><?php echo $data_profil['nickname'];?></th>
                            <th scope="col"><a href="modify-name" style="color: rgba(55,150,255); font-weight: normal">Modifier</a></th>
                        </tr>
                        <tr>
                            <th scope="col" style="color: white;">Email</th>
                            <th scope="col" style="color: white; font-weight: normal"><?php echo $data_profil['email'];?></th>
                            <th scope="col"><a href="modify-email" style="color: rgba(55,150,255); font-weight: normal">Modifier</a></th>
                        </tr>
                        <tr>
                            <th scope="col" style="color: white;">Mot de passe</th>
                            <th scope="col" style="color: white; font-weight: normal">##########################</th>
                            <th scope="col"><a href="modify-password" style="color: rgba(55,150,255); font-weight: normal">Modifier</a></th>
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
            <?php // Lien vers la page pour supprimer son compte ?>
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-0">
                    <a class="btn btn-danger" href="delete.php" role="button">Supprimer mon compte</a>
                </div>
            </div>
        </div>
    </body>
    <?php 
    // Inclusion de la barre de navigation
    require_once('footer.php'); 
    ?>
</html>