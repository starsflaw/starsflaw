<?php
require('db/connexionDB.php');                // Fichier PHP contenant la connexion à la BDD
session_start();                              // On démarre la session
if(!isset($_SESSION['nickname']))             // S'il n'y a pas d'utilisateur connecté, redirection vers la page de connexion
{ 
    ?>
    <script language="Javascript">
        document.location.replace("register");
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
        <link rel="stylesheet" href="style.css">

        <?php // Titre principal et icône de la page ?>
        <title>Modifier mon pseudo</title>
        <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
    </head>

    <?php // Corps de la page ?>
    <body style="background-color: rgba(45,54,69)">
        <?php 
        // Inclusion de la barre de navigation
        require_once('menu.php'); 
        $nickname = $_SESSION['nickname'];
        // Requête préparée avec marqueurs nominatifs : Sélectionner les champs id, nickname de la table user lorsque nickname = $nickname 
        // $data2 est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
        $result2 = $db->prepare('SELECT id, nickname FROM user WHERE nickname = :nickname');
        $result2->execute(array('nickname' => $nickname));
        $data2 = $result2->fetch();

        // Mise en place d'un fil d'Arianne
        ?>
        <div class="centrer" style="box-shadow: 0 5px 5px rgba(0, 0, 0, .2);">  
            <div class="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="profil"><?php echo $data2['nickname']; ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier mon pseudo</li>
                    </ol>
                </nav>
            </div> 
            <h1>Modifier mon pseudo</h1>
            </br>
            </br>
        </div>
        </br>
        </br>
        <?php // Formulaire de modification du pseudo ?>
        <form action="modify-name" method="POST">
        <div class="container">
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-5">
                    <label for="staticEmail" style="color:rgba(55,150,255)">Pseudo actuel</label>
                    <p style="color: white"><?php echo $data2['nickname']; ?></p>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-5">
                    <label for="nickname" style="color:rgba(55,150,255)">Nouveau pseudo</label>
                    <input type="text" class="form-control" id="nickname" name="nickname" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-0">
                    </br>
                    <button type="submit" class="btn btn-primary" id="modify" name="modify">Enregistrer</button>
                </div>
            </div>
        </div>
        <?php
        // Vérification du formulaire de modification du pseudo
        if(isset($_POST['modify']))
        {
            $nickname = htmlspecialchars(trim($_POST['nickname'])); // On récupère le pseudo
            $valid = 1;
            // Vérification du nom
            // Si pas de pseudo => message d'erreur
            if(empty($nickname))
            {
                $valid = 0;
                echo "Le nom d'utilisateur ne peut pas être vide";
            }
            else
            {
                // Si le pseudo rentré est différent du pseudo actuel,
                if($nickname != $data2['nickname'])
                {
                    // Alors, on vérifie que le pseudo est disponible
                    // Requête préparée avec marqueurs nominatifs : Sélectionner le champ nickname de la table user lorsque nickname = $nickname
                    // $data est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
                    $req_pseudo = $db->prepare('SELECT nickname FROM user WHERE nickname = :nickname');
                    $req_pseudo->execute(array('nickname' => $nickname));
                    $data = $req_pseudo->fetch();

                    // Si data n'est pas vide => message d'erreur
                    if($data)
                    {
                        $valid = 0;
                        ?>
                        <div class="container">
                        <div class="row justify-content-center">
                            <div class="group col-sm-1.5">
                                <strong style="color: red;"> Ce pseudo est déjà pris </strong>
                            </div>
                        </div>
                        </div>
                        <?php
                    }
                }
            }

            // Si toutes les conditions sont remplies alors on fait le traitement
            if($valid == 1)
            {
                // Requête préparée avec marqueurs nominatifs : Mettre à jour le champ nickname de la table user lorsque id = $data2['id']
                $req = $db->prepare('UPDATE user SET nickname =:nickname WHERE id = :id');
                $req->execute(array('nickname' => $nickname, 'id' => $data2['id']));

                $id = $data2['id'];
                // Requête préparée avec marqueurs nominatifs : Sélectionner le champ nickname de la table user lorsque id = $id
                // $data_name est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
                $result3 = $db->prepare('SELECT nickname FROM user WHERE id = :id');
                $result3->execute(array('id' => $id));
                $data_name = $result3->fetch();

                // On met à jour la variable de session et on redirige l'utilisateur connecté vers la page du Profil
                $_SESSION['nickname'] = $data_name['nickname'];
                ?>
                <script language="Javascript">
                    document.location.replace("profil");
                </script>
                <?php
            }
        }
        ?>
        </form>   
    </body>
</html>