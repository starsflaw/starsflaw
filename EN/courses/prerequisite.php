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
        <title>Prerequisites</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Prerequisite: Install the tools</li>
                    </ol>
                </nav>
            </div> 
            <h1>Prerequisite: Install the tools</h1>
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
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/ay94bTlvLVs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div> 
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; text-align: justify; color: white">
                        </br>
                        Before starting the different courses or challenges, we must prepare our work environment. To do this we will need:
                        </br>
                        </br>
                        - Oracle VM VirtualBox
                        </br>
                        </br>
                        - Kali
                        </br>
                        </br>
                        - Metasploitable 2
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">1. Oracle VM VirtualBox</h2>
                    <p style="font-size: 18px; text-align: justify; color: white">
                        First of all we are going to need VirtualBox. VirtualBox offers to virtualize your guest operating systems (OS) on a host machine. Called hypervisor, the application supports Windows, Linux, Mac OS X, Solaris, Free BSD, etc. systems as a host.
                        </br>
                        </br>
                        To download VirtualBox, click on the following link: <a target="_blank" style="text-decoration:underline" href="https://www.virtualbox.org/wiki/Downloads"> https: // www. virtualbox.org/wiki/Downloads </a>
                        </br>
                        </br>
                        Then choose the version corresponding to your operating system.
                        </br>
                        </br>
                        Once the executable has been downloaded, double click on it and launch the installation wizard. Leave the default settings and agree to continue with the installation during the Network Interfaces Warning. Finally, click on Install. If your computer asks if you want to install the Oracle Corporation peripheral software, accept by clicking Install.
                        </br>
                        </br>
                        Voila VirtualBox is now installed! Now we can install our machines.
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">2. Kali</h2>
                    <p style="font-size: 18px; text-align: justify; color: white">
                        Kali Linux is a distribution grouping together all the tools necessary for the security tests of an information system.
                        </br>
                        </br>
                        This distribution brings together more than 600 pre-installed programs such as:
                        </br>
                        </br>
                    </p>
                    <ul style="font-size: 18px; text-align: justify; color: white">
                        <li> <b> Nmap: </b> The most famous free port scanner distributed by Insecure.org. It is designed to detect open ports, identify hosted services, and obtain operating system information from a remote computer. </li>
                        <li> <b> Wireshark: </b> Open source package analyzer. It is used in the troubleshooting and analysis of computer networks </li>
                        <li> <b> Metasploit: </b> open source program that provides information about vulnerabilities in computer systems and exploits them. </li>
                        <li> <b> Burp Suite: </b> application used for securing or penetrating web applications. </li>
                    </ul>
                    <p style="font-size: 18px; text-align: justify; color: white">
                        In summary, Kali-Linux is one of the most suitable tools for performing penetration testing.
                        </br>
                        </br>
                        To download Kali, click on the following link (64-Bit recommended): <a target = "_ blank" style = "text-decoration: underline" href = "https://www.offensive-security.com/kali-linux -vm-vmware-virtualbox-image-download / # 1572305786534-030ce714-cc3b "> https://www.offensive-security.com/kali-linux-vm-vmware-virtualbox-image-download/ </a>
                        </br>
                        </br>
                        Once the .OVA has been downloaded, open VirtualBox and go to File> Import Virtual Appliance, select the downloaded .OVA, tap Next and then tap Import.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        </br>
                            <img src="../images/kali-prerequisite.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; text-align: justify; color: white">
                        If you are asked to accept the software license agreement, click Accept.
                        </br>
                        Then start your Kali directly in VirtualBox, The default username and password are "kali" and "kali".
                        </br>
                        </br>
                        Update the system by entering in the terminal the commands <samp> <kbd> sudo apt-get update </kbd> </samp> and <samp> <kbd> sudo apt-get upgrade </kbd> </ samp > then the <samp> <kbd> sudo apt-get dist-upgrade </kbd> </samp> command.
                        </br>
                        </br>
                        Your Kali is operational!
                        </br>
                        </br>
                        However, here are some useful links to put your Kali in Azerty, full screen and start SSH when Kali starts:
                        </br>
                        </br>
                        - Kali in Azerty: <a target="_blank" style="text-decoration:underline" href="https://www.youtube.com/watch?v=zQPKJicgHTg"> https://www.youtube.com / watch? v = zQPKJicgHTg </a>
                        </br>
                        </br>
                        - Kali in full screen: <a target="_blank" style="text-decoration:underline" href="https://www.youtube.com/watch?v=6LaHG8SC8n4"> https://www.youtube. com / watch? v = 6LaHG8SC8n4 </a>
                        </br>
                        </br>
                        - Start SSH when Kali starts: Enter in a terminal the following command <samp> <kbd> systemctl enable ssh.service </kbd> </samp>, then restart your virtual machine.
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">3. Metasploitable 2</h2>
                    <p style="font-size: 18px; text-align: justify; color: white">
                        Metasploitable is an intentionally insecure Linux virtual machine.
                        </br>
                        </br>
                        This VM is used for security training, to train in pentest tools and to train in different security testing techniques.
                        </br>
                        </br>
                        By taking this VM by storm, one can gradually learn the most common vulnerabilities of vulnerable systems.
                        </br>
                        </br>
                        To download Metasploitable, download the virtual hard drive from the site below: </br> <a target = "_ blank" style = "text-decoration: underline" href = "https://sourceforge.net/projects/metasploitable /files/Metasploitable2/">https://sourceforge.net/projects/metasploitable/files/Metasploitable2/ </a>.
                        </br>
                        </br>
                        Then, in VirtualBox, create a new virtual machine of Linux type and Ubuntu version (64-bit).
                        During installation, check Use an existing virtual hard disk file and then select Metasploitable.vmdk
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        </br>
                            <img src="../images/metasploitable-prerequisite-1.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; text-align: justify; color: white">
                        Before starting your machine, do not forget to change the network access mode to Bridge access in the Configuration> Network tab.
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0"> 
                    <p style="font-size: 18px;">   
                        </br>
                            <img src="../images/metasploitable-prerequisite-2.png" class="img-fluid" style="box-shadow: 0 16px 10px -8px rgba(0, 0, 0, .4);"/>
                        </br>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    <p style="font-size: 18px; text-align: justify; color: white">
                        </br>
                        The login and password are "msfadmin" and "msfadmin".
                        </br>
                        </br>
                        Your machines are now ready for use.
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