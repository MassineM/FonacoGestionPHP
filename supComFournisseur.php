
<?php 

include 'cnfig.php';

session_start();

error_reporting(0);



	$id = $_GET['ID'];
    $sql = "DELETE FROM commande_fournisseur WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    header("Location: commandefournisseur.php");
    
	



?>