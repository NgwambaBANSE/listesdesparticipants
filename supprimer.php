<?php
// Connexion à la base de données
require_once "connexion.php";

// Récupération de l'id dans le lien
$id = $_GET['id'];

// Requête de suppression avec paramètre préparé pour éviter les injections SQL
$sql = "DELETE FROM employe WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

// Redirection vers la page index.php
header("Location: index.php");
exit();
?>
