<?php

include 'cnfig.php';


session_start();


error_reporting(0);

session_start();


if ($_SESSION['statut'] != "admin") {
  header("location: index.php");
} else {
}






?>





<!DOCTYPE html>
<html>
	<head>
		
		<link rel="stylesheet" href="style/welcome-style.css" >
	
	
	</head>
	
	
	<body>

<header>
   <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500&display=swap" rel="stylesheet">
</header>

<?php echo "<h1 >Welcome " . $_SESSION['username'] . "</h1>";?>
<p>Concentrez toutes vos pensées sur le travail en cours. ...</p>
<div class="frame">
	<a class="custom-btn btn-6" href="add-admin.php">Nouveau admin</a><br>
  <a class="custom-btn btn-6" href="newm.php">Nouveau client</a>
  <a class="custom-btn btn-6" href="newcom.php">Nouvelle commande</a>
	<br>
  <a class="custom-btn btn-6" href="listedescommandes.php">liste des commandes</a>
	<a class="custom-btn btn-6" href="listeclient.php">liste des client</a>
	<br>
	<a class="custom-btn btn-6" href="nvcommandefournisseur.php">Nouveau commande fournisseur</a>
	
	<a class="custom-btn btn-6" href="newFournisseur.php">nouveau fournisseur</a>
	<br>
  <a class="custom-btn btn-6" href="listfournisseur.php">liste des fornisseur</a>
	<a class="custom-btn btn-6" href="commandefournisseur.php">Commande fournisseur</a>
	<br>
	<a class="custom-btn btn-6" href="stock.php"><span>stock</span></a><br>
	
  <a class="custom-btn btn-6" href="logout.php"><span>Logout</span></a>
  
  
  
  	
 
</div>

	</body>
	
	</html>