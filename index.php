<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Armor Location</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <header class="bg-dark text-light py-3">
            <!-- En-tête -->
            <div class="container d-flex justify-content-between align-items-center">
                <h1>Armor Location</h1>
                <?php
                session_start();

                // Vérifier si l'utilisateur est déjà connecté
                if (isset($_SESSION['loggedin'])) {
                    // Utilisateur connecté
                    echo '<p>Bienvenue, ' . $_SESSION['username'] . '!</p>';
                } else {
                    // Utilisateur non connecté => afficher le bouton pour se connecter
                    echo '<a href="connexion.php" class="btn btn-primary">Se connecter</a>';
                }
                ?>
            </div>
        </header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <!-- Menu de navigation -->
            <div class="container">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Catégories</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Promotions</a></li>
                </ul>
            </div>
        </nav>

        <main class="py-5">
            <!-- Contenu principal -->
            <div class="container">
                <h2>Nos catégories de matériel</h2>
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="image1.jpg" alt="Catégorie 1">
                            <div class="card-body">
                                <h5 class="card-title">Catégorie 1</h5>
                                <p class="card-text">Description de la catégorie 1.</p>
                                <a href="#" class="btn btn-primary">Voir les produits</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="image2.jpg" alt="Catégorie 2">
                            <div class="card-body">
                                <h5 class="card-title">Catégorie 2</h5>
                                <p class="card-text">Description de la catégorie 2.</p>
                                <a href="#" class="btn btn-primary">Voir les produits</a>
                            </div>
                        </div>
                    </div>
                    <!-- pour d'autre catégorie-->
                </div>
            </div>
        </main>

        <footer class="bg-dark text-light py-3">
            <!-- Pied de page -->
            <div class="container">
                <p>Site noam rehault et raphael jacq &copy; 2023</p>
            </div>
        </footer>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
