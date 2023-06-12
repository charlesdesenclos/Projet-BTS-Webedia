<?php 
include("Site/class/user.php");
include("Site/class/scene.php");
include("Site/class/favori.php");
include ("Site/pdo.php");

session_start();

// Création des objets nécessaires
$TheUser = new user(null, null, null, null);
$TheScene = new scene(null, null);
$TheFav = new favori(null, null, null, null, null);

// Variable globale pour stocker l'ID de l'utilisateur connecté
$GLOBALS['idUser'] = null;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Connexion</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Site/css/style.css">
    <link rel="stylesheet" href="Site/css/main.css">
    <script src="js/websocket.js"></script>    <!-- Script pour la connexion en websocket -->
    <script src="js/getSceneID.js"></script>   <!-- Script pour récupérer l'id de la scène -->
</head>
<body>
<?php
// TRAITEMENT DU FORMULAIRE DE CONNEXION
if (isset($_POST['connexion'])) {
    $connexionReussie = $TheUser->seConnecter($_POST['login'], $_POST['password']);

    if (!$connexionReussie) {
        $erreurConnexion = $TheUser->erreurConnexion;
    }

    $GLOBALS['idUser'] = $TheUser->getId($_POST['login'], $_POST['password']);
}

if (!isset($_SESSION['connexion'])) {
    $_SESSION['connexion'] = false;
}

// TRAITEMENT DU FORMULAIRE D'INSCRIPTION
if (isset($_POST['inscription-2'])) {
    $TheUser->inscription($_POST['login-2'], $_POST['password-2']);
  }

// TRAITEMENT DE LA DECONNEXION
if (isset($_POST['deconnexion'])) {
    $TheUser->seDeconnecter();
}

if (isset($_POST['connexion']) && $_SESSION['connexion'] == true) {
    $isUserAdmin = $TheUser->isAdmin($GLOBALS['idUser']);
    ?>
    <div class="header">
        <h1>Bienvenue, <?php echo $TheUser->getNom($idUser); ?></h1>
        <?php
        if ($isUserAdmin) {
            echo "<h3>Vous êtes un administrateur.</h3>";
            ?>
            <a href="module/index.php" class="module-btn">
                <span class="module-btn-icon"></span>
            </a>
        <?php
        } else {
            echo "<h3>Vous n'êtes pas un administrateur.</h3>";
        }
        ?>

        <form action="" method="POST">
            <input type="submit" name="deconnexion" value="Déconnexion" class="deconnexion-btn" />
        </form>
    </div>

    <div class="menu">
        <div class="app">
            <div class="lists">
                <div class="list">
                    <h1>Scènes existantes</h1>
                    <?php
                    // Vérifier s'il y a des résultats
                    $TheScene->getAllScene();
                    ?>
                </div>

                <div class="list">
                    <h1>Favori</h1>
                    <?php
                    // Vérifier s'il y a des résultats
                    // $TheFav->getAllFavorite();
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
?>
    <div>
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
                                    <h3>CONNEXION</h3>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Identifiant" name="login" required>
                                    </div>

                                    <div class="form-group">
                                        <input id="password-field" type="password" class="form-control" placeholder="Mot de passe" name="password" required>
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>
                                    <!-- Message d'erreur en cas d'identifiant incorrect -->
                                    <?php if (isset($erreurConnexion)): ?>
                                        <span class="error-container">
                                            <span class="error-message"><?php echo $erreurConnexion; ?></span>
                                        </span>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-primary submit px-3" name="connexion" id="connexion-btn">Se connecter</button>
                                    </div>

                                    <div class="form-group">
                                        <button type="button" class="form-control btn btn-primary submit px-3" name="inscription" id="inscription-btn">S'inscrire</button>
                                    </div>
                                </form>

                                <!-- FORMULAIRE D'INSCRIPTION -->
                                <form action="" method="POST" class="signin-form" id="inscription-form">
                                    <h3>INSCRIPTION</h3>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Identifiant" name="login-2" required>
                                    </div>

                                    <div class="form-group">
                                        <input id="password-field" type="password" class="form-control" placeholder="Mot de passe" name="password-2" required>
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-primary submit px-3" name="inscription-2" id="inscription-btn">S'inscrire</button>
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
<?php
}
?>
<script src="Site/js/jquery.min.js"></script>
<script src="Site/js/popper.js"></script>
<script src="Site/js/bootstrap.min.js"></script>
<script src="Site/js/main.js"></script>
<script src="Site/js/hide-button.js"></script>
<script src="Site/js/dragndrop.js"></script>

<script>
    detectSceneMove();
</script>
</body>
</html>
