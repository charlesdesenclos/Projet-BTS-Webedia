<?php

class Champs{
    private $id_;
    private $idCanaux_;
    private $valeur_;
    private $adresse_;

    public function __construct($Newid, $NewidCanaux, $Newvaleur, $Newadresse)
    {
        $this-> id_ = $Newid;
        $this-> idCanaux_ = $NewidCanaux;
        $this-> valeur_ = $Newvaleur;
        $this-> adresse_ = $Newadresse;
    }

}








?>