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
    <title>SSH</title>
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
              <li class="breadcrumb-item active" aria-current="page">Brute force attack on the SSH protocol</li>
            </ol>
          </nav>
      </div>
      <h1>Brute force attack on the SSH protocol</h1>
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
            <iframe width="560" height="315" src="https://www.youtube.com/embed/qPLiStrB8Ms" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div> 
      </div> 
      
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            In this tutorial, we will explore different ways to perform a brute force attack.
            </br>
            </br>
            First, we will look at the CVE-2008-0166 vulnerability.
            </br>
            </br>
            This CVE is a vulnerability in the version of OpenSSH specific to Debian, Ubuntu distributions or their derivatives allowing a remote user to bypass the security policy or to violate the confidentiality of the vulnerable system.
            </br>
            </br>
            The python script allowing the exploit is located on the following link: <a target="_blank" style="text-decoration:underline" href="https://www.exploit-db.com/exploits/5720"> https://www.exploit-db.com/exploits/5720 </a>
            </br>
            </br>
            First, download the precomputed vulnerable keys
            </br>
            </br>
            <kbd> wget https://github.com/offensive-security/exploit-database-bin-sploits/raw/master/sploits/5622.tar.bz2 </kbd>
            </br>
            </br>
            Unzip it
            </br>
            </br>
            <kbd> tar jxf 5622.tar.bz2 </kbd>
            </br>
            </br>
            Execute the command:
            </br>
            </br>
            <kbd> python 5720.py rsa/2048/ 192.168.1.67 root 22 5</kbd>
            </br>
            </br>
          </p>
        </div>
      </div>


      <div class="row justify-content-center">
        <div class="group col-sm-0">      
        <img src="../images/ssh1.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; color: white">
            </br>
            </br>
            The IP address 192.168.1.67 corresponds to our metasploitable victim machine which may therefore change depending on your network.
            </br>
            </div>
        </div>

        <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ssh2.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
        </div>

     <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            rsa / 2048 is the folder that contains the keys.
            </br>
            </br>
            We then execute the 2nd proposed command:
            </br>
            </br>
            <kbd> ssh -lroot -p22 -i rsa / 2048 // 57c3115d77c56390332dc5c49978627a-5429 192.168.1.67 </kbd>
            </br>
            </br>
            The execution may take a while.
            </br>
          </p>
        </div>
      </div>

      <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ssh3.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
        </div>
        <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            Root access is thus recovered thanks to the CVE-2008-0166.
            </br>
            </br>
          </p>
        </div>
      </div>
    
    
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            The next tool we will be using is Hydra, it is a powerful connection cracker which is very fast and supports a number of different protocols.
            </br>
            </br>
            In our case, we are going to test a simple dictionary attack.
            </br>
            </br>
            Dictionary attack is a method used in cryptanalysis to find a password or key. It consists of testing a series of potential passwords, one after the other, hoping that the password used for the encryption is contained in the dictionary. If not, the attack will fail.
            </br>
            </br>
            This method is based on the fact that many people use common passwords (for example: a first name, a color or the name of an animal). It is for this reason that it is always advisable not to use a password comprising a word or a name.
            </br>
            </br>
            The dictionary attack is a method often used in addition to the brute force attack which consists in exhaustively testing the different password possibilities. The latter is particularly effective for passwords that do not exceed 5 or 6 characters.       
            </br>
            </br>
          </p>
        </div>
      </div>
    
      <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ssh4.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
      </div>
                
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            Hydra contains a series of options, but today we are going to use the following:
            </br>
            </br>
            - The -L option, which specifies a login login list.
            </br>
            </br>
            - The -P option, which specifies a list of passwords.
            </br>
            </br>
            - ssh: //172.16.1.102 which represents our target IP address and our protocol.
            </br>
            </br>
            - The -t flag set to 4, which sets the number of parallel jobs to run.
            </br>
            </br>
            </br>
            </br>
            You must also use a list of login (users.txt) and passwords (pass.txt)
            </br>
          </p>
        </div>
      </div>

      <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ssh5.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          <img src="../images/ssh6.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            Once launched, the tool will display the attack status:
            </br>
            </br>
            <kbd>hydra -L users.txt -P pass.txt ssh://192.168.1.67 -t 8</kbd>
            </br>
          </p>
        </div>
      </div>

      <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ssh7.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
      </div>

      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            We therefore manage to retrieve valid identifiers to connect with ssh:
            </br>
            </br>
          </p>
        </div>
      </div>

      <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ssh8.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </br>
          </br>
          </div>
      </div>

      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            The final method of brute-forcing SSH credentials involves the use of the Nmap tool.
            </br>
            </br>
            NSE contains a script that will attempt to force all possible combinations of a username and password pair. To perform this attack, we can run a simple Nmap scan from a new terminal, just like before, but with a few more options:
            </br>
            </br>
            - --script ssh-brute specifies the script to use.
            </br>
            </br>
            - --script-args defines the arguments of the script, separated by a comma.
            </br>
            </br>
            - userdb = users.txt is the list of usernames we want to use.
            </br>
            </br>
            - passdb = pass.txt is the list of passwords we want to use.
            </br>
            </br>
          </p>
        </div>
      </div>

      <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ssh9.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
      </div>
    
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            NSE will display brute force attempts and credentials that are being tested. Depending on the number of usernames and passwords used, this may take some time.
            </br>
            </br>
            <kbd> nmap 192.168.1.67 -p 22 --script ssh-brute --script-args userdb = users.txt, passdb = pass.txt </kbd>
            </br>
            </br>
            After a while, the scan will be completed and a report will be displayed in the terminal.
            </br>
          </p>
        </div>
      </div>

      <div class="row justify-content-center">
          <div class="group col-sm-0">      
          <img src="../images/ssh10.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
          </div>
      </div>
    
      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            Above, we can see that the script found several valid login credentials. This script is useful because it will iterate through all possible pairs of usernames and passwords, sometimes giving more results.
            </br>
            </br>
          </p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="group col-sm-8">
          <p style="font-size: 18px; text-align: justify; color: white">
            </br>
            </br>
            </br>
            How to prevent "Brute-Forcing" by SSH?
            </br>
            </br>
            The reality is that if you have a server facing the internet there will be loads of brute force SSH attempts every day, many of which are automated.
            </br>
            </br>
            Perhaps one of the easiest things to do is to change the port number that SSH is operating on. While this deters even the most rudimentary brute force attempts, it is trivial to look for SSHs running on other ports.
            </br>
            </br>
            A better method is to set up a service like Fail2ban, DenyHosts, or iptables to block brute force attempts at the host level.
            </br>
            </br>
            This method, combined with the use of private key authentication instead of passwords, will put you out of the reach of most attackers. If password authentication is absolutely necessary, use long and complex passwords.
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