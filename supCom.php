
<?php 

include 'cnfig.php';
include 'functions.php';

session_start();
error_reporting(0);

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

$idcom = $_GET['idcom'];
$iddevis = $_GET['numdevis'];
$sql = "DELETE FROM commandes WHERE id_commande = '$idcom'";
$result = mysqli_query($conn,$sql);
updateTotalDevis($conn,$iddevis);
header("Location: listecommandes.php?numdevis=".$iddevis);
?>