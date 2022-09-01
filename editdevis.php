<?php
include 'header.php';

$idDevis = $_GET['ID'];
$reqdevis = mysqli_query($conn, "select * from devis join clients on devis.id_client=clients.id_client where id_devis =" . $idDevis) or die("bad query");
$row = mysqli_fetch_assoc($reqdevis);
if (isset($_POST['submit'])) {
  $date = $_POST['date'];
  $idCli = $_POST['client'];
  $validation = $_POST['validation'];
  $paiement = $_POST['paiement'];
  $newID = $_POST['idDevis'];
  $idVerif = mysqli_num_rows(mysqli_query($conn, "SELECT id_devis FROM devis WHERE id_devis='$newID'"));
  if(!$idVerif || $newID==$idDevis){
  $sql = "UPDATE devis SET id_devis='$newID', id_client='$idCli', date_devis='$date', valide='$validation', paye='$paiement' WHERE id_devis='$idDevis'";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Devis modifié avec succès')</script>";
    header("Location: listecommandes.php?numdevis=" . $newID);
  } else {
    echo "<script>alert('Erreur')</script>";
    echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
  }}
  else echo "<script>alert('Devis avec le même numéro existe déjà')</script>";
}
?>

<div class="container">
  <div class="title">Modifier devis</div>
  <div class="content">
    <form method="post" action="">
      <div class="user-details">
        <div class="input-box">
        <div class="input-box">
          <span class="details">Numéro de devis</span>
          <input type="number" name="idDevis" value="<?php echo $idDevis; ?>" required>
        </div>
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
        <div class="input-box">
          <span class="details">Paiement</span>
          <input type="checkbox" name="paiement" value="1" <?php if ($row['paye']) echo 'checked'; ?>>
        </div>
      </div>
      <div class="button">
        <input type="submit" value="Entrer" name="submit">
      </div>
    </form>
  </div>
</div>
</body>

</html>