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
        $this-> idModule_ = $NewidModule;
        $this-> idScene_ = $NewidScene;
    }

    public function creationCanaux($valeur, $idModule, $idScene)
    {
        $sqlInsertCanaux = "INSERT INTO canaux(valeur, idmodule, idscene) VALUES('".$valeur."','".$idModule."','".$idScene."')";
        $reqInsertCanaux = $GLOBALS['bdd']->query($sqlInsertCanaux);
    }


}
?>