<?php

class Canaux{

    private $id_;
    private $valeur_;
    private $idModule_;
    private $idScene_;
    
    public function __construct($Newid, $Newvaleur, $NewidModule, $NewidScene)
    {
        $this-> id_ = $Newid;
        $this-> valeur_ = $Newvaleur;
        $this-> idModule_ = $NewModule;
        $this-> idScene_ = $NewidScene;
    }


}
?>