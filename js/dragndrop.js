function detectSceneMove() {
	const listItems = document.querySelectorAll('.list-item');
	const lists = document.querySelectorAll('.list');
  
	let draggedItem = null;
  
	listItems.forEach(item => {
	  item.addEventListener('dragstart', function () {
		draggedItem = item;
		setTimeout(() => {
		  item.style.display = 'none';
		}, 0);
	  });
  
	  item.addEventListener('dragend', function () {
		setTimeout(() => {
		  draggedItem.style.display = 'block';
		  draggedItem = null;
		}, 0);
	  });
	});
  
	lists.forEach(list => {
	  list.addEventListener('dragover', function (e) {
		e.preventDefault();
	  });
  
	  list.addEventListener('dragenter', function (e) {
		e.preventDefault();
		this.style.backgroundColor = 'rgba(0, 0, 0, 0.2)';
	  });
  
	  list.addEventListener('dragleave', function () {
		this.style.backgroundColor = 'rgba(0, 0, 0, 0.1)';
	  });
  
	  list.addEventListener('drop', function () {
		this.append(draggedItem);
		this.style.backgroundColor = 'rgba(0, 0, 0, 0.1)';
	  });
	});
  }