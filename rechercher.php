<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <table>
        <tr id="items">
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Ville d'origine</th>
            <th>Formation de base</th>
        </tr>
        <?php
        require_once 'connexion.php';

        // récupérer la recherche
        $recherche = isset($_POST['search']) ? $_POST['search'] : '';

        // préparer la requête
        $query = $conn->prepare('SELECT * FROM employe WHERE nom LIKE :recherche OR prenom LIKE :recherche OR date_de_naissance LIKE :recherche OR ville LIKE :recherche OR formation LIKE :recherche LIMIT 10');

        // lier le paramètre de recherche
        $query->bindValue(':recherche', '%' . $recherche . '%');

        // exécuter la requête
        $query->execute();

        // affichage des résultats
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td>
                    <?= $row['nom'] ?>
                </td>
                <td>
                    <?= $row['prenom'] ?>
                </td>
                <td>
                    <?= $row['date_de_naissance'] ?>
                </td>
                <td>
                    <?= $row['ville'] ?>
                </td>
                <td>
                    <?= $row['formation'] ?>
                </td>
            </tr>
            <?php
        }
        ?>

</body>

</html>