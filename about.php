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
        <title>À propos</title>
        <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
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
                    <h1 style="color:white">Qui sommes-nous ?</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; text-align: justify; color:white">
                        </br>
                        Nous sommes deux étudiants en dernière année d'école d'ingénieur, majeure Cybersécurité à l'ESME Sudria : Jean-Paul Elias et Julien Maccario (Promo 2021). Et Star's Flaw est notre projet de dernière année supervisé par notre responsable de projet : Monsieur Carlos Pinto.
                        </br>
                        </br>
                        En tant qu’étudiant et futur ingénieur en cybersécurité, nous voulions apprendre les bases de comment sécuriser une infrastructure informatique.
                        </br>
                        </br>
                        Les systèmes d’informations sont régulièrement attaqués par des « pirates » ou « hackers
                        mal intentionnés », et ce pour différentes raisons (économiques, politiques, etc.). Pour pallier ces
                        cyberattaques, les infrastructures informatiques doivent être testées en passant par des tests d’intrusions pour s’assurer du bon niveau de sécurité.
                        </br>
                        </br>
                        Nous avons alors choisi ce projet pour apprendre dans un premier temps à comment mener un test
                        d’intrusion, les diverses méthodes d’attaques ainsi que les correctifs à appliquer. Puis dans second temps, nous voulions transmettre nos connaissances.
                        </br>
                        </br>
                        C'est donc pour cela que nous avons créer Star's Flaw : pour apporter des notions de Pentesting et de Cybersécurité plus globalement, 
                        pour celles et ceux qui s'y intéresseraient.
                        </br>
                        </br>
                        Star's Flaw est ainsi une plateforme mélangeant cours et challenges dans le but d'apporter un enseignement ludique sur la Sécurité des systèmes d'informations.
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