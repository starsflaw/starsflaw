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
//Include configuration des langues
include "../config.php"
?>

<!DOCTYPE html>
<html lang="fr">
    <?php // En-tête de la page ?>
    <head>
        <?php 
        //Include header
        include "../header.php" 
        ?>
        <title><?php echo $rsa_chall['challenge'] ?></title>
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
                    <li class="breadcrumb-item"><a href="../index"><?php echo $menu['home'] ?></a></li>
                        <li class="breadcrumb-item"><a href="../course"><?php echo $menu['courses'] ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $rsa_chall['challenge'] ?></li>
                    </ol>
                </nav>
            </div> 
            <h1> <?php echo $rsa_chall['title'] ?> </h1>
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
                        </br>
                        <?php echo $rsa_chall['description'] ?>
                        </br>
                        </br>
                        <?php echo $rsa_chall['goal'] ?> <strong> 15 points! </strong>
                        </br>
                        </br>

                        </br>
                        </br>
                    </p>
                    <?php // TO DO WHEN CIPHER IS IN DOCKER ?>
                    <form action="challenge1" method="POST">
                        <div class="container">
                            <div class="form-row justify-content-center">
                                <div class="form-group col-sm-5">
                                    <label for="password" style="color:rgba(55,150,255)"><?php echo $challenge['password'] ?></label>
                                    <input type="password" class="form-control" id="password" name="password" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="form-group col-sm-0">
                                    <button type="submit" class="btn btn-primary" id="submit" name="submit"><?php echo $challenge['confirm'] ?></button>
                                </div>
                            </div>
                        </div>
                        <?php
                        // Vérification du formulaire
                        if(isset($_POST['submit']))
                        {
                            $password = htmlspecialchars(trim($_POST['password'])); // On récupère le mot de passe 
                            $result2 = $db->prepare('SELECT password FROM courses WHERE id = :id');
                            $result2->execute(array('id' => 7));
                            $data_psswd = $result2->fetch();

                            // Et si le mot de passe rentré correspond à celui dans la base de données,
                            if(password_verify($password, $data_psswd['password']))
                            {
                                $user = $_SESSION['nickname'];
                                $result3 = $db->prepare('SELECT point, challenge1 FROM user WHERE nickname = :nickname');
                                $result3->execute(array('nickname' => $user));
                                $data_name = $result3->fetch();
                                if($data_name['challenge1'] == 0)
                                {
                                    $score = $data_name['point'] + 10;
                                    $req = $db->prepare('UPDATE user SET point =:point, challenge1 =:challenge1 WHERE nickname = :nickname');
                                    $req->execute(array('point' => $score, 'challenge1' => 1, 'nickname' => $user));
                                    ?>
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="group col-sm-0">
                                                &#9989; <strong style="color: rgba(0,176,0);"> <?php echo $challenge['bravo'] ?> +10 points ! </strong> &#9989; 
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
                                                &#10060; <strong style="color: red;"> <?php echo $challenge['already_val'] ?> </strong> &#10060;
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
                                            &#10060; <strong style="color: red;"> <?php echo $challenge['incorrect'] ?> </strong> &#10060;
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