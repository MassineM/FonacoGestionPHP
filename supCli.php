
<?php 

include 'cnfig.php';

session_start();

error_reporting(0);



	$id = $_GET['ID'];
    $sql = "DELETE FROM clients WHERE id_client = '$id'";
    $result = mysqli_query($conn,$sql);
    header("Location: listeclient.php");
    
	



?>