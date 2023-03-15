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

   public function creation($nomEquipement, $adresse)
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
}



?>