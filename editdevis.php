<?php
include 'header.php';

$idDevis = $_GET['ID'];
$reqdevis = mysqli_query($conn, "select * from devis join clients on devis.id_client=clients.id_client where id_devis =" . $idDevis) or die("bad query");
$row = mysqli_fetch_assoc($reqdevis);
if (isset($_POST['submit'])) {
  $date = $_POST['date'];
  $idCli = $_POST['client'];
  $validation = $_POST['validation'];
  $sql = "UPDATE devis SET id_client='$idCli', date_devis='$date', valide='$validation' WHERE id_devis='$idDevis'";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Devis modifié avec succès')</script>";
    header("Location: listedevis.php");
  } else {
    echo "<script>alert('Erreur')</script>";
    echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>

<div class="container">
  <div class="title">Modifier devis</div>
  <div class="content">
    <form method="post" action="">
      <div class="user-details">
        <div class="input-box">
          <span class="details">Nom du client</span>
          <select id="" name="client" required>
            <option value="<?php echo $row['id_client']; ?>"><?php echo $row['nom']; ?></option>
            <?php
            $reqclients = "select * from clients";
            $result = mysqli_query($conn, $reqclients);
            while ($listclients = mysqli_fetch_assoc($result)) {
              echo "<option value=" . $listclients['id_client'] . ">" . $listclients['nom'] . "</option>";
            }
            ?>
          </select>
        </div>
        <div class="input-box">
          <span class="details">Date</span>
          <input type="date" name="date" value="<?php echo $row['date_devis']; ?>" required>
        </div>
        <div class="input-box">
          <span class="details">Valider</span>
          <input type="checkbox" name="validation" value="1" <?php if ($row['valide']) echo 'checked'; ?>>
        </div>
      </div>
      <div class="button">
        <input type="submit" value="Valider" name="submit">
      </div>
    </form>
  </div>
</div>
</body>

</html>