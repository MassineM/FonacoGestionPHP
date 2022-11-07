<?php
include 'header.php';

if ($_SESSION['statut'] != "administrateur")
    header("location: dashboard.php");

$id = $_GET['ID'];
$sql = "DELETE FROM admins WHERE id_admin = '$id'";
$result = mysqli_query($conn, $sql);
header("Location: listeusers.php");
