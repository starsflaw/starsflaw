<?php
   try
   {
     $db = new PDO('mysql:host=localhost;dbname=db;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   }
   catch (Exception $e)
   {
     die('Erreur : ' . $e->getMessage());
   }
   
   $response = $db->query('SELECT * FROM user');
   $data = $response->fetch();
?>