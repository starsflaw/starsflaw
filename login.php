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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale-1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
       
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Se connecter</title>
        <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
    </head>

    <body class="blue">
        <?php require_once('menu.php'); ?>
        <div class="container">
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-1.5">
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
                <h1 style="color:white">Connexion</h1>
                </div>
            </div>
        </div>

        <!-- Formulaire de connexion -->
        <form action="login.php" method="POST">
            <div class="container">
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-5">
                        <label for="pseudo" style="color:rgba(55,150,255)">Votre pseudo ou votre e-mail</label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-5">
                        <label for="password" style="color:rgba(55,150,255)">Votre mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                        </br>
                        <a href="password.php" style="color: rgba(55,150,255)"> Mot de passe oublié ? </a>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-0">
                        <button type="submit" class="btn btn-primary" id="login" name="login">Se connecter</button>
                    </div>
                </div>
            </div>

            <!-- Vérification -->
            <?php
            if(isset($_POST['login']))
            {
                $pseudo = htmlspecialchars(trim($_POST['pseudo'])); // On récupère le pseudo
                $password = trim($_POST['password']); // On récupère le mot de passe 
                $valid = 1;
                // Vérification du nom
                if(empty($pseudo))
                {
                    $valid = 0;
                    ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="group col-sm-0">
                                <strong style="color: red;"> Le nom d'utilisateur ne peut pas être vide </strong>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                // Vérification du mot de passe
                if(empty($password))
                {
                    $valid = 0;
                    ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="group col-sm-1.5">
                                <strong style="color: red;"> Le mot de passe ne peut pas être vide </strong>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                // Si toutes les conditions sont remplies alors on fait le traitement
                if($valid == 1)
                {
                    $result2 = $db->query("SELECT nickname, email, password FROM user WHERE (nickname = '$pseudo' OR email= '$pseudo')");
					$data_psswd = $result2->fetch();
                    if($pseudo == $data_psswd['nickname'] OR $pseudo == $data_psswd['email'])
                    {
                        if(password_verify($password, $data_psswd['password']))
                        {
                            $_SESSION['nickname'] = $data_psswd['nickname'];
                            ?>
                            <script language="Javascript">
                            document.location.replace("index.php");
                            </script>
                            <?php
                        }
                        else
                        {
                            ?>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="group col-sm-0">
                                        <strong style="color: red;"> Votre mot de passe est incorrect </strong>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="group col-sm-0">
                                    <strong style="color: red;"> Aucun compte associé a cet identifiant </strong>
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
                <p style="color:white">Vous n'avez pas encore de compte ? <a href="register.php" style="color: rgba(55,150,255);">Inscrivez-vous gratuitement</a> </p>
                </div>
            </div>
        </div>
    </body>
</html>