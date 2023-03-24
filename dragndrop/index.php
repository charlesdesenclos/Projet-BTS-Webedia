<?php
	include('pdo.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Drag n Drop</title>

	<link rel="stylesheet" href="main.css" />
</head>
<body>
	<div class="app">
		<?php
			$Request = "SELECT * FROM `scene`";
			$Result = $GLOBALS["PDO"]->query($Request);
		?>

		<div class="lists">
			<div class="list">
				<?php
                // Vérifier s'il y a des résultats
				if ($Result->rowCount() > 0) {
					foreach ($Result as $row) {                
					// Afficher le bloc de scène
					echo "<div class= 'list-item' draggable='true'>" .$row['nom']. "</div>"; 
					}
				}
				?>
			</div>
			<div class="list"></div>
		</div>
	</div>
	<script src="main.js"></script>
</body>
</html>