<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Webedia | Gestion DMX</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <script src='main.js'></script>
</head>
<body>
    <?php 
        include ("session.php");
        
        if(isset($_SESSION['connexion'])) {
    ?>
        <h1> Page de gestion des scènes </h1>
        <h4>Cette page est privé à tout utilisateurs non connectés.</h4>

        <div id="draggable1" class="draggable">Scène 1</div>
        <div id="draggable2" class="draggable">Scène 2</div>

        <div id="droppable" class="droppable">ZONE DROPABLE</div>

        <script> 
            // Récupération des éléments HTML draggable et droppable
            let draggable1 = document.getElementById("draggable1");
            let draggable2 = document.getElementById("draggable2");
            let droppable = document.getElementById("droppable");

            // Ajout d'un écouteur d'événement dragstart sur l'élément draggable
            draggable1.addEventListener("dragstart", function(event) {
                // Définition des données à transférer avec le drag and drop, ici l'identifiant de l'élément draggable
                event.dataTransfer.setData("text/plain", event.target.id);
            });

            // Ajout d'un écouteur d'événement dragstart sur l'élément draggable
            draggable2.addEventListener("dragstart", function(event) {
                // Définition des données à transférer avec le drag and drop, ici l'identifiant de l'élément draggable
                event.dataTransfer.setData("text/plain", event.target.id);
            });

            // Ajout d'un écouteur d'événement dragover sur l'élément droppable
            droppable.addEventListener("dragover", function(event) {
                // Empêcher le comportement par défaut (interdire le drop)
                event.preventDefault();
            });

            // Ajout d'un écouteur d'événement drop sur l'élément droppable
            droppable.addEventListener("drop", function(event) {
                // Empêcher le comportement par défaut (interdire le drop)
                event.preventDefault();
                // Récupération des données transférées lors du drag and drop, ici l'identifiant de l'élément draggable
                let id = event.dataTransfer.getData("text/plain");
                // Ajout de l'élément draggable à l'intérieur de l'élément droppable
                event.target.appendChild(document.getElementById(id));
            });
        </script>

    <?php 
        } else {
            echo "Accès interdit si vous n'êtes pas connecté !";
        }
    ?>
</body>
</html>