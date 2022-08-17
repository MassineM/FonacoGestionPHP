<?php 
include 'header.php';

$iddevis = $_GET['ID'];
$sql = "DELETE FROM devis WHERE id_devis = '$iddevis'";
$result = mysqli_query($conn,$sql);
header("Location: listedevis.php");
