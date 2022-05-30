<?php
require('db/connexionDB.php');                // Fichier PHP contenant la connexion à la BDD
session_start();                              // On démarre la session
if(isset($_SESSION['nickname']))              // S'il y a un utilisateur connecté => redirection vers la page d'accueil
{ 
    ?>
    <script language="Javascript">
        document.location.replace("index");
    </script>
    <?php
}
include "lang_config.php" // Ajout langues
?>

<!DOCTYPE html>
<html lang="fr">
    <?php // En-tête de la page ?>
    <head>
        <?php include "header.php"?>
        <title><?php echo $loginphp['login'] ?></title>
    </head>

    <?php // Corps de la page ?>
    <body class="blue">
        <?php 
        // Inclusion de la barre de navigation
        require_once('menu.php'); 
        ?>
        <div class="container">
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-1.5">
                </br>
                </br>
                </br>
                </br>
                </br>
                <h1 style="color:white"><?php echo $loginphp['login'] ?></h1>
                </div>
            </div>
        </div>

        <?php // Formulaire de connexion ?>
        <form action="login" method="POST">
            <div class="container">
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-5">
                        <label for="pseudo" style="color:rgba(55,150,255)"><?php echo $loginphp['username'] ?></label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-5">
                        <label for="password" style="color:rgba(55,150,255)"><?php echo $loginphp['password'] ?></label>
                        <input type="password" class="form-control" id="password" name="password" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                        </br>
                        <a href="password" style="color: rgba(55,150,255);"> <?php echo $loginphp['forgot'] ?> </a>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-0">
                        <button type="submit" class="btn btn-primary" id="login" name="login"><?php echo $loginphp['login'] ?></button>
                    </div>
                </div>
            </div>

            <?php
            // Vérification du formulaire de connexion
            if(isset($_POST['login']))
            {
                $pseudo = htmlspecialchars(trim($_POST['pseudo'])); // On récupère le pseudo
                $password = trim($_POST['password']); // On récupère le mot de passe 
                $valid = 1;
                // Vérification du nom
                // Si pas de pseudo => message d'erreur
                if(empty($pseudo))
                {
                    $valid = 0;
                    ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="group col-sm-0">
                                <strong style="color: red;"> <?php echo $loginphp['empty_user'] ?> </strong>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                // Vérification du mot de passe
                // Si pas de mot de passe => message d'erreur
                if(empty($password))
                {
                    $valid = 0;
                    ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="group col-sm-1.5">
                                <strong style="color: red;"><?php echo $loginphp['empty_pass'] ?> </strong>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                // Si toutes les conditions sont remplies alors on fait le traitement
                if($valid == 1)
                {
                    // Requête préparée avec marqueurs nominatifs : Sélectionner les champs nickname, email, password, token de la table user lorsque nickname = $pseudo OU que email = $pseudo
                    // $data_psswd est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
                    $result2 = $db->prepare('SELECT nickname, email, password, token FROM user WHERE (nickname = :nickname OR email =:email)');
                    $result2->execute(array('nickname' => $pseudo, 'email' => $pseudo));
                    $data_psswd = $result2->fetch();
                    
                    // S'il existe dans la base de données le même pseudo ou email que rentré dans le formulaire, 
                    if($pseudo == $data_psswd['nickname'] OR $pseudo == $data_psswd['email'])
                    {
                        // Et si le mot de passe rentré correspond à celui dans la base de données,
                        if(password_verify($password, $data_psswd['password']))
                        {
                            // Si le token est différent de 0 => message d'erreur (compte non-confirmé)
                            if($data_psswd['token'] !== '0')
                            {
                                ?>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="group col-sm-0">
                                            <strong style="color: red;"> <?php echo $loginphp['confirm'] ?> </strong>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            // Sinon => connexion
                            else
                            {
                                $_SESSION['nickname'] = $data_psswd['nickname'];
                                ?>
                                <script language="Javascript">
                                    document.location.replace("course");
                                </script>
                                <?php
                            }
                        }
                        // Sinon => message d'erreur (mot de passe incorrect)
                        else
                        {
                            ?>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="group col-sm-0">
                                        <strong style="color: red;"> <?php echo $loginphp['incorrect_pass'] ?> </strong>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    // Sinon le pseudo ou email n'existe pas dans la base de données
                    else
                    {
                        ?>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="group col-sm-0">
                                    <strong style="color: red;"> <?php echo $loginphp['incorrect_user'] ?> </strong>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } 
            }
            ?>
        </form>
        <div class="container">
            <div class="row justify-content-center">
                <div class="group col-sm-0">
                    <p style="color:white"><?php echo $loginphp['account'] ?> <a href="register" style="color: rgba(55,150,255);"><?php echo $loginphp['register'] ?></a> </p>
                </div>
            </div>
        </div>
    </body>
</html>