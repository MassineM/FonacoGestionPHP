<?php 
include 'header.php';

$id = $_GET['ID'];
$sql = "DELETE FROM fournisseur WHERE id_fournisseur = '$id'";
$result = mysqli_query($conn,$sql);
header("Location: listefournisseurs.php");
