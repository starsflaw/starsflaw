<?php
session_start();      // On démarre la session
include "lang_config.php" // Ajout langues
?>

<!DOCTYPE html>
<html lang="fr">
    <?php // En-tête de la page ?>
    <head>
        <?php include "header.php"?>
        <title><?php echo $confidentiality['privacy'] ?></title>
    </head>

    <?php // Corps de la page ?>
    <body class="blue">
        <?php 
        // Inclusion de la barre de navigation
        require_once('menu.php'); 
        ?>
        <div class="container-fluid">
            </br>
            </br>
            <div class="row justify-content">
                <div class="group col-sm-0" style="margin-left: 16%">
                    <p style="font-size: 30px; font-family: Star Jedi; color: white"> 
                        <img src="images/deathstarw.png" style="width: 12%"/>
                        &nbsp; STAR'S fLaw 
                    </p>
                </div>
            </div>
            <div class="container">
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-1.5">
                    </br>
                    <h1 style="color:white"><?php echo $confidentiality['privacy'] ?></h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    </br>
                    <h2 style="color:white"><?php echo $confidentiality['intro'] ?></h2>
                    <p style="font-size: 18px; text-align: justify; color:white"> <?php echo $confidentiality['intro_desc1'] ?>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white"><?php echo $confidentiality['data'] ?></h2>
                    <p style="font-size: 18px; text-align: justify; color:white"><?php echo $confidentiality['data_desc1'] ?>
                        </br>
                        <?php echo $confidentiality['data_desc2'] ?>
                        </br>
                        <?php echo $confidentiality['data_desc3'] ?>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white"><?php echo $confidentiality['object'] ?></h2>
                    <p style="font-size: 18px; text-align: justify; color:white"> <?php echo $confidentiality['object_desc1'] ?>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white"><?php echo $confidentiality['data_process'] ?></h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                    <?php echo $confidentiality['data_process_desc1'] ?> <a style="text-decoration:underline" href="https://www.starsflaw.fr">www.starsflaw.fr</a> <?php echo $confidentiality['data_process_desc1_bis'] ?>
                        </br>
                        </br>
                        <?php echo $confidentiality['data_process_desc2'] ?> <a style="text-decoration:underline" href="https://www.starsflaw.fr"> https://www.starsflaw.fr </a>
                        </br>
                        <?php echo $confidentiality['data_process_desc3'] ?>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white"><?php echo $confidentiality['categories'] ?></h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                    <?php echo $confidentiality['categories_desc1'] ?> <a style="text-decoration:underline" href="https://www.starsflaw.fr"> https://www.starsflaw.fr </a> <?php echo $confidentiality['categories_desc1_bis'] ?>
                        </br>
                        </br>
                        <?php echo $confidentiality['categories_desc2'] ?>
                        </br>
                        <?php echo $confidentiality['categories_desc3'] ?>
                        </br>
                        <?php echo $confidentiality['categories_desc4'] ?>
                        </br>
                        <?php echo $confidentiality['categories_desc5'] ?>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white"><?php echo $confidentiality['purposes'] ?></h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                    <?php echo $confidentiality['purposes_desc1'] ?> <a style="text-decoration:underline" href="https://www.starsflaw.fr"> https://www.starsflaw.fr </a> <?php echo $confidentiality['purposes_desc2'] ?>
                        </br>
                        </br>
                        <?php echo $confidentiality['purposes_desc3'] ?>
                        </br>
                        <?php echo $confidentiality['purposes_desc4'] ?>
                        </br>
                        </br>
                        <?php echo $confidentiality['purposes_desc5'] ?>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white"><?php echo $confidentiality['transmitted'] ?></h2>
                    <p style="font-size: 18px; text-align: justify; color:white"> <?php echo $confidentiality['transmitted_desc1'] ?>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white"><?php echo $confidentiality['kept'] ?></h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                    <?php echo $confidentiality['kept_desc1'] ?> <a style="text-decoration:underline" href="https://www.starsflaw.fr"> https://www.starsflaw.fr </a> <?php echo $confidentiality['kept_desc2'] ?>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white"><?php echo $confidentiality['right'] ?></h2>
                    <p style="font-size: 18px; text-align: justify; color:white"> <?php echo $confidentiality['right_desc1'] ?>
                        </br>
                        <?php echo $confidentiality['right_desc2'] ?>
                        </br>
                        <?php echo $confidentiality['right_desc3'] ?>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white"><?php echo $confidentiality['security'] ?></h2>
                    <p style="font-size: 18px; text-align: justify; color:white"> <?php echo $confidentiality['security_desc1'] ?>    </p>
                </div>
            </div>
        </div>
    </body>
    <?php 
    // Inclusion de la barre de navigation
    require_once('footer.php'); 
    ?>
</html>