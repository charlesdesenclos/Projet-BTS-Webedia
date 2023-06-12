<?php 

class favori {

    // Init variables
    private $id;
    private $positionX;
    private $positionY;
    private $idUser;
    private $idScene;

    public function __construct($id, $positionX, $positionY, $idUser, $idScene) {
        $this->id_ = $id;
        $this->positionX_ = $positionX;
        $this->positionY_ = $positionY;
        $this->idUser_ = $idUser;
        $this->idScene_ = $idScene;
    }

    
    public function getAllFavorite() {
        $Request = "SELECT * FROM `favori` WHERE idUser = '" . $_SESSION['id'] . "'";
		$Result = $GLOBALS["bdd"]->query($Request);

        if ($Result->rowCount() > 0) {
            foreach ($Result as $row) {                
            // Afficher le bloc de scène
            echo "<div class='list-item' draggable='true' onclick='displaySceneId(" . $row['id'] . ")'>" . $row['nom'] . "</div>";
            }
        }
    }

    public function addFavorite($idScene, $idUser) {
        $Request = "INSERT INTO favoris('idUser', 'idScene') VALUES ('".$idUser."', '".$idScene."')";
		$Result = $GLOBALS["bdd"]->query($Request);
    }

    public function removeFavorite($idScene, $idUser) {
        $Request = "DELETE FROM `favoris` WHERE idUser = '".$idUser."' AND idScene = '".$idScene."'";
		$Result = $GLOBALS["bdd"]->query($Request);
    }
}