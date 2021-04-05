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

        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=602a691af71937001207d489&product=inline-share-buttons" async="async"></script>
    </head>

    <?php // Corps de la page ?>
    <body>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="group col-sm-0" style="color:white; font-size: 14px; margin-top: 170px;">
                    ______________________________________________________________________________________________________________________
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0">
                    <img src="../images/deathstarw.png" style="width: 10%; display: block; margin-left: auto; margin-right: auto; margin-bottom: 15px; margin-top: 20px;"/>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0" style="color:white; font-size: 14px">
                    <a style="color:white; font-size: 14px" href="../confidentiality.php">Confidentialité </a>
                    |
                    <a style="color:white; font-size: 14px" href="../legal-notice.php"> Mentions légales </a>
                    |
                    <a style="color:white; font-size: 14px" href="../terms-of-service.php"> Conditions Générales d'Utilisation </a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0" style="color:white; font-size: 14px">
                    Star's Flaw : plateforme d’apprentissage pour s'initier à la Cybersécurité
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="group col-sm-0" style="color:white; font-size: 14px">
                    © 2020 - <?php echo date("Y"); ?>
                </div>
            </div>            
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="group col-sm-0" style="margin-top: 25px; margin-bottom: 10px">
                    <?php // Facebook ?>
                    <a href="https://www.facebook.com/Stars-Flaw-101014698769677" target="_blank">
                        <img class="image" src='../images/fbw.png' onmouseover="this.src='../images/fb.png'" onmouseout="this.src='../images/fbw.png'" width="40" height="40">
                    </a>
                    &nbsp;
                    <?php // Twitter ?>
                    <a href="https://twitter.com/FlawStars" target="_blank">
                        <img class="image" src='../images/twitterw.png' onmouseover="this.src='../images/twitter.png'" onmouseout="this.src='../images/twitterw.png'" width="40" height="40">
                    </a>
                    &nbsp;
                    <?php // Github ?>
                    <a href="https://github.com/starsflaw/starsflaw" target="_blank">
                        <img class="image" src='../images/githubw.png' onmouseover="this.src='../images/github.png'" onmouseout="this.src='../images/githubw.png'" width="40" height="40">
                    </a>
                    &nbsp;
                    <?php // Sharelink ?>
                    <a href="#">
                        <img class="image" src='../images/sharelinkw.png' onmouseover="this.src='../images/sharelink.png'" onmouseout="this.src='../images/sharelinkw.png'" width="40" height="40">
                    </a>
                </div>
            </div>
        </div>
        </br>
    </body>
</html>