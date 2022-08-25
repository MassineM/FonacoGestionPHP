<?php
include 'header.php';

$sql = "select * from stock";
$result = mysqli_query($conn, $sql) or die("bad query");
$recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';

if (isset($_GET['subb'])) {
    $c = $_GET['recherche'];
    $fonaco = "SELECT * FROM `stock` WHERE designation like '%$c%' OR qte like '%$c%' OR `date` like '%$c%' ";
    $result = mysqli_query($conn, $fonaco);
}
?>

<div class="table-wrapper container">
    <form method="GET" action="">
        Rechercher dans la table : <input type="text" name="recherche">
        <input type="SUBMIT" value="Entrer" name="subb" class="rechercher">
    </form>
    <div class="btnscont">
    <a href="addstock.php">
        <button class="minibtn">Ajouter</button></a>
</div>
    <table class="fl-table">
        <tr>
            <th>Designation</th>
            <th>Quantité</th>
            <th>Date</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['designation']; ?> </td>
                <td><?php echo $row['qte']; ?> </td>
                <td><?php echo $row['date']; ?> </td>
                <td><a href="editStock.php?ID=<?php echo $row['id_stock']; ?>">Modifier</a></td>
                <td><a href="delstock.php?ID=<?php echo $row['id_stock']; ?>" onclick="return confirm('Êtes-vous sur de vouloir supprimer cet élément?')">Supprimer</a></td>
            </tr>
        <?php }; ?>
    </table>
    </body>

    </html>