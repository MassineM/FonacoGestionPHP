<?php
include 'header.php';

$sql = "SELECT * FROM  commandes_fournisseur JOIN fournisseurs ON commandes_fournisseur.id_fournisseur=fournisseurs.id_fournisseur";
$result = mysqli_query($conn, $sql) or die("bad query");
$recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';
if (isset($_GET['subb'])) {
    $c = $_GET['recherche'];
    $fonaco = "SELECT * FROM commandes_fournisseur JOIN fournisseurs ON commandes_fournisseur.id_fournisseur=fournisseurs.id_fournisseur WHERE nom_fournisseur like '%$c%' OR designation like '%$c%' OR prix_unitaire like '%$c%' OR qte like '%$c%' OR prix_total like '%$c%' OR `date` like '%$c%' ";
    $result = mysqli_query($conn, $fonaco);
}
?>

<div class="table-wrapper container">
    <form method="GET" action="">
        Rechercher dans la table : <input type="text" name="recherche">
        <input type="submit" value="Entrer" name="subb" class="rechercher">
    </form>
    <a href="addcomfournisseur.php">
        <button>Ajouter</button></a>
    <table class="fl-table">
        <tr>
            <th>Fournisseur</th>
            <th>Designation</th>
            <th>Qte</th>
            <th>Prix unitaire</th>
            <th>Total</th>
            <th>Reglement</th>
            <th>Date</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['nom_fournisseur']; ?> </td>
                <td><?php echo $row['designation']; ?> </td>
                <td><?php echo $row['qte']; ?> </td>
                <td><?php echo $row['prix_unitaire']; ?> </td>
                <td><?php echo $row['prix_total']; ?> </td>
                <td><?php echo $row['reglement']; ?> </td>
                <td><?php echo $row['date_commande']; ?> </td>
                <td><a href="editcomfournisseur.php?ID=<?php echo $row['id_com_fournisseur']; ?>">Modifier</a></td>
                <td><a href="delcomfournisseur.php?ID=<?php echo $row['id_com_fournisseur']; ?>" onclick="return confirm('Êtes-vous sur de vouloir supprimer cette commande?')">Supprimer</a></td>
            </tr>
        <?php }; ?>
    </table>
</div>
</body>

</html>