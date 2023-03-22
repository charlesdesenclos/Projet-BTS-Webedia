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
