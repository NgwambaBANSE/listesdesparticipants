<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="formStyle.css">
</head>

<body>
    <?php

    // Inclure le fichier de connexion PDO
    include_once "connexion.php";
    // On récupère l'id dans le lien
    $id = $_GET['id'];
    // Requête pour afficher les infos d'un participant
    $sql = "SELECT * FROM employe WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier que le bouton "Modifier" a été cliqué
    if (isset($_POST['button'])) {
        // Extraction des informations envoyées dans des variables par la méthode POST
        extract($_POST);
        // Vérifier que tous les champs ont été remplis
        if (isset($nom) && isset($prenom) && isset($date_de_naissance) && isset($ville) && isset($formation)) {
            // Requête de modification
            $sql = "UPDATE employe SET nom = :nom, prenom = :prenom, date_de_naissance = :date_de_naissance, ville = :ville, formation = :formation WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':date_de_naissance', $date_de_naissance);
            $stmt->bindParam(':ville', $ville);
            $stmt->bindParam(':formation', $formation);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                // Si la requête a été effectuée avec succès, on fait une redirection
                header("Location: verifier.php");
                exit(); // Terminer le script pour éviter toute exécution supplémentaire
            } else {
                // Si non
                $message = "Apprenant non modifié";
            }
        } else {
            // Si non
            $message = "Veuillez remplir tous les champs !";
        }
    }
    ?>
    <div class="form">
        <a href="verifier.php" class="back_btn"><img src="images/back.png">Retour</a>
        <h2>Modifier un apprenant : <?= $row['nom'] ?></h2>
        <p class="erreur_message">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom" value="<?= $row['nom'] ?>">
            <label>Prénom</label>
            <input type="text" name="prenom" value="<?= $row['prenom'] ?>">
            <label>Date de naissance</label>
            <input type="date" name="date_de_naissance" value="<?= $row['date_de_naissance'] ?>">
            <label>Ville d'origine</label>
            <input type="text" name="ville" value="<?= $row['ville'] ?>">
            <label>Formation de base</label>
            <input type="text" name="formation" value="<?= $row['formation'] ?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>

</html>
