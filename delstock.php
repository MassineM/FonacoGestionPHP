<?php
include 'header.php';

$id = $_GET['ID'];
$sql = "DELETE FROM stock WHERE id_stock = '$id'";
$result = mysqli_query($conn, $sql);
header("Location: stock.php");
