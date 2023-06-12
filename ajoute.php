<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="formStyle.css">
</head>
<body>

    <section class="bg">
    <?php
    //vérifier que le button ajouter a bien été cliqué
    if(isset($_POST['button'])){
        //extraction des informations envoyées dans des variables par la méthode post
        extract($_POST);
        //Vérifier que tous les champs ont été remplis
        if(isset($nom) && isset($prenom) && isset($date_de_naissance) && isset($ville) && $formation){
            try {
                //connexion à la base de données avec PDO
                $dsn = "mysql:host=localhost;dbname=apprenant";
                $username = "root";
                $password = "";
                $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                $conn = new PDO($dsn, $username, $password, $options);

                //requête d'insertion avec des paramètres préparés pour éviter les failles SQL
                $sql = "INSERT INTO employe (nom, prenom, date_de_naissance, ville, formation) VALUES (:nom, :prenom, :date_de_naissance, :ville, :formation)";
                $stmt = $conn->prepare($sql);
                // $stmt = $conn->prepare("INSERT INTO employe VALUES(NULL, :nom, :prenom, :date_de_naissance, :ville_origine, :formation_de_base)");
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':date_de_naissance', $date_de_naissance);
                $stmt->bindParam(':ville', $ville);
                $stmt->bindParam(':formation', $formation);

                //exécution de la requête
                $stmt->execute();

                //redirection vers la page index.php
                header("Location: verifier.php");
                exit();
            } catch(PDOException $e) {
                $message = "Erreur : " . $e->getMessage();
            }
        } else {
            $message = "Veuillez remplir tous les champs !";
        }
    }
    ?>
    <div class="form">
        <a href="verifier.php" class="back_btn"><img src="images/back.png">Retour</a>
        <h2>Ajouter un apprenant</h2>
        <p class="erreur_message">
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
        </p>
        <form action="ajoute.php" method="POST">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>Prénom</label>
            <input type="text" name="prenom">
            <label>Date de naissance</label>
            <input type="date" name="date_de_naissance">
            <label>Ville d'origine</label>
            <input type="text" name="ville">
            <label>Formation de base</label>
            <input type="text" name="formation">
            <input class="rech" type="submit" value="Ajouter" name="button">
        </form>
    </div>
    </section>
</body>
</html>
