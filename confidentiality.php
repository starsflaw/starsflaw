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
        <title>Politique de confidentialité</title>
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
                    <h1 style="color:white">Politique de confidentialité</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-8">
                    </br>
                    <h2 style="color:white">1. Introduction</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        Dans le cadre de son activité le Projet Star's Flaw traite des données à caractère personnel vous concernant en tant que responsable de traitement dans le cadre de l’utilisation de son site internet accessible à l’adresse url suivante : <a style="text-decoration:underline" href="https://www.starsflaw.fr">https://www.starsflaw.fr</a>
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">2. Responsable de traitement</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        Le Projet Star's Flaw réalise un traitement de données à caractère personnel, en tant que responsable du traitement.
                        </br>
                        Adresse : 38 Rue Molière – 94200 Ivry-sur-Seine - France
                        </br>
                        Courriel : starsflaw@gmail.com
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">3. Objet</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        Cette politique a pour objet d’informer les utilisateurs, des modalités de collecte, de traitement, et d’utilisation de leurs données personnelles et de leurs droits en matière de protection de ces données au regard du RGPD et de la loi 78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés, modifiée.
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">4. Quand traitons-nous des données ?</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        Les données personnelles sont collectées par Star's Flaw à travers le site <a style="text-decoration:underline" href="https://www.starsflaw.fr">www.starsflaw.fr</a> pour des finalités déterminées, explicites et légitimes, à l’occasion : 
                        </br>
                        </br>
                        1. de l’utilisation du site <a style="text-decoration:underline" href="https://www.starsflaw.fr">https://www.starsflaw.fr</a>
                        </br>
                        2. du formulaire de création d’un compte
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">5. Quelles catégories de données collectées traitons-nous ?</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        Dans le cadre de l’utilisation du site <a style="text-decoration:underline" href="https://www.starsflaw.fr">https://www.starsflaw.fr</a> plusieurs types de données à caractère personnel peuvent être collectés. Principalement, les données collectées correspondant aux catégories suivantes :
                        </br>
                        </br>
                        1. données d’identification (pseudo et mot de passe) ;
                        </br>
                        2. données aux fins de communication (adresse de courrier électronique) ;
                        </br>
                        3. données résultants de vos activités sur le site et en particulier les données issues des challenges ;
                        </br>
                        4. données de connexion(nom du site internet, URL du site internet, adresse IPv4 et IPv6, à compléter le cas échéant) ;
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">6. Pour quelles finalités les données sont-elles collectées ?</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        La collecte de données personnelles par Star's Flaw dans le cadre du site <a style="text-decoration:underline" href="https://www.starsflaw.fr">https://www.starsflaw.fr</a> a comme finalité : 
                        </br>
                        </br>
                        1. La gestion et l’amélioration de l’accès et du fonctionnement du service uniquement
                        </br>
                        2. la mise en place de la page Profil de l'utilisateur.
                        </br>
                        </br>
                        La base juridique de ces traitements est l’intérêt légitime à fournir un service d’activités ludiques auxquels les internautes souscrivent librement ou encore à répondre au mieux à toute éventuelle sollicitation. La base légale repose sur le consentement de l’utilisation. Les champs identifiés dans le formulaire d’inscription sont strictement nécessaires à la finalité poursuivie par Star's Flaw. En l’absence de réponse ou si les informations fournies sont erronées, Star's Flaw ne pourra pas garantir la qualité du service fourni.
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">7. A qui ces données sont-elles transmises ?</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        Les informations communiquées par l’utilisateur sont destinées au personnel habilité de Star's Flaw, tenue à une obligation de confidentialité. 
                        Star's Flaw s’engage à ne pas transférer vos données personnelles en dehors de son utilisation fonctionelle, le tout afin de garantir un bon niveau de protection de celles-ci.
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">8. Combien de temps les données sont-elles conservées ?</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        Star's Flaw conserve les données collectées dans le cadre de l’utilisation du site <a style="text-decoration:underline" href="https://www.starsflaw.fr">https://www.starsflaw.fr</a> pour une durée proportionnelle à la finalité pour laquelle elles sont collectées. A ce titre, les données du Profil utilisateur pour toute la durée de votre inscription.
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">9. Quels sont vos droits ?</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        Vous êtes informé que vous disposez d’un droit d’accès, d’interrogation, de limitation, de portabilité, d’effacement et de rectification relativement à l’ensemble de vos données qui vous permet, le cas échéant, de faire rectifier, compléter, mettre à jour, verrouiller ou effacer les données personnelles vous concernant qui sont inexactes, incomplètes, équivoques, périmées ou dont la collecte, l’utilisation, la communication ou la conservation est interdite. Par ailleurs, vous disposez du droit de formuler des directives spécifiques et générales concernant la conservation, l’effacement et la communication de vos données post-mortem.
                        </br>
                        Star's Flaw se tient disponible pour apporter toute précision nécessaire concernant sa politique de protection des données personnelles. Vous pouvez exercer vos droits ou poser toute question auprès du responsable interne Protection des données Julien Maccario par mail à : starsflaw@gmail.com. Dans un souci de confidentialité et de protection des données personnelles, Star's Flaw doit s’assurer de l’identité de l’utilisateur avant de répondre à sa demande. Aussi, toute demande tendant à l’exercice de ces droits devra être accompagnée d’une copie signée d’un titre d’identité en cours de validité. Enfin, l’utilisateur est tenu de respecter les dispositions de la loi Informatique et Libertés du 6 janvier 1978 modifiée, dont la violation est passible de sanctions pénales.
                        </br>
                        Vous disposez également d’un droit d’opposition au traitement de vos données pour des motifs légitimes.
                        </br>
                        </br>
                    </p>
                    <h2 style="color:white">10. La sécurité des données personnelles</h2>
                    <p style="font-size: 18px; text-align: justify; color:white">
                        Star's Flaw a mis en place des mesures techniques et organisationnelles adaptées au degré de sensibilité des données personnelles, en vue d’assurer l’intégrité et la confidentialité les données et de les protéger contre toute intrusion malveillante, toute perte, altération ou divulgation à des tiers non autorisés. Star's Flaw s’engage à prendre les mesures de sécurité physiques, techniques et organisationnelles nécessaires pour : protéger ses activités ; préserver la sécurité des données personnelles des utilisateurs contre tout accès, modification, déformation, divulgation, destruction ou accès non autorisés des données personnelles qu’elle détient. Néanmoins, la sécurité et la confidentialité des données personnelles reposent sur les bonnes pratiques de chacun, ainsi la personne concernée est invitée à rester vigilante sur la question.
                    </p>
                </div>
            </div>
        </div>
    </body>
    <?php 
    // Inclusion de la barre de navigation
    require_once('footer.php'); 
    ?>
</html>