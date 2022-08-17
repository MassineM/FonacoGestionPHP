<?php
include 'header.php';

$test = $_GET['ID'];
$sqltest = "select * from stock where id_stock =" . $test;
$resulttest = mysqli_query($conn, $sqltest) or die("bad query");
if (isset($_POST['submit'])) {
    $designation = $_POST['designation'];
    $qte = $_POST['qte'];
    $date = $_POST['date'];
    $sql = "UPDATE stock set designation='" . $designation . "', qte='" . $qte . "', `date`='" . $date . "' WHERE id_stock='" . $test . "'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>console.log('Stock modifié avec succès')</script>";
        header("Location: stock.php");
    } else {
        echo "<script>alert('Nccès')</script>";
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<div class="container">
    <div class="title">Modifier stock</div>
    <div class="content">
        <form method="post" action="">
            <?php while ($row = mysqli_fetch_assoc($resulttest)) { ?>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Designation</span>
                        <input type="text" name="designation" value="<?php echo $row['designation']; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Quantité</span>
                        <input type="number" name="qte" value="<?php echo $row['qte']; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Date</span>
                        <input type="date" name="date" value="<?php echo $row['date']; ?>" required>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Valider" name="submit">
                </div>
            <?php }; ?>
        </form>
    </div>
</div>
</body>

</html>