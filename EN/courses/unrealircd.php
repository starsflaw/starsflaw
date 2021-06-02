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
                        <li class="breadcrumb-item"><a href="../index">Home</a></li>
                        <li class="breadcrumb-item"><a href="../course">Courses</a></li>
                        <li class="breadcrumb-item active" aria-current="page">UnrealIRCD - Remote downloader / Execute vulnerability</li>
                    </ol>
                </nav>
            </div> 
            <h1>UnrealIRCD - Remote downloader / Execute vulnerability</h1>
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
                IRC protocol or Internet Relay Chat is a layer protocol in OSI-model and is used for communication using a chat. </p>
                <p style="font-size: 18px; text-align: justify; color: white"> 
                A chat can be considered as a channel for the text messages. IRC implements client-server architecture. And IRC-net is a group of servers, 
                connected to each other. The most popular server based on IRC-protocol is <strong>unreal IRCd</strong>. This <strong>UnrealIRCd 3.2.8.1 - Remote 
                Downloader/Execute </strong> vulnarability basically send the backdoor in the socket information to create a connection with irc server that allows to execute the command shell remotely. 
                To exploit the unreal IRCd vulnerability we have preinstalled <a href="https://www.virtualbox.org/" target="_blank" style="color:white"><u>virtual machines</u></a> with <a href="https://www.kali.org/downloads/" target="_blank" style="color: white"><u>kali linux</u></a> as an attacker and the second <a href="https://www.exploit-db.com/exploits/13853" target="_blank" style="color: white"><u>metasploit </u></a>linux as a victim. </p>
                <img src="../images/screens.png" alt="screens" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4)">
                <p style="font-size: 18px; text-align: justify; color: white"> </br>
                To check the reachability people can use <kbd>ping</kbd> command, to find ip-addresses on both machines - ifconfig. In our example, Kali linux has the 1pv4 address 192.168.0.1 and metasplot machine - 192.168.0.2. With a <kbd>ping</kbd> command, we test the connection and is stable.</p>

                <p style="font-size: 18px; text-align: justify; color: white"> 
                On kali linux, the attacker, we enter into the metasploit console called <strong>msfconsole</strong>. It should be run under a super user. MsfConsole is an interface of metasploit framework and represents by itself an interactive command line. Using this command line user can easily find the existing vulnurabilities and launch the script that exploitsthem. 
                <kbd>Nmap</kbd> command is used for analyzing the opened ports of victims (metasploit) machine. Our goal is irc protocol. On our preinstalled matasploit machine irc  works on 6667 port. After we have outlined the irc protocol port, we need to understand which version of irc exactly is running on metasplot machine.</p>
                <p style="font-size: 18px; text-align: justify; color: white"> 
                We will use <kbd>nmap</kbd> with a parameter <kbd>A</kbd>, which stand for activation. We activate a function that defines the version of the scanning object. And for an object we put port number. </p>
                <img src="../images/6667.png" alt="6667" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4)">
                <p style="font-size: 18px; text-align: justify; color: white"> </br>
                After the scanning process ended, we can explore the information about irc. In our example, on port 6667 using irc proptocol is currently running unreal ircd server with version 3.2.8.1.
                We want to find a vulnerability of this 3.2.8.1 unreal ircd server. We type at msfconsole search and then the name of the server like ircd. We found an exploit with the script and description inside witch can violate unreal ircd v 3.2.8.1. </p>
                <p style="font-size: 18px; text-align: justify; color: white"> 
                We want to use it now, so we literally type <kbd>use</kbd> and the path to exploit. We see all the summary about the explot and the description.
                We type <kbd>show options</kbd> to see what can we actually do with this explot. We see two module options called: RHOSt and Rport. They are kind of variables in i script that we want to run. So we supposed to identify them. We already have the target port number, so the only thing we need to fill is rhost, because it is marked as required. We type <kbd>set rhosts</kbd> and the ip of our victim. </p>
                <p style="font-size: 18px; text-align: justify; color: white"> 
                We need to set a <strong>payload</strong> too. Payload is basically the script, and depends on different situations we can execute different explot scripts. Let us type <kbd>show payloads</kbd> to see the list of them. </p>
                <img src="../images/payload.png" alt="payload" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4)">
                <p style="font-size: 18px; text-align: justify; color: white"> </br>
                We have different languages here (Ruby, Perl), bind tcp, reverse tcp, double reverse tdcp, ssl protocol, telnet protocol and so on. Depending on the situation we can choose different scripts. And everywhere we see a command shell. Let us take the first one as an example. So we identifying the payload (the script) right now. </br>We type <kbd>set payload</kbd> and the name of the payload. </p>
                <p style="font-size: 18px; text-align: justify; color: white"> 
                RHOSTS and the payload are set know and we can run our script. 
                And we have the remote access to 192.168.0.2 through the unreal ircd server!
                This script basically send the backdoor in the socket info to create a connection with irc server that allows to execute the shell remotely. And depending on the payload we can violet different versions of the explot. The code of the script you can find on <a href="https://www.exploit-db.com/exploits/13853" target="_blank" style="color: white"><u>explot.db</u></a> for the unreal ircd remote executer page.
                </p>
            </div>
        </div>
    </body>
    <?php 
    // Inclusion de la barre de navigation
    require_once('footerCourses.php'); 
    ?>
</html>