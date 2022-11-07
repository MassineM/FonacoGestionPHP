<?php
include 'header.php';

if ($_SESSION['statut'] != "administrateur")
    header("location: dashboard.php");

if (isset($_GET['ord']) && isset($_GET['desc'])) {
    $order = $_GET['ord'];
    $desc = $_GET['desc'];
    if ($desc) $sql = "SELECT * FROM admins ORDER BY " . $order . " DESC";
    else $sql = "SELECT * FROM admins ORDER BY " . $order;
} else {
    $sql = "SELECT * FROM admins ORDER BY id_admin DESC";
}
$result = mysqli_query($conn, $sql) or die("bad query");
$recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';
if (isset($_GET['subb'])) {
    $c = $_GET['recherche'];
    $fonaco = "SELECT * FROM `admins` WHERE `login` like '%$c%' OR `statut` like '%$c%'";
    $result = mysqli_query($conn, $fonaco);
}
?>

<div class="table-wrapper container">
    <form method="GET" action="">
        Rechercher dans la table : <input type="text" name="recherche">
        <input type="SUBMIT" value="Entrer" name="subb" class="rechercher">
    </form>
    <div class="btnscont">
        <a href="adduser.php">
            <button class="minibtn">Ajouter</button></a>
    </div>
    <table class="fl-table">
        <tr>
            <th>Utilisateur<a href="listeusers.php?ord=login&desc=0">⬆</a><a href="listeusers.php?ord=login&desc=1">⬇</a></th>
            <th>Mot de passe</th>
            <th>Rôle<a href="listeusers.php?ord=statut&desc=0">⬆</a><a href="listeusers.php?ord=statut&desc=1">⬇</a></th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['login']; ?></td>
                <td>****</td>
                <td><?php echo $row['statut']; ?> </td>
                <td><a href="edituser.php?ID=<?php echo $row['id_admin']; ?>">Modifier</a></td>
                <td><a href="deluser.php?ID=<?php echo $row['id_admin']; ?>" onclick="return confirm('Êtes-vous sur de vouloir supprimer cet utilisateur?')">Supprimer</a></td>
            </tr>
        <?php }; ?>
    </table>
    </body>

    </html>