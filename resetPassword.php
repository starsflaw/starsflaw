<?php
require('db/connexionDB.php');                  // Fichier PHP contenant la connexion à la BDD
session_start();                                // On démarre la session
if(isset($_SESSION['nickname']))                // S'il y a un utilisateur connecté => redirection vers la page d'accueil
{ 
    ?>
    <script language="Javascript">
        document.location.replace("index.php");
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
        <title>Réinitialisation mot de passe</title>
        <link rel="icon" type="image/png" sizes="16x16" href="images/deathstarw.png">
    </head>
    <?php // Corps de la page ?>
    <body class="blue">
        <?php 
        // Inclusion de la barre de navigation
        require_once('menu.php'); 
        ?>
        <div class="container">
            <div class="form-row justify-content-center">
                <div class="form-group col-sm-0">
                    </br>
                    </br>
                    </br>
                    </br>
                    </br>
                    </br>
                    </br>
                    <h1 style="color:white">Réinitialisation du mot de passe</h1>
                </div>
            </div>
        </div>
        <?php
        // Si absence du paramètre id dans l'url => redirection vers la page d'accueil
        if(!isset($_GET['id']))
        {
            $valid = 0;
            ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="group col-sm-0">
                        <strong style="color: red;"> Le lien est erroné </strong>
                    </div>
                </div>
            </div>
            <script language="Javascript">
                document.location.replace("index.php");
            </script>
            <?php
        }
        // Sinon récupération de la variable id
        else
        {
            $id = (int)$_GET['id'];
            $valid = 1;
        }
        // Si absence du paramètre token dans l'url => redirection vers la page d'accueil
        if(!isset($_GET['token']))
        {
            $valid = 0;
            ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="group col-sm-0">
                        <strong style="color: red;"> Le lien est erroné </strong>
                    </div>
                </div>
            </div>
            <script language="Javascript">
                document.location.replace("index.php");
            </script>
            <?php
        }
        // Sinon récupération de la variable token
        else
        {
            $token = (String)htmlspecialchars($_GET['token']);
            $valid = 1;
        }
        // Si id vide => message d'erreur
        if(!isset($id))
        {
            $valid = 0;
            ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="group col-sm-0">
                        <strong style="color: red;"> Le lien est erroné </strong>
                    </div>
                </div>
            </div>
            <?php
        }
        // Si token vide => message d'erreur
        if(!isset($token))
        {
            $valid = 0;
            ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="group col-sm-0">
                        <strong style="color: red;"> Le lien est erroné </strong>
                    </div>
                </div>
            </div>
            <?php
        }
        /* Si toutes les étapes précédentes sont validées, 
        alors vérification qu'il existe dans la base de données un user avec l'id et le token récupérés l'url */
        if($valid == 1)
        {
            // Requête préparée avec marqueurs nominatifs : Sélectionner les champs id, token de la table user lorsque id = $id et que token = $token 
            // $data_token est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
            $result2 = $db->prepare('SELECT id, token FROM user WHERE id = :id AND token =:token');
            $result2->execute(array('id' => $id, 'token' => $token));
            $data_token = $result2->fetch();
            /* Si l'id et le token récupérés dans le GET correspondent aux valeurs présentes dans la ligne sélectionnée de la table,
            alors Formulaire de Réinitialisation de mot de passe */
            if($id == $data_token['id'] AND $token == $data_token['token'])
            {
                // Formulaire de réinitialisation du mot de passe
                ?>
                <form action="resetPassword.php?id=<?php echo $_GET['id'].'&token='.$_GET['token']; ?>" method="POST">
                    <div class="container">
                        <div class="form-row justify-content-center">
                            <div class="form-group col-sm-4">
                                <label for="password" style="color:rgba(55,150,255)">Votre nouveau mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-group col-sm-4">
                                <label for="password2" style="color:rgba(55,150,255)">Confirmer ce nouveau mot de passe (obligatoire)</label>
                                <input type="password" class="form-control" id="password2" name="password2" style="border:2px solid rgba(55,150,255);background-color:#2d3645;color:white" required>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-group col-sm-4">
                                <button type="submit" class="btn btn-primary" id="register" name="register">Valider</button>
                            </div>
                        </div>
                    </div>
                    <?php
                    // Vérification du formulaire de réinitialisation du mot de passe
                    if(isset($_POST['register']))
                    {
                        $password = trim($_POST['password']); // On récupère le mot de passe 
                        $password2 = trim($_POST['password2']); //  On récupère la confirmation du mot de passe
                        $valid2 = 1;
                        // Vérification du mot de passe
                        // Si pas de mot de passe => message d'erreur
                        if(empty($password))
                        {
                            $valid2 = 0;
                            ?>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="group col-sm-1.5">
                                        <strong style="color: red;"> Le mot de passe ne peut pas être vide !</strong>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        // Si pas de confirmation de mot de passe => message d'erreur
                        if(empty($password2))
                        {
                            $valid2 = 0;
                            ?>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="group col-sm-1.5">
                                        <strong style="color: red;"> Veuillez confirmer votre mot de passe !</strong>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        // Si mot de passe différent de confirmation de mot de passe => message d'erreur
                        if($password !== $password2)
                        {
                            $valid2 = 0;
                            ?>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="group col-sm-1.5">
                                        <strong style="color: red;"> La confirmation du mot de passe ne correspond pas !</strong>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        // Si toutes les conditions sont remplies alors on fait le traitement
                        if($valid2 == 1)
                        {
                            // On hash le mot de passe et on remplace le hash précédent par le nouveau hash du mot de passe saisi
                            $hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 18]); 
                            // Requête préparée avec marqueurs nominatifs : Mettre à jour les champs token, confirmation_token et password de la table user lorsque id = $id (<=> $data_token['id'])
                            $req = $db->prepare('UPDATE user SET token = 0, confirmation_token =:confirmation_token, password =:password WHERE id = :id');
                            $req->execute(array('confirmation_token' => date('Y-m-d H:i:s'),'password' => $hash, 'id' => $data_token['id']));

                            // Requête préparée avec marqueurs nominatifs : Sélectionner le champ nickname de la table user lorsque id = $id
                            // $data_log est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
                            $result3 = $db->prepare('SELECT nickname FROM user WHERE id = :id');
                            $result3->execute(array('id' => $id));
                            $data_log = $result3->fetch();
                            
                            // Une fois le mot de passe modifié, on déclare une variable de session (<=> l'utilisateur est connecté) et on le redirige vers la page d'accueil
                            $_SESSION['nickname'] = $data_log['nickname'];
                            ?>
                            <script language="Javascript">
                                document.location.replace("index.php");
                            </script>
                            <?php
                        }
                    }
                    ?>
                </form>
                <?php
            }
            // Si le couple id, token ne correspond à aucun couple id, token de la base => message d'erreur
            else
            {
                $valid = 0;
                ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="group col-sm-1.5">
                            <strong style="color: red;"> Le lien est erroné </strong>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </body>
</html>