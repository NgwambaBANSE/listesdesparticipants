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

    // Récupérer la recherche
    $recherche = isset($_POST['search']) ? $_POST['search'] : '';

    // La requête SQL avec paramètres préparés pour éviter les injections SQL
    $sql = "SELECT * FROM employe WHERE nom LIKE :recherche OR prenom LIKE :recherche OR date_de_naissance LIKE :recherche OR ville LIKE :recherche OR formation LIKE :recherche LIMIT 10";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':recherche', '%' . $recherche . '%');
    $stmt->execute();

    // Affichage du résultat
    while($row = mysqli_fetch_array($sql)) {
        ?>
        <tr>
            <td><?=$row['nom']?></td>
            <td><?=$row['prenom']?></td>
            <td><?=$row['date_de_naissance']?></td>
            <td><?=$row['ville']?></td>
            <td><?=$row['formation_de_base']?></td>
        </tr>
    <?php
    }
    ?>
</table>
</body>
</html>