<?php
require('db/connexionDB.php');                // Fichier PHP contenant la connexion à la BDD
session_start();                              // On démarre la session
if(!isset($_SESSION['nickname']))             // S'il n'y a pas d'utilisateur connecté => redirection vers la page de connexion
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
        <title>Modifier mon mot de passe</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Modifier mon mot de passe</li>
                    </ol>
                </nav>
            </div> 
            <h1>Modifier mon mot de passe</h1>
            </br>
            </br>
        </div>
        </br>
        </br>
        <?php // Formulaire de modification du mot de passe ?>
        <form action="modify-password.php" method="POST">
        <div class="container">
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-5">
                    <label for="password" style="color:rgba(55,150,255)">Mot de passe actuel</label>
                    <input type="password" class="form-control" id="password" name="password" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-5">
                    <label for="password" style="color:rgba(55,150,255)">Nouveau mot de passe</label>
                    <input type="password" class="form-control" id="password2" name="password2" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-5">
                    <label for="password" style="color:rgba(55,150,255)">Confirmer nouveau mot de passe</label>
                    <input type="password" class="form-control" id="password3" name="password3" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-0">
                    </br>
                    <button type="submit" class="btn btn-primary" id="modify" name="modify">Enregistrer</button>
                </div>
            </div>
        </div>
        <?php
        // Vérification du formulaire de modification du mot de passe
        if(isset($_POST['modify']))
        {
            $password = trim($_POST['password']); // On récupère le mot de passe actuel
            $password2 = trim($_POST['password2']); // On récupère le nouveau mot de passe 
            $password3 = trim($_POST['password3']); //  On récupère la confirmation du nouveau mot de passe
            $valid = 1;
            // Vérification du mot de passe
            // Si un champ vide => message d'erreur
            if(empty($password) OR empty($password2) OR empty($password3))
            {
                $valid = 0;
                echo "Le mot de passe ne peut pas être vide";
            }
            // Si mot de passe différent de confirmation de mot de passe => message d'erreur
            if($password2 !== $password3)
            {
                $valid = 0;
                ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="group col-sm-1.5">
                            <strong style="color: red;"> La confirmation du mot de passe ne correspond pas </strong>
                        </div>
                    </div>
                </div>
                <?php
            }
            // Si toutes les conditions sont remplies alors on fait le traitement
            if($valid == 1)
            {
                // Requête préparée avec marqueurs nominatifs : Sélectionner le champ password de la table user lorsque nickname = $nickname 
                // $data_psswd est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
                $result3 = $db->prepare('SELECT password FROM user WHERE nickname = :nickname');
                $result3->execute(array('nickname' => $nickname));
                $data_psswd = $result3->fetch();

                // Vérification du mot de passe actuel
                if(password_verify($password, $data_psswd['password']))
                {
                    $hash = password_hash($password2, PASSWORD_DEFAULT, ['cost' => 18]); 
                    // Requête préparée avec marqueurs nominatifs : Mettre à jour le champ password de la table user lorsque id = $data2['id']
                    $req = $db->prepare('UPDATE user SET password = :password WHERE id = :id');
                    $req->execute(array('password' => $hash, 'id' => $data2['id']));

                    // Une fois le mot de passe mis à jour => redirection vers la page du Profil
                    ?>
                    <script language="Javascript">
                        document.location.replace("profil.php");
                    </script>
                    <?php
                }
                // Si mot de passe actuel invalide => message d'erreur
                else
                {
                    ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="group col-sm-0">
                                <strong style="color: red;"> Le mot de passe actuel entré est incorrect </strong>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                
            }
        }
        ?>
        </form>   
    </body>
</html>