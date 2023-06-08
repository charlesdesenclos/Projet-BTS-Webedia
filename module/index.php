<?php
        require_once 'pdo/pdo.php'; // appele de la bdd
        $GLOBALS['bdd'] = $bdd;
        //include("../Site/class/User.php");
        session_start();   


        /*$TheUser = new User(null,null,null,null);

        $idUser = $TheUser->getId();
        $verifIsAdmin = $TheUser->VerisIsAdmin($idUser);*/
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
  <body>    

  <?php
    
        
    

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
    $TheChamps = new Champs(null,null,null,null, null);

    /* ---------------------*/

 

    $nbrChannels = 0;


    //fonction affiche l'IHM de creation des champs
    
    function afficheCreationChamps($resultatCanaux, $i, $adressModule)
    {
        ?>
        <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h1><?php echo "Champs ".$i." :";?><h1>
                    
                        
                    <form class="requires-validation" action="" method="POST" >

                        
                            
                        <div >
                            <input  type="text" name="nomChamps" placeholder="Nom" required>         
                        </div>

                        <select name="adress">
                            <?php
                                    echo '<option value="'.$adressModule.'">';echo ''.$adressModule.'</option>';
                                    
                            ?>
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

    function afficheCreationChamps_($resultatCanaux, $i)
    {
        ?>
        <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h1><?php echo "Champs ".$i." :";?><h1>
                    
                        
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

    function affichagemodifierChamps($resultatChampsModifier, $i, $adressModule,$resultSelectChampsNom)
    {
        
        ?>
        <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h1><?php echo "Champs ".$i." :";?><h1>
                        
                    <form class="requires-validation" action="" method="POST" novalidate>

                        <?php $tabCHampsNom = $resultSelectChampsNom->fetch()?>

                        <select name="idChampsModifier">
                            <?php
                            if(isset($tabCHampsNom))
                            {
                                echo '<option value="'.$tabCHampsNom["id"].'">';echo ''.$tabCHampsNom["nomChamps"].'';'</option>';
                            }
                            ?>
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
                            <input class="form-control" type="text" name="nom" placeholder="Nom" value=" <?php if(isset($tabCHampsNom)){echo $tabCHampsNom['nomChamps'];} ?>" required>
                               
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


    // Affichage création des champs
    
    if((isset($_SESSION['nbrChannels']) && $_SESSION['nbrChannels'] == true) )
    {
        for ($i = 1; $i <= $nbrChannels; $i++) 
        {
            afficheCreationChamps_($resultatCanaux, $i);
        } 
    }
        

    // Suppression des modules

    if(isset($_POST['submit-supprimer-module']))
    {
        $TheModule->suppressionModule($_POST['idModuleSupprimer']);

        
        
    }

    

    

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
                                <input class="btn btn-secondary" type="submit" value="Modification" name="ModifierModule"  >
                            </div>
                        </div>
                        <div class="col-md-12">  
                            <div class="form-group">
                                <input class="btn btn-secondary" type="submit" value="Suppression" name="SupprimerModule"  >
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
                                <input class="btn btn-secondary" type="submit" value="Modification" name="ModifierChamps">
                            </div>
                        </div>
                        <div class="col-md-12">  
                            <div class="form-group">
                                <input class="btn btn-secondary" type="submit" value="Suppression" name="SupprimerChamps">
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
       
        <?php

   
    
    // Création des modules
    
    
    if(isset($_POST['submit-creation']))
    {

        $nomEquipement = $_POST['nomEquipement'];
        
        $adresse = $_POST['adresse'];

        $_SESSION['CreationModuleAdress'] = $adresse;

        $TheModule->creationModule($nomEquipement,$adresse);

        $nbrChannels = $_POST['nbr-channels'];
        $_SESSION['nbrChannels'] = $nbrChannels;

        $sqlSelectIDModule = "SELECT id FROM module where nomEquipement ='".$nomEquipement."' AND `adress`='".$adresse."'";
        $IDModuleCreation= $GLOBALS['bdd']->query($sqlSelectIDModule)->fetchColumn();

        $_SESSION['b'] =1;
        if ($_SESSION['b'] == 1 && $_SESSION['b']<= $_SESSION['nbrChannels'])
        {
            $sqlSelectIDModule = "SELECT id FROM module where nomEquipement ='".$nomEquipement."' AND `adress`='".$adresse."'";
            $_SESSION['IDModuleCreation']= $GLOBALS['bdd']->query($sqlSelectIDModule)->fetchColumn();
           

            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['IDModuleCreation']);

            afficheCreationChamps($resultatCanaux, $_SESSION['b'],$_SESSION['CreationModuleAdress'] );
            $_SESSION['CreationModuleAdress']++;
            $_SESSION['b']++;
        }
        
        
        return $_SESSION['IDModuleCreation'];

    }

     // Création des champs submit-creation-champs
    
     if(isset($_POST['submit-creation-champs']))
     {
        
         $TheChamps->creationChamps($_POST['nomChamps'],$_POST['adress'],0, $_SESSION['IDModuleCreation']);
         
 
         //echo $_SESSION['nbrChannels'];


        if($_SESSION['b'] == 2 && $_SESSION['b']< $_SESSION['nbrChannels'])
        {
            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['IDModuleCreation']);
 
            afficheCreationChamps($resultatCanaux, $_SESSION['b'], $_SESSION['CreationModuleAdress']);  
            $_SESSION['CreationModuleAdress']++;
            $_SESSION['b']++;
        }
        else if($_SESSION['b'] == 3 && $_SESSION['b']<= $_SESSION['nbrChannels'])
        {
            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['IDModuleCreation']);
 
            afficheCreationChamps($resultatCanaux, $_SESSION['b'], $_SESSION['CreationModuleAdress']);  
            $_SESSION['CreationModuleAdress']++;
            $_SESSION['b']++;
        }
        else if($_SESSION['b'] == 4 && $_SESSION['b']<= $_SESSION['nbrChannels'])
        {
            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['IDModuleCreation']);
 
            afficheCreationChamps($resultatCanaux, $_SESSION['b'], $_SESSION['CreationModuleAdress']);  
            $_SESSION['CreationModuleAdress']++;
            $_SESSION['b']++;
        }
        else if($_SESSION['b'] == 5 && $_SESSION['b']<= $_SESSION['nbrChannels'])
        {
            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['IDModuleCreation']);
 
            afficheCreationChamps($resultatCanaux, $_SESSION['b'], $_SESSION['CreationModuleAdress']);  
            $_SESSION['CreationModuleAdress']++;
            $_SESSION['b']++;
        }
        else if($_SESSION['b'] == 6 && $_SESSION['b']<= $_SESSION['nbrChannels'])
        {
            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['IDModuleCreation']);
 
            afficheCreationChamps($resultatCanaux, $_SESSION['b'], $_SESSION['CreationModuleAdress']);  
            $_SESSION['CreationModuleAdress']++;
            $_SESSION['b']++;
        }
        else if($_SESSION['b'] == 7 && $_SESSION['b']<= $_SESSION['nbrChannels'])
        {
            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['IDModuleCreation']);
 
            afficheCreationChamps($resultatCanaux, $_SESSION['b'], $_SESSION['CreationModuleAdress']);  
            $_SESSION['CreationModuleAdress']++;
            $_SESSION['b']++;
        }
        else if($_SESSION['b'] == 8 && $_SESSION['b']<= $_SESSION['nbrChannels'])
        {
            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['IDModuleCreation']);
 
            afficheCreationChamps($resultatCanaux, $_SESSION['b'], $_SESSION['CreationModuleAdress']);  
            $_SESSION['CreationModuleAdress']++;
            $_SESSION['b']++;
        }
        else if($_SESSION['b'] == 9 && $_SESSION['b']<= $_SESSION['nbrChannels'])
        {
            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['IDModuleCreation']);
 
            afficheCreationChamps($resultatCanaux, $_SESSION['b'], $_SESSION['CreationModuleAdress']);  
            $_SESSION['CreationModuleAdress']++;
            $_SESSION['b']++;
        }
        else if($_SESSION['b'] == 10 && $_SESSION['b']<= $_SESSION['nbrChannels'])
        {
            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['IDModuleCreation']);
 
            afficheCreationChamps($resultatCanaux, $_SESSION['b'], $_SESSION['CreationModuleAdress']);  
            $_SESSION['CreationModuleAdress']++;
            $_SESSION['b']++;
        }
        else if($_SESSION['b'] == 11 && $_SESSION['b']<= $_SESSION['nbrChannels'])
        {
            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['IDModuleCreation']);
 
            afficheCreationChamps($resultatCanaux, $_SESSION['b'], $_SESSION['CreationModuleAdress']);  
            $_SESSION['CreationModuleAdress']++;
            $_SESSION['b']++;
        }
        else if($_SESSION['b'] == 12 && $_SESSION['b']<= $_SESSION['nbrChannels'])
        {
            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['IDModuleCreation']);
 
            afficheCreationChamps($resultatCanaux, $_SESSION['b'], $_SESSION['CreationModuleAdress']);  
            $_SESSION['CreationModuleAdress']++;
            $_SESSION['b']++;
        }
        
     }
     
     // Création d'un champs submit-creation-champs-solo

     if(isset($_POST['submit-creation-champs-solo']))
     {
         $TheChamps->creationChamps($_POST['nomChamps'],$_POST['adress'],0,1);
         
     }

    
   

    //Formulaire de création module

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
                            <option value=""> Choisissez un nombre de champs pour l'équipement</option>
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
        
    // Modification des modules

    if(isset($_POST['submit-modifier']))
    {
        


        $TheModule->modificationModule($_SESSION['idModuleModifierChoisi'],$_POST['nomEquipementModifier'],$_POST['adresseModifier']);  

        $_SESSION['adresse-Module-Modifier'] = $_POST['adresseModifier'];
        
        

        $idModuleModife = $_SESSION['idModuleModifierChoisi'];
        $_SESSION['idModuleModifier'] = $TheModule->VerifId($idModuleModife);
        
        
        
        
       
        $resultCanauxID = "SELECT `id` FROM `champs` WHERE idmodule = '".$_SESSION['idModuleModifierChoisi']."'";

        $resultatCanauxID = $GLOBALS['bdd'] -> query($resultCanauxID);
        
        
        
        //$_SESSION['resultatChampsModifier']
        $_SESSION['count1'] = $resultatCanauxID->rowCount();

        $_SESSION['q'] = 1;
        if ($_SESSION['q'] == 1 && $_SESSION['q']<= $_SESSION['count1'])
        {
            $reqSelectChampsNOM = "SELECT champs.id, champs.nomChamps FROM `champs`, module WHERE champs.idModule = module.id AND module.id = '".$_SESSION['idModuleModifier']."' LIMIT 1 OFFSET 0";
            $resultSelectChampsNom = $GLOBALS['bdd']-> query($reqSelectChampsNOM);

            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['idModuleModifier']);

            $resultatChampsModifier = $TheChamps->getIDandNOM($_SESSION['idModuleModifier']);

            affichagemodifierChamps($resultatChampsModifier, $_SESSION['q'], $_SESSION['adresse-Module-Modifier'],$resultSelectChampsNom);

            $_SESSION['adresse-Module-Modifier']++;
            $_SESSION['q']++;

            afficheNonModifierChamps(); 
        }
        
       
            
    }

   

    // Affichage pour ne pas modifier les champs

    function afficheNonModifierChamps()
    {
        ?>
        <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
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

    

    // Modification des champs 

    if(isset($_POST['submit-modifier-champs']))
    {

        $TheChamps->modificationChamps($_POST['idChampsModifier'],0,$_POST['nom'],$_POST['adresseModifier']);

        if ($_SESSION['q'] == 2 && $_SESSION['q']<= $_SESSION['count1'])
        {
            $reqSelectChampsNOM = "SELECT champs.id, champs.nomChamps FROM `champs`, module WHERE champs.idModule = module.id AND module.id = '".$_SESSION['idModuleModifier']."' LIMIT 1 OFFSET 1";
            $resultSelectChampsNom = $GLOBALS['bdd']-> query($reqSelectChampsNOM);

            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['idModuleModifier']);

            $resultatChampsModifier = $TheChamps->getIDandNOM($_SESSION['idModuleModifier']);

            affichagemodifierChamps($resultatChampsModifier, $_SESSION['q'], $_SESSION['adresse-Module-Modifier'],$resultSelectChampsNom);

            $_SESSION['adresse-Module-Modifier']++;
            $_SESSION['q']++;

            afficheNonModifierChamps(); 
        
        }
        else if ($_SESSION['q'] == 3 && $_SESSION['q']<= $_SESSION['count1'])
        {
            $reqSelectChampsNOM = "SELECT champs.id, champs.nomChamps FROM `champs`, module WHERE champs.idModule = module.id AND module.id = '".$_SESSION['idModuleModifier']."' LIMIT 1 OFFSET 2";
            $resultSelectChampsNom = $GLOBALS['bdd']-> query($reqSelectChampsNOM);

            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['idModuleModifier']);

            $resultatChampsModifier = $TheChamps->getIDandNOM($_SESSION['idModuleModifier']);

            affichagemodifierChamps($resultatChampsModifier, $_SESSION['q'], $_SESSION['adresse-Module-Modifier'],$resultSelectChampsNom);

            $_SESSION['adresse-Module-Modifier']++;
            $_SESSION['q']++;

            afficheNonModifierChamps(); 
        
        }
        else if ($_SESSION['q'] == 4 && $_SESSION['q']<= $_SESSION['count1'])
        {
            $reqSelectChampsNOM = "SELECT champs.id, champs.nomChamps FROM `champs`, module WHERE champs.idModule = module.id AND module.id = '".$_SESSION['idModuleModifier']."' LIMIT 1 OFFSET 3";
            $resultSelectChampsNom = $GLOBALS['bdd']-> query($reqSelectChampsNOM);

            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['idModuleModifier']);

            $resultatChampsModifier = $TheChamps->getIDandNOM($_SESSION['idModuleModifier']);

            affichagemodifierChamps($resultatChampsModifier, $_SESSION['q'], $_SESSION['adresse-Module-Modifier'],$resultSelectChampsNom);

            $_SESSION['adresse-Module-Modifier']++;
            $_SESSION['q']++;

            afficheNonModifierChamps(); 
        
        }
        else if ($_SESSION['q'] == 5 && $_SESSION['q']<= $_SESSION['count1'])
        {
            $reqSelectChampsNOM = "SELECT champs.id, champs.nomChamps FROM `champs`, module WHERE champs.idModule = module.id AND module.id = '".$_SESSION['idModuleModifier']."' LIMIT 1 OFFSET 4";
            $resultSelectChampsNom = $GLOBALS['bdd']-> query($reqSelectChampsNOM);

            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['idModuleModifier']);

            $resultatChampsModifier = $TheChamps->getIDandNOM($_SESSION['idModuleModifier']);

            affichagemodifierChamps($resultatChampsModifier, $_SESSION['q'], $_SESSION['adresse-Module-Modifier'],$resultSelectChampsNom);

            $_SESSION['adresse-Module-Modifier']++;
            $_SESSION['q']++;

            afficheNonModifierChamps(); 
        
        }
        else if ($_SESSION['q'] == 6 && $_SESSION['q']<= $_SESSION['count1'])
        {
            $reqSelectChampsNOM = "SELECT champs.id, champs.nomChamps FROM `champs`, module WHERE champs.idModule = module.id AND module.id = '".$_SESSION['idModuleModifier']."' LIMIT 1 OFFSET 5";
            $resultSelectChampsNom = $GLOBALS['bdd']-> query($reqSelectChampsNOM);

            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['idModuleModifier']);

            $resultatChampsModifier = $TheChamps->getIDandNOM($_SESSION['idModuleModifier']);

            affichagemodifierChamps($resultatChampsModifier, $_SESSION['q'], $_SESSION['adresse-Module-Modifier'],$resultSelectChampsNom);

            $_SESSION['adresse-Module-Modifier']++;
            $_SESSION['q']++;

            afficheNonModifierChamps(); 
        
        }
        else if ($_SESSION['q'] == 7 && $_SESSION['q']<= $_SESSION['count1'])
        {
            $reqSelectChampsNOM = "SELECT champs.id, champs.nomChamps FROM `champs`, module WHERE champs.idModule = module.id AND module.id = '".$_SESSION['idModuleModifier']."' LIMIT 1 OFFSET 6";
            $resultSelectChampsNom = $GLOBALS['bdd']-> query($reqSelectChampsNOM);

            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['idModuleModifier']);

            $resultatChampsModifier = $TheChamps->getIDandNOM($_SESSION['idModuleModifier']);

            affichagemodifierChamps($resultatChampsModifier, $_SESSION['q'], $_SESSION['adresse-Module-Modifier'],$resultSelectChampsNom);

            $_SESSION['adresse-Module-Modifier']++;
            $_SESSION['q']++;

            afficheNonModifierChamps(); 
        
        }
        else if ($_SESSION['q'] == 8 && $_SESSION['q']<= $_SESSION['count1'])
        {
            $reqSelectChampsNOM = "SELECT champs.id, champs.nomChamps FROM `champs`, module WHERE champs.idModule = module.id AND module.id = '".$_SESSION['idModuleModifier']."' LIMIT 1 OFFSET 7";
            $resultSelectChampsNom = $GLOBALS['bdd']-> query($reqSelectChampsNOM);

            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['idModuleModifier']);

            $resultatChampsModifier = $TheChamps->getIDandNOM($_SESSION['idModuleModifier']);

            affichagemodifierChamps($resultatChampsModifier, $_SESSION['q'], $_SESSION['adresse-Module-Modifier'],$resultSelectChampsNom);

            $_SESSION['adresse-Module-Modifier']++;
            $_SESSION['q']++;

            afficheNonModifierChamps(); 
        
        }
        else if ($_SESSION['q'] == 9 && $_SESSION['q']<= $_SESSION['count1'])
        {
            $reqSelectChampsNOM = "SELECT champs.id, champs.nomChamps FROM `champs`, module WHERE champs.idModule = module.id AND module.id = '".$_SESSION['idModuleModifier']."' LIMIT 1 OFFSET 8";
            $resultSelectChampsNom = $GLOBALS['bdd']-> query($reqSelectChampsNOM);

            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['idModuleModifier']);

            $resultatChampsModifier = $TheChamps->getIDandNOM($_SESSION['idModuleModifier']);

            affichagemodifierChamps($resultatChampsModifier, $_SESSION['q'], $_SESSION['adresse-Module-Modifier'],$resultSelectChampsNom);

            $_SESSION['adresse-Module-Modifier']++;
            $_SESSION['q']++;

            afficheNonModifierChamps(); 
        
        }
        else if ($_SESSION['q'] == 10 && $_SESSION['q']<= $_SESSION['count1'])
        {
            $reqSelectChampsNOM = "SELECT champs.id, champs.nomChamps FROM `champs`, module WHERE champs.idModule = module.id AND module.id = '".$_SESSION['idModuleModifier']."' LIMIT 1 OFFSET 9";
            $resultSelectChampsNom = $GLOBALS['bdd']-> query($reqSelectChampsNOM);

            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['idModuleModifier']);

            $resultatChampsModifier = $TheChamps->getIDandNOM($_SESSION['idModuleModifier']);

            affichagemodifierChamps($resultatChampsModifier, $_SESSION['q'], $_SESSION['adresse-Module-Modifier'],$resultSelectChampsNom);

            $_SESSION['adresse-Module-Modifier']++;
            $_SESSION['q']++;

            afficheNonModifierChamps(); 
        
        }
        else if ($_SESSION['q'] == 11 && $_SESSION['q']<= $_SESSION['count1'])
        {
            $reqSelectChampsNOM = "SELECT champs.id, champs.nomChamps FROM `champs`, module WHERE champs.idModule = module.id AND module.id = '".$_SESSION['idModuleModifier']."' LIMIT 1 OFFSET 10";
            $resultSelectChampsNom = $GLOBALS['bdd']-> query($reqSelectChampsNOM);

            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['idModuleModifier']);

            $resultatChampsModifier = $TheChamps->getIDandNOM($_SESSION['idModuleModifier']);

            affichagemodifierChamps($resultatChampsModifier, $_SESSION['q'], $_SESSION['adresse-Module-Modifier'],$resultSelectChampsNom);

            $_SESSION['adresse-Module-Modifier']++;
            $_SESSION['q']++;

            afficheNonModifierChamps(); 
        
        }
        else if ($_SESSION['q'] == 12 && $_SESSION['q']<= $_SESSION['count1'])
        {
            $reqSelectChampsNOM = "SELECT champs.id, champs.nomChamps FROM `champs`, module WHERE champs.idModule = module.id AND module.id = '".$_SESSION['idModuleModifier']."' LIMIT 1 OFFSET 11";
            $resultSelectChampsNom = $GLOBALS['bdd']-> query($reqSelectChampsNOM);

            $resultatCanaux = $TheModule->getIDCanauxNomEquipementModuleANDValeurCanaux($_SESSION['idModuleModifier']);

            $resultatChampsModifier = $TheChamps->getIDandNOM($_SESSION['idModuleModifier']);

            affichagemodifierChamps($resultatChampsModifier, $_SESSION['q'], $_SESSION['adresse-Module-Modifier'],$resultSelectChampsNom);

            $_SESSION['adresse-Module-Modifier']++;
            $_SESSION['q']++;

            afficheNonModifierChamps(); 
        
        }
        
        

    }

    

    //Modification des champs

    if(isset($_POST['submit-modifier-Canaux']))
    {
        $TheChamps->modificationChamps($_POST['idChampsModifier'],0,$_POST['nom'],$_POST['adresseModifier']);
    }
    
    $reqAffichageTotal ="SELECT module.nomEquipement AS nomEquipement, scene.nom AS nom, champs.nomChamps AS nomChamps, champs.adress AS adress, canaux.valeur  FROM  champs, canaux, module, scene WHERE champs.idCanaux = canaux.id AND canaux.idmodule = module.id AND canaux.idscene = scene.id";
    $resultatSelectTotal = $GLOBALS['bdd'] -> query($reqAffichageTotal);

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
                            <select name="idModuleModifier" onchange="updateModuleInfo(this)">
                                <option value="">Choisissez un module</option>
                                <?php 
                                // affiche les commandes déjà faites par l'utilisateur
                                $n6 = 0;
                                while ($tab = $resultatModuleModifier->fetch()) {    
                                    echo '<option value="'.$tab["id"].'">'.$tab["nom"].' : '.$tab["nomEquipement"].'</option>';
                                    $n6++;
                                }
                                ?>
                            </select>
                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary" name="submit-choix-modifier-valider">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php

        
        if (isset($_POST['idModuleModifier'])) {

            
            $reqInfoModule = "SELECT `nomEquipement`, `adress` FROM `module` WHERE id = '".$_POST['idModuleModifier']."'";
            $infoModule = $GLOBALS['bdd']->query($reqInfoModule);
            $module = $infoModule->fetch();
            $nomEquipementExistant = $module['nomEquipement'];
            $adresseExistant = $module['adress'];


                
        } else {
            $nomEquipementExistant = "";
            $adresseExistant = "";
        }

       $adresseExistant = 0;

 
    }

    if(isset($_POST['submit-choix-modifier-valider']))
    {
            $_SESSION['idModuleModifierChoisi'] = $_POST['idModuleModifier'];
            $reqInfoModule = "SELECT `nomEquipement`, `adress` FROM `module` WHERE id = '".$_POST['idModuleModifier']."'";
            $infoModule = $GLOBALS['bdd']->query($reqInfoModule);
            $module = $infoModule->fetch();
            $nomEquipementExistant = $module['nomEquipement'];
            $adresseExistant = $module['adress'];
        ?>

        

        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Modifier le module</h3>
                            
                        <form class="requires-validation" action="" method="POST" novalidate>
                            <div class="col-md-12">
                            <input id="nomEquipementModifier" class="form-control" type="text" name="nomEquipementModifier" placeholder="Nom d'Equipement" value="<?php if(isset($nomEquipementExistant)){echo $nomEquipementExistant;} ?>" required>
                            </div>
                            <select name="adresseModifier" id="adresseModifier">
                                <option value="">Choisissez une adresse</option>
                                <?php 
                                // affiche les commandes déjà faites par l'utilisateur
                                $adress = 1;
                                while ($adress < 513) {    
                                    echo '<option value="'.$adress.'"';
                                    if(isset($adresseExistant))
                                    {
                                        if ($adress == $adresseExistant) {
                                            echo ' selected';
                                        }
                                    }
                                    echo '>'.$adress.'</option>';
                                    $adress++;
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
            <th>Nom de la Scène</th>
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
                    echo '<td>';echo ''.$AffichageModule["nom"].'</td>';
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
    
    

    $resultatAffichageChamps = $TheChamps->affichageChamps();

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
                while($AffichageChamps = $resultatAffichageChamps->fetch())
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

    if(isset($_POST['submit-modifier-champs']))
    {
        $TheChamps->modificationChamps($_POST['idChampsModifier'],0,$_POST['nom'],$_POST['adresseModifier']);

    }
    if(isset($_POST['submit-modifier-champs-solo']))
    {

        $TheChamps->modificationChamps($_SESSION['idChampsModifier-choisi'],0,$_POST['nom'],$_POST['adresseModifier']);

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
                    <h3>Modifier le champ </h3>
                        
                    <form class="requires-validation" action="" method="POST" novalidate>

                        

                        <select name="idChampsModifier" onchange="this.form.submit()">
                            <option value=""> Choisissez un Champs</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            $n7= 0;
                            while($tabCHamps = $resultatChampsModifier->fetch()){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$tabCHamps["id"].'">';echo ''.$tabCHamps["nom"].'';echo " : ";echo ''.$tabCHamps["nomChamps"].'';'</option>';
                                ?>
                                    
                                <?php
                                $n7 = $n7 +1;            
                            }
                            ?>
                            
                        </select>
                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary" name="submit-modifier-champs-solo-choisi">Modifier</button>
                           
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    
    }

    if(isset($_POST['submit-modifier-champs-solo-choisi']))
    {

        $_SESSION['idChampsModifier-choisi'] = $_POST['idChampsModifier'];
        
        // Exécutez votre requête ici avec $idChampsModifier
        $reqInfoChamps = "SELECT `nomChamps`, `adress` FROM `champs` WHERE id = '".$_POST['idChampsModifier']."'";
        $InfoChamps = $GLOBALS['bdd']->query($reqInfoChamps);
        $champs = $InfoChamps->fetch();
        $nomChampsExistant = $champs['nomChamps'];
        $adresseExistant = $champs['adress'];
        ?>
        <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Modifier le champ</h3>
                        
                    <form class="requires-validation" action="" method="POST" novalidate>

                        <div class="col-md-12">
                            <input id="nom" class="form-control" type="text" name="nom" placeholder="Nom" value="<?php if(isset($nomChampsExistant)){ echo $nomChampsExistant; }?>"required>
                               
                        </div>

                        <select name="adresseModifier" id="adresseModifierChamps">
                            <option value=""> Choisissez une Adresse</option>
                            <?php 
                            // affiche les commandes déja faites par l'utilisateur
                            $adress = 1;
                            while(  $adress < 513){    
                                    
                                    
                                echo '<option value="'.$adress.'"';
                                    if(isset($adresseExistant)){
                                        if ($adress == $adresseExistant) {
                                            echo ' selected';
                                        }
                                    }   
                                    echo '>'.$adress.'</option>';
                                    $adress++;
                                            
                                        
                            }
                                

                            ?>
                            
                        </select>

                        <?php $n3 = 1; ?>
                        
                               
                        

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary" name="submit-modifier-champs-solo">Modifier</button>
                           
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
                                    echo '<option value="'.$tab["id"].'">'.$tab["nom"].' : '.$tab["nomEquipement"].'</option>';
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

    
    $resultatChampSupprimer = $TheChamps ->suppimerChampSolo();

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
                            while($tabCHamps = $resultatChampSupprimer->fetch()){    
                                    
                                    
                                ?>
                                    
                                <?php
                                    echo '<option value="'.$tabCHamps["id"].'">';echo ''.$tabCHamps["nom"].'';echo " : ";echo ''.$tabCHamps["nomChamps"].'';'</option>';
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