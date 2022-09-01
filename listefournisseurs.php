<?php
include 'header.php';

if(isset($_GET['ord']) && isset($_GET['desc'])){
    $order=$_GET['ord'];
    $desc=$_GET['desc'];
    if($desc) $sql = "SELECT * FROM fournisseurs ORDER BY ".$order." DESC";
    else $sql = "SELECT * FROM fournisseurs ORDER BY ".$order;
} else {
    $sql = "SELECT * FROM fournisseurs ORDER BY id_fournisseur DESC";
}
$result = mysqli_query($conn, $sql) or die("bad query");
$recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';
if (isset($_GET['subb'])) {
    $c = $_GET['recherche'];
    $fonaco = "SELECT * FROM fournisseurs WHERE nom_fournisseur like '%$c%' OR tel like '%$c%' OR email like '%$c%'";
    $result = mysqli_query($conn, $fonaco);
}
?>

<div class="table-wrapper container">
    <form method="GET" action="">
        Rechercher dans la table : <input type="text" name="recherche">
        <input type="SUBMIT" value="Entrer" name="subb" class="rechercher">
    </form><div class="btnscont">
    <a href="addfournisseur.php">
        <button class="minibtn">Ajouter</button></a></div>
    <table class="fl-table">
        <tr>
            <th>Fournisseur<a href="listefournisseurs.php?ord=nom_fournisseur&desc=0">⬆</a><a href="listefournisseurs.php?ord=nom_fournisseur&desc=1">⬇</a></th>
            <th>Téléphone<a href="listefournisseurs.php?ord=tel&desc=0">⬆</a><a href="listefournisseurs.php?ord=tel&desc=1">⬇</a></th>
            <th>Email<a href="listefournisseurs.php?ord=email&desc=0">⬆</a><a href="listefournisseurs.php?ord=email&desc=1">⬇</a></th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['nom_fournisseur']; ?> </td>
                <td><?php echo $row['tel']; ?> </td>
                <td><?php echo $row['email']; ?> </td>
                <td><a href="editfournisseur.php?ID=<?php echo $row['id_fournisseur']; ?>">Modifier</a></td>
                <td>
                    <a href="delfournisseur.php?ID=<?php echo $row['id_fournisseur']; ?>" onclick="return confirm('Êtes-vous sur de vouloir supprimer ce fournisseur?')">Supprimer</a>
                </td>
            </tr>
        <?php }; ?>
    </table>
</div>

</body>

</html>