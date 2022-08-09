
<?php 

include 'cnfig.php';

session_start();

error_reporting(0);



	$id = $_GET['ID'];
    $sql = "DELETE FROM fournisseur WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    header("Location: listfournisseur.php");
    
	



?>