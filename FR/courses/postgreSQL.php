<?php
require('../db/connexionDB.php');           // Fichier PHP contenant la connexion à la BDD
session_start();                           // On démarre la session
if(!isset($_SESSION['nickname']))           // S'il n'y a pas d'utilisateur connecté, redirection vers la page de connexion
{ 
    ?>
    <script language="Javascript">
        document.location.replace("../login");
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
        <title>UnrealIRCD</title>
        <link rel="icon" type="image/png" sizes="16x16" href="../images/deathstarw.png">
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
                        <li class="breadcrumb-item"><a href="../index">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="../course">Cours</a></li>
                        <li class="breadcrumb-item active" aria-current="page">PostgreSQL - vulnérabilité avec base de donnée</li>
                    </ol>
                </nav>
            </div> 
            <h1>PostgreSQL - vulnérabilité avec base de donnée</h1>
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
                    <iframe width="560" height="315" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);" src="https://www.youtube.com/embed/z4XFKAZCZEw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div> 
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="group col-sm-8">
                <p style="font-size: 18px; text-align: justify; color: white"> 
                </br>
                La base de données est une cible très courante pour les pirates. Dans la base de données, les gens stockent des mots de passe, des données personnelles, des secrets commerciaux, etc. <strong>PostgreSQL</strong> est un système de gestion de base de données open-source populaire. Il implémente une approche relationnelle et utilise le langage SQL pour les requêtes et les procédures. PostgreSQL fonctionne sur tous les principaux systèmes d'exploitation et est disponible pour Windows, Linux, macOS. PostgreSQL est considéré comme un système de gestion de base de données <u> sécurisé</u>, mais certaines versions de celui-ci contiennent des vulnérabilités.
                Aujourd'hui, nous allons en exploiter un. </p>
                <p style = "font-size: 18px; text-align: justify; color: white">
                Pour ce faire, nous allons utiliser deux machines virtuelles préinstallées: <a href="https://www.kali.org/downloads/" style="color:white" target="_blank"> kali linux </a> en tant qu'attaquant et <a href = "https://www.metasploit.com/download" style = "color: white" target="_blank"> Metasploit </a> linux en tant que victime. Dans un premier temps, comme d'habitude, nous vérifions l'accessibilité de deux machines avec la commande <kbd>ping</kbd> sur les deux machines. Et après avoir vérifié l'accessibilité, nous pouvons analyser la machine des victimes en termes de vulnérabilités.

                Nous allons utiliser le <u> framework metasploit </u> sur kali linux. C'est un outil qui aide à rechercher les vulnérabilités et à les exploiter. Nous tapons <kbd>sudo msfconsole</kbd>. Notez qu'il doit être exécuté avec le <u> privilège de superutilisateur </u>. </p>
                <p style = "font-size: 18px; text-align: justify; color: white">
                Lorsque nous sommes entrés dans la console metasploit, nous pouvons commencer à rechercher nos faiblesses PostgreSQL.
                Nous voulons comprendre si notre machine victime a un service postgreSQL en cours d'exécution ou non.

                Nous tapons <kbd>nmap</kbd> avec l'adresse IP de la machine de la victime pour obtenir une liste de tous les services exécutés sur tous les ports. </br>
                Selon la liste, notre service postgresSQL fonctionne sur le port 5432 en utilisant le protocole tcp. Nous voulons également connaître une version de PostgreSQL. Donc, nous tapons <kbd>nmap –A –p 5432 192.168.0.2</kbd>. P signifie port, A pour activation. Nous ajoutons -A paramètre si nous voulons en savoir plus sur le système d'exploitation du service. </p>
                <p style = "font-size: 18px; text-align: justify; color: white">
                Nous avons donc maintenant cette information importante, que nos services SQL postgre qui s'exécutent sur la machine metasploit se situent entre 8.3.0. et 8.3.7. version.

                Nous tapons <kbd>recherche PostgreSQL</kbd> pour trouver les vulnérabilités. Il n'y a pas d'exploit pour notre version spécifique, mais nous pouvons essayer n'importe lequel d'entre eux. Je fais généralement attention au classement. Par exemple, le numéro 8 <u> exploit / linux / postgres / postgres_payload </u> a un excellent rang, et il a été vérifié avant de fonctionner. Donc, ça a l'air fiable. </p>
                <p style = "font-size: 18px; text-align: justify; color: white">
                Nous tapons <kbd>use exploit / linux / postgres / postgres_payload</kbd>. Dans chaque exploit de metasploit, nous avons différents payloads ou scripts et options - paramètres d'un script.

                Je tape <kbd>show options</kbd> pour voir les variables qui doivent être définies. Nous pouvons voir la base de données, le mot de passe, les rhosts, le rapport, le nom d'utilisateur et le drapeau détaillé. Le seul paramètre qui n'est pas défini et qui est obligatoire est RHOSTS –target hosts. Nous tapons <kbd>set RHOSTS</kbd> et notre adresse IP 192.168.0.2. L'étape suivante consiste à sélectionner le payload, le script réel. Je vais en choisir un au hasard, par exemple 22 linux / x86 / shell / bind_tcp. Et nous tapons <kbd>set PAYLOAD linux / x86 / shell / bind_tcp</kbd>. </p>
                <p style = "font-size: 18px; text-align: justify; color: white">
                Après avoir sélectionné le payload et ses paramètres, nous pouvons exécuter l'exploit.
                Dans les lignes du journal, nous pouvons voir que nous avons ouvert une session shell.
                Nous tapons <kbd>id</kbd> pour comprendre nos privilèges. Et nous sommes un utilisateur standard de PostgreSQL.</br>
                Maintenant, nous pouvons voir toutes les tables, les clés du serveur (comme <kbd>cat server.key</kbd>) et faire d'autres mauvaises choses pour le serveur en fonction de votre imagination.
                </p>
            </div>
        </div>
    </body>
    <?php 
    // Inclusion de la barre de navigation
    require_once('footerCourses.php'); 
    ?>
</html>