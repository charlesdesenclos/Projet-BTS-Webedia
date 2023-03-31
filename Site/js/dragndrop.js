// Sélectionne tous les éléments avec la classe 'list-item'
const list_items = document.querySelectorAll('.list-item');

// Sélectionne tous les éléments avec la classe 'list'
const lists = document.querySelectorAll('.list');

// Crée une variable pour stocker l'élément glissé
let draggedItem = null;

// Boucle à travers chaque élément de la liste des éléments
for (let i = 0; i < list_items.length; i++) {
const item = list_items[i];

// Ajoute un événement de glissement sur l'élément
item.addEventListener('dragstart', function () {
	// Stocke l'élément glissé dans la variable
	draggedItem = item;
	// Définit un délai pour masquer l'élément lorsqu'il est glissé
	setTimeout(function () {
		item.style.display = 'none';
	}, 0)
});

// Ajoute un événement de fin de glissement sur l'élément
item.addEventListener('dragend', function () {
	// Définit un délai pour réafficher l'élément après qu'il a été glissé
	setTimeout(function () {
		draggedItem.style.display = 'block';
		// Réinitialise la variable d'élément glissé à null
		draggedItem = null;
	}, 0);
})

	// Boucle à travers chaque élément de la liste des éléments avec la classe 'list'
for (let j = 0; j < lists.length; j ++) {
// Stocke l'élément actuel dans une variable
const list = lists[j];

python
Copy code
// Ajoute un événement de survol sur l'élément
list.addEventListener('dragover', function (e) {
	// Empêche le comportement par défaut lorsqu'un élément est survolé
	e.preventDefault();
});

// Ajoute un événement de survol entrant sur l'élément
list.addEventListener('dragenter', function (e) {
	// Empêche le comportement par défaut lorsqu'un élément est survolé
	e.preventDefault();
	// Change la couleur de fond de l'élément survolé
	this.style.backgroundColor = 'rgba(0, 0, 0, 0.2)';
});

// Ajoute un événement de survol sortant de l'élément
list.addEventListener('dragleave', function (e) {
	// Change la couleur de fond de l'élément lorsque le curseur de la souris quitte la zone de survol
	this.style.backgroundColor = 'rgba(0, 0, 0, 0.1)';
});

// Ajoute un événement de lâcher de l'élément
list.addEventListener('drop', function (e) {
	// Empêche le comportement par défaut lorsqu'un élément est lâché
	e.preventDefault();
	console.log('drop');
	// Ajoute l'élément glissé à la liste actuelle
	this.append(draggedItem);
	// Réinitialise la couleur de fond de l'élément
	this.style.backgroundColor = 'rgba(0, 0, 0, 0.1)';
});
