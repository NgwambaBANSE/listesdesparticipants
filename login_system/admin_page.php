<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
   header('location:register_for.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="../formStyle.css">


</head>

<body>

   <div class="container">
      <div class="content">
         <h3>Salut,<span>administrateur</span></h3>
         <h1>Bienvenu <span>
               <?php echo $_SESSION['admin_name'] ?>
            </span></h1>
         <p>Vous etes sur la page des administrateur</p>
         <a href="../index.php" class="btn">Se connecter</a>
         <a href="logout.php" class="btn">Se deconnecter</a>
         <a href="../verifier.php" class="btn">Afficher les apprenants</a>
         <a href="register_form.php" class="btn">Ajouter un administrateur</a>
         <!-- les administrateurs -->
         <h3>la liste des administrateurs</h3>
         <table>
            <tr class="liste" id="items">
               <th>Nom</th>
               <th>email</th>
               <th>Modifier</th>
               <th>Supprimer</th>
            </tr>
            <?php
            // Inclure le fichier de connexion PDO
            include_once "../connexion.php";
            // Requête pour afficher la liste des participants
            $sql = "SELECT * FROM user_form";
            $resultat = $conn->query($sql);
            if ($resultat->rowCount() == 0) {
               echo "Il n'y a pas encore d'apprenant ajouté !";
            } else {
               while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <tr>
                     <td>
                        <?= $row['name'] ?>
                     </td>
                     <td>
                        <?= $row['email'] ?>
                     </td>
                     <td><a href="modifier.php?id=<?= $row['id'] ?>"><img src="../images/pen.png"></a></td>
                     <td><a href="supprimer.php?id=<?= $row['id'] ?>"><img src="../images/trash.png"></a></td>
                  </tr>
                  <?php
               }
            }
            ?>
         </table>
            <!-- les ad fin -->
      </div>
</body>

</html>