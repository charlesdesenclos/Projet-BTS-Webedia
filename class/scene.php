<?php 

class scene {

    // Init variables
    private $id_;
    private $nom_;

    public function __construct($id, $nom) {
        $this->id_ = $id;
        $this->nom_ = $nom;
    }

    public function getAllScene() {
        $Request = "SELECT * FROM `scene`   where id <> 56";
		$Result = $GLOBALS["bdd"]->query($Request);

        if ($Result->rowCount() > 0) {
            foreach ($Result as $row) {                
            // Afficher le bloc de scène
            echo "<div class='list-item' draggable='true' onclick='displaySceneId(" . $row['id'] . ")'>" . $row['nom'] . "</div>";
            }
        }
    }

    public function getID() {
        return $this->id_;
    }

}