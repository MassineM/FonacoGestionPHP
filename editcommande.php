<?php
include 'header.php';

$idcomm = $_GET['ID'];
$reqcomm = mysqli_query($conn, "select * from commandes where id_commande =" . $idcomm) or die("bad query");
$devis = mysqli_fetch_assoc(mysqli_query($conn, "select id_devis from commandes where id_commande =" . $idcomm));

if (isset($_POST['submit'])) {
    $designation = $_POST['designation'];
    $qte = $_POST['qte'];
    $prixuni = $_POST['prixuni'];
    $total = $qte * $prixuni;
    $sql = "UPDATE commandes set designation='" . $designation . "', quantite='" . $qte . "', prix_unitaire='" . $prixuni . "', total='" . $total . "' WHERE id_commande='" . $idcomm . "'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Commande modifiée avec succès')</script>";
    } else {
        echo "<script>alert('Erreur')</script>";
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
    updateTotalDevis($conn, $devis['id_devis']);
    header("Location: listecommandes.php?numdevis=" . $devis['id_devis']);
}
?>
<div class="container">
    <div class="title">Modifier commande</div>
    <div class="content">
        <form method="post" action="">
            <?php while ($row = mysqli_fetch_assoc($reqcomm)) { ?>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Designation</span>
                        <input type="text" name="designation" value="<?php echo $row['designation']; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Quantité</span>
                        <input type="number" name="qte" value="<?php echo $row['quantite']; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Prix unitaire</span>
                        <input type="number" step="0.1" name="prixuni" value="<?php echo $row['prix_unitaire']; ?>">
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Entrer" name="submit">
                </div>
            <?php }; ?>
        </form>
    </div>
</div>
</body>

</html>