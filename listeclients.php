<?php
include 'header.php';

$sql = "select * from clients";
$result = mysqli_query($conn, $sql) or die("bad query");
$recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';
if (isset($_GET['subb'])) {
    $c = $_GET['recherche'];
    $fonaco = "SELECT * FROM `clients` WHERE nom like '%$c%' OR `telephone` like '%$c%' OR `email` like '%$c%' OR `adresse` like '%$c%'";
    $result = mysqli_query($conn, $fonaco);
}
?>

<div class="table-wrapper container">
    <form method="GET" action="">
        Rechercher dans la table : <input type="text" name="recherche">
        <input type="SUBMIT" value="Entrer" name="subb" class="rechercher">
    </form>
    <div class="btnscont">
    <a href="addclient.php">
        <button class="minibtn">Ajouter</button></a>
</div>
    <table class="fl-table">
        <tr>
            <th>Client</th>
            <th>Telephone</th>
            <th>Email</th>
            <th>Adresse</th>
            <th>Montat max</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['nom']; ?> </td>
                <td><?php echo $row['telephone']; ?> </td>
                <td><?php echo $row['email']; ?> </td>
                <td><?php echo $row['adresse']; ?> </td>
                <td><?php echo $row['montantmax']; ?> </td>
                <td><a href="editclient.php?ID=<?php echo $row['id_client']; ?>">Modifier</a></td>
                <td><a href="delclient.php?ID=<?php echo $row['id_client']; ?>" onclick="return confirm('Êtes-vous sur de vouloir supprimer ce client?')">Supprimer</a></td>
            </tr>
        <?php }; ?>
    </table>
    </body>

    </html>