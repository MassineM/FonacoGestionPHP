<?php
include 'header.php';

if(isset($_GET['ord']) && isset($_GET['desc'])){
    $order=$_GET['ord'];
    $desc=$_GET['desc'];
    if($desc) $sql = "SELECT * FROM stock ORDER BY ".$order." DESC";
    else $sql = "SELECT * FROM stock ORDER BY ".$order;
} else {
    $sql = "SELECT * FROM stock ORDER BY `date` DESC";
}
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
            <th>Designation<a href="stock.php?ord=designation&desc=0">⬆</a><a href="stock.php?ord=designation&desc=1">⬇</a></th>
            <th>Quantité<a href="stock.php?ord=qte&desc=0">⬆</a><a href="stock.php?ord=qte&desc=1">⬇</a></th>
            <th>Date<a href="stock.php?ord=date&desc=0">⬆</a><a href="stock.php?ord=date&desc=1">⬇</a></th>
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