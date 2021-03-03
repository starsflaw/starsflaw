<?php
session_start();      // On démarre la session
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
        <link rel="stylesheet" href="style.css">

        <?php // Titre principal et icône de la page ?>
        <title>Star's Flaw</title>
        <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
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
                    <h5 style="color: white; text-align: center";> 
                     - La plateforme d’apprentissage pour s'initier à la Cybersécurité / Pentest / Sécurité des systèmes d'informations - 
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
                            <span class="sr-only">Previous</span>
                        </a>
                        <a href="#carouselExample" class="carousel-control-next"  role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
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
                    Des cours et tutos pour apprendre
                    </p>
                </div>
                <div class="group col-sm">
                    <p style="font-size: 1.2em; color: white; text-align: center">
                    Des challenges pour s'exercer 
                    </p>
                </div>
                <div class="group col-sm">
                    <p style="font-size: 1.2em; color: white; text-align: center; margin-right:83px">
                    Un score pour s'évaluer
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