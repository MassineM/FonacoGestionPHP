<?php
include 'header.php';

$sql = "SELECT * FROM devis JOIN clients ON devis.id_client=clients.id_client";
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
    <a href="newdevis.php">
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
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id_devis']; ?> </td>
                    <td><?php echo $row['nom']; ?> </td>
                    <td><?php echo $row['date_devis']; ?> </td>
                    <td><?php echo $row['total_ht']; ?> </td>
                    <td><?php if ($row['valide']) echo 'Validé';
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