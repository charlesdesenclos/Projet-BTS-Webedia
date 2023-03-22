<?php

class Champs{
    private $id_;
    private $idCanaux_;
    private $nomChamps_;
    private $adresse_;

    public function __construct($Newid, $NewidCanaux, $NewnomChamps, $Newadresse)
    {
        $this-> id_ = $Newid;
        $this-> idCanaux_ = $NewidCanaux;
        $this-> nomChamps_ = $NewnomChamps;
        $this-> adresse_ = $Newadresse;
    }

    public function creationChamps($nomChamps, $adress, $idCanaux)
    {
        $sqlInsertChamps = "INSERT INTO champs(nomChamps, adress, idCanaux) VALUES('".$nomChamps."','".$adress."','".$idCanaux."')";
        $reqInsertChamps = $GLOBALS['bdd']->query($sqlInsertChamps);
    }

}








?>