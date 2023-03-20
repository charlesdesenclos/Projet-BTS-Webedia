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
    

    foreach ($IDModule as $id) {
        echo $id['id'] . "<br>";
    }

    $nom =$TheModule->getnomEquipement();

    foreach ($nom as $nomEquipement) {
        echo $nomEquipement['nomEquipement'] . "<br>";
    }




    if(isset($_POST['submit-creation']))
    {

        
        $TheModule->creation($_POST['nomEquipement'],$_POST['adresse']);
        
        


    }

    
    ?>
    

    <!-- Page Wrapper -->
    <div id="wrapper">
        

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Webedia</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
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

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Canaux</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion :</h6>
                        <form action="" method="POST">
                            <input class="collapse-item" type="submit" value="Creation" name="CreationCanaux"  >
                            <input class="collapse-item" type="submit" value="Modifier" name="ModifierCanaux" >
                            <input class="collapse-item" type="submit" value="Supprimer" name="SupprimerCanaux" >
                            <input class="collapse-item" type="submit" value="Affichage" name="AffichageCanaux" >
                        </form>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Chanels</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion :</h6>
                        <form action="" method="POST">
                            <input class="collapse-item" type="submit" value="Creation" name="CreationChannels" >
                            <input class="collapse-item" type="submit" value="Modifier" name="ModifierChannels" >
                            <input class="collapse-item" type="submit" value="Supprimer" name="SupprimerChannels" >
                            <input class="collapse-item" type="submit" value="Affichage" name="AffichageChannels" >
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

                        <div class="col-md-12">
                            <input class="form-control" type="email" name="adresse" placeholder="Adresse" required>
                                 
                         </div>

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


    if(isset($_POST['CreationCanaux']))
    {
        ?>
        <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Création de Canaux</h3>
                        
                    <form class="requires-validation" action="" method="POST" novalidate>

                        <div class="col-md-12">
                            <select name="idModule">
                                <option value=""> Choisissez un Module</option>
                                <option valuer=""></option>
                            
                            </select>
                            <select name="idScene">
                                <option value=""> Choisissez une Scène</option>
                                <?php 
                                // affiche les commandes déja faites par l'utilisateur
                                while($tab = $resultat->fetch()){    
                                    
                                    
                                    ?>
                                    
                                    <?php
                                        echo '<option value="'.$tab["id"].'">';echo $n ;echo " : ";echo ''.$tab["nomModule"].'</option>';
                                    ?>
                                    
                                    <?php
                                    $n = $n +1;
                                            
                                        
                                }
                                

                                ?>
                            
                            </select>
                               
                        </div>

                        <div class="col-md-12">
                            <input class="form-control" type="text" name="Valeur" placeholder="Valeur" required>
                                 
                         </div>

                        <div class="form-button mt-3">
                            <button id="submit" type="submit" class="btn btn-primary" name="submit-creation-canaux">Enregistrer</button>
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