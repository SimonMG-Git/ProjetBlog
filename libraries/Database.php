<?php

class Database {
    // Connexion à la base de données
    public static function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        
        try {
            $bdd = new PDO("mysql:host=$servername;dbname=blogp4", $username, $password);
            // set the PDO error mode to exception
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            return $bdd;
            }
        catch(Exception $e)
            {
            echo "Connection failed: " . $e->getMessage();
            die();
            }
    }
}