<?php
session_start();      // On démarre la session
include "lang_config.php" //Ajout langues
?>

<!DOCTYPE html>
<html lang="fr">
    <?php // En-tête de la page ?>
    <head>
        <?php include "header.php"?>
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
                    <h1 style="color:white"><?php echo $about['who'] ?></h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; text-align: justify; color:white">
                        </br><?php echo $about['description1'] ?></br>
                        </br><?php echo $about['description2'] ?></br>
                        </br><?php echo $about['description3'] ?></br>
                        </br><?php echo $about['description4'] ?></br>
                        </br><?php echo $about['description5'] ?></br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col">
                    </br>
                    </br>
                    <img src="images/about.png" class="img-fluid" style="width: 100%; display: block; margin-left: auto; margin-right: auto"/> 
                </div>
            </div>
            </br>
            </br>
        </div>
        </br>
    </body>
    <?php 
    // Inclusion de la barre de navigation
    require_once('footer.php'); 
    ?>
</html>