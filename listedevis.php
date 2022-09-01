<?php
include 'header.php';

if(isset($_GET['ord']) && isset($_GET['desc'])){
    $order=$_GET['ord'];
    $desc=$_GET['desc'];
    if($desc) $sql = "SELECT * FROM devis JOIN clients ON devis.id_client=clients.id_client ORDER BY ".$order." DESC";
    else $sql = "SELECT * FROM devis JOIN clients ON devis.id_client=clients.id_client ORDER BY ".$order;
} else {
    $sql = "SELECT * FROM devis JOIN clients ON devis.id_client=clients.id_client ORDER BY date_devis DESC";
}
$result = mysqli_query($conn, $sql) or die("bad query");
$recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';
if (isset($_GET['subb'])) {
    $c = $_GET['recherche'];
    $fonaco = "SELECT * FROM `devis` JOIN clients ON devis.id_client=clients.id_client WHERE clients.nom like '%$c%' OR `date_devis` like '%$c%'";
    $result = mysqli_query($conn, $fonaco);
}
?>

<div class="table-wrapper container">
    <form method="GET" action="">
        Rechercher dans la table : <input type="text" name="recherche">
        <input type="SUBMIT" value="Entrer" name="subb" class="rechercher">
    </form>
    <div class="btnscont">
    <a href="adddevis.php">
        <button class="minibtn">Ajouter</button></a>
</div>
    <table class="fl-table">
        <form action="" method="post">
            <tr>
                <th>Numero<a href="listedevis.php?ord=id_devis&desc=0">⬆</a><a href="listedevis.php?ord=id_devis&desc=1">⬇</a></th>
                <th>Client<a href="listedevis.php?ord=nom&desc=0">⬆</a><a href="listedevis.php?ord=nom&desc=1">⬇</a></th>
                <th>Date<a href="listedevis.php?ord=date_devis&desc=0">⬆</a><a href="listedevis.php?ord=date_devis&desc=1">⬇</a></th>
                <th>Total HT<a href="listedevis.php?ord=total_ht&desc=0">⬆</a><a href="listedevis.php?ord=total_ht&desc=1">⬇</a></th>
                <th>Validation<a href="listedevis.php?ord=valide&desc=0">⬆</a><a href="listedevis.php?ord=valide&desc=1">⬇</a></th>
                <th>Reglement<a href="listedevis.php?ord=paye&desc=0">⬆</a><a href="listedevis.php?ord=paye&desc=1">⬇</a></th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id_devis']; ?> </td>
                    <td><?php echo $row['nom']; ?> </td>
                    <td><?php echo $row['date_devis']; ?> </td>
                    <td><?php echo $row['total_ht']; ?> </td>
                    <td><?php if ($row['valide']) echo 'Validé';
                        else echo 'En attente'; ?> </td>
                        <td><?php if ($row['paye']) echo 'Payé';
                            else echo 'En attente'; ?> </td>
                    <td><a href="listecommandes.php?numdevis=<?php echo $row['id_devis']; ?>">Consulter</a></td>
                    <td><a href="editdevis.php?ID=<?php echo $row['id_devis']; ?>">Modifier</a></td>
                    <td><a href="deldevis.php?ID=<?php echo $row['id_devis']; ?>" onclick="return confirm('Êtes-vous sur de vouloir supprimer ce devis?')">Supprimer</a></td>
                </tr>
            <?php }; ?>
        </form>
    </table>
</div>
</body>

</html>