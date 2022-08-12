<?php


include 'cnfig.php';
include 'functions.php';


session_start();


error_reporting(0);

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

$idcomm=$_GET['ID'];
$reqcomm = mysqli_query($conn, "select * from commandes where id_commande =" . $idcomm) or die("bad query");
$devis=mysqli_fetch_assoc(mysqli_query($conn, "select id_devis from commandes where id_commande =" . $idcomm));

if (isset($_POST['submit'])) {
    $designation = $_POST['designation'];
    $qte = $_POST['qte'];
    $prixuni = $_POST['prixuni'];
    $total = $qte * $prixuni;

    $sql = "UPDATE commandes set designation='".$designation."', quantite='".$qte."', prix_unitaire='".$prixuni."', total='".$total."' WHERE id_commande='".$idcomm."'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Commande modifiée avec succès')</script>";
    } else {
        echo "<script>alert('Erreur')</script>";
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
    updateTotalDevis($conn,$devis['id_devis']);
    header("Location: listecommandes.php?numdevis=".$devis['id_devis']);
}
?>



<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style/style-trf.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<body>
    <header>
        <a href="#" class="logo">FONACO</a>
        <nav class="navigation">

            <?php echo "<a >Welcome " . $_SESSION['username'] . "</a>"; ?>
            <a href="welcome.php">Accueil</a>



        </nav>
    </header>


    <div class="container">
        <div class="title">Modifier commande</div>
        <div class="content">
            <form method="post" action="">
                <?php while ($row = mysqli_fetch_assoc($reqcomm)) {
?>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">designation</span>
                        <input type="text" name="designation" value="<?php echo $row['designation']; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">qte*</span>
                        <input type="number" name="qte" value="<?php echo $row['quantite']; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">prix unitaire</span>
                        <input type="number" step="0.1" name="prixuni" value="<?php echo $row['prix_unitaire']; ?>">
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Valider" name="submit">

                </div>
                <?php
                                            };
                                                ?>
            </form>
        </div>
    </div>



</body>

</html>