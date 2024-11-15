<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="utilisateur.css">
    <!-- Lien vers Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin</title>
    <link rel="shortcut icon" href="image/VVA.png" />
</head>
<body class="bg-light">
    <header class="bg-success text-white text-center py-3">
        <h1>Compte Admin</h1>
        <nav>
            <ul class="nav justify-content-center">
                <li class="nav-item"><a class="nav-link text-white" href="index.html">Accueil</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Activité</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="utilisateur.php">Utilisateurs</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="../index.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="container mt-4">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>USER</th>
                    <th>MDP</th>
                    <th>NOM COMPTE</th>
                    <th>PRENOM COMPTE</th>
                    <th>DATE INSCRIPTION</th>
                    <th>DATE FERMETURE</th>
                    <th>TYPE COMPTE</th>
                    <th>ADRESSE E-MAIL</th>
                    <th>TEL COMPTE</th>
                    <th><a href="ajoutercompte.php" class="btn btn-primary">➕</a></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Inclure le fichier de connexion à la base de données
                include("../bdd.php");
                
                // Exécutez la requête SQL pour récupérer toutes les colonnes de la table "compte"
                $query = "SELECT `USER`, `MDP`, `NOMCOMPTE`, `PRENOMCOMPTE`, `DATEINSCRIP`, `DATEFERME`, `TYPEPROFIL`, `DATEDEBSEJOUR`, `DATEFINSEJOUR`, `DATENAISCOMPTE`, `ADRMAILCOMPTE`, `NOTELCOMPTE` FROM `compte` WHERE 1";
                $result = mysqli_query($conn, $query);
                
                // Afficher les données dans le tableau
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . (isset($row['USER']) ? $row['USER'] : '') . "</td>";
                    echo "<td>" . (isset($row['MDP']) ? $row['MDP'] : '') . "</td>";
                    echo "<td>" . (isset($row['NOMCOMPTE']) ? $row['NOMCOMPTE'] : '') . "</td>";
                    echo "<td>" . (isset($row['PRENOMCOMPTE']) ? $row['PRENOMCOMPTE'] : '') . "</td>";
                    echo "<td>" . (isset($row['DATEINSCRIP']) ? $row['DATEINSCRIP'] : '') . "</td>";
                    echo "<td>" . (isset($row['DATEFERME']) ? $row['DATEFERME'] : '') . "</td>";
                    echo "<td>" . (isset($row['TYPEPROFIL']) ? $row['TYPEPROFIL'] : '') . "</td>";
                    echo "<td>" . (isset($row['ADRMAILCOMPTE']) ? $row['ADRMAILCOMPTE'] : '') . "</td>";
                    echo "<td>" . (isset($row['NOTELCOMPTE']) ? $row['NOTELCOMPTE'] : '') . "</td>";
                    
                    // Ajouter un lien de suppression pour chaque ligne
                    echo "<td><a href='modifier.php?NOMCOMPTE=" . urlencode($row['NOMCOMPTE']) . "' class='btn btn-warning'>🔧</a> 
                    <a href='supprime.php?NOMCOMPTE=" . urlencode($row['NOMCOMPTE']) . "' class='btn btn-danger'>❌</a></td>";
                    echo "</tr>";
                }
                
                // Fermer la connexion à la base de données
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

    <footer class="text-center mt-4">
        <p>&copy; 2024 Association de vacances</p>
    </footer>

    <!-- Lien vers jQuery et Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
