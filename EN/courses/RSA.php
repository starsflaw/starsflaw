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
        include "../../header.php" 
        ?>
        <title><?php echo $rsa_course['title'] ?></title>
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
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $rsa_course['title'] ?></li>
                    </ol>
                </nav>
            </div> 
            <h1><?php echo $rsa_course['title'] ?></h1>
            </br>
            </br>
        </div>
        </br>
        </br>
        <div class="row justify-content-center">
            <div class="group col-sm-8">
                <p style="font-size: 18px; text-align: justify; color: white"> 
                    </br>
                    <?php echo $rsa_course['RSA'] ?>                
                </p>
                <p style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_course['description1'] ?></p>
                <p style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_course['description2'] ?></p>
                <p style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_course['description3'] ?></p>
                </br>
                <p style="font-size: 18px; text-align: justify; color: white">
                    <b><?php echo $rsa_course['key_gen'] ?></b>
                    <ol>
                        <li style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_course['step1'] ?> 
                            <ul>
                                <li><?php echo $rsa_course['puce1.1'] ?></li>
                                <li><?php echo $rsa_course['puce1.2'] ?></li>
                            </ul>
                        </li>
                        <li style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_course['step2'] ?>
                            <ul>
                                <li><?php echo $rsa_course['puce2.1'] ?></li>
                                <li><?php echo $rsa_course['puce2.2'] ?></li>
                                <li><?php echo $rsa_course['puce2.3'] ?></li>
                                <li><?php echo $rsa_course['puce2.4'] ?></li>
                            </ul>
                        </li>
                        <li style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_course['step3'] ?></li>
                        <p style="font-size: 18px; text-align: justify; color: white"> <?php echo $rsa_course['puce3.1'] ?> </p>
                        <li style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_course['step4'] ?>
                            <ul>
                                <li><?php echo $rsa_course['puce4.1'] ?></li>
                                <li><?php echo $rsa_course['puce4.2'] ?> </li>
                            </ul>
                        </li>
                    </ol>
                </p>
                <p style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_course['key_info1'] ?></p>
                <p style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_course['key_info2'] ?></p>
                </br>
                <p style="font-size: 18px; text-align: justify; color: white"><b><?php echo $rsa_course['encryption'] ?></b></p>
                <p style="font-size: 18px; text-align: justify; color: white"> <?php echo $rsa_course['enc_info1'] ?></p>
                <p style="font-size: 18px; text-align: justify; color: white"> <?php echo $rsa_course['enc_info2'] ?></p>
                </br>
                <p style="font-size: 18px; text-align: justify; color: white"><b><?php echo $rsa_course['decryption'] ?></b></p>
                <p style="font-size: 18px; text-align: justify; color: white"> <?php echo $rsa_course['dec_info1'] ?></p>
                <p style="font-size: 18px; text-align: justify; color: white"> <?php echo $rsa_course['dec_info2'] ?></p>
                </br>
                </br>
                <p style="font-size: 18px; text-align: justify; color: white"><b><?php echo $rsa_common_modulus['common_modulus'] ?></b></p>
                <p style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_common_modulus['description'] ?></p>
                </br>
                <p style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_common_modulus['scenario'] ?></p>
                <p style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_common_modulus['decipher'] ?></p>
                <p style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_common_modulus['cipher1'] ?></p>
                <p style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_common_modulus['cipher2'] ?></p>
                <p style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_common_modulus['bezout1'] ?></p>
                <p style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_common_modulus['bezout2'] ?></p>
                <p style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_common_modulus['description2'] ?></p>
                <p style="font-size: 18px; text-align: justify; color: white"><?php echo $rsa_common_modulus['description3'] ?></p>
            </div>
        </div>
    </body>
    <?php 
    // Inclusion de la barre de navigation
    require_once('footerCourses.php'); 
    ?>
</html>