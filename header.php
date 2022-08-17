<?php
include 'cnfig.php';
include 'functions.php';
session_start();
error_reporting(0);

if ($_SESSION['statut'] != "admin")
  header("location: index.php");
if (!$conn)
  die("Échec de la connexion : " . mysqli_connect_error());
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style/style-trf.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <header>
    <a href="#" class="logo">FONACO</a>
    <nav class="navigation">
      <?php echo "<a >Welcome " . $_SESSION['username'] . "</a>"; ?>
      <a href="welcome.php">Accueil</a>
    </nav>
  </header>