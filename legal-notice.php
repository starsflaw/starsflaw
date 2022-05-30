<?php
session_start();      // On démarre la session
include "lang_config.php" // Ajout langues
?>

<!DOCTYPE html>
<html lang="fr">
    <?php // En-tête de la page ?>
    <head>
        <?php include "header.php"?>
        <title><?php echo $notice['notice'] ?></title>
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
                    <h1 style="color:white"><?php echo $notice['notice'] ?></h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    </br>
                    <p style="font-size: 18px; text-align: justify; color:white"> <?php echo $notice['notice_desc1'] ?>
                        </br>
                        </br>
                        <?php echo $notice['notice_desc2'] ?>
                        </br>
                        </br>
                        <?php echo $notice['notice_desc3'] ?>
                        </br>
                        </br>
                        <?php echo $notice['notice_desc4'] ?>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white"><?php echo $notice['object'] ?></h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                    <?php echo $notice['object_desc1'] ?> <a style="text-decoration:underline" href="https://www.starsflaw.fr">https://www.starsflaw.fr</a>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white"><?php echo $notice['link'] ?></h2>
                    <p style="font-size: 18px; text-align: justify; color:white"> <?php echo $notice['link_desc1'] ?>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white"><?php echo $notice['freedom'] ?></h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                    <?php echo $notice['freedom_desc1'] ?>
                        </br>
                        <?php echo $notice['freedom_desc2'] ?>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white"><?php echo $notice['legislation'] ?></h2>
                    <p style="font-size: 18px; text-align: justify; color:white"> <?php echo $notice['legislation_desc1'] ?>
                        </br>
                        </br>
                        <?php echo $notice['legislation_desc2'] ?>
                        </br>
                        </br>
                        <b> <?php echo $notice['legislation_desc3'] ?> </b>
                        </br>
                        </br>
                        <?php echo $notice['legislation_desc4'] ?>
                        </br>
                        </br>
                        <?php echo $notice['legislation_desc5'] ?>
                        </br>
                        </br>
                        <?php echo $notice['legislation_desc6'] ?>
                        </br>
                        </br>
                        <?php echo $notice['legislation_desc7'] ?>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white"><?php echo $notice['info'] ?></h2>
                </div>
            </div>
        </div>
    </body>
    <?php 
    // Inclusion de la barre de navigation
    require_once('footer.php'); 
    ?>
</html>