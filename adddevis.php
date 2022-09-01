<?php
include 'header.php';

if (isset($_POST['submit'])) {
  $date = $_POST['date'];
  $idCli = $_POST['client'];
  $idDevis = $_POST['idDevis'];
  $idVerif = mysqli_num_rows(mysqli_query($conn, "SELECT id_devis FROM devis WHERE id_devis='$idDevis'"));
  if(!$idVerif){
  $sql = "INSERT INTO devis (id_devis, id_client, date_devis, total_ht, valide, paye)
					VALUES ('$idDevis', '$idCli', '$date', 0, 0, 0)";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Nouveau devis créé avec succès')</script>";
    header("Location: listedevis.php");
  } else {
    echo "<script>alert('Erreur')</script>";
    echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
  }}
  else echo "<script>alert('Devis avec le même numéro existe déjà')</script>";
}

$idreq = "SELECT MAX(id_devis) AS idmax FROM devis";
$idres = mysqli_fetch_assoc(mysqli_query($conn, $idreq));
$idVal = $idres['idmax']+1;
?>

<div class="container">
  <div class="title">Nouveau devis</div>
  <div class="content">
    <form method="post" action="">
      <div class="user-details">
        <div class="input-box">
          <span class="details">Numéro de devis</span>
          <input type="number" name="idDevis" value="<?php echo $idVal; ?>" required>
        </div>
        <div class="input-box">
          <span class="details">Nom du client</span>
          <select id="" name="client" required>
            <option value="">---nom du client---</option>
            <?php
            $sql = "SELECT * FROM clients";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) echo "<option value=" . $row['id_client'] . ">" . $row['nom'] . "</option>";
            ?>
          </select>
        </div>
        <div class="input-box">
          <span class="details">Date</span>
          <input type="date" name="date" value="<?php echo date("Y-m-d"); ?>">
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