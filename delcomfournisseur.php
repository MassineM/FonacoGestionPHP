<?php
include 'header.php';

$id = $_GET['ID'];
$sql = "DELETE FROM commandes_fournisseur WHERE id_com_fournisseur = '$id'";
$result = mysqli_query($conn, $sql);
header("Location: listecomfournisseurs.php");
