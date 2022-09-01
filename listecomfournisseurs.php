<?php
include 'header.php';

if(isset($_GET['ord']) && isset($_GET['desc'])){
    $order=$_GET['ord'];
    $desc=$_GET['desc'];
    if($desc) $sql = "SELECT * FROM commandes_fournisseur JOIN fournisseurs ON commandes_fournisseur.id_fournisseur=fournisseurs.id_fournisseur ORDER BY ".$order." DESC";
    else $sql = "SELECT * FROM commandes_fournisseur JOIN fournisseurs ON commandes_fournisseur.id_fournisseur=fournisseurs.id_fournisseur ORDER BY ".$order;
} else {
    $sql = "SELECT * FROM commandes_fournisseur JOIN fournisseurs ON commandes_fournisseur.id_fournisseur=fournisseurs.id_fournisseur ORDER BY date_commande DESC";
}
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
    <div class="btnscont">
    <a href="addcomfournisseur.php">
        <button class="minibtn">Ajouter</button></a>
        </div>
    <table class="fl-table">
        <tr>
            <th>Fournisseur<a href="listecomfournisseurs.php?ord=nom_fournisseur&desc=0">⬆</a><a href="listecomfournisseurs.php?ord=nom_fournisseur&desc=1">⬇</a></th>
            <th>Designation<a href="listecomfournisseurs.php?ord=designation&desc=0">⬆</a><a href="listecomfournisseurs.php?ord=designation&desc=1">⬇</a></th>
            <th>Qte<a href="listecomfournisseurs.php?ord=qte&desc=0">⬆</a><a href="listecomfournisseurs.php?ord=qte&desc=1">⬇</a></th>
            <th>Prix unitaire<a href="listecomfournisseurs.php?ord=prix_unitaire&desc=0">⬆</a><a href="listecomfournisseurs.php?ord=prix_unitaire&desc=1">⬇</a></th>
            <th>Total<a href="listecomfournisseurs.php?ord=prix_total&desc=0">⬆</a><a href="listecomfournisseurs.php?ord=prix_total&desc=1">⬇</a></th>
            <th>Reglement<a href="listecomfournisseurs.php?ord=paye&desc=0">⬆</a><a href="listecomfournisseurs.php?ord=paye&desc=1">⬇</a></th>
            <th>Date<a href="listecomfournisseurs.php?ord=date_commande&desc=0">⬆</a><a href="listecomfournisseurs.php?ord=date_commande&desc=1">⬇</a></th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['nom_fournisseur']; ?> </td>
                <td><?php echo $row['designation']; ?> </td>
                <td><?php echo $row['qte']; ?> </td>
                <td><?php echo $row['prix_unitaire']; ?> </td>
                <td><?php echo $row['prix_total']; ?> </td>
                <td><?php if ($row['paye']) echo 'Payé';
                            else echo 'En attente'; ?></td>
                <td><?php echo $row['date_commande']; ?> </td>
                <td><a href="editcomfournisseur.php?ID=<?php echo $row['id_com_fournisseur']; ?>">Modifier</a></td>
                <td><a href="delcomfournisseur.php?ID=<?php echo $row['id_com_fournisseur']; ?>" onclick="return confirm('Êtes-vous sur de vouloir supprimer cette commande?')">Supprimer</a></td>
            </tr>
        <?php }; ?>
    </table>
</div>
</body>

</html>