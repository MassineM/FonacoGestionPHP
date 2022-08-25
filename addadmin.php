<?php
include 'header.php';

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $sql = "SELECT * FROM admins WHERE login='$login'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        echo "<script>alert('" . $login . " existe déjà')</script>";
    } else {
        $sql = "INSERT INTO admins(login,password,statut) VALUES('$login','$password','admin')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Nouvel admin créé avec succès')</script>";
            header("location: welcome.php");
        } else {
            echo "<script>alert('Erreur')</script>";
            echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
<div class="container">
    <div class="title">Nouvel admin</div>
    <div class="content">
        <form method="post" action="">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Identifiant</span>
                    <input type="text" name="login" placeholder="identifiant..." required>
                </div>
                <div class="input-box">
                    <span class="details">Mot de passe</span>
                    <input type="password" name="password" placeholder="mot de passe..." required>
                </div>
                <div class="input-box">
                    <span class="details">Confirmer le mot de passe</span>
                    <input type="password" name="password2" placeholder="mot de passe..." required>
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