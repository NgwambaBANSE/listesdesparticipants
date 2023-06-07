<?php
// Connexion à la base de données avec PDO
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "apprenant";

    // Création de l'objet PDO
    $conn = new PDO("mysql:host=$servername;dbname=apprenant", $username, $password);

    // Configuration des options PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification de la connexion
    if ($conn) {
        echo "";
    } else {
        echo "Échec de la connexion à la base de données";
    }
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
