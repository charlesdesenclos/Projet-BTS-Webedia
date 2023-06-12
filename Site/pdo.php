<?php
    // CONNEXION BASE DE DONNEES
    try {
        // $ipServer = "localhost";
        $ipServer = "192.168.64.157";
        $nomBase = "Webedia";
        $login = "user";
        $password ="jGqOaSMyy927qO-a";

        $GLOBALS["bdd"] = new PDO('mysql:host='.$ipServer.';dbname='.$nomBase.'', $login, $password);
        // echo "Connexion à la base de donnée réussi !";
    } catch (PDOException $e) {
        die('Erreur : '.$e->getMessage());
    }
?>