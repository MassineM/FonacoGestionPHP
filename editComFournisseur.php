<?php
include 'header.php';

$test = $_GET['ID'];
$sqltest = "SELECT * FROM commandes_fournisseur JOIN fournisseurs ON commandes_fournisseur.id_fournisseur=fournisseurs.id_fournisseur WHERE id_com_fournisseur =" . $test;
$resulttest = mysqli_query($conn, $sqltest) or die("bad query");
$row = mysqli_fetch_assoc($resulttest);

if (isset($_POST['submit'])) {
    $fournisseur = $_POST['fournisseur'];
    $designation = $_POST['designation'];
    $qte = $_POST['qte'];
    $prixuni = $_POST['prixuni'];
    $total = $qte * $prixuni;
    $date = $_POST['date'];
    $reglement = $_POST['paiement'];
    $sql = "UPDATE commandes_fournisseur set id_fournisseur='" . $fournisseur . "', designation='" . $designation . "', qte='" . $qte . "', prix_unitaire='" . $prixuni . "', prix_total='" . $total . "', paye='" . $reglement . "', date_commande='" . $date . "' WHERE id_com_fournisseur=" . $test;
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Commande modifiée avec succès')</script>";
        header("Location: listecomfournisseurs.php");
    } else {
        echo "<script>alert('Erreur')</script>";
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<div class="container">
    <div class="title">Modifier commande</div>
    <div class="content">
        <form method="post" action="">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">nom du fournisseur*</span>
                        <select id="fournisseur" name="fournisseur" required>
                            <option value="<?php echo $row['id_fournisseur']; ?>"><?php echo $row['nom_fournisseur']; ?></option>
                            <?php
                            $sql = "SELECT * FROM fournisseurs";
                            $result = mysqli_query($conn, $sql);
                            while ($ligne = mysqli_fetch_assoc($result))
                                echo "<option value=" . $ligne['id_fournisseur'] . ">" . $ligne['nom_fournisseur'] . "</option>";
                            ?>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Designation</span>
                        <input type="text" name="designation" value="<?php echo $row['designation']; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Quantité</span>
                        <input type="number" name="qte" value="<?php echo $row['qte']; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Prix unitaire</span>
                        <input type="number" step="0.01" name="prixuni" value="<?php echo $row['prix_unitaire']; ?>">
                    </div>
                    <div class="input-box">
                        <span class="details">Date</span>
                        <input type="date" name="date" value="<?php echo $row['date_commande']; ?>" required>
                    </div>
        <div class="input-box">
          <span class="details">Paiement</span>
          <input type="checkbox" name="paiement" value="1" <?php if ($row['paye']) echo 'checked'; ?>>
        </div>
                </div>
                <div class="button">
                    <input type="submit" value="Entrer" name="submit">
                </div>
        </form>
    </div>
</div>
</body>

</html>