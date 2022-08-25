<?php 
include 'header.php';

$id = $_GET['ID'];
$sql = "DELETE FROM fournisseurs WHERE id_fournisseur = '$id'";
$result = mysqli_query($conn,$sql);
header("Location: listefournisseurs.php");
