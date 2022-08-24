<?php
include 'header.php';

if (isset($_POST['submit'])) {
  $id_agent =  $_SESSION['id'];
  $agent =        $_SESSION['username'];
  $date =         date("Y-m-d H:i:s");
  $fournisseur =     $_POST['nom'];
  $portable =     $_POST['portable'];
  $email =   $_POST['email'];
  $sql = "SELECT * FROM fournisseur WHERE tel='$portable'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0)
    echo "<script>alert('" . $fournisseur . " existe déjà')</script>";
  else {
    $sql = "INSERT INTO fournisseurs (nom_fournisseur, tel, email)
                            VALUES ('$fournisseur', '$portable', '$email')";
    if (mysqli_query($conn, $sql)) {

      echo "<script>alert('Nouveau fournisseur créé avec succès')</script>";
      header("location: listefournisseurs.php");
    } else {
      echo "<script>alert('Erreur')</script>";
      echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
  }
  mysqli_close($conn);
}
?>

<div class="container">
  <div class="title">Nouveau fournisseur</div>
  <div class="content">
    <form method="post" action="">
      <div class="user-details">
        <div class="input-box">
          <span class="details">Nom</span>
          <input type="text" name="nom" placeholder="fournisseur..." required>
        </div>
        <div class="input-box">
          <span class="details">N° téléphone</span>
          <input type="text" name="portable" placeholder="n° téléphone..." required>
        </div>
        <div class="input-box">
          <span class="details">Email</span>
          <input type="email" name="email" placeholder="email...">
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