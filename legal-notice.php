<?php
session_start();      // On démarre la session
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
        <link rel="stylesheet" href="style.css">

        <?php // Titre principal et icône de la page ?>
        <title>Legales Notices</title>
        <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
    </head>

    <?php // Corps de la page ?>
    <body class="blue">
        <?php 
        // Inclusion de la barre de navigation
        require_once('menu.php'); 
        ?>
        <div class="container-fluid">
            </br>
            </br>
            <div class="row justify-content">
                <div class="group col-sm-0" style="margin-left: 16%">
                    <p style="font-size: 30px; font-family: Star Jedi; color: white"> 
                        <img src="images/deathstarw.png" style="width: 12%"/>
                        &nbsp; STAR'S fLaw 
                    </p>
                </div>
            </div>
            <div class="container">
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-1.5">
                    </br>
                    <h1 style="color:white">Legale Notices</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    </br>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        In accordance with the provisions of Article 6 III 1 ° of Law No. 2004-575 of June 21, 2004 on confidence in the digital economy, we inform you that:
                        </br>
                        </br>
                        This site is published by Star's Flaw, a non-profit association under the 1901 law whose objective is to promote the free dissemination of knowledge relating to pentesting, or more generally to Cybersecurity and the security of information systems.
                        </br>
                        </br>
                        Accommodation is provided by the IKOULA company.
                        </br>
                        </br>
                        The director of the publication is the Deputy Director General of the ESME Sudria school, Véronique Bonnet.
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">Object</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        The purpose of these presents is to set the conditions of use of the website accessible at the address <a style="text-decoration:underline" href="https://www.starsflaw.fr">https://www.starsflaw.fr</a>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">Creation of link to www.starsflaw.fr</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        Star's Flaw authorizes any website or any other medium to cite the site or to set up a hypertext link pointing to its content. The authorization to set up a link is valid for any site, with the exception of those disseminating information of a controversial, pornographic, xenophobic nature or which may, to a greater extent, undermine the sensitivity of the largest number, or cause any prejudice to Star's Flaw, its image and that of all of its users.
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">Computing and Freedom</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        Creating an account requires the user to enter personal data using an online form.
                        </br>
                        This information concerns the processing of personal data implemented for the administrative management of members.
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">Legislation</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        In accordance with Law No. 2004-801 of August 6, 2004 on the protection of individuals with regard to the processing of personal data amending Law No. 78-17 of January 6, 1978, Internet users have a right of access, rectification and deletion of data concerning them and opposition to their processing by contacting us by email at the address: starsflaw@gmail.com
                        </br>
                        </br>
                        The Internet user can access and change the information concerning him at any time in the dedicated area: "Profile".
                        </br>
                        </br>
                        <b> The activities of the Star's Flaw site are subject to French law and in particular to the provisions of the Godfrain law, hereinafter recalled: </b>
                        </br>
                        </br>
                        Article 323-1, paragraph 1 of the Penal Code: "<i> The fact of accessing or remaining, fraudulently, in all or part of an automated data processing system is punishable by two years' imprisonment and 30,000 euros fine </i> ". The simple attempt is punished in the same way (article 323-7 of the Penal Code).
                        </br>
                        </br>
                        Article 321-1, paragraph 2 of the Penal Code: "<i> When this has resulted in either the deletion or modification of data contained in the system, or an alteration in the functioning of this system, the penalty is three years. 'imprisonment and a fine of 45,000 euros </i> ".
                        </br>
                        </br>
                        Article 323-3 of the Penal Code: "<i> The fact of fraudulently introducing data into an automated processing system or fraudulently deleting or modifying the data it contains is punishable by five years' imprisonment and 75,000 euros fine </i> ".
                        </br>
                        </br>
                        Article 323-2 of the Penal Code: "<i> Obstructing or distorting the operation of an automated data processing system is punishable by five years' imprisonment and a fine of 75,000 euros. When this offense was committed against an automated personal data processing system implemented by the State, the penalty is increased to seven years' imprisonment and a fine of € 100,000 </i> " .
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">This information can be modified at any time without notice.</h2>
                </div>
            </div>
        </div>
    </body>
    <?php 
    // Inclusion de la barre de navigation
    require_once('footer.php'); 
    ?>
</html>