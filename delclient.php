<?php
include 'header.php';

$id = $_GET['ID'];
$sql = "DELETE FROM clients WHERE id_client = '$id'";
$result = mysqli_query($conn, $sql);
header("Location: listeclients.php");
