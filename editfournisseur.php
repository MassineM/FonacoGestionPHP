<?php
include 'header.php';

$idfournisseur = $_GET['ID'];
$reqfournisseur = mysqli_query($conn, "SELECT * FROM fournisseurs where id_fournisseur =" . $idfournisseur) or die("bad query");

if (isset($_POST['submit'])) {
  $fournisseur =     $_POST['nom'];
  $portable =     $_POST['portable'];
  $email =   $_POST['email'];
    $sql = "UPDATE fournisseurs SET nom_fournisseur='$fournisseur', tel='$portable', email='$email' WHERE id_fournisseur='$idfournisseur'";
    if (mysqli_query($conn, $sql)) {

      echo "<script>alert('Fournisseur modifié avec succès')</script>";
      header("location: listefournisseurs.php");
    } else {
      echo "<script>alert('Erreur')</script>";
      echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
  }
?>

<div class="container">
  <div class="title">Modifier fournisseur</div>
  <div class="content">
    <form method="post" action="">
      <?php while ($row = mysqli_fetch_assoc($reqfournisseur)) { ?>
      <div class="user-details">
        <div class="input-box">
          <span class="details">Nom</span>
          <input type="text" name="nom" value="<?php echo $row['nom_fournisseur']; ?>" required>
        </div>
        <div class="input-box">
          <span class="details">N° téléphone</span>
          <input type="text" name="portable" value="<?php echo $row['tel']; ?>" required>
        </div>
        <div class="input-box">
          <span class="details">Email</span>
          <input type="email" name="email" value="<?php echo $row['email']; ?>" >
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