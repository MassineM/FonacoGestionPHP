<?php
include 'header.php';

if (isset($_POST['submit'])) {
    $designation = $_POST['designation'];
    $qte = $_POST['qte'];
    $date = $_POST['date'];
    $sql = "INSERT INTO stock (designation, qte, `date`)
                VALUES ('$designation', '$qte', '$date')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Element ajouté au stock')</script>";
        header("Location: stock.php");
    } else {
        echo "<script>alert('Erreur')</script>";
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<div class="container">
    <div class="title">Ajouter au stock</div>
    <div class="content">
        <form method="post" action="">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Designation</span>
                    <input type="text" name="designation" placeholder="designation..." required>
                </div>
                <div class="input-box">
                    <span class="details">Quantité</span>
                    <input type="number" name="qte" placeholder="quantité..." required>
                </div>
                <div class="input-box">
                    <span class="details">Date</span>
                    <input type="date" name="date" placeholder="date..." required>
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