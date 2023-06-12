<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
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

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>Salut, <span>administrateur</span></h3>
      <h1>Bienvenu <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>Vous etes sur la page des administrateur</p>
      <a href="../index.php" class="btn">Se connecter</a>
      <a href="../ajoute.php" class="btn">Ajouter un apprenant</a>
      <a href="register_form.php" class="btn">Ajouter un administrateur</a>
   </div>

</div>

</body>
</html>