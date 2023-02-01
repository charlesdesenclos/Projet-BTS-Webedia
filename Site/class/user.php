<?php
    class user {
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
            $Request = "SELECT * FROM `user` WHERE `login` = '".$login."' and `password` = '".$password."';";

            $result = $GLOBALS["PDO"]->query($Request);

            if($result->rowCount() > 0) {
                // echo "Identifiants corrects.";
                $_SESSION['connexion'] = true;
                return true;
            } else {
                // echo "Identifiants incorrects.";
                return false;
            }
        }

        public function seDeconnecter() {
            session_unset();
            session_destroy();
        }
    }