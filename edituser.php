<?php
include 'header.php';

if ($_SESSION['statut'] != "administrateur")
  header("location: dashboard.php");

$id = $_GET['ID'];
$req = mysqli_query($conn, "SELECT * FROM admins where id_admin =" . $id) or die("bad query");

if (isset($_POST['submit'])) {
  $login = $_POST['login'];
  $statut = $_POST['role'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $sql = "UPDATE admins SET login='$login', password='$password', statut='$statut' WHERE id_admin='$id'";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Utilisateur modifié avec succès')</script>";
    header("location: listeusers.php");
  } else {
    echo "<script>alert('Erreur')</script>";
    echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>

<div class="container">
  <div class="title">Modifier l'utilisateur</div>
  <div class="content">
    <form method="post" action="">
      <?php while ($row = mysqli_fetch_assoc($req)) { ?>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Utilisateur</span>
            <input type="text" name="login" value="<?php echo $row['login']; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Rôle</span>
            <select id="" name="role" required>
              <option value="<?php echo $row['statut']; ?>"><?php echo $row['statut']; ?></option>
              <option value="utilisateur">Utilisateur</option>
              <option value="comptable">Comptable</option>
              <option value="administrateur">Administrateur</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Mot de passe</span>
            <input type="password" name="password" value="<?php echo $row['password']; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Confirmer le mot de passe</span>
            <input type="password" name="password2" placeholder="mot de passe..." required>
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