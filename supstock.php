<?php 

include 'cnfig.php';

session_start();

error_reporting(0);



	$id = $_GET['ID'];
    $sql = "DELETE FROM stock WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    header("Location: stock.php");
    
	



?>