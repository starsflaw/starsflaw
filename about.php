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
        <title>About us</title>
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
                    <h1 style="color:white">Who are we ?</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; text-align: justify; color:white">
                        </br>
                        We are two students in the last year of engineering school, majoring in Cybersecurity at ESME Sudria: Jean-Paul Elias and Julien Maccario (Promo 2021). And Star's Flaw is our final year project supervised by our project manager: Mr. Carlos Pinto.
                        </br>
                        </br>
                        As a student and future cybersecurity engineer, we wanted to learn the basics of how to secure an IT infrastructure.
                        </br>
                        </br>
                        Information systems are regularly attacked by "pirates" or "hackers
                        ill-intentioned ”, for various reasons (economic, political, etc.). To overcome these
                        cyber attacks, IT infrastructures must be tested through penetration tests to ensure the right level of security.
                        </br>
                        </br>
                        We then chose this project to learn how to conduct a test first.
                        intrusion, the various attack methods and the corrective measures to apply. Then in the second step, we wanted to transmit our knowledge through a platform mixing courses and challenges in order to provide a fun education on the Security of information systems.
                        </br>
                        </br>
                        This is why we created Star's Flaw: to bring concepts of Pentesting and Cybersecurity more generally,
                        for those who are interested.
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