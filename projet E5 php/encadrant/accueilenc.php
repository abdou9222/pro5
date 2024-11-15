<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="image/VVA.png" />
    <title>Encadrant </title>
    <style>
        body {
            background-color: #f8f9fa; /* Arrière-plan gris clair */
        }
        header {
            background-color: #343a40; /* Couleur sombre pour l'en-tête */
            padding: 20px;
            color: white;
            text-align: center;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        .formulaire {
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            max-width: 600px;
        }
        h2 {
            color: #28a745; /* Vert pour les titres */
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 10px;
            text-align: center;
            margin-top: 20px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <header>
        <h1>Tableau de bord - Encadrant</h1>
        <nav>
            <ul>
                <li><a href="gestionnaire.php">Accueil</a></li>
                <li><a href="ajout_activité.php">Activités</a></li>
                <li><a href="suppression.php">suppréssion activité</a></li>
                <li><a href="../index.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>

    <section class="formulaire">
        <h2>Ajouter une Activité</h2>
        <form action="ajout_activite1.php" method="post">
            <!-- Les champs pour l'ajout d'un hébergement vont ici -->
            <input type="submit" value="Ajout activité" class="btn btn-success">
        </form>
    </section>

    <section class="formulaire">
        <h2>Ajouter une animation</h2>
        <form action="ajout_animation1.php" method="post">
            <!-- Les champs pour l'ajout d'un événement vont ici -->
            <input type="submit" value="Ajout animation" class="btn btn-success">
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Agence de vacances VVA</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
