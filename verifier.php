<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des apprenants D-CLIC</title>
    <link rel="stylesheet" href="formStyle.css">
    <link rel="stylesheet" href="styleCss/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <section class="background arrierPlan">
    <h4>LISTE DES APPRENANTS</h4>

        <div class="container">
            <a href="ajoute.php" class="Btn_add"><img src="images/plus.png">Ajouter</a>
            <form action="rechercher.php" method="POST">
                <input class="rech" type="text" name="search">
                <button type="submit">Rechercher</button>
            </form>

            <table>
                <tr class="liste" id="items">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Ville d'origine</th>
                    <th>Formation de base</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                <?php
                // Inclure le fichier de connexion PDO
                include_once "connexion.php";
                // Requête pour afficher la liste des participants
                $sql = "SELECT * FROM employe";
                $resultat = $conn->query($sql);
                if ($resultat->rowCount() == 0) {
                    echo "Il n'y a pas encore d'apprenant ajouté !";
                } else {
                    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
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
                                <?= $row["ville"] ?>
                            </td>
                            <td>
                                <?= $row['formation'] ?>
                            </td>
                            <td><a href="modifier.php?id=<?= $row['id'] ?>"><img src="images/pen.png"></a></td>
                            <td><a href="supprimer.php?id=<?= $row['id'] ?>"><img src="images/trash.png"></a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <script src="styleCss/styleApp.js"></script>

</body>

</html>