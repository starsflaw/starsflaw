<?php
// Connexion à MySQL avec PDO en traquant les erreurs avec array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
try
{
  // Sous WAMP
  $db = new PDO('mysql:host=localhost;dbname=starsflawdb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

  // Sous MAMP
  //$db = new PDO('mysql:host=localhost;dbname=starsflawdb;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

// Tester la présence d'erreurs en gérant les exceptions
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}

$response = $db->prepare('SELECT * FROM user'); // Test d'une requête préparée : Sélectionner tous les champs de la table user
$data = $response->fetch(); // $data est un array qui contient champ par champ les valeurs de la ligne sélectionnée de la table
$response->closeCursor(); // Fermeture du curseur d'analyse des résultats
?>