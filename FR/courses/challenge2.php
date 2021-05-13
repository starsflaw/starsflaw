<?php
require('../db/connexionDB.php');           // Fichier PHP contenant la connexion à la BDD
session_start();                            // On démarre la session
if(!isset($_SESSION['nickname']))           // S'il n'y a pas d'utilisateur connecté, redirection vers la page de connexion
{ 
    ?>
    <script language="Javascript">
        document.location.replace("../login");
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
        <link rel="stylesheet" href="../style.css">

        <?php // Titre principal et icône de la page ?>
        <title>Challenge n°2</title>
        <link rel="icon" type="image/png" sizes="16x16" href="../images/deathstarw.png">
    </head>

    <?php // Corps de la page ?>
    <body style="background-color: rgba(45,54,69)">
        <?php 
        // Inclusion de la barre de navigation
        require_once('menuCourses.php'); 

        // Mise en place d'un fil d'Arianne
        ?>
        <div class="centrer" style="box-shadow: 0 5px 5px rgba(0, 0, 0, .2);">  
            <div class="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="../course">Cours</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Exploitez une vulnérabilité web : Challenge n°2</li>
                    </ol>
                </nav>
            </div> 
            <h1>Exploitez une vulnérabilité web : Challenge n°2</h1>
            </br>
            </br>
        </div>
        </br>
        </br>
        <?php // Cours ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="group col-sm-7">
                    <p style="font-size: 18px; text-align: justify; color: white">
                        </br>
                        Bienvenue dans ce second challenge !
                        </br>
                        </br>
                        Vous trouverez ci-dessous le formulaire divin à travers lequel vous pourrez trouver le mot de passe du challenge n°2.
                        </br>
                        </br>
                        Malheureusement, il se peut que celui rencontre quelques difficultés pour fonctionner&#10060;, si c'est le cas, merci de revenir plus tard. &#128519;
                        </br>
                        </br>
                        L'objectif : Trouvez le mot de passe pour obtenir <strong>20 points !</strong>
                        </br>
                        </br>
                    </p>
                    <form action="challenge2" method="POST">
                        <div class="container">
                            <div class="form-row justify-content-center">
                                <div class="form-group col-sm-5">
                                    <label for="findpassword" style="color:rgba(255,193,7)">Formulaire Divin :</label>
                                    <input disabled type="text" class="form-control" name="findpassword" style="border:2px solid rgba(255,193,7);background-color:#2d3645;color:white"/>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-sm-0">
                                    <button disabled type="submit" class="btn btn-warning" id="valid" name="valid">Valider</button>
                                </div>
                            </div>
                        </div>
                        <?php
                        // Vérification du formulaire "divin"
                        if(isset($_POST['valid']))
                        {
                            ?>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="group col-sm-0">
                                        <strong style="color: rgba(45,54,69);"> Mot de passe : Le_Développeur_Est_Une_Ordure </strong>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </form>
                    <div class="container" style="margin-top:200px">
                                <div class="row justify-content-center">
                                    <div class="group col-sm-0">
                                        <strong style="color: white;"> ________________________________________________________________ </strong>
                                    </div>
                                </div>
                            </div>
                    <form action="challenge2" method="POST" style="margin-top:200px">
                        <div class="container">
                            <div class="form-row justify-content-center">
                                <div class="form-group col-sm-5">
                                    <label for="password" style="color:rgba(55,150,255)">Mot de passe du Challenge n°2 :</label>
                                    <input type="password" class="form-control" id="password" name="password" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="form-group col-sm-0">
                                    <button type="submit" class="btn btn-primary" id="submit" name="submit">Valider</button>
                                </div>
                            </div>
                        </div>
                        <?php
                        // Vérification du formulaire
                        if(isset($_POST['submit']))
                        {
                            $password = htmlspecialchars(trim($_POST['password'])); // On récupère le mot de passe 
                            $result2 = $db->prepare('SELECT password FROM courses WHERE id = :id');
                            $result2->execute(array('id' => 8));
                            $data_psswd = $result2->fetch();

                            // Et si le mot de passe rentré correspond à celui dans la base de données,
                            if(password_verify($password, $data_psswd['password']))
                            {
                                $user = $_SESSION['nickname'];
                                $result3 = $db->prepare('SELECT point, challenge2 FROM user WHERE nickname = :nickname');
                                $result3->execute(array('nickname' => $user));
                                $data_name = $result3->fetch();
                                if($data_name['challenge2'] == 0)
                                {
                                    $score = $data_name['point'] + 20;
                                    $req = $db->prepare('UPDATE user SET point =:point, challenge2 =:challenge2 WHERE nickname = :nickname');
                                    $req->execute(array('point' => $score, 'challenge2' => 1, 'nickname' => $user));
                                    ?>
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="group col-sm-0">
                                                &#9989; <strong style="color: rgba(0,176,0);"> Bravo ! +20 points ! </strong> &#9989; 
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="group col-sm-0">
                                                &#10060; <strong style="color: red;"> Challenge déjà validé ! </strong> &#10060;
                                            </div>
                                        </div>
                                    </div>
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
                                            &#10060; <strong style="color: red;"> Mot de passe incorrect </strong> &#10060;
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <?php 
    // Inclusion de la barre de navigation
    require_once('footerCourses.php'); 
    ?>
</html>