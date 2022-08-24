<?php
include 'header.php';

$numdevis = $_GET['numdevis'];
$sql = "SELECT * FROM commandes WHERE id_devis=" . $numdevis;
$result = mysqli_query($conn, $sql) or die("bad query");
$reqDevis = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM devis JOIN clients ON devis.id_client=clients.id_client WHERE id_devis=" . $numdevis));
?>

<div class="table-wrapper container">
    <a href="listedevis.php">
        <button>Retour</button></a>
    <a href="<?php echo 'addcommande.php?numdevis=' . $_GET['numdevis'] ?>">
        <button>Ajouter</button></a>
    <a href="<?php echo 'pdf.php?ID=' . $_GET['numdevis'] ?>">
        <button>Print PDF</button></a>
    <table class="fl-table">
        <tr>
            <td>Devis n° <?php echo $reqDevis['id_devis'] . '</td><td>' . $reqDevis['nom'] . '</td><td>' . $reqDevis['date_devis'] . '</td><td>' . $reqDevis['reglement'] . '</td>'; ?>
        </tr>
        <tr>
            <th>Designation</th>
            <th>Qte</th>
            <th>Prix unitaire</th>
            <th>Total</th>
            <th></th>
            <th></th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['designation']; ?> </td>
                <td><?php echo $row['quantite']; ?> </td>
                <td><?php echo $row['prix_unitaire']; ?> </td>
                <td><?php echo $row['total']; ?> </td>
                <td><a href="editcommande.php?ID=<?php echo $row['id_commande']; ?>">Modifier</a></td>
                <td><a href="delcommande.php?idcom=<?php echo $row['id_commande']; ?>&numdevis=<?php echo $reqDevis['id_devis'] ?>" onclick="return confirm('Êtes-vous sur de vouloir supprimer cette commande?')">Supprimer</a></td>
            </tr>
        <?php }; ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Total HT: <?php echo $reqDevis['total_ht']; ?></td>
        </tr>
    </table>
</div>
</body>

</html>