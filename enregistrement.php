<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enregistrement</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Enregistrement</h1>

    <?php
    // Vérification du formulaire d'enregistrement
    if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];

      // Vérification du mot de passe
      if ($password !== $confirm_password) {
        $error_message = "Les mots de passe ne correspondent pas.";
      } elseif (strlen($password) < 8 || !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/", $password)) {
        $error_message = "Le mot de passe doit contenir au moins 8 caractères avec une minuscule, une majuscule, un chiffre et un caractère spécial.";
      } else {
        // Enregistrement des informations dans la base de données
        // Remplacez les paramètres de connexion à la base de données par les vôtres
        $db_host = 'localhost';
        $db_username = 'votre_nom_utilisateur';
        $db_password = 'votre_mot_de_passe';
        $db_name = 'votre_base_de_donnees';

        $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

        if (!$conn) {
          die("Erreur de connexion à la base de données : " . mysqli_connect_error());
        }

        // Vérifier si le nom d'utilisateur ou l'adresse e-mail existe déjà dans la base de données
        $query = "SELECT * FROM utilisateurs WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          $error_message = "Le nom d'utilisateur ou l'adresse e-mail existe déjà.";
        } else {
          // Insertion des informations dans la base de données
          $query = "INSERT INTO utilisateurs (username, email, password) VALUES ('$username', '$email', '$password')";
          if (mysqli_query($conn, $query)) {
            // Redirection vers la page de connexion après l'enregistrement réussi
            header('Location: connexion.php');
            exit();
          } else {
            $error_message = "Erreur lors de l'enregistrement des informations.";
          }
        }

        mysqli_close($conn);
      }
    }
    ?>

    <?php if (isset($error_message)) { ?>
      <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php } ?>

    <form method="POST">
      <div class="form-group">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="email">Adresse e-mail :</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirmer le mot de passe :</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
      </div>
      <div class="form-group">
        <div class="g-recaptcha" data-sitekey="6Ld35SkmAAAAAODilUsm63RKU_Ei3pDYOml8HXzL"></div>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">S'enregistrer</button>
    </form>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
