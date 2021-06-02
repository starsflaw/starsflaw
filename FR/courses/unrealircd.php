<?php
require('../db/connexionDB.php');           // Fichier PHP contenant la connexion à la BDD
session_start();                            // On démarre la session
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
                        <li class="breadcrumb-item active" aria-current="page">UnrealIRCD - Vulnérabilité de téléchargement / exécution à distance</li>
                    </ol>
                </nav>
            </div> 
            <h1>UnrealIRCD - Vulnérabilité de téléchargement / exécution à distance</h1>
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
                    <iframe width="560" height="315" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);" src="https://www.youtube.com/embed/pvDwI1cIrYQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div> 
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="group col-sm-8">
                <p style="font-size: 18px; text-align: justify; color: white"> 
                </br>
                Le protocole IRC ou Internet Relay Chat est un protocole de couche dans le modèle OSI et est utilisé pour la communication à l'aide d'un chat. </p>
                <p style="font-size: 18px; text-align: justify; color: white"> 
                Un chat peut être considéré comme un canal pour les messages texte. IRC implémente l'architecture client-serveur. Et IRC-net est un groupe de serveurs, connectés les uns aux autres. Le serveur le plus populaire basé sur le protocole IRC est <strong>unreal IRCd</strong>. 
                Cette vulnérabilité <strong>UnrealIRCd 3.2.8.1 - Remote Downloader/Execute </strong> envoie essentiellement les informations de la porte dérobée dans le socket pour créer une connexion avec le serveur irc qui permet d'exécuter le shell de commande à distance.
                Pour exploiter la vulnérabilité irréelle IRCd, nous avons préinstallé des <a href="https://www.virtualbox.org/" target="_blank" style="color:white"><u>machines virtuelles</u></a> avec <a href="https://www.kali.org/downloads/" target="_blank" style="color: white"><u>kali linux</u></a> en tant qu'attaquant and et le second <a href="https://www.exploit-db.com/exploits/13853" target="_blank" style="color: white"><u>metasploit </u></a>linux en tant que victime. </p>
                <img src="../images/screens.png" alt="screens" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4)">
                <p style="font-size: 18px; text-align: justify; color: white"> </br>
                Pour vérifier l'accessibilité, les gens peuvent utiliser la commande <kbd>ping</kbd>, pour trouver des adresses IP sur les deux machines - ifconfig. Dans notre exemple, Kali linux a l'adresse 1pv4 192.168.0.1 et la machine metasplot - 192.168.0.2. Avec une commande <kbd>ping</kbd>, nous testons la connexion et est stable.</p>

                <p style="font-size: 18px; text-align: justify; color: white"> 
                Sur kali linux, l'attaquant, nous entrons dans la console metasploit appelée <strong>msfconsole</strong>. Il doit être exécuté sous un super utilisateur. MsfConsole est une interface du framework metasploit et représente à elle seule une ligne de commande interactive. En utilisant cette ligne de commande, l'utilisateur peut facilement trouver les vulnérabilités existantes et lancer le script qui les exploite.
                La commande <kbd>Nmap</kbd> est utilisée pour analyser les ports ouverts de la machine victime (metasploit). Notre objectif est le protocole irc. Sur notre machine matasploit préinstallée, irc fonctionne sur le port 6667. Après avoir décrit le port du protocole irc, nous devons comprendre quelle version de irc fonctionne exactement sur la machine metasplot.</p>
                <p style="font-size: 18px; text-align: justify; color: white"> 
                Nous utiliserons <kbd>nmap</kbd> avec un paramètre <kbd>A</kbd>, qui représente l'activation. Nous activons une fonction qui définit la version de l'objet à numériser. Et pour un objet, nous mettons le numéro de port. </p>
                <img src="../images/6667.png" alt="6667" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4)">
                <p style="font-size: 18px; text-align: justify; color: white"> </br>
                Une fois le processus de numérisation terminé, nous pouvons explorer les informations sur irc. Dans notre exemple, sur le port 6667, 
                l'utilisation de irc proptocol exécute actuellement un serveur unreal ircd avec la version 3.2.8.1. Nous voulons trouver une vulnérabilité de ce 
                serveur ircd unreal 3.2.8.1. Nous tapons à msfconsole search ainsi que le nom du serveur comme ircd. Nous avons trouvé un exploit avec le script et la 
                description à l'intérieur qui peut violer l'ircd unreal v 3.2.8.1. </p>
                <p style="font-size: 18px; text-align: justify; color: white"> 
                Nous voulons l'utiliser maintenant, donc nous tapons littéralement <kbd>use</kbd> et le chemin à exploiter. On voit tout le résumé de l'explot et la description.
                Nous tapons <kbd>show options</kbd> pour voir ce que nous pouvons réellement faire avec cette explot. Nous voyons deux options de module appelées: RHOSt et Rport. Ce sont des types de variables dans le script explot que nous voulons exécuter. Nous avons donc supposé les identifier. Nous avons déjà le numéro de port cible, donc la seule chose que nous devons remplir est rhost, car il est marqué comme requis. Nous tapons <kbd>set rhosts</kbd> et l'IP de notre victime. </p>
                <p style="font-size: 18px; text-align: justify; color: white"> 
                Nous devons également définir un payload. Un payload est essentiellement le script, et dépend de différentes situations, nous pouvons exécuter différents scripts d'explot. Tapons <kbd>show payloads</kbd> pour en voir la liste.</p>
                <img src="../images/payload.png" alt="payload" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4)">
                <p style="font-size: 18px; text-align: justify; color: white"> </br>
                Nous avons différents langages ici (Ruby, Perl), bind tcp, reverse tcp, double reverse tdcp, ssl protocol, telnet protocol et ainsi de suite. Selon la situation, nous pouvons choisir différents scripts. Et partout, nous voyons un shell de commande. Prenons le premier comme exemple. Nous identifions donc le payload (le script) dès maintenant. Nous tapons <kbd>set payload</kbd> et le nom de la payload. </p>
                <p style="font-size: 18px; text-align: justify; color: white"> 
                RHOSTS et le payload sont définis comme connus et nous pouvons exécuter notre script.
                Et nous avons l'accès à distance à 192.168.0.2 via le serveur unreal ircd!
                Ce script envoie essentiellement la backdoor dans les informations de socket pour créer une connexion avec le serveur irc qui permet d'exécuter le shell à distance. Et en fonction du payload, nous pouvons violer différentes versions de l'exploit. Le code du script que vous pouvez trouver sur <a href="https://www.exploit-db.com/exploits/13853" target="_blank" style="color: white"><u>explot.db</u></a> pour la page de l'exécuteur distant unreal ircd.
                </p>
            </div>
        </div>
    </body>
    <?php 
    // Inclusion de la barre de navigation
    require_once('footerCourses.php'); 
    ?>
</html>