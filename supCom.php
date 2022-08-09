
<?php 

include 'cnfig.php';

session_start();

error_reporting(0);



	$id = $_GET['ID'];
    $sql = "DELETE FROM commandes WHERE id_commande = '$id'";
    $result = mysqli_query($conn,$sql);
    header("Location: listedescommandes.php");
    
	



?>