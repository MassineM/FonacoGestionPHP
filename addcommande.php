<?php
include 'header.php';

$devis = $_GET['numdevis'];
$reqDevis = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM devis JOIN clients ON devis.id_client=clients.id_client WHERE id_devis='$devis'"));
if (isset($_POST['submit'])) {
  $designation = $_POST['designation'];
  $qte = $_POST['qte'];
  $prixuni = $_POST['prixuni'];
  $total = $qte * $prixuni;
  $sql = "INSERT INTO commandes (id_devis, designation, quantite, prix_unitaire, total)
					VALUES ('$devis','$designation', '$qte', '$prixuni', '$total')";
  if (mysqli_query($conn, $sql)) {
    updateTotalDevis($conn, $devis);
    header("Location: listecommandes.php?numdevis=" . $devis);
  } else {
    echo "<script>alert('Erreur')</script>";
    echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>
<div class="container">
  <div class="title">Nouvelle commande</div>
  <div class="content">
    <form method="post" action="">
      <div class="user-details">
        <div class="input-box">
          <span class="details">designation</span>
          <input type="text" name="designation" placeholder="designation..." required>
        </div>
        <div class="input-box">
          <span class="details">Quantité</span>
          <input type="number" name="qte" placeholder="quantité..." required>
        </div>
        <div class="input-box">
          <span class="details">prix unitaire</span>
          <input type="number" step="0.1" name="prixuni" placeholder="prix unitaire...">
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