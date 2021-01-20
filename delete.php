<?php
  require('db/connexionDB.php'); // Fichier PHP contenant la connexion à la BDD
  session_start();
  if(!isset($_SESSION['nickname']))
  { 
    ?>
    <script language="Javascript">
    document.location.replace("register.php");
    </script>
    <?php
  }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale-1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
       
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Supprimer mon compte</title>
        <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
    </head>

    <body style="background-color: rgba(61,72,92)">
        <?php require_once('menu.php'); 
        $nickname = $_SESSION['nickname'];
        $result2 = $db->query("SELECT id, nickname FROM user WHERE nickname = '$nickname'");
        $data2 = $result2->fetch();
        ?>
        <div class="centrer" style="box-shadow: 0 5px 5px rgba(0, 0, 0, .2);">  
            <div class="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="profil.php"><?php echo $data2['nickname']; ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Supprimer mon compte</li>
                    </ol>
                </nav>
            </div> 
            <h1>Supprimer mon compte</h1>
            </br>
            </br>
        </div>
        </br>
        </br>
        <!-- Formulaire suppression compte -->
        <form action="delete.php" method="POST">
            <div class="container">
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-0">
                        </br>
                        </br>
                        <p style="color: white">Vous voulez supprimer votre compte ?</p>
                        <p style="color: white; font-weight: bold">Cette action est définitive.</p>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-0">
                        </br>
                        <button type="submit" class="btn btn-danger" id="modify" name="modify">Valider</button>
                    </div>
                </div>
            </div>
            <!-- Vérification suppression compte -->
            <?php
            if(isset($_POST['modify']))
            {
                $idUser = $data2['id'];
                $req = $db->prepare('DELETE FROM user WHERE id = :id');
                $req->execute(array('id' => $idUser));
                session_destroy();
                ?>
                <script language="Javascript">
                document.location.replace("index.php");
                </script>
                <?php
            }
            ?>
        </form>   
    </body>
</html>