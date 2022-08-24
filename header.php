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
  <link rel="stylesheet" href="style/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <header>
    <div class="headleft">
      <h1 class="logo">FONACO</h1>
      <p class="welcoming">Welcome <?php echo $_SESSION['username']; ?></p>
    </div>
    <nav class="navigation">
      <a href="welcome.php">Accueil</a>
      <a href="listedevis.php">Devis</a>
      <a href="listeclients.php">Clients</a>
      <a href="listefournisseurs.php">Fournisseurs</a>
      <a href="stock.php">Stock</a>
    </nav>
  </header>