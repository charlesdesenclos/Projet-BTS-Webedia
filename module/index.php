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
  </head>
  <body >    
  <?php

        
    require_once 'pdo/pdo.php'; // appele de la bdd
    $GLOBALS['bdd'] = $bdd;

    include("./Class/Module.php");
 
    $TheModule = new Module(null,null,null);

    $IDModule = $TheModule->getID();
    

    

    $nom = $TheModule->getnomEquipement();

    

    
    $resultatModule = $TheModule->getIdANDnomEquipement();

    $RequetSQL2 = "SELECT id, nom FROM scene";
    $resultatScene = $GLOBALS['bdd'] -> query($RequetSQL2);



    if(isset($_POST['submit-creation']))
    {

        $TheModule->creation($_POST['nomEquipement'],$_POST['adresse']);
        
    }

    include("./Class/Champs.php");
    $TheChamps = new Champs(null,null,null,null);

    $RequetSQL3 = "SELECT canaux.id, module.nomEquipement, canaux.valeur FROM canaux, module WHERE canaux.idmodule = module.id";
    $resultatCanaux = $GLOBALS['bdd'] -> query($RequetSQL3);
    
    if(isset($_POST['submit-creation-champs']))
    {
        $TheChamps->creationChamps($_POST['nomChamps'],$_POST['adress'],$_POST['idCanaux']);

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
                            <input class="collapse-item" type="submit" value="Creation" name="CreationModule" >
                            <input class="collapse-item" type="submit" value="Modifier" name="ModifierModule"  >
                            <input class="collapse-item" type="submit" value="Supprimer" name="SupprimerModule"  >
                            <input class="collapse-item" type="submit" value="Affichage" name="AffichageModule" >
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
                            <input class="collapse-item" type="submit" value="Creation" name="CreationChamps" >
                            <input class="collapse-item" type="submit" value="Modifier" name="ModifierChamps" >
                            <input class="collapse-item" type="submit" value="Supprimer" name="SupprimerChamps" >
                            <input class="collapse-item" type="submit" value="Affichage" name="AffichageChamps" >
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
                            $adress = 0;
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
    
    $reqAffichageTotal ="SELECT module.nomEquipement AS nomEquipement, scene.nom AS nom, champs.nomChamps AS nomChamps, champs.adress AS adress, canaux.valeur  FROM  champs, canaux, module, scene WHERE champs.idCanaux = canaux.id AND canaux.idmodule = module.id AND canaux.idscene = scene.id";
    $resultatSelectTotal = $GLOBALS['bdd'] -> query($reqAffichageTotal);

    //--------------------------------- Affichage Total -----------------------------------------------------------

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

    //--------------------------------- Affichage IHM Création Channels --------------------------------------------


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
                            $adress = 0;
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
                               
                        </div>

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary" name="submit-creation-champs">Enregistrer</button>
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

    //--------------------------------- Affichage IHM Modification Module --------------------------------------------

    if(isset($_POST['ModifierModule']))
    {
        
    }

    //--------------------------------- Affichage IHM Affichage Module ----------------------------------------------
    
    $reqAffichageModule ="SELECT `nomEquipement`, `adress` FROM `module`";
    $resultatSelectModule = $GLOBALS['bdd'] -> query($reqAffichageModule);

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
    
    $reqAffichageChamps ="SELECT module.nomEquipement AS nomEquipement, scene.nom AS nom, champs.nomChamps AS nomChamps, champs.adress AS adress  FROM  champs, canaux, module, scene WHERE champs.idCanaux = canaux.id AND canaux.idmodule = module.id AND canaux.idscene = scene.id";
    $resultatSelectChamps = $GLOBALS['bdd'] -> query($reqAffichageChamps);

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


   




    ?>
        

        
    </div> 


    <?php

    
    

    //if(isset($_SESSION['ModuleValider']) && $_SESSION['ModuleValider'] == false)
    //{
        ?>

    
        <div class="form-body">
       
    </div>




        <?php

    //}
  ?>
  
    <?php
    session_unset();
    session_destroy();

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