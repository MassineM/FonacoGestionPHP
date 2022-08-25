<?php
include 'header.php';

$idcli = $_GET['ID'];
$reqcli = mysqli_query($conn, "SELECT * FROM clients where id_client =" . $idcli) or die("bad query");

if (isset($_POST['submit'])) {
  $client =     $_POST['nom'];
  $portable =     $_POST['portable'];
  $email =   $_POST['email'];
  $max = $_POST['max'];
  $adresse = $_POST['adresse'];
  $sql = "UPDATE clients SET nom='$client', telephone='$portable', email='$email', montantmax='$max', adresse='$adresse' WHERE id_client='$idcli'";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Client modifié avec succès')</script>";
    header("location: listeclients.php");
  } else {
    echo "<script>alert('Erreur')</script>";
    echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>

<div class="container">
  <div class="title">Modifier client</div>
  <div class="content">
    <form method="post" action="">
      <?php while ($row = mysqli_fetch_assoc($reqcli)) { ?>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nom</span>
            <input type="text" name="nom" value="<?php echo $row['nom']; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">N° téléphone</span>
            <input type="text" name="portable" value="<?php echo $row['telephone']; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" value="<?php echo $row['email']; ?>">
          </div>
          <div class="input-box">
            <span class="details">Montant max</span>
            <input type="number" name="max" value="<?php echo $row['montantmax']; ?>">
          </div>
          <div class="input-box">
            <span class="details">Adresse</span>
            <input type="text" name="adresse" value="<?php echo $row['adresse']; ?>">
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Entrer" name="submit">
        </div>
      <?php }; ?>
    </form>
  </div>
</div>
</body>

</html>