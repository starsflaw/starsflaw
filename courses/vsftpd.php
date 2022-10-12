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
    <title>VSFTPD</title>
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
              <li class="breadcrumb-item active" aria-current="page">Exploit a ports vulnerability: VSFTPD</li>
            </ol>
          </nav>
      </div>
      <h1>Exploit a ports vulnerability: VSFTPD</h1>
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
            <iframe width="560" height="315" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);" src="https://www.youtube.com/embed/wWbjUSlbk5Q" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div> 
      </div> 
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            In this course we will learn how to install a Backdoor on Metasploitable2 using the VSFTPD application.
            We will be leveraging VSFTPD v2.3.4 with Metasploit.
            This particular exploit for VSFTPD is fairly easy to exploit and makes a great first start on our Metasploitable 2 target host.
            </br>
            </br>
            Instead of using Metasploit directly to exploit this vulnerability, let's start looking at how exactly this application is vulnerable.
            </br>
            </br>
            For that we are going to test it in a controlled environment and then run it on the Metasploitable 2 machine. This will help you get a better understanding of the operating process and especially to really see what is going on and how it is going.
            </br>
            </br>
            The end goal of vulnerability exploitation is to obtain a shell with root or administrator privileges on the target host and perform the exploit-post on the machine.
            </br>
            </br>
            The level of privilege acquired is usually within the scope of the application being operated. For example, if VSFTPD v2.3.4 is running, we could be running a shellcode in the background.
            </br>
            </br>
            First, we'll be using Nmap, which is one of the most popular tools, open source, and mostly available on Windows, Mac OS, and Linux. Start by opening a Terminal on your Kali.
            </br>
            </br>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-0">
          <p style="font-size: 18px;">
            <kbd>nmap -options &lt;ip&gt;</kbd>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; color: white">
            </br>
            You can also type <kbd> nmap & lt; ip & gt; </kbd> directly without options. Nmap will perform a SYN scan of the TCP protocol by default.
            </br>
            </br>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-0">      
        <img src="../images/vsftpd.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; color: white">
            </br>
            </br>
            Note that port 21 is open with the vsftpd version 2.3.4. The Metasploit Framework contains a specific exploit to exploit the vulnerability of the VSFTPD application of this release.
            </br>
            </br>
            We will then start Metasploit with the <kbd> msfconsole </kbd> command.
            </br>
            </br>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-0"> 
          <p style="font-size: 18px; color: white">   
            <samp>
              <kbd> msf> search vsftpd </kbd>
              </br>
              <kbd> msf> use 0 </kbd>
              </br>
              <kbd> msf> show options </kbd>
              </br>
            </samp>
            </br>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; color: white">
          We must now specify the IP address of our target host:
          </br>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-0"> 
          <p style="font-size: 18px; color: white">   
            <samp>
              <kbd> msf> set RHOST &lt;IP_CIBLE&gt; </kbd>
              </br>
              <kbd> msf> set RHOST 192.168.1.14 (for example) </kbd>
              </br>
              <kbd> msf> run </kbd>
              </br>
            </samp>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-0"> 
          <p style="font-size: 18px;">   
            </br>
            <img src="../images/vsftpd2.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
            </br>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-0"> 
          <p style="font-size: 18px;">   
            <img src="../images/vsftpd3.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
            </br>
            </br>
          </p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; color: white">
          We have therefore exploited a vulnerability in the VSFTPD v2.3.4 application with Metasploit.
          The VSFTPD v2.3.4 service is running as root, which gave us a root-shell on our terminal.
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