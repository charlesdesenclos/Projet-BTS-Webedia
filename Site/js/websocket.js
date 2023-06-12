const socket = new WebSocket('ws://192.168.64.81:12345');
//const socket = new WebSocket('ws://192.168.64.228:12345');

// Écouter les événements de connexion
socket.addEventListener('open', function (event) {
    console.log('Connexion établie');
});

// Écouter les événements de réception de message
socket.addEventListener('message', function (event) {
    console.log('Message reçu du serveur:', event.data);
});

// Écouter les événements de fermeture
socket.addEventListener('close', function (event) {
    console.log('Connexion fermée');
});

// Fonction pour envoyer l'ID de la scène au serveur
function sendSceneId(sceneId) {
    // Convertir l'ID de la scène en chaîne de caractères
    const message = sceneId.toString();
    socket.send(message);
}