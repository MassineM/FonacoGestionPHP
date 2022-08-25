<?php
include 'header.php';

if (isset($_POST['submit'])) {
  $date = $_POST['date'];
  $idCli = $_POST['client'];
  $sql = "INSERT INTO devis (id_client, date_devis, total_ht, valide)
					VALUES ('$idCli', '$date', 0, 0)";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Nouveau devis créé avec succès')</script>";
    header("Location: listedevis.php");
  } else {
    echo "<script>alert('Erreur')</script>";
    echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>

<div class="container">
  <div class="title">Nouveau devis</div>
  <div class="content">
    <form method="post" action="">
      <div class="user-details">
        <div class="input-box">
          <span class="details">Nom du client</span>
          <select id="" name="client" required>
            <option value="">---nom du client---</option>
            <?php
            $sql = "select * from clients";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) echo "<option value=" . $row['id_client'] . ">" . $row['nom'] . "</option>";
            ?>
          </select>
        </div>
        <div class="input-box">
          <span class="details">Date</span>
          <input type="date" name="date" placeholder="date..." required>
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