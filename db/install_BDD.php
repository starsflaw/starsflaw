<?php
    $host = 'localhost';
    $root = 'root';
    $root_password = '';
    $user = 'starsflawuser';
    $pass = 'St0ngP#ssw0rdf0rStr#rsfl#w';
    $db = "starsflawdb";
    $filename="starsflawdb.sql";
    try {
        $dbh=new PDO('mysql:host='.$host.';charset=utf8;port=3306',$root ,$root_password,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $dbh->exec("CREATE DATABASE `$db`;
                CREATE USER '$user'@'%' IDENTIFIED BY '$pass';
                GRANT ALL ON `$db`.* TO '$user'@'%';
                FLUSH PRIVILEGES;")
        or die(print_r($dbh->errorInfo(), true));

        $dbh=new PDO('mysql:host='.$host.';dbname=starsflawdb;charset=utf8;port=3306',$root ,$root_password,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // Temporary variable, used to store current query
        $templine = '';
        // Read in entire file
        $lines = file($filename);
        //var_dump($lines);
        // Loop through each line
        foreach ($lines as $line) {
        // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || substr($line, 0, 2) == '/*' || $line == '')
                continue;

            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
                // Perform the query
                $dbh->exec($templine);
                //mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                // Reset temp variable to empty
                //var_dump($templine);
                $templine = '';
                echo "Request";
            }
        }
        echo "Tables imported successfully";
    }
    catch (PDOException $e) {
        die("DB ERROR: " . $e->getMessage());
    }
?>