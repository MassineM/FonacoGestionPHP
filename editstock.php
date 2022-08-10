<?php


include 'cnfig.php';


session_start();


error_reporting(0);

session_start();


if ($_SESSION['statut'] != "admin") {
    header("location: index.php");
} else {
}








if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

$test=$_GET['ID'];
$sqltest = "select * from stock where id =" . $test;
$resulttest = mysqli_query($conn, $sqltest) or die("bad query");

if (isset($_POST['submit'])) {
    $designation = $_POST['designation'];
    $qte = $_POST['qte'];
    $date = $_POST['date'];




    $sql = "UPDATE stock set designation='".$designation."', qte='".$qte."', `date`='".$date."' WHERE id='".$test."'";
    if (mysqli_query($conn, $sql)) {

        echo "<script>console.log('Stock modifié avec succès')</script>";
        header("Location: stock.php");
    } else {
        echo "<script>alert('Nccès')</script>";
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }

}






?>



<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style/style-trf.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<body>
    <header>
        <a href="#" class="logo">FONACO</a>
        <nav class="navigation">

            <?php echo "<a >Welcome " . $_SESSION['username'] . "</a>"; ?>
            <a href="welcome.php">Accueil</a>



        </nav>
    </header>


    <div class="container">
        <div class="title">Modifier stock</div>
        <div class="content">
            <form method="post" action="">
                <?php while ($row = mysqli_fetch_assoc($resulttest)) {
?>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Designation</span>
                        <input type="text" name="designation" value="<?php echo $row['designation']; ?>" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Qte*</span>
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
                <?php
                                            };
                                                ?>
            </form>
        </div>
    </div>



</body>

</html>