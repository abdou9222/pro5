<html>
<body>
<?php
include("../bdd.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['CODEANIM'])) {
    $codeAnim = $_POST['CODEANIM'];

    // Prépare la requête pour éviter les injections SQL
    $requete = $idc->prepare("DELETE FROM activite WHERE CODEANIM = ?");
    $requete->bind_param("s", $codeAnim); // "s" pour une chaîne de caractères

    if ($requete->execute()) {
        if ($requete->affected_rows > 0) {
            echo "<center><h1>Suppression effectuée pour CODEANIM : $codeAnim</h1></center>";
            header("Location: activites.php"); // Redirection vers une page liste d'activités
            exit;
        } else {
            echo "<center><h1>Aucun enregistrement trouvé pour CODEANIM : $codeAnim</h1></center>";
        }
    } else {
        echo "<center><h1>Échec de la suppression</h1></center>";
        echo $requete->error;
    }

    $requete->close();
    $idc->close();
}
?>

<!-- Formulaire de suppression d'activité par CODEANIM -->
<center>
    <h1>Supprimer une Activité</h1>
    <form method="POST" action="">
        <label for="CODEANIM">Code Animation :</label>
        <input type="text" name="CODEANIM" id="CODEANIM" required><br><br>

        <input type="submit" value="Supprimer">
    </form>
</center>

</body>
</html>
