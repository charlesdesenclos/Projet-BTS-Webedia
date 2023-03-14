<?php 
include("class/user.php");
// include("class/scene.php");
include ("pdo.php");

session_start();

$TheUser = new user(null, null, null, null);
// $TheScene = new scene(null, null, null);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<?php 

  // TRAITEMENT DU FORMULAIRE DE CONNEXION
  if(isset($_POST['connexion'])) {
    $TheUser->seConnecter($_POST['login'], $_POST['password']);
  }

  if(!isset($_SESSION['connexion'])) {
    $_SESSION['connexion'] = false;

  // TRAITEMENT DU FORMULAIRE D'INSCRIPTION
  if(isset($_POST['inscription-2'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
      
    $TheUser->inscription($login, $password);
  }
} 

  if(isset($_POST['creer_scene'])) {
    $TheScene->createScene();
  }


  if(isset($_POST['connexion']) && $_SESSION['connexion'] == true) {
    // echo "Vous êtes déjà connecté !";
    ?>

    <form action = "" method = "POST">
        <input type = "submit" name = "deconnexion" value = "Deconnexion"/>
    </form>

    <form action="" method="POST">
      <label for="nom_scene">Nom de la scène :</label>
      <input type="text" name="nom_scene" required>

      <input type="submit" name="creer_scene" id="creer_scene" value="Créer">
    </form>

    <?php

} else {
  ?>

  <body class="img js-fullheight" style="background-image: url(https://www.bmagroupparis.fr/wp-content/uploads/2016/09/webediaimages-04.jpg);">
  
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
          <h2 class="heading-section">Webedia</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
		
          <div class="login-wrap p-0">
				<!-- FORMULAIRE DE CONNEXION -->
            <form action="" method="POST" class="signin-form" id="connexion-form">
			        <h3> CONNEXION </h3>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Identifiant" name="login" required>
                </div>

                <div class="form-group">
                  <input id="password-field" type="password" class="form-control" placeholder="Mot de passe" name="password" required>
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>

                <div class="form-group">
                  <button type="submit" class="form-control btn btn-primary submit px-3" name="connexion" id="connexion-btn">Se connecter</button>
                </div>;

				<div class="form-group">
					<button type="button" class="form-control btn btn-primary submit px-3" name="inscription" id="inscription-btn">S'inscrire</button>
                </div>

              </form>

			  <!-- FORMULAIRE D'INSCRIPTION -->
			  <form action="" method="POST" class="signin-form" id="inscription-form">
				<h3> INSCRIPTION </h3>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Identifiant" name="login" required>
				</div>

				<div class="form-group">
					<input id="password-field" type="password" class="form-control" placeholder="Mot de passe" name="password" required>
					<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
				</div>

				<div class="form-group">
					<button type="button" class="form-control btn btn-primary submit px-3" name="inscription-2" id="inscription-btn">S'inscrire</button>
				</div>

				<div class="form-group">
                  <button type="submit" class="form-control btn btn-primary submit px-3" name="connexion-2">Se connecter</button>
                </div>
			  </form>
          </div>
        </div>
      </div>
    </div>
  </section>



	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
	<script src="js/hide-button.js"></script>
  <script src="js/dragndrop.js"></script>
<?php
}

  // TRAITEMENT DE LA DECONNEXION
  if(isset($_POST['deconnexion'])) {
    $TheUser->seDeconnecter();
  }
?> 


</body>
</html>