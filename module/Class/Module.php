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


   // Méthode creation : créer l'équipement et son adress dans la bdd  
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

   // Méthode getID : récupère l'id des modules 

   public function getID()
   {
      $sqlSelectIDModule = "SELECT id FROM module";
      $IDModule = $GLOBALS['bdd']->query($sqlSelectIDModule);
      $result = $IDModule->fetchAll();
      return $result;
   }

   // Méthode getnomEquipement : récupère le nom d'équipement des modules

   public function getnomEquipement()
   {
      $sqlSelectnomEquipement = "SELECT nomEquipement FROM module";
      $nomEquipement = $GLOBALS['bdd']->query($sqlSelectnomEquipement);
      $result = $nomEquipement->fetchAll();
      return $result;
   }

   // Méthode getIdANDnomEquipement : récupère le nom d'équipement et l'id des modules

   public function getIdANDnomEquipement()
   {
      $RequetSQL = "SELECT DISTINCT module.nomEquipement, module.id, scene.nom FROM module, canaux, scene, champs WHERE champs.idCanaux = canaux.id AND scene.id = canaux.idscene AND module.nomEquipement <> 'Aucun Equipement';";
      $resultatModule = $GLOBALS['bdd'] -> query($RequetSQL);
      return $resultatModule;
   }

   public function getIDnomEquip()
   {
      $RequetSQL = "SELECT id, nomEquipement FROM module";
      $resultatModule = $GLOBALS['bdd'] -> query($RequetSQL);
      return $resultatModule;
   }

   // Méthode modificationModule : mets à jour le module avec le nom d'équipement et son adress par rapport à l'id

   public function modificationModule($id, $nomEquipement, $adress)
   {
      $RequetSQLModifier= "UPDATE module SET `nomEquipement`='".$nomEquipement."',`adress`='".$adress."' WHERE id = '".$id."'";
      $resultatModifier = $GLOBALS['bdd']-> query($RequetSQLModifier);
   }

   // Méthode suppressionModule : supprime le module 

   public function suppressionModule($id)
{
    $RequetSQLSUpprimerChamps = "DELETE FROM `champs` WHERE idCanaux IN (SELECT canaux.id FROM canaux, module WHERE champs.idmodule = module.id AND module.id = '".$id."')";
    $resultatSupprimerChamps = $GLOBALS['bdd']->query($RequetSQLSUpprimerChamps);

    $RequetSQLSupprimer = "DELETE FROM module WHERE id = '".$id."'";
    $resultatSupprimer = $GLOBALS['bdd']->query($RequetSQLSupprimer);

    if ($resultatSupprimerChamps && $resultatSupprimer) {
         error_log("Les requêtes ont été exécutées avec succès.");
    } else {
        echo "Une erreur s'est produite lors de la suppression du module et de ses champs associés.";
    }
}

   // Méthode affichageModule : affiche tous les modules

   public function affichageModule()
   {
      $reqAffichageModule =" SELECT DISTINCT scene.nom, module.nomEquipement, module.adress FROM module, canaux, scene, champs WHERE module.id = champs.idModule AND canaux.idscene = scene.id AND canaux.id = champs.idCanaux AND module.nomEquipement <> 'Aucun Equipement';";
      $resultatSelectModule = $GLOBALS['bdd'] -> query($reqAffichageModule);
      return $resultatSelectModule;
   }

   public function getIDCanauxNomEquipementModuleANDValeurCanaux($idModule)
   {
      $RequetSQL3 = "SELECT canaux.id, module.nomEquipement, canaux.valeur FROM canaux, module WHERE canaux.idmodule = module.id AND module.id = '".$idModule."'";
      $resultatCanaux = $GLOBALS['bdd'] -> query($RequetSQL3);
      return $resultatCanaux;
   }

   public function VerifId($idModule)
   {
      $RequetSQLVerifId = "SELECT `id` FROM `module` WHERE id = '".$idModule."'";
      $resultatVerifId = $GLOBALS['bdd'] -> query($RequetSQLVerifId)->fetchColumn();;
      return $resultatVerifId;
   }
   

   
}



?>