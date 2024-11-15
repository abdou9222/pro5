<?php 
// Inclure le fichier de connexion à la base de données
include("../bdd.php");
session_start();
$requetetype =  "SELECT CODETYPEANIM,NOMTYPEANIM FROM `type_anim`";
$resulttype = mysqli_query($conn, $requetetype);
$type = mysqli_fetch_all($resulttype) ;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Activité - Association VVA</title>

    <link rel="shortcut icon" href="image/VVA.png" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="ajouthebergement.css">
</head>

<body class="bg-light">

    
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Association VVA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center mb-4 text-success">Ajouter une Animation</h1>
        <form action="" method="post">


            <select name="codetypeanim">

            <?php

            foreach ($type as $types) {
                echo "<option value=".$types[0].">".$types[1]. "</option>";
            }

            ?>
            </select>
           
            <!-- Nom de l'Activité -->
            <div class="form-group">
                <label for="nom">Nom de l'Activité :</label>
                <input type="text" class="form-control" name="nom" required>
            </div>

            <!-- Date de validité -->
            <div class="form-group">
                <label for="datevalidite">Date de Validité :</label>
                <input type="date" class="form-control" name="datevalidite" required>
            </div>

            <!-- Durée de l'Activité -->
            <div class="form-group">
                <label for="duree">Durée (en heures) :</label>
                <input type="number" class="form-control" name="duree" required>
            </div>

            <!-- Limite d'âge -->
            <div class="form-group">
                <label for="limiteage">Âge Limite :</label>
                <input type="number" class="form-control" name="limiteage" required>
            </div>

            <!-- Tarif de l'Activité -->
            <div class="form-group">
                <label for="tarif">Tarif (en €) :</label>
                <input step="0.01" type="number" class="form-control" name="tarif" required>
            </div>

            <!-- Nombre de places -->
            <div class="form-group">
                <label for="nbreplaces">Nombre de Places :</label>
                <input type="number" class="form-control" name="nbreplaces" required>
            </div>

            <!-- Description de l'Activité -->
            <div class="form-group">
                <label for="description">Description de l'Activité :</label>
                <textarea class="form-control" name="description" rows="4" required></textarea>
            </div>

            <!-- Commentaire -->
            <div class="form-group">
                <label for="commentaire">Commentaire :</label>
                <textarea class="form-control" name="commentaire" rows="4"></textarea>
            </div>

            <!-- Difficulté -->
            <div class="form-group">
                <label for="difficulte">Difficulté :</label>
                <input type="text" class="form-control" name="difficulte" required>
            </div>

            <button type="submit" name="submit" class="btn btn-success">Ajouter Activité</button>
            <button type="reset" class="btn btn-danger">Annuler</button>
        </form>
    </div>


    <footer class="bg-success text-white text-center py-4 mt-4">
        <p>&copy; 2024 Association VVA, Tous droits réservés</p>
    </footer>

    <!-- Intégration de Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php
    if (isset($_POST['submit'])) {
        include('../bdd.php');

        
        $requete1 = "SELECT MAX(`CODEANIM`) FROM `animation`";
        $result1 = mysqli_query($conn, $requete1);
        $co = mysqli_fetch_array($result1) ;
        $codeanim = $co[0] +1;

        $codetypeanim = $_POST['codetypeanim'];
        $nom = $_POST["nom"];
        $datevalidite = $_POST["datevalidite"];
        $duree = $_POST["duree"];
        $limiteage = $_POST["limiteage"];
        $tarif = $_POST["tarif"];
        $nbreplaces = $_POST["nbreplaces"];
        $description = $_POST["description"];
        $commentaire = $_POST["commentaire"];
        $difficulte = $_POST["difficulte"];

        $requete = "INSERT INTO activite (CODEANIM,CODETYPEANIM,NOMANIM, DATEVALIDITEANIM, DUREEANIM, LIMITEAGE, TARIFANIM, NBREPLACEANIM, DESCRIPTANIM, COMMENTANIM, DIFFICULTEANIM) 
                    VALUES ('$codeanim','$codetypeanim','$nom', '$datevalidite', '$duree', '$limiteage', '$tarif', '$nbreplaces', '$description', '$commentaire', '$difficulte')";
        $result = mysqli_query($conn, $requete);

        if ($result) {
            echo "<h1 class='text-center text-success'>Activité ajoutée</h1>";
            header("Refresh:2; url=listeactivite.php");
        } else {
            echo "<p class='text-danger text-center'>Une erreur est survenue lors de l'ajout : " . mysqli_error($conn) . "</p>";
        }

        // Fermer la connexion à la base de données
        mysqli_close($conn);
    }
    ?>
</body>
</html>