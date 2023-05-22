<?php
session_start();

// Vérification des informations de connexion
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Vérifier les informations d'authentification dans la base de données
  // Remplacez les paramètres de connexion à la base de données par les vôtres
  $db_host = 'localhost';
  $db_username = 'votre_nom_utilisateur';
  $db_password = 'votre_mot_de_passe';
  $db_name = 'votre_base_de_donnees';

  $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

  if (!$conn) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
  }

  $query = "SELECT * FROM utilisateurs WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    // Authentification réussie, créer une session utilisateur
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['status'] = $user['status'];

    // Redirection vers la page index.php en cas d'authentification réussie
    header('Location: index.php');
    exit();
  } else {
    // Authentification échouée
    $error_message = "Identifiant ou mot de passe incorrect";
  }

  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <h1>Connexion</h1>

        <?php if (isset($error_message)) { ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php } ?>

        <form method="POST">
        <div class="form-group">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Se connecter</button>
        </form>

        <a href="motdepasse_oublie.php">Mot de passe oublié ?</a>
        <a href="enregistrement.php">S'enregistrer</a>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>