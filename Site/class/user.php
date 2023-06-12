<?php
    class User {
        // Propriétés
        private $id_;
        private $login_;
        private $password_;
        private $isAdmin_ = false;

        //MÉTHODES DE LA CLASSE 

        // Contructeur
        public function __construct($id, $login, $password, $isAdmin) {
            $this->id_ = $id;
            $this->login_ = $login;
            $this->password_ = $password;
            $this->isAdmin_ = $isAdmin;
        }

        public function seConnecter($login, $password) {
            $Request = "SELECT * FROM `user` WHERE `identifiant` = '".$login."' and `password` = '".$password."';";

            $result = $GLOBALS["bdd"]->query($Request);

            if($result->rowCount() > 0) {
                // echo "Identifiants corrects.";
                $_SESSION['connexion'] = true;
                return true;
            } else {
                $this->erreurConnexion = "Identifiants incorrects."; // Nouvelle ligne pour définir le message d'erreur
                return false;
            }
        }

        public function seDeconnecter() {
            session_unset();
            session_destroy();
        }

        public function inscription($login, $password) {
            $Request = "INSERT INTO `user`(`identifiant`, `password`) VALUES ('".$login."', '".$password."');";

            $result = $GLOBALS["bdd"]->query($Request); 

            echo "Inscription confirmée !";
        }

        public function verifAdmin() {
            $Request = "SELECT isAdmin FROM `user` WHERE id = id";
     
        }

        public function getIdentifiant() {
            return $login_;
        }

        public function getId($login, $password) {
            $reqID = "SELECT id FROM `user` WHERE `identifiant` = '".$login."' and `password` = '".$password."'";
            $result = $GLOBALS["bdd"]->query($reqID);
            $id = $result->fetchColumn();
            return $id;
        }
        
        public function getNom($id) {
            $request = "SELECT identifiant FROM `user` WHERE id = '".$id."'";
            $result = $GLOBALS["bdd"]->query($request);
            $nom = $result->fetchColumn();
            return $nom;
        }

        public function isAdmin($id) {
            $request = "SELECT isAdmin FROM `user` WHERE id = '".$id."'";
            $result = $GLOBALS["bdd"]->query($request);
            $isAdmin = $result->fetchColumn();
            return $isAdmin;
        }
    }
