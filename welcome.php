<?php
include 'cnfig.php';
session_start();
error_reporting(0);

if ($_SESSION['statut'] != "admin")
	header("location: index.php");
if (!$conn)
	die("Échec de la connexion : " . mysqli_connect_error());
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="style/welcome-style.css">
</head>

<body>
	<header>
		<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500&display=swap" rel="stylesheet">
	</header>
	<?php echo "<h1 >Welcome " . $_SESSION['username'] . "</h1>"; ?>
	<p>Concentrez toutes vos pensées sur le travail en cours. ...</p>
	<div class="frame">
		<a class="custom-btn btn-6" href="listeclients.php"><span>Liste des clients</span></a>
		<a class="custom-btn btn-6" href="listedevis.php"><span>Liste des devis</span></a>
		<br>
		<a class="custom-btn btn-6" href="listefournisseurs.php"><span>Liste des fournisseurs</span></a>
		<a class="custom-btn btn-6" href="listecomfournisseurs.php"><span>Liste commandes fournisseur</span></a>
		<br>
		<a class="custom-btn btn-6" href="stock.php"><span>Stock</span></a>
		<br>
		<a class="custom-btn btn-6" href="addadmin.php"><span>Nouvel admin</span></a>
		<br>
		<a class="custom-btn btn-6" href="logout.php"><span>Logout</span></a>
	</div>
</body>

</html>