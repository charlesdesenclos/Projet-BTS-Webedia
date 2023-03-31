// Masquer le formulaire d'inscription par défaut
$('#inscription-form').hide();

// Afficher le formulaire d'inscription lorsque l'utilisateur clique sur le bouton "inscription"
$('#inscription-btn').click(function() {
    $('#inscription-form').show();
    $('#connexion-form').hide();
});