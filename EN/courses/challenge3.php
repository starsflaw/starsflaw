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
        <title>Challenge n°3</title>
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
                        <li class="breadcrumb-item"><a href="../index">Home</a></li>
                        <li class="breadcrumb-item"><a href="../course">Courses</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Exploit a vulnerability: Challenge n°3</li>
                    </ol>
                </nav>
            </div> 
            <h1>Exploit a vulnerability: Challenge n°3</h1>
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
                        Welcome to this third challenge!
                        </br>
                        </br>
                        Here is a vulnerable machine with 3 flags inside.
                        </br>
                        </br>
                        The goal: exploit the vulnerability in the machine and get the flags to get <strong> 10 points! </strong>
                        </br>
                        </br>
                        To download the vulnerable virtual machine, click on the following link: <a href="../../vm/Challenge3.ova"> Challenge3.ova </a>
                        </br>
                        </br>
                    </p>
                    <form action="challenge3" method="POST">
                        <div class="container">
                            <div class="form-row justify-content-center">
                                <div class="form-group col-sm-5">
                                    <label for="password1" style="color:rgba(55,150,255)">Flag n°1 :</label>
                                    <input type="password" class="form-control" id="password1" name="password1" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="form-group col-sm-5">
                                    <label for="password2" style="color:rgba(55,150,255)">Flag n°2 :</label>
                                    <input type="password" class="form-control" id="password2" name="password2" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="form-group col-sm-5">
                                    <label for="password3" style="color:rgba(55,150,255)">Flag n°3 :</label>
                                    <input type="password" class="form-control" id="password3" name="password3" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                                </div> 
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="form-group col-sm-0">
                                    <button type="submit" class="btn btn-primary" id="submit" name="submit" style="margin-top:38%;">Confirm</button>
                                </div>
                            </div>
                            
                        </div>
                        <?php
                        if(isset($_POST['submit'])) {
                            if($_POST['password1'] == 'us3r1{F14g:0ku74tbd3777y4}') {
                                ?>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="group col-sm-0">
                                            <strong style="color: green;"> Correct flag n°1 </strong> 
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="group col-sm-0">
                                        &#10060; <strong style="color: red;"> Incorrect flag n°1 </strong> &#10060;
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        if(isset($_POST['submit'])) {
                            if($_POST['password2'] == 'us3r1{F14g:tr5827r5wu6nklao}') {
                                ?>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="group col-sm-0">
                                            <strong style="color: green;"> Correct flag n°2 </strong> 
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="group col-sm-0">
                                            &#10060; <strong style="color: red;"> Incorrect flag n°2 </strong> &#10060;
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        if(isset($_POST['submit'])) {
                            if($_POST['password3'] == 'r00t{H4ckth3p14n3t}') {
                                ?>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="group col-sm-0">
                                            <strong style="color: green;"> Correct flag n°3 </strong> 
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="group col-sm-0">
                                            &#10060; <strong style="color: red;"> Incorrect flag n°3 </strong> &#10060;
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }

                        // Vérification du formulaire
                        // if(isset($_POST['submit']))
                        // {
                        //     $password = htmlspecialchars(trim($_POST['password'])); // On récupère le mot de passe 
                        //     $result2 = $db->prepare('SELECT password FROM courses WHERE id = :id');
                        //     $result2->execute(array('id' => 7));
                        //     $data_psswd = $result2->fetch();

                        //     // Et si le mot de passe rentré correspond à celui dans la base de données,
                        //     if(password_verify($password, $data_psswd['password']))
                        //     {
                        //         $user = $_SESSION['nickname'];
                        //         $result3 = $db->prepare('SELECT point, challenge3 FROM user WHERE nickname = :nickname');
                        //         $result3->execute(array('nickname' => $user));
                        //         $data_name = $result3->fetch();
                        //         if($data_name['challenge3'] == 0)
                        //         {
                        //             $score = $data_name['point'] + 10;
                        //             $req = $db->prepare('UPDATE user SET point =:point, challenge3 =:challenge3 WHERE nickname = :nickname');
                        //             $req->execute(array('point' => $score, 'challenge3' => 1, 'nickname' => $user));
                        //             ?> <!--
                        //             <div class="container">
                        //                 <div class="row justify-content-center">
                        //                     <div class="group col-sm-0">
                        //                         &#9989; <strong style="color: rgba(0,176,0);"> Bravo ! +10 points ! </strong> &#9989; 
                        //                     </div>
                        //                 </div>
                        //             </div>
                        //             <?php
                        //         }
                        //         else
                        //         {
                        //             ?>
                        //             <div class="container">
                        //                 <div class="row justify-content-center">
                        //                     <div class="group col-sm-0">
                        //                         &#10060; <strong style="color: red;"> Challenge already validated! </strong> &#10060;
                        //                     </div>
                        //                 </div>
                        //             </div>
                        //             <?php
                        //         }
                        //     }
                        //     // Sinon => message d'erreur (mot de passe incorrect)
                        //     else
                        //     {
                        //         ?>
                        //         <div class="container">
                        //             <div class="row justify-content-center">
                        //                 <div class="group col-sm-0">
                        //                     &#10060; <strong style="color: red;"> Incorrect password </strong> &#10060;
                        //                 </div>
                        //             </div>
                        //         </div>
                        //         <?php
                        //     }
                        // } -->
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