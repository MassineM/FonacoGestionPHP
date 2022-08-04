
<?php 

include 'cnfig.php';

session_start();

error_reporting(0);




	$id = $_GET['edit1'];
    $sql = "DELETE FROM clients WHERE id_client = '$id'";
    $result = mysqli_query($conn,$sql);
    header("Location: listeclient.php");
    
    
	



?>