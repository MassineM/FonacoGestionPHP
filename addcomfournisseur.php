<?php
include 'header.php';

if (isset($_POST['submit'])) {
  $idfournisseur = $_POST['fournisseur'];
  $designation = $_POST['designation'];
  $qte = $_POST['qte'];
  $prix_unitaire = $_POST['prix_unitaire'];
  $prix_total = $qte * $prix_unitaire;
  $date = $_POST['date'];
  $reglement = $_POST['reglement'];
  $sql = "INSERT INTO commandes_fournisseur (id_fournisseur,designation,qte,prix_unitaire,prix_total,date_commande,reglement) 
                VALUES('$idfournisseur','$designation','$qte','$prix_unitaire','$prix_total','$date','$reglement')";
  if (mysqli_query($conn, $sql)) {

    echo "<script>alert('Nouvelle commande créée avec succès')</script>";
    header("location: listecomfournisseurs.php");
  } else {
    echo "<script>alert('Erreur')</script>";
    echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>

<div class="container">
  <div class="title">Nouvelle commande fournisseur</div>
  <div class="content">
    <form method="post" action="">
      <div class="user-details">
        <div class="input-box">
          <span class="details">Nom fournisseur</span>
          <select name="fournisseur" required>
            <option value="">---nom du fournisseur---</option>
            <?php
            $sql = "select * from fournisseurs";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value=" . $row['id_fournisseur'] . ">" . $row['nom_fournisseur'] . "</option>";
            }
            ?>
          </select>
        </div>
        <div class="input-box">
          <span class="details">Designation</span>
          <input type="text" name="designation" placeholder="designation..." required>
        </div>
        <div class="input-box">
          <span class="details">Quantité</span>
          <input type="number" name="qte" placeholder="quantité..." required>
        </div>
        <div class="input-box">
          <span class="details">Prix unitaire</span>
          <input type="number" name="prix_unitaire" placeholder="prix unitaire..." required>
        </div>
        <div class="input-box">
          <span class="details">Date</span>
          <input type="date" name="date" placeholder="date..." required>
        </div>
        <div class="input-box">
          <span class="details">Paiement</span>
          <select id="reglement" name="reglement" required>
            <option value="">---paiement---</option>
            <option value="impayee">impayée</option>
            <option value="payee">payée</option>
            <option value="en cours">en cours</option>
          </select>
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