<?php
include 'header.php';

$numdevis = $_GET['numdevis'];
$sql = "SELECT * FROM commandes WHERE id_devis=" . $numdevis;
$result = mysqli_query($conn, $sql) or die("bad query");
$reqDevis = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM devis JOIN clients ON devis.id_client=clients.id_client WHERE id_devis=" . $numdevis));
?>

<div class="table-wrapper container">
    <div class="btnscont">
    <a href="listedevis.php">
        <button class="minibtn">Retour</button></a>
    <a href="<?php if (!$reqDevis['valide']) echo 'addcommande.php?numdevis=' . $numdevis; else echo '#' ?>">
        <button class="minibtn" <?php if ($reqDevis['valide']) echo 'disabled'?>>Ajouter</button></a>
    <a href="<?php if ($reqDevis['valide']) echo 'pdf.php?ID=' . $numdevis; else echo '#' ?>">
        <button class="minibtn" <?php if (!$reqDevis['valide']) echo 'disabled'?>>Print PDF</button></a>
    </div>
    <div class="btnscont">
        <p>Devis n° <?php echo $numdevis . '</p><p>' . $reqDevis['nom'] . '</p><p>' . $reqDevis['date_devis'] . '</p><p>' . $reqDevis['reglement'] . '</p><p>' ;
        if ($reqDevis['valide']) echo 'Validé';
                        else echo 'Non validé'; ?></p>
                        <a href="editdevis.php?ID=<?php echo $numdevis; ?>">Modifier</a>
    </div>
    <table class="fl-table">
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
                <td><a href="<?php if (!$reqDevis['valide']) echo 'editcommande.php?ID='.$row['id_commande']; else echo '#' ?>" <?php if ($reqDevis['valide']) echo 'class="disabledA"'?>>Modifier</a></td>
                <td><a href="<?php if (!$reqDevis['valide']) echo 'delcommande.php?idcom='.$row['id_commande'].'&numdevis='.$numdevis; else echo '#' ?>" <?php if ($reqDevis['valide']) echo 'class="disabledA"'; else echo 'onclick="return confirm(\'Êtes-vous sur de vouloir supprimer cette commande?\')"'?>>Supprimer</a></td>
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