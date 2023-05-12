<?php
        session_start();   
 ?>
<html>
  <head>
    <title>Module</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="https://fr.webedia-group.com/wp-content/uploads/sites/6/2021/11/Webedia-Monogram.png">
  </head>
  <body >    
  <?php

        
    require_once 'pdo/pdo.php'; // appele de la bdd
    $GLOBALS['bdd'] = $bdd;

    // Initialisation de la class Module

    include("./Class/Module.php");
 
    $TheModule = new Module(null,null,null);

    /* ---------------------*/

    $IDModule = $TheModule->getID();
    
    $nom = $TheModule->getnomEquipement();
 
    $resultatModule = $TheModule->getIdANDnomEquipement();

    $RequetSQL2 = "SELECT id, nom FROM scene";
    $resultatScene = $GLOBALS['bdd'] -> query($RequetSQL2);

    

    

    //Initialisation de la class Champs

    include("./Class/Champs.php");
    $TheChamps = new Champs(null,null,null,null);

    /* ---------------------*/


    

    

    $nbrChannels = 0;


    //fonction affiche l'IHM de creation des champs
    
    function afficheCreationChamps($resultatCanaux, $i)
    {
        ?>
        <div class="div-channels">
        <div>
            <div class="form-content">
                <div>
                    <h1><?php echo "Channel ".$i." :";?><h1>
                    
                        
                    <form class="requires-validation" action="" method="POST" >

                        
                            
                        <div >
                            <input  type="text" name="nomChamps" placeholder="Nom" required>         
                        </div>

                        <select name="adress">
                            <option value=""> Choisissez une Adresse</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            $adress = 1;
                            while( $adress < 513){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$adress.'">';echo ''.$adress.'</option>';
                                ?>
                                    
                                <?php
                                $adress = $adress + 1;
                                            
                                        
                            }
                                

                            ?>
                            
                        </select>

                        <?php $n3 = 1; ?>
                        <select name="idCanaux">
                            <option value=""> Choisissez une Canaux</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            while($tab = $resultatCanaux->fetch()){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$tab["id"].'">';echo ''.$tab["nomEquipement"].'';echo " : ";echo "valeur : ";echo ''.$tab["valeur"].'</option>';
                                ?>
                                    
                                <?php
                                $n3 = $n3 +1;
                                            
                                        
                            }
                                

                            ?>
                            
                        </select>
                               
                        </div>

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary" name="submit-creation-champs">Enregistrer</button>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    }

    function affichagemodifierChamps($resultatChampsModifier, $i, $resultatCanaux, $adressModule)
    {
        
        ?>
        <div>
        <div>
            <div class="form-content">
                <div>
                    <h1><?php echo "Channel ".$i." :";?><h1>
                        
                    <form class="requires-validation" action="" method="POST" novalidate>

                        

                        <select name="idChampsModifier">
                            <option value=""> Choisissez une Champs</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            $n7= 0;
                            
                            
                            while($tabCHamps = $resultatChampsModifier->fetch())
                            {      
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$tabCHamps["id"].'">';echo ''.$tabCHamps["nomChamps"].'';'</option>';
                                ?>
                                    
                                <?php
                                $n7 = $n7 +1;            
                            }
                            ?>
                            
                        </select>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="nom" placeholder="Nom" required>
                               
                        </div>

                        <select name="adresseModifier">
                             <?php
                                    echo '<option value="'.$adressModule.'">';echo ''.$adressModule.'</option>';
                                    
                            ?>
                            <option value=""> Choisissez une autre Adresse</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            $adress = 1;
                            while(  $adress < 513){    
                                    
                                    
                                ?>
                                    
                                <?php
                                   
                                    echo '<option value="'.$adress.'">';echo ''.$adress.'</option>';
                                ?>
                                    
                                <?php
                                $adress = $adress + 1;
                                            
                                        
                            }
                                

                            ?>
                            
                        </select>

                        <?php $n3 = 1; ?>
                        <select name="idCanaux">
                            <option value=""> Choisissez une Canaux</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            while($tab = $resultatCanaux->fetch()){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$tab["id"].'">';echo ''.$tab["nomEquipement"].'';echo " : ";echo "valeur : ";echo ''.$tab["valeur"].'</option>';
                                ?>
                                    
                                <?php
                                $n3 = $n3 +1;
                                            
                                        
                            }
                                

                            ?>
                        </select>
                               
                        

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary" name="submit-modifier-champs">Modifier</button>
                           
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    <?php
    return $adressModule++;
    }


    
    
    if((isset($_SESSION['nbrChannels']) && $_SESSION['nbrChannels'] == true) )
    {
        for ($i = 1; $i <= $nbrChannels; $i++) 
        {
            afficheCreationChamps($resultatCanaux, $i);
        } 
    }
        

    // Suppression des modules

    if(isset($_POST['submit-supprimer-module']))
    {
        $TheModule->suppressionModule($_POST['idModuleSupprimer']);
    }

    // Modification des Champs

    

    // Suppression des champs

    if(isset($_POST['submit-supprimer-champs']))
    {
        $TheChamps->suppressionChamps($_POST['idChampsSupprimer']);
    }
 
    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">
        
        <!--------------------------------- NAV BAR ------------------------------------------->
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Webedia</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Modules</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion :</h6>
                        <form action="" method="POST">
                        <div class="col-md-12">    
                            <div class="form-group">
                                <input class="btn btn-secondary" type="submit" value="Creation" name="CreationModule" >
                            </div>
                        </div>
                        <div class="col-md-12">  
                            <div class="form-group">
                                <input class="btn btn-secondary" type="submit" value="Modifier" name="ModifierModule"  >
                            </div>
                        </div>
                        <div class="col-md-12">  
                            <div class="form-group">
                                <input class="btn btn-secondary" type="submit" value="Supprimer" name="SupprimerModule"  >
                            </div>
                        </div>
                        <div class="col-md-12">  
                            <div class="form-group">
                                <input class="btn btn-secondary" type="submit" value="Affichage" name="AffichageModule" >
                            </div>
                        </div>
                        </form>
                
                    </div>
                </div>
            </li>

        

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Champs</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion :</h6>
                        <form action="" method="POST">
                        <div class="col-md-12">  
                            <div class="form-group">
                                <input class="btn btn-secondary" type="submit" value="Creation" name="CreationChamps">
                            </div>
                        </div>
                        <div class="col-md-12">  
                            <div class="form-group">
                                <input class="btn btn-secondary" type="submit" value="Modifier" name="ModifierChamps">
                            </div>
                        </div>
                        <div class="col-md-12">  
                            <div class="form-group">
                                <input class="btn btn-secondary" type="submit" value="Supprimer" name="SupprimerChamps">
                            </div>
                        </div>
                        <div class="col-md-12">  
                            <div class="form-group">
                                <input class="btn btn-secondary" type="submit" value="Affichage" name="AffichageChamps">
                            </div>
                        </div>
                        </form>
                  
                    </div>
                </div>
            </li>

            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar --> 
        <!--------------------------------- Affichage IHM Création Module ------------------------------------------->
        <?php

   
    
    // Création des modules
    
    
    if(isset($_POST['submit-creation']))
    {

        $nomEquipement = $_POST['nomEquipement'];
        
        $adresse = $_POST['adresse'];

        $TheModule->creationModule($nomEquipement,$adresse);

        $nbrChannels = $_POST['nbr-channels'];
        $_SESSION['nbrChannels'] = $nbrChannels;

        $sqlSelectIDModule = "SELECT id FROM module where nomEquipement ='".$nomEquipement."' AND `adress`='".$adresse."'";
        $IDModuleCreation= $GLOBALS['bdd']->query($sqlSelectIDModule)->fetchColumn();


    
   
            
        for ($i = 1; $i <= $nbrChannels; $i++) 
        {
            $sqlSelectIDModule = "SELECT id FROM module where nomEquipement ='".$nomEquipement."' AND `adress`='".$adresse."'";
            $_SESSION['IDModuleCreation']= $GLOBALS['bdd']->query($sqlSelectIDModule)->fetchColumn();
           

            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['IDModuleCreation']);

            afficheCreationChamps($resultatCanaux, $i);
            
        } 
        return $_SESSION['IDModuleCreation'];
        

    }

     // Création des champs submit-creation-champs-solo

     if(isset($_POST['submit-creation-champs']))
     {
         $TheChamps->creationChamps($_POST['nomChamps'],$_POST['adress'],$_POST['idCanaux']);
         $_SESSION['nbrChannels'] = $_SESSION['nbrChannels'] - 1;
 
         //echo $_SESSION['nbrChannels'];
         
         if($_SESSION['nbrChannels'] != 0)
         {
             for ($i = 1; $i <= $_SESSION['nbrChannels']; $i++) 
             {
 
                 $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['IDModuleCreation']);
 
                 afficheCreationChamps($resultatCanaux, $i);  
             } 
         }
         
         
         
 
     }

     if(isset($_POST['submit-creation-champs-solo']))
     {
         $TheChamps->creationChamps($_POST['nomChamps'],$_POST['adress'],$_POST['idCanaux']);
         
         
         
 
     }

    
    //echo $_SESSION['nbrChannels'];

    if(isset($_POST['CreationModule']))
    {
        ?>
        <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Création de module</h3>
                        
                    <form class="requires-validation" action="" method="POST" novalidate>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="nomEquipement" placeholder="Nom d'Equipement" required>
                               
                        </div>

                        <select name="adresse">
                            <option value=""> Choisissez une Adresse</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            $adress = 1;
                            while(  $adress < 513){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$adress.'">';echo ''.$adress.'</option>';
                                ?>
                                    
                                <?php
                                $adress = $adress + 1;
                                            
                                        
                            }
                                

                            ?>
                            
                        </select>

                        <select name="nbr-channels">
                            <option value=""> Choisissez un nombre de channels pour l'équipement</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            $nbr_channels = 1;
                            while(  $nbr_channels < 13){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$nbr_channels.'">';echo ''.$nbr_channels.'</option>';
                                ?>
                                    
                                <?php
                                $nbr_channels = $nbr_channels + 1;
                                            
                                        
                            }
                                

                            ?>
                            
                        </select>

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary" name="submit-creation">Enregistrer</button>
                            <?php
                                if(isset($_SESSION['ModulExisteDeja']) && $_SESSION['ModulExisteDeja'] == true)
                                {?>
                                    <div class="invalid-feedback">Module existe déja</div>
                                    <?php

                                        
                                }

                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    }

    $resultCanauxID = "SELECT `id` FROM `canaux` WHERE idmodule = 14;";

    $resultatCanauxID = $GLOBALS['bdd'] -> query($resultCanauxID);
    //$resultAllChamps = $TheChamps->getAll(14);


    $count = $resultatCanauxID->rowCount();
        

    // Modification des modules

    if(isset($_POST['submit-modifier']))
    {


        $TheModule->modificationModule($_POST['idModuleModifier'],$_POST['nomEquipementModifier'],$_POST['adresseModifier']);  

        $_SESSION['adresse-Module-Modifier'] = $_POST['adresseModifier'];
        
        

        $idModuleModife = $_POST['idModuleModifier'];
        $_SESSION['idModuleModifier'] = $TheModule->VerifId($idModuleModife);
        
        
        
        
       
        $resultCanauxID = "SELECT `id` FROM `canaux` WHERE idmodule = '".$_POST['idModuleModifier']."'";

        $resultatCanauxID = $GLOBALS['bdd'] -> query($resultCanauxID);
        
        
        
        //$_SESSION['resultatChampsModifier']
        $_SESSION['count1'] = $resultatCanauxID->rowCount();
        
        //echo $count;

        
            for ($i = 1; $i <= $_SESSION['count1']; $i++) 
            { 
                $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['idModuleModifier']);
    
        
     
    
                $resultatChampsModifier = $TheChamps->getIDandNOM($_SESSION['idModuleModifier']);
    
            affichagemodifierChamps($resultatChampsModifier, $i, $resultatCanaux, $_SESSION['adresse-Module-Modifier']);
            $_SESSION['adresse-Module-Modifier']++;
                
            } 
            afficheNonModifierChamps(); 
            
            $_SESSION['count1'] = $_SESSION['count1'] -1;
            
        return $_SESSION['idModuleModifier'];
        return $_SESSION['adresse-Module-Modifier'];



    }

    //$idModuleModifier = $_SESSION['idModuleModifier'];
    //echo '3: ' . $idModuleModifier;

    function afficheNonModifierChamps()
    {
        ?>
        <div>
        <div>
            <div class="form-content">
                <div>
                    <h1>Pour ne pas modifer de champs<h1>
                        
                    <form class="requires-validation" action="" method="POST" novalidate>

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary" name="submit-modifier-champs_non">Valider</button>
                           
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    <?php
    }

    

    if(isset($_POST['submit-modifier-champs']))
    {
        $TheChamps->modificationChamps($_POST['idChampsModifier'],$_POST['idCanaux'],$_POST['nom'],$_POST['adresseModifier']);

        //echo '2] : ' . $_SESSION['idModuleModifier'];
        
        $adress_module_modifier = $_SESSION['adresse-Module-Modifier'];
    
        $adress_module_modifier = $adress_module_modifier -3;

        
        
        
        for ($i = 1; $i <= $_SESSION['count1']; $i++) 
        { 
            $test =1;
              echo $test;
            
            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['idModuleModifier']);
    
        
     
    
            $resultatChampsModifier = $TheChamps->getIDandNOM($_SESSION['idModuleModifier']);

            
    
            affichagemodifierChamps($resultatChampsModifier, $i, $resultatCanaux, $adress_module_modifier);

            
            $test++;
    
                
        } 
        
        
        afficheNonModifierChamps();
        $_SESSION['count1'] = $_SESSION['count1'] -1;

        
    }

    
    
   


    //echo  $_SESSION['idModuleModifier'];

    if(isset($_POST['submit-modifier-Canaux']))
    {
        $TheChamps->modificationChamps($_POST['idChampsModifier'],$_POST['idCanaux'],$_POST['nom'],$_POST['adresseModifier']);
    }
    
    $reqAffichageTotal ="SELECT module.nomEquipement AS nomEquipement, scene.nom AS nom, champs.nomChamps AS nomChamps, champs.adress AS adress, canaux.valeur  FROM  champs, canaux, module, scene WHERE champs.idCanaux = canaux.id AND canaux.idmodule = module.id AND canaux.idscene = scene.id";
    $resultatSelectTotal = $GLOBALS['bdd'] -> query($reqAffichageTotal);

    //--------------------------------- Affichage Total -----------------------------------------------------------
    /*
    if(!isset($_POST['CreationModule']) && !isset($_POST['CreationCanaux']) && !isset($_POST['CreationChamps']) && !isset($_POST['AffichageModule']) && !isset($_POST['AffichageCanaux']) && !isset($_POST['AffichageChamps']) && !isset($_POST['ModifierModule']) && !isset($_POST['ModifierCanaux']) && !isset($_POST['ModifierChamps']) && !isset($_POST['SupprimerModule']) && !isset($_POST['SupprimerCanaux']) && !isset($_POST['SupprimerChamps']))
    {?>
        <div class="container">
      <h1>Equipements : </h1>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nom d'Equipement</th>
            <th>Nom de la sène</th>
            <th>Nom du champs</th>
            <th>Adresse</th>
            <th>Valeur</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $i3 = 0;
            while($AffichageTotal = $resultatSelectTotal->fetch())
            {    
                                    
                                    
                ?>
                <tr>                      
                <?php
                    echo '<td>';echo ''.$AffichageTotal["nomEquipement"].'</td>';
                    echo '<td>';echo ''.$AffichageTotal["nom"].'</td>';
                    echo '<td>';echo ''.$AffichageTotal["nomChamps"].'</td>';
                    echo '<td>';echo ''.$AffichageTotal["adress"].'</td>';
                    echo '<td>';echo ''.$AffichageTotal["valeur"].'</td>';
                ?>
                </tr>                   
                <?php
                $i3 = $i3 +1;
                                            
                                        
            }
            ?>
        </tbody>
      </table>
    </div>
    <?php
    }
    */

    //--------------------------------- Affichage IHM Création Champs --------------------------------------------

    $RequetSQL3 = "SELECT canaux.id, module.nomEquipement, canaux.valeur FROM canaux, module WHERE canaux.idmodule = module.id";
    $resultatCanaux1 = $GLOBALS['bdd'] -> query($RequetSQL3);

    if(isset($_POST['CreationChamps']))
    {
        ?>
        <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Création de Champs</h3>
                        
                    <form class="requires-validation" action="" method="POST" novalidate>

                        <div class="col-md-12">
                            
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="nomChamps" placeholder="Nom" required>         
                        </div>

                        <select name="adress">
                            <option value=""> Choisissez une Adresse</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            $adress = 1;
                            while(  $adress < 513){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$adress.'">';echo ''.$adress.'</option>';
                                ?>
                                    
                                <?php
                                $adress = $adress + 1;
                                            
                                        
                            }
                                

                            ?>
                            
                        </select>

                        <?php $n3 = 1; ?>
                        <select name="idCanaux">
                            <option value=""> Choisissez une Canaux</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            while($tab = $resultatCanaux1->fetch()){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$tab["id"].'">';echo ''.$tab["nomEquipement"].'';echo " : ";echo "valeur : ";echo ''.$tab["valeur"].'</option>';
                                ?>
                                    
                                <?php
                                $n3 = $n3 +1;
                                            
                                        
                            }
                                

                            ?>
                            
                        </select>
                               
                        </div>

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary" name="submit-creation-champs-solo">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php

    }

    //--------------------------------- Affichage IHM Modification Module --------------------------------------------

    $resultatModuleModifier = $TheModule->getIdANDnomEquipement();

    if(isset($_POST['ModifierModule']))
    {
        ?>
        <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Modifier le module</h3>
                        
                    <form class="requires-validation" action="" method="POST" novalidate>

                        

                        <select name="idModuleModifier">
                            <option value=""> Choisissez une Module</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            $n6= 0;
                            while($tab = $resultatModuleModifier->fetch()){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$tab["id"].'">';echo ''.$tab["nomEquipement"].'';'</option>';
                                ?>
                                    
                                <?php
                                $n6 = $n6 +1;
                                            
                                        
                            }

                                

                            ?>
                            
                        </select>
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="nomEquipementModifier" placeholder="Nom d'Equipement" required>
                               
                        </div>

                        <select name="adresseModifier">
                            <option value=""> Choisissez une Adresse</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            $adress = 1;
                            while(  $adress < 513){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$adress.'">';echo ''.$adress.'</option>';
                                ?>
                                    
                                <?php
                                $adress = $adress + 1;
                                            
                                        
                            }
                                

                            ?>
                            
                        </select>

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary" name="submit-modifier">Modifier</button>
                           
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    <?php

    
    }

    //--------------------------------- Affichage IHM Affichage Module ----------------------------------------------
    if(isset($_POST['ChoixModifierModule1']))
    {
        ?>
        <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Modifier de module</h3>
                        
                    <form class="requires-validation" action="" method="POST" novalidate>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="nomEquipement" placeholder="Nom d'Equipement" required>
                               
                        </div>

                        <select name="adresse">
                            <option value=""> Choisissez une Adresse</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            $adress = 1;
                            while(  $adress < 513){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$adress.'">';echo ''.$adress.'</option>';
                                ?>
                                    
                                <?php
                                $adress = $adress + 1;
                                            
                                        
                            }
                                

                            ?>
                            
                        </select>

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary" name="submit-modifier">Modifier</button>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    
    $resultatSelectModule = $TheModule->affichageModule();
    

    if(isset($_POST['AffichageModule']))
    {?>
        <div class="container">
      <h1>Les Modules</h1>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nom d'Equipement</th>
            <th>Adresse</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $i4 = 0;
            while($AffichageModule = $resultatSelectModule->fetch())
            {    
                                    
                                    
                ?>
                <tr>                      
                <?php
                    echo '<td>';echo ''.$AffichageModule["nomEquipement"].'</td>';
                    echo '<td>';echo ''.$AffichageModule["adress"].'</td>';

                ?>
                </tr>                   
                <?php
                $i4 = $i4 + 1;
                                            
                                        
            }
            ?>
        </tbody>
      </table>
    </div>
    <?php
    }

    //--------------------------------- Affichage IHM Affichage Champs -------------------------------------------
    
    

    $resultatSelectChamps = $TheChamps->affichageChamps();

    if(isset($_POST['AffichageChamps']))
    {?>
            <div class="container">
          <h1>Les Champs</h1>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Nom d'Equipement</th>
                <th>Nom de la sène</th>
                <th>Nom du champs</th>
                <th>Adresse</th>
                <th>Valeur</th>
              </tr>
            </thead>
            <tbody>
                <?php
                $i3 = 0;
                while($AffichageChamps = $resultatSelectChamps->fetch())
                {    
                                        
                                        
                    ?>
                    <tr>                      
                    <?php
                        echo '<td>';echo ''.$AffichageChamps["nomEquipement"].'</td>';
                        echo '<td>';echo ''.$AffichageChamps["nom"].'</td>';
                        echo '<td>';echo ''.$AffichageChamps["nomChamps"].'</td>';
                        echo '<td>';echo ''.$AffichageChamps["adress"].'</td>';
                        echo '<td>';echo ''.$AffichageChamps["valeur"].'</td>';
    
                    ?>
                    </tr>                   
                    <?php
                    $i3 = $i3 +1;
                                                
                                            
                }
                ?>
            </tbody>
          </table>
        </div>
        <?php

    }

    //--------------------------------- Affichage IHM Modification Champs -------------------------------------------
    
    $resultatChampsModifier = $TheChamps->getIDNom();

    if(isset($_POST['ModifierChamps']))
    {
        ?>
        <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Modifier le champ</h3>
                        
                    <form class="requires-validation" action="" method="POST" novalidate>

                        

                        <select name="idChampsModifier">
                            <option value=""> Choisissez un Champs</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            $n7= 0;
                            while($tabCHamps = $resultatChampsModifier->fetch()){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$tabCHamps["id"].'">';echo ''.$tabCHamps["nomChamps"].'';'</option>';
                                ?>
                                    
                                <?php
                                $n7 = $n7 +1;            
                            }
                            ?>
                            
                        </select>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="nom" placeholder="Nom" required>
                               
                        </div>

                        <select name="adresseModifier">
                            <option value=""> Choisissez une Adresse</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            $adress = 1;
                            while(  $adress < 513){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$adress.'">';echo ''.$adress.'</option>';
                                ?>
                                    
                                <?php
                                $adress = $adress + 1;
                                            
                                        
                            }
                                

                            ?>
                            
                        </select>

                        <?php $n3 = 1; ?>
                        <select name="idCanaux">
                            <option value=""> Choisissez une Canaux</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            while($tab = $resultatCanaux1->fetch()){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$tab["id"].'">';echo ''.$tab["nomEquipement"].'';echo " : ";echo "valeur : ";echo ''.$tab["valeur"].'</option>';
                                ?>
                                    
                                <?php
                                $n3 = $n3 +1;
                                            
                                        
                            }
                                

                            ?>
                        </select>
                               
                        

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary" name="submit-modifier-champs">Modifier</button>
                           
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    <?php
    }

    //--------------------------------- Affichage IHM Supprimer Module -------------------------------------------

    if(isset($_POST['SupprimerModule']))
    {
        ?>
        <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Supprimer le module</h3>
                        
                    <form class="requires-validation" action="" method="POST" novalidate>

                        

                        <select name="idModuleSupprimer">
                            <option value=""> Choisissez une Module</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            $n6= 0;
                            while($tab = $resultatModuleModifier->fetch()){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$tab["id"].'">';echo ''.$tab["nomEquipement"].'';'</option>';
                                ?>
                                    
                                <?php
                                $n6 = $n6 +1;
                                            
                                        
                            }

                                

                            ?>
                            
                        </select>

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary" name="submit-supprimer-module">Supprimer</button>
                           
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    <?php

    }

    //--------------------------------- Affichage IHM Supprimer Champs -------------------------------------------

    if(isset($_POST['SupprimerChamps']))
    {
        ?>
        <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Supprimer le champ</h3>
                        
                    <form class="requires-validation" action="" method="POST" novalidate>

                        

                        <select name="idChampsSupprimer">
                            <option value=""> Choisissez une Champs</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            $n7= 0;
                            while($tabCHamps = $resultatChampsModifier->fetch()){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$tabCHamps["id"].'">';echo ''.$tabCHamps["nomChamps"].'';'</option>';
                                ?>
                                    
                                <?php
                                $n7 = $n7 +1;            
                            }
                            ?>
                            
                        </select>

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary" name="submit-supprimer-champs">Supprimer</button>
                           
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    <?php

    }


    ?>
               
    </div> 


    
        <div class="form-body">
       
    </div>
  
    <?php
    //session_unset();
    //session_destroy();

    ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>