<?php
        session_start();   
 ?>
<html>
  <head>
    <title>Module</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    
  </head>
  <body >    
  <?php

        
    require_once 'pdo/pdo.php'; // appele de la bdd
    $GLOBALS['bdd'] = $bdd;

       
 


    if(isset($_POST['submit-creation']))
    {
        $nomEquipement = $_POST['nomEquipement'];
        $adresse = $_POST['adresse'];

        $check = $GLOBALS['bdd']->prepare('SELECT nomEquipement FROM `module` WHERE nomEquipement = ?');
        $check->execute(array($nomEquipement));
        $data = $check->fetch();
        $row = $check->rowCount();



        if($row == 0)
        {
            $sqlInsertModule = "INSERT INTO module(nomEquipement, adress) VALUES('".$nomEquipement."','".$adresse."')";
            $reqInsertModule = $GLOBALS['bdd']->query($sqlInsertModule);
            $_SESSION['ModulExisteDeja'] = false;
            $_SESSION['ModuleValider'] = true;
        }
        else
        {
            $_SESSION['ModulExisteDeja'] = true;
            $_SESSION['ModuleValider'] = false;
        }

        
    }


    //if(isset($_SESSION['ModuleValider']) && $_SESSION['ModuleValider'] == false)
    //{
        ?>
        <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Création de module</h3>
                        
                        <form class="requires-validation" action="" method="POST" novalidate>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="nomEquipement" placeholder="Nom d'Equipement" required>
                               <div class="valid-feedback">Nom du module</div>
                               <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="adresse" placeholder="Adresse" required>
                                 <div class="valid-feedback">Adresse</div>
                                 <div class="invalid-feedback">Email field cannot be blank!</div>
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
    </div>




        <?php

    //}
  ?>
  
    <?php
    session_unset();
    session_destroy();

    ?>

</body>
</html>