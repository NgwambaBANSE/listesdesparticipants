<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apprenant";

try {
  $conn = new PDO("mysql:host=$servername;dbname=apprenant", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $sql = "CREATE TABLE employe (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(30) NOT NULL,
  prenom VARCHAR(30) NOT NULL,
  date_de_naissance date,
  ville VARCHAR(30) NOT NULL,
  formation VARCHAR(30) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Table employe created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>