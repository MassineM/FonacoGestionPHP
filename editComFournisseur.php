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
$sqltest = "select * from commande_fournisseur where id =" . $test;
$resulttest = mysqli_query($conn, $sqltest) or die("bad query");

if (isset($_POST['submit'])) {
    // $id_agent =  $_SESSION['id'];

    $fournisseur = $_POST['fournisseur'];

    $designation = $_POST['designation'];
    $qte = $_POST['qte'];
    $prixuni = $_POST['prixuni'];
    $total = $qte * $prixuni;
    $date = $_POST['date'];
    $reglement = $_POST['reglement'];




    $sql = "UPDATE commande_fournisseur set nom_fournisseur='".$fournisseur."', designation='".$designation."', qte='".$qte."', prix_unitaire='".$prixuni."', prix_total='".$total."', reglement='".$reglement."', `date`='".$date."' WHERE id=".$test;
    if (mysqli_query($conn, $sql)) {

        echo "<script>alert('Commande modifiée avec succès')</script>";
        header("Location: commandefournisseur.php");
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
        <div class="title">Modifier commande</div>
        <div class="content">
            <form method="post" action="">
                <?php while ($row = mysqli_fetch_assoc($resulttest)) {
?>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">nom du fournisseur*</span>
                        <select id="fournisseur" name="fournisseur" required>
                            <option  value="<?php echo $row['nom_fournisseur']; ?>"><?php echo $row['nom_fournisseur']; ?></option>
                            <?php
                            $sql = "select * from fournisseur";
                            $result = mysqli_query($conn, $sql);
                            while ($ligne = mysqli_fetch_assoc($result)) {
                                echo "<option value=" . $ligne['nom_fournisseur'] . ">" . $ligne['nom_fournisseur'] . "</option>";
                            }
                            ?>

                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">designation</span>
                        <input type="text" name="designation" value="<?php echo $row['designation']; ?>" required>
                    </div>






                    <div class="input-box">
                        <span class="details">qte*</span>
                        <input type="number" name="qte" value="<?php echo $row['qte']; ?>" required>
                    </div>

                    <div class="input-box">
                        <span class="details">prix unitaire</span>
                        <input type="number" step="0.01" name="prixuni" value="<?php echo $row['prix_unitaire']; ?>">
                    </div>
                    <div class="input-box">
                        <span class="details">Date</span>
                        <input type="date" name="date" value="<?php echo $row['date']; ?>" required>
                    </div>

                    <div class="input-box">
                        <span class="details">paiment</span>
                        <select id="reglement" name="reglement" required>
                            <option  value="<?php echo $row['reglement']; ?>"><?php echo $row['reglement']; ?></option>
                            <option value="impayee">impayée</option>
                            <option value="payee">payée</option>

                            <option value="en cours">en cours</option>

                        </select>
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