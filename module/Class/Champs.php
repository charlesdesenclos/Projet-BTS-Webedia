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

    // Méthode creationChamps : créer en bdd un champ  avec son nom, son adresse et avec un idCanaux

    public function creationChamps($nomChamps, $adress, $idCanaux)
    {
        $sqlInsertChamps = "INSERT INTO champs(nomChamps, adress, idCanaux) VALUES('".$nomChamps."','".$adress."','".$idCanaux."')";
        $reqInsertChamps = $GLOBALS['bdd']->query($sqlInsertChamps);
    }

    // Méthode modificationChamps : modifie le nom, son adresse et son idCanaux

    public function modificationChamps($id, $idCanaux, $nomChamps, $adress)
   {
        $RequetSQLModifierChamps= "UPDATE champs SET `nomChamps`='".$nomChamps."',`adress`='".$adress."',idCanaux = '".$idCanaux."' WHERE id = '".$id."'";
        $resultatModifier = $GLOBALS['bdd']-> query($RequetSQLModifierChamps);
   }

   // Méthode suppressionChamps : supprime le champ

   public function suppressionChamps($id)
   {
     $RequetSQLSupprimerChamps= "DELETE FROM champs WHERE id = '".$id."'";
     $resultatSupprimer = $GLOBALS['bdd']-> query($RequetSQLSupprimerChamps);
   }

   // Méthode affichageChamps : affiche tous les champs

   public function affichageChamps()
   {
        $reqAffichageChamps ="SELECT module.nomEquipement AS nomEquipement, scene.nom AS nom, champs.nomChamps AS nomChamps, champs.adress AS adress, canaux.valeur AS valeur FROM  champs, canaux, module, scene WHERE champs.idCanaux = canaux.id AND canaux.idmodule = module.id AND canaux.idscene = scene.id";
        $resultatSelectChamps = $GLOBALS['bdd'] -> query($reqAffichageChamps);
        return $resultatSelectChamps;
   }

   public function getIDandNOM()
   {
        $requetSQLChampsModifier = "SELECT id, nomChamps FROM champs";
        $resultatChampsModifier = $GLOBALS['bdd'] -> query($requetSQLChampsModifier);
        return $resultatChampsModifier;
   }

   public function getAll($idModule)
   {
        $requetSelectAllChamps = "SELECT champs.id, champs.nomChamps, champs.adress, champs.idCanaux FROM `champs`, module, canaux WHERE champs.idCanaux = canaux.id AND module.id = canaux.idmodule AND module.id = '".$idModule."' ;";
        $resultSelectAll = $GLOBALS['bdd'] -> query($requetSelectAllChamps);
        return $resultSelectAll;
   }

   public function modificationChampsModule($id, $idCanaux, $nomChamps, $adress, $idModule)
   {
        $RequetSQLSelectidCanaux = "SELECT champs.idCanaux FROM `champs`,module,canaux WHERE champs.idCanaux = canaux.id AND canaux.idmodule = module.id AND module.id = '".$idModule."'";
        $resultatSelectidCanaux = $GLOBALS['bdd']-> query($RequetSQLSelectidCanaux);

        $RequetSQLModifierChamps= "UPDATE champs SET `nomChamps`='".$nomChamps."',`adress`='".$adress."',idCanaux = '".$idCanaux."' WHERE id = '".$id."'";
        $resultatModifier = $GLOBALS['bdd']-> query($RequetSQLModifierChamps);
   }



  




}








?>