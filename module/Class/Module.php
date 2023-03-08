<?php

class Module{

    private $id_;
    private $nomEquipement_;
    private $adresse_;

    public function __construct($Newid, $NewnomEquipement, $Newadresse)
     {
        $this-> id_ = $Newid;
        $this-> nomEquipement_ = $NewnomEquipement;
        $this-> adresse_ = $Newadresse;
     }
}



?>