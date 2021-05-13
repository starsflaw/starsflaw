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
        <title>Prérequis</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Prérequis : Installez les outils</li>
                    </ol>
                </nav>
            </div> 
            <h1>Prérequis : Installez les outils</h1>
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
                        Avant de démarrer les différents cours ou challenges, nous devons préparer notre environnement de travail. Pour ce faire nous aurons besoin de :
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
                        Tout d'abord nous allons avoir besoin de VirtualBox. VirtualBox propose de virtualiser vos systèmes d'exploitation (OS) invités sur une machine hôte. Appelée hyperviseur, l'application supporte les systèmes Windows, Linux, Mac OS X, Solaris, Free BSD, etc., en tant qu'hôte.
                        </br>
                        </br>
                        Pour télécharger VirtualBox, cliquez sur le lien suivant : <a target="_blank" style="text-decoration:underline" href="https://www.virtualbox.org/wiki/Downloads">https://www.virtualbox.org/wiki/Downloads</a>
                        </br>
                        </br>
                        Puis choisissez la version correspondant à votre système d'exploitation.
                        </br>
                        </br>
                        Une fois l'exectutable téléchargé, double cliquez sur celui-ci et lancez l'assistant d'installation. Laissez les configurations par défault et acceptez de poursuivre l'installation lors de l'Avertissement Interfaces Réseau. Enfin, cliquez sur Installer. Si votre ordinateur vous demande si vous voulez installer le logiciel périphérique Oracle Corporation, acceptez en cliquant sur Installer.
                        </br>
                        </br>
                        Voila VirtualBox est désormais installé ! Désormais, nous pouvons installer nos machines. 
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">2. Kali</h2>
                    <p style="font-size: 18px; text-align: justify; color: white">
                        Kali Linux est une distribution regroupant l'ensemble des outils nécessaires aux tests de sécurité d'un système d'information. 
                        </br>
                        </br>
                        Cette distribution rassemble plus de 600 programmes pré installés comme : 
                        </br>
                        </br>
                    </p>
                    <ul style="font-size: 18px; text-align: justify; color: white">
                        <li><b>Nmap :</b> Le plus célèbre scanner de ports libre distribué par Insecure.org. Il est conçu pour détecter les ports ouverts, identifier les services hébergés et obtenir des informations sur le système d'exploitation d'un ordinateur distant.</li>
                        <li><b>Wireshark :</b> Analyseur de paquets libre et gratuit. Il est utilisé dans le dépannage et l’analyse de réseaux informatiques </li>
                        <li><b>Metasploit :</b> programme open source qui fournit des informations sur les vulnérabilités de systèmes informatiques et les exploite. </li>
                        <li><b>Burp Suite :</b> application utilisée pour la sécurisation ou les tests d’intrusion des applications web. </li>
                    </ul>
                    <p style="font-size: 18px; text-align: justify; color: white">
                        En résumé, Kali-Linux est un des outils les plus adaptés pour effectuer des tests d’intrusion.
                        </br>
                        </br>
                        Pour télécharger Kali, cliquez sur le lien suivant (64-Bit recommandé) : <a target="_blank" style="text-decoration:underline" href="https://www.offensive-security.com/kali-linux-vm-vmware-virtualbox-image-download/#1572305786534-030ce714-cc3b">https://www.offensive-security.com/kali-linux-vm-vmware-virtualbox-image-download/</a>
                        </br>
                        </br>
                        Une fois le .OVA téléchargé, ouvrez VirtualBox et allez dans Fichier > Importer un appareil virtuel, sélectionnez le .OVA téléchargé, appuyez sur Suivant puis sur Importer.
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
                        Si l'on vous demande d'accepter le contrat de license du logiciel, cliquez sur Accepter.
                        </br>
                        Démarrez ensuite votre Kali directement dans VirtualBox, Le nom de l'utilisateur et le mot de passe par défaut sont "kali" et "kali". 
                        </br>
                        </br>
                        Mettre à jour le système en rentrant dans le terminal les commandes <samp><kbd>sudo apt-get update</kbd></samp> et <samp><kbd>sudo apt-get upgrade</kbd></samp> puis la commande <samp><kbd>sudo apt-get dist-upgrade</kbd></samp>. 
                        </br>
                        </br>
                        Votre Kali est opérationnelle !
                        </br>
                        </br>
                        Cependant, voici quelques liens utiles pour mettre votre Kali en Azerty, full screen et démarrer SSH au démarrage de Kali : 
                        </br>
                        </br>
                        - Kali en Azerty : <a target="_blank" style="text-decoration:underline" href="https://www.youtube.com/watch?v=zQPKJicgHTg">https://www.youtube.com/watch?v=zQPKJicgHTg</a>
                        </br>
                        </br>
                        - Kali en full screen : <a target="_blank" style="text-decoration:underline" href="https://www.youtube.com/watch?v=6LaHG8SC8n4">https://www.youtube.com/watch?v=6LaHG8SC8n4</a>
                        </br>
                        </br>
                        - Démarrer SSH au démarrage de Kali : Entrez dans un terminal la commande suivante <samp><kbd>systemctl enable ssh.service</kbd></samp>, puis redémarrez votre machine virtuelle.
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">3. Metasploitable 2</h2>
                    <p style="font-size: 18px; text-align: justify; color: white">
                        Metasploitable est une machine virtuelle sous Linux intentionnellement non sécurisée.  
                        </br>
                        </br>
                        Cette VM est utilisée pour la formation en matière de sécurité, pour se former aux outils de pentest et pour se former aux différentes techniques de tests de sécurité. 
                        </br>
                        </br>
                        En prenant cette VM d’assaut, on peut apprendre petit à petit les vulnérabilités les plus communes des systèmes vulnérables. 
                        </br>
                        </br>
                        Pour télécharger Metasploitable, téléchargez le disque dur virtuel sur le site ci-dessous : </br><a target="_blank" style="text-decoration:underline" href="https://sourceforge.net/projects/metasploitable/files/Metasploitable2/">https://sourceforge.net/projects/metasploitable/files/Metasploitable2/</a>.
                        </br>
                        </br>
                        Ensuite, dans VirtualBox, créer une nouvelle machine virtuelle de type Linux et de version Ubuntu (64-bit). 
                        Durant l’installation, cochez Utiliser un fichier de disque dur virtuel existant puis sélectionnez Metasploitable.vmdk
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
                        Avant de lancer votre machine, n’oubliez pas de changer le mode d’accès réseaux en Accès par pont dans l’onglet Configuration > Réseau.
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
                        Le login et mot de passe sont « msfadmin » et « msfadmin ».
                        </br>
                        </br>
                        Vos machines sont désormais prêtes à l’emploi.
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