<?php
include 'cnfig.php';

error_reporting(0);

session_start();

if ($_SESSION['statut'] != "admin") {
    header("location: index.php");
} else {
}

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

$sql = "SELECT * FROM devis JOIN clients ON devis.id_client=clients.id_client";
$result = mysqli_query($conn, $sql) or die("bad query");
$recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';

if (isset($_GET['subb'])) {
    $c = $_GET['recherche'];
    $fonaco = "SELECT * FROM `devis` JOIN clients ON devis.id_client=clients.id_client WHERE clients.nom like '%$c%' OR `date_devis` like '%$c%'";
    $result = mysqli_query($conn, $fonaco);
}

if (isset($_POST['printpdf'])) {
    $checkCli = false;
    $selected = $_POST['selectCom'];
    if (empty($selected)) echo '<script>alert("Veuillez choisir au moins une commande à imprimer.")</script>';
    else {
        for ($i = 0; $i < count($selected) - 1; $i++) {
            $checkCliReq1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nom_client FROM commandes WHERE id_commande=" . $selected[$i]));
            $checkCliReq2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nom_client FROM commandes WHERE id_commande=" . $selected[$i + 1]));
            if ($checkCliReq1 != $checkCliReq2) {
                $checkCli = true;
                break;
            }
        }
        if ($checkCli) echo '<script>alert("Clients différents, veuillez choisir les commandes d\'un même client.")</script>';
        else {
            $_SESSION['selected'] = $selected;
            echo "<script>
        window.open('pdf.php', '_blank')
    </script>";
        }
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
        <form method="GET" action="">
            Rechercher un mot : <input type="text" name="recherche">
            <input type="SUBMIT" value="Search" name="subb">
        </form>
        <a href="/fonacogestion/FonacoGestionPHP/newdevis.php">
            <button>Ajouter</button></a>
        <table class="fl-table">
            <form action="" method="post">
                <tr>
                    <th>Numero</th>
                    <th>Client</th>
                    <th>Date</th>
                    <th>Total HT</th>
                    <th>Validation</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) {

                ?>
                    <tr>
                        <td><?php echo $row['id_devis']; ?> </td>
                        <td><?php echo $row['nom']; ?> </td>
                        <td><?php echo $row['date_devis']; ?> </td>
                        <td><?php echo $row['total_ht']; ?> </td>
                        <td><?php if($row['valide']) echo 'Validé'; else echo 'En attente';?> </td>
                        <td><a href="/fonacogestion/FonacoGestionPHP/listecommandes.php?numdevis=<?php echo $row['id_devis']; ?>">Consulter</a></td>
                        <td><a href="/fonacogestion/FonacoGestionPHP/editdevis.php?ID=<?php echo $row['id_devis']; ?>">Modifier</a></td>
                        <td><button class="confirm" onclick="delCommande('<?php echo $row['id_commande']; ?>')">Supprimer</button></td>




                    </tr>
                <?php
                };
                ?>
            </form>
        </table>
    </div>

</body>

</html>