<?php 
// Inclure le fichier de connexion à la base de données
include("../bdd.php");
session_start();

// Récupérer les types d'animation pour le menu déroulant
$requetetype = "SELECT CODETYPEANIM, NOMTYPEANIM FROM `type_anim`";
$resulttype = mysqli_query($conn, $requetetype);
$type = mysqli_fetch_all($resulttype, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Animation - Association VVA</title>

    <link rel="shortcut icon" href="image/VVA.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Association VVA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center mb-4 text-success">Ajouter une Animation</h1>
        <form action="" method="post">
            <!-- Sélection du type d'animation -->
            <div class="form-group mb-3">
                <label for="codetypeanim">Type d'Animation :</label>
                <select class="form-control" name="codetypeanim" required>
                    <option value="">Sélectionnez le type</option>
                    <?php
                    foreach ($type as $types) {
                        echo "<option value='{$types['CODETYPEANIM']}'>{$types['NOMTYPEANIM']}</option>";
                    }
                    ?>
                </select>
            </div>
           
            <!-- Nom de l'Animation -->
            <div class="form-group mb-3">
                <label for="nom">Nom de l'Animation :</label>
                <input type="text" class="form-control" name="nom" required>
            </div>

            <!-- Date de validité -->
            <div class="form-group mb-3">
                <label for="datevalidite">Date de Validité :</label>
                <input type="date" class="form-control" name="datevalidite" required>
            </div>

            <!-- Durée de l'Animation -->
            <div class="form-group mb-3">
                <label for="duree">Durée (en heures) :</label>
                <input type="number" class="form-control" name="duree" required>
            </div>

            <!-- Limite d'âge -->
            <div class="form-group mb-3">
                <label for="limiteage">Âge Limite :</label>
                <input type="number" class="form-control" name="limiteage" required>
            </div>

            <!-- Tarif de l'Animation -->
            <div class="form-group mb-3">
                <label for="tarif">Tarif (en €) :</label>
                <input step="0.01" type="number" class="form-control" name="tarif" required>
            </div>

            <!-- Nombre de places -->
            <div class="form-group mb-3">
                <label for="nbreplaces">Nombre de Places :</label>
                <input type="number" class="form-control" name="nbreplaces" required>
            </div>

            <!-- Description de l'Animation -->
            <div class="form-group mb-3">
                <label for="description">Description de l'Animation :</label>
                <textarea class="form-control" name="description" rows="4" required></textarea>
            </div>

            <!-- Commentaire -->
            <div class="form-group mb-3">
                <label for="commentaire">Commentaire :</label>
                <textarea class="form-control" name="commentaire" rows="4"></textarea>
            </div>

            <!-- Difficulté -->
            <div class="form-group mb-3">
                <label for="difficulte">Difficulté :</label>
                <input type="text" class="form-control" name="difficulte" required>
            </div>

            <button type="submit" name="submit" class="btn btn-success">Ajouter Animation</button>
            <button type="reset" class="btn btn-danger">Annuler</button>
        </form>
    </div>

    <footer class="bg-success text-white text-center py-4 mt-4">
        <p>&copy; 2024 Association VVA, Tous droits réservés</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php
    if (isset($_POST['submit'])) {
        // Récupération des données du formulaire
        $codetypeanim = $_POST['codetypeanim'];
        $nom = mysqli_real_escape_string($conn, $_POST["nom"]);
        $datevalidite = $_POST["datevalidite"];
        $duree = $_POST["duree"];
        $limiteage = $_POST["limiteage"];
        $tarif = $_POST["tarif"];
        $nbreplaces = $_POST["nbreplaces"];
        $description = mysqli_real_escape_string($conn, $_POST["description"]);
        $commentaire = mysqli_real_escape_string($conn, $_POST["commentaire"]);
        $difficulte = $_POST["difficulte"];

        // Générer un nouveau CODEANIM
        $requete1 = "SELECT MAX(`CODEANIM`) AS max_codeanim FROM `animation`";
        $result1 = mysqli_query($conn, $requete1);
        $co = mysqli_fetch_array($result1);
        $codeanim = $co['max_codeanim'] + 1;

        // Requête d'insertion
        $requete = "INSERT INTO animation (CODEANIM, CODETYPEANIM, NOMANIM, DATEVALIDITEANIM, DUREEANIM, LIMITEAGE, TARIFANIM, NBREPLACEANIM, DESCRIPTANIM, COMMENTANIM, DIFFICULTEANIM) 
                    VALUES ('$codeanim', '$codetypeanim', '$nom', '$datevalidite', '$duree', '$limiteage', '$tarif', '$nbreplaces', '$description', '$commentaire', '$difficulte')";
        
        $result = mysqli_query($conn, $requete);

        if ($result) {
            echo "<h1 class='text-center text-success'>Animation ajoutée</h1>";
            header("Refresh:2; url=listeanimation.php");
        } else {
            echo "<p class='text-danger text-center'>Erreur lors de l'ajout : " . mysqli_error($conn) . "</p>";
        }

        mysqli_close($conn);
    }
    ?>
</body>
</html>
