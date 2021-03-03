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
        <title>Mentions Légales</title>
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
                    <h1 style="color:white">Mentions Légales</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    </br>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        Conformément aux dispositions de l’article 6 III 1° de la loi n°2004-575 du 21 juin 2004 pour la confiance dans l’économie numérique, nous vous informons que : 
                        </br>
                        </br>
                        Ce site est édité par Star's Flaw, association loi de 1901 à but non lucratif dont l’objectif est de promouvoir la diffusion libre du savoir relatif au pentesting, ou plus globalement à la Cybersécurité et à la sécurité des systèmes d'informations. 
                        </br>
                        </br>
                        L’hébergement est assuré par La société IKOULA.
                        </br>
                        </br>
                        Le directeur de la publication est la Directrice générale déléguée de l'école ESME Sudria, Véronique Bonnet.
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">Objet</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        Les présentes ont pour objet de fixer les conditions d’utilisation du site web accessible à l’adresse <a style="text-decoration:underline" href="https://www.starsflaw.fr">https://www.starsflaw.fr</a>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">Création de lien vers www.starsflaw.fr</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        Star's Flaw autorise tout site Internet ou tout autre support à citer le site ou à mettre en place un lien hypertexte pointant vers son contenu. L’autorisation de mise en place d’un lien est valable pour tout site, à l’exception de ceux diffusant des informations à caractère polémique, pornographique, xénophobe ou pouvant, dans une plus large mesure, porter atteinte à la sensibilité du plus grand nombre, ou causer un préjudice quelconque à Star's Flaw, à son image ainsi qu’à celle de l’ensemble de ses utilisateurs.
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">Informatique et libertés</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        La création d’un compte nécessite pour l’internaute de renseigner des données personnelles par le biais d'un formulaire en ligne.
                        </br>
                        Ces informations concernent les traitements de données personnelles mis en œuvre pour la gestion administrative des membres.
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">Législation</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        Conformément à la loi n° 2004-801 du 6 août 2004 relative à la protection des personnes physiques à l’égard des traitements de données à caractère personnel modifiant la loi n°78-17 du 6 janvier 1978, les internautes disposent d’un droit d’accès, de rectification et de suppression des données les concernant et d’opposition à leur traitement en nous contactant par email à l'adresse : starsflaw@gmail.com
                        </br>
                        </br>
                        L’internaute peut à tout moment avoir accès et changer les informations le concernant dans l’espace dédié : « Profil ».
                        </br>
                        </br>
                        <b>Les activités du site Star's Flaw sont soumises à la loi française et en particulier aux dispositions de la loi Godfrain, ci-après rappelées : </b>
                        </br>
                        </br>
                        Article 323-1, alinéa 1 du Code pénal : "<i>Le fait d’accéder ou de se maintenir, frauduleusement, dans tout ou partie d’un système de traitement automatisé de données est puni de deux ans d’emprisonnement et de 30000 euros d’amende</i>". La simple tentative est réprimée de la même manière (article 323-7 du Code pénal).
                        </br>
                        </br>
                        Article 321-1, alinéa 2 du Code pénal : "<i>Lorsqu’il en est résulté soit la suppression ou la modification de données contenues dans le système, soit une altération du fonctionnement de ce système, la peine est de trois ans d’emprisonnement et de 45000 euros d’amende</i>".
                        </br>
                        </br>
                        Article 323-3 du Code pénal : "<i>Le fait d’introduire frauduleusement des données dans un système de traitement automatisé ou de supprimer ou de modifier frauduleusement les données qu’il contient est puni de cinq ans d’emprisonnement et de 75000 euros d’amende</i>".
                        </br>
                        </br>
                        Article 323-2 du Code pénal : "<i>Le fait d’entraver ou de fausser le fonctionnement d’un système de traitement automatisé de données est puni de cinq ans d’emprisonnement et de 75000 euros d’amende. Lorsque cette infraction a été commise à l’encontre d’un système de traitement automatisé de données à caractère personnel mis en œuvre par l’Etat, la peine est portée à sept ans d’emprisonnement et à 100 000 € d’amende</i>".
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">Ces informations peuvent être modifiées à tout moment sans communication préalable.</h2>
                </div>
            </div>
        </div>
    </body>
    <?php 
    // Inclusion de la barre de navigation
    require_once('footer.php'); 
    ?>
</html>