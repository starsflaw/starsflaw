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
                        <li class="breadcrumb-item active" aria-current="page">PostgreSQL - Database Management vulnerability</li>
                    </ol>
                </nav>
            </div> 
            <h1>PostgreSQL - Database Management vulnerability</h1>
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
                Database is a very common target for hackers. In database people store passwords, personal data, commercial secrets and so on. <strong>PostgreSQL</strong> is a popular open-source database management system. It implements relational approach and uses SQL language for requests and procedures. PostgreSQL runs on all major operating systems and available for Windows, Linux, macOS. PostgreSQL is considered to be a <u>secure</u> database management system, but some versions of it contain vulnerabilities.
                Today we are going to exploit one of them.</p>
                <p style="font-size: 18px; text-align: justify; color: white">
                To do that we are going to use two preinstalled virtual machines: <a href="https://www.kali.org/downloads/" style="color:white">kali linux</a> as an attacker and <a href="https://www.metasploit.com/download" style="color: white">Metasploit</a> linux as a victim. At first, as usually, we check the reachability of two machines with <kbd>ping</kbd> command on both machines. And after we checked the reachability, we can analyze the victims machine in term of vulnerabilities.

                We are going to use <u>metasploit framework</u> on kali linux. It is a tool that helps search vulnerabilities and exploit them. We type <kbd>sudo msfconsole</kbd>. Note, that it must be run with <u>superuser privilege</u>.</p>
                <p style="font-size: 18px; text-align: justify; color: white">
                When we entered metasploit console we can start searching for our PostgreSQL weaknesses.
                We want to understand if our victim machine has a running postgreSQL service or not.

                We type <kbd>nmap</kbd> with ip of victim’s machine to get a list of all services running on all ports.</br>
                According to the list, our postgresSQL service is running on 5432 port using tcp protocol. We want to know a version of the PostgreSQL too. So, we type <kbd>nmap –A –p 5432 192.168.0.2</kbd>. P stands for port, A for activation. We add -A parameter if we want to know more about operation system of service.</p>
                <p style="font-size: 18px; text-align: justify; color: white">
                So now we have this important information, that our postgre SQL services that is running on the metasploit machine is between 8.3.0. and 8.3.7. version.

                We type <kbd>search PostgreSQL</kbd> to find the vulnerabilities. There is no exploit for our specific version, but we can try any of them. I usually pay attention to ranking. For example, number 8 <u>exploit/linux/postgres/postgres_payload</u> has an excellent rank, and it has been checked before that it works. So, it looks reliable.</p>
                <p style="font-size: 18px; text-align: justify; color: white">
                We type <kbd>use exploit/linux/postgres/postgres_payload</kbd>. In every exploit of metasploit we have different payloads or scripts and options – parameters of a script.

                I type <kbd>show options</kbd> to see the variables that must be set. We can see database, password, rhosts, rport, username and verbose flag. The only parameter that is not set and is required is RHOSTS –target hosts. We type <kbd>set RHOSTS</kbd> and our ip address 192.168.0.2. The next step is to select payload, the actual script. I am going to choose a random one, for example 22 linux/x86/shell/bind_tcp. And we type <kbd>set PAYLOAD linux/x86/shell/bind_tcp</kbd>.</p>
                <p style="font-size: 18px; text-align: justify; color: white">
                After we selected the payload and the parameters of it, we can run the exploit.
                In the log lines we can see, that we opened a shell session.
                We type <kbd>id</kbd> to understand our privileges. And we are a standart postgreSQL user.</br>
                Now we can see all the tables, server keys (like cat server.key) and do other bad stuff for the server depending on your imagination.
                </p>
            </div>
        </div>
    </body>
    <?php 
    // Inclusion de la barre de navigation
    require_once('footerCourses.php'); 
    ?>
</html>