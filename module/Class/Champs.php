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
    public function modificationChamps($id, $idCanaux, $nomChamps, $adress)
   {
      echo "Modifier en BDD";
   }

   public function suppressionChamps($id)
   {
      echo "Supprime en BDD";
   }

   public function affichageChamps()
   {
        $reqAffichageChamps ="SELECT module.nomEquipement AS nomEquipement, scene.nom AS nom, champs.nomChamps AS nomChamps, champs.adress AS adress  FROM  champs, canaux, module, scene WHERE champs.idCanaux = canaux.id AND canaux.idmodule = module.id AND canaux.idscene = scene.id";
        $resultatSelectChamps = $GLOBALS['bdd'] -> query($reqAffichageChamps);
        return $resultatSelectChamps;
   }


}








?>