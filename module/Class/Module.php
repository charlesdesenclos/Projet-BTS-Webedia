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

   public function creationModule($nomEquipement, $adresse)
   {
      
      $check = $GLOBALS['bdd']->prepare('SELECT nomEquipement FROM `module` WHERE nomEquipement = ?');
      $check->execute(array($nomEquipement));
      $data = $check->fetch();
      $row = $check->rowCount();



      if($row == 0)
      {
         $sqlInsertModule = "INSERT INTO module(nomEquipement, adress) VALUES('".$nomEquipement."','".$adresse."')";
         $reqInsertModule = $GLOBALS['bdd']->query($sqlInsertModule);
         $_SESSION['ModulExisteDeja'] = false;
      }
      else
      {
         $_SESSION['ModulExisteDeja'] = true;
      }   
   }
   public function getID()
   {
      $sqlSelectIDModule = "SELECT id FROM module";
      $IDModule = $GLOBALS['bdd']->query($sqlSelectIDModule);
      $result = $IDModule->fetchAll();
      return $result;
   }

   public function getnomEquipement()
   {
      $sqlSelectnomEquipement = "SELECT nomEquipement FROM module";
      $nomEquipement = $GLOBALS['bdd']->query($sqlSelectnomEquipement);
      $result = $nomEquipement->fetchAll();
      return $result;
   }

   public function getIdANDnomEquipement()
   {
      $RequetSQL = "SELECT id, nomEquipement FROM module";
      $resultatModule = $GLOBALS['bdd'] -> query($RequetSQL);
      return $resultatModule;
   }

   public function modificationModule($id, $nomEquipement, $adress)
   {
      echo "Modifier en BDD";
   }

   public function suppressionModule($id)
   {
      echo "Supprime en BDD";
   }

   public function affichageModule()
   {
      $reqAffichageModule ="SELECT `nomEquipement`, `adress` FROM `module`";
      $resultatSelectModule = $GLOBALS['bdd'] -> query($reqAffichageModule);
      return $resultatSelectModule;
   }

   
}



?>