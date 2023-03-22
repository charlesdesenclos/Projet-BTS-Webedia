<?php
// include("class/user.php");
// include("class/scene.php");
include ("pdo.php");

session_start();

// $TheUser = new user(null, null, null, null);
// $TheScene = new scene(null, null, null);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Drag n Drop | Test</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <script src='main.js'></script>
</head>
<body>
    <div id="scene-container">
        <?php
            $Request = "SELECT * FROM `scene`";
            $Result = $GLOBALS["PDO"]->query($Request);

            // Vérifier s'il y a des résultats
            if ($Result->rowCount() > 0) {
                foreach ($Result as $row) {
                    // Déterminer quelle classe de couleur utiliser en fonction du nom de la scène
                    if (strtolower($row['nom']) == 'blue') {
                        $color_class = 'scene-block-blue';
                    } elseif (strtolower($row['nom']) == 'green') {
                        $color_class = 'scene-block-green';
                    } elseif (strtolower($row['nom']) == 'orange') {
                        $color_class = 'scene-block-orange';
                    } else {
                        $color_class = '';
                    }

                    // Générer la classe CSS pour ce bloc de scène
                    $class = "scene-block-" . strtolower($row['nom']) . ' ' . $color_class;

                    // Afficher le bloc de scène avec un identifiant unique
                    echo "<div id='scene-block-{$row['id']}' class='scene-block $class' draggable='true'>" . $row['nom'] . "</div>";
                }
            }
        ?>
    </div>

    <script>
        // Récupération des éléments à déplacer
        var sceneBlocks = document.querySelectorAll('.scene-block');

        // Ajout de l'événement dragstart à chaque élément draggable
        sceneBlocks.forEach(function(sceneBlock) {
            sceneBlock.addEventListener('dragstart', function(event) {
                // Définition des données à transférer
                event.dataTransfer.setData('text/plain', event.target.id);
            });
        });

        // Ajout de l'événement dragover à l'élément de destination
        var dropZone = document.body;
        dropZone.addEventListener('dragover', function(event) {
            event.preventDefault();
        });

        // Ajout de l'événement drop à l'élément de destination
        dropZone.addEventListener('drop', function(event) {
            event.preventDefault();
            var data = event.dataTransfer.getData('text/plain');
            event.target.appendChild(document.getElementById(data));
        });
    </script>
</body>
</html>