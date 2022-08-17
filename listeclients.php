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
        <input type="SUBMIT" value="Entrer" name="subb">
    </form>
    <a href="/fonacogestion/FonacoGestionPHP/addclient.php">
        <button>Ajouter</button></a>
    <table class="fl-table">
        <tr>
            <th>Client</th>
            <th>Telephone</th>
            <th>Email</th>
            <th>Montat max</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['nom']; ?> </td>
                <td><?php echo $row['telephone']; ?> </td>
                <td><?php echo $row['email']; ?> </td>
                <td><?php echo $row['montantmax']; ?> </td>
                <td><?php echo $row['adresse']; ?> </td>
                <td><a href="/fonacogestion/FonacoGestionPHP/delclient.php?ID=<?php echo $row['id_client']; ?>" onclick="return confirm('Êtes-vous sur de vouloir supprimer ce client?')">Supprimer</a></td>
            </tr>
        <?php }; ?>
    </table>
    </body>

    </html>