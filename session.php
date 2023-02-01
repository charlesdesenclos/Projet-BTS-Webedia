<?php
    session_start();
    include("class/user.php");

    $TheUser = new user(null, null, null, null);

    // CONNEXION BASE DE DONNEES
    try {
        $ipServer = "localhost";
        $nomBase = "Webedia";
        $login = "root";
        $password ="root";

        $GLOBALS["PDO"] = new PDO('mysql:host='.$ipServer.';dbname='.$nomBase.'', $login, $password);
        // echo "Connexion à la base de donnée réussi !";
    } catch (PDOException $e) {
        die('Erreur : '.$e->getMessage());
    }

    // TRAITEMENT DU FORMULAIRE DE CONNEXION
    if(isset($_POST['connexion'])) {
        $TheUser->seConnecter($_POST['login'], $_POST['password']);
    }

    // TRAITEMENT DE LA DECONNEXION
    if(isset($_POST['deconnexion'])) {
        $TheUser->seDeconnecter();
    }

    if(isset($_POST['connexion']) && $_SESSION['connexion'] == true) {
        // echo "Vous êtes déjà connecté !";
        ?>
        <form action = "" method = "POST">
            <input type = "submit" name = "deconnexion" value = "Deconnexion"/>
        </form>
        <?php
        
    } else {
        echo "Veuillez vous identifier";
        ?>
        <!-- FORMULAIRE DE CONNEXION -->
        <form action = "" method = "POST">
            <input type = "text" name = "login" placeholder = "Identifiant"/>
            <input type = "password" name = "password" placeholder = "Mot de passe"/>

            <input type = "submit" name = "connexion" text = "Connexion"/>
        </form>
    <?php 
    }

?>