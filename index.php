<?php
session_start();      // On démarre la session
include "lang_config.php" // Ajout langues
?>

<!DOCTYPE html>
<html lang="fr">
    <?php // En-tête de la page ?>
    <head>
        <?php include "header.php" ?>
        <title>Star's Flaw</title>
    </head>

    <?php // Corps de la page ?>
    <body class="blue">
        <?php 
        // Inclusion de la barre de navigation
        require_once('menu.php'); 
        ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="group col-sm-0">
                    </br>
                    </br>
                    <img src="images/deathstarw.png" class="img-fluid" style="width: 23%; display: block; margin-left: auto; margin-right: auto"/>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0">
                    <p style="font-size: 40px; font-family: Star Jedi; color: white; text-align: center">
                    STAR'S fLaw
                    </p>
                    </br>
                    <h5 style="color: white; text-align: center";> <?php echo $index['description'] ?>
                    </br>
                    </br>
                    </h5>
                </div>
            </div>
            <?php // Mise en place d'un Carousel ?>
            <div class="row justify-content-center">
                <div class="group col-sm-0">     
                    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="7000">
                        <ol class="carousel-indicators">
                        <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExample" data-slide-to="1"></li>
                        <li data-target="#carouselExample" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" style="max-width: 1600px !important;">
                            <div class="carousel-item active">
                            <img src="images/cours.png" class="d-block">
                            </div>
                            <div class="carousel-item">
                            <img src="images/kali.png" class="d-block">
                            </div>
                            <div class="carousel-item">
                            <img src="images/metasploitdraw.png" class="d-block">
                            </div>
                        </div>
                        <a href="#carouselExample" class="carousel-control-prev"  role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only"><?php echo $index['previous'] ?></span>
                        </a>
                        <a href="#carouselExample" class="carousel-control-next"  role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only"><?php echo $index['next'] ?></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0">
                    <img src="images/icons.png" class="img-fluid" style="width: 90%; display: block; margin-left: auto; margin-right: auto; margin-top: 150px"/>
                    </br>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm">
                    <p style="font-size: 1.2em; color: white; text-align: center;margin-left:83px">
                    <?php echo $index['lesson'] ?>
                    </p>
                </div>
                <div class="group col-sm">
                    <p style="font-size: 1.2em; color: white; text-align: center">
                    <?php echo $index['challenge'] ?>
                    </p>
                </div>
                <div class="group col-sm">
                    <p style="font-size: 1.2em; color: white; text-align: center; margin-right:83px">
                    <?php echo $index['score'] ?>
                    </p>
                </div>
            </div>
        </div>
        <?php // Script pour Carousel : même au survol de la souris les slides continuent de défiler ?>
        <script>
        $('.carousel').carousel({

            pause: "null"

        })
        </script>
        </br>
        </br>
        </br>
    </body>
    <?php 
    // Inclusion de la barre de navigation
    require_once('footer.php'); 
    ?>
</html>