<?php
include 'header.php';

$idcom = $_GET['idcom'];
$iddevis = $_GET['numdevis'];
$sql = "DELETE FROM commandes WHERE id_commande = '$idcom'";
$result = mysqli_query($conn,$sql);
updateTotalDevis($conn,$iddevis);
header("Location: listecommandes.php?numdevis=".$iddevis);
