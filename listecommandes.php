<?php
include 'cnfig.php';

error_reporting(0);

session_start();

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

$numdevis=$_GET['numdevis'];
$sql = "SELECT * FROM commandes WHERE id_devis=".$numdevis;
$result = mysqli_query($conn, $sql) or die("bad query");
$reqDevis=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM devis JOIN clients ON devis.id_client=clients.id_client WHERE id_devis=".$numdevis));

if (isset($_POST['printpdf'])) {
    $checkCli = false;
    $selected = $_POST['selectCom'];
    if (empty($selected)) echo '<script>alert("Veuillez choisir au moins une commande à imprimer.")</script>';
    else {
        
            $_SESSION['selected'] = $selected;
            echo "<script>
        window.open('pdf.php', '_blank')
    </script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style/style-table.css">
    <script language="JavaScript" src="script.js">

    </script>

</head>

<body>
    <header>
        <a href="#" class="logo">FONACO</a>
        <nav class="navigation">

            <?php echo "<a >Welcome " . $_SESSION['username'] . "</a>"; ?>


            <a href="welcome.php">Accueil</a>




        </nav>
    </header>


    <div class="table-wrapper">
        <a href="/fonacogestion/FonacoGestionPHP/listedevis.php"> 
            <button>Retour</button></a>
        <a href="<?php echo '/fonacogestion/FonacoGestionPHP/addcommande.php?numdevis='.$_GET['numdevis']?>"> 
            <button>Ajouter</button></a>
        <table class="fl-table">
            <tr><td>Devis n° <?php echo $reqDevis['id_devis'].'</td><td>'.$reqDevis['nom'].'</td><td>'.$reqDevis['date_devis'].'</td><td>'.$reqDevis['reglement'].'</td>'; ?></tr>
                <tr>
                    <th>Designation</th>
                    <th>Qte</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
                    <th></th><th></th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) {

                ?>
                    <tr>
                        <td><?php echo $row['designation']; ?> </td>
                        <td><?php echo $row['quantite']; ?> </td>
                        <td><?php echo $row['prix_unitaire']; ?> </td>
                        <td><?php echo $row['total']; ?> </td>
                        <td><a href="/fonacogestion/FonacoGestionPHP/editcommande.php?ID=<?php echo $row['id_commande']; ?>">Modifier</a></td>
                        <td><a href="/fonacogestion/FonacoGestionPHP/supCom.php?idcom=<?php echo $row['id_commande']; ?>&numdevis=<?php echo $reqDevis['id_devis']?>">Supprimer</a></td>
                    </tr>
                <?php
                };
                ?>
                <tr><td></td><td></td><td></td><td>Total HT: <?php echo $reqDevis['total_ht']; ?></td></tr>
        </table>
    </div>

</body>

</html>