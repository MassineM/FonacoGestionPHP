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
$sqltest = "select * from commandes where id_commande =" . $test;
$resulttest = mysqli_query($conn, $sqltest) or die("bad query");

if (isset($_POST['submit'])) {
    // $id_agent =  $_SESSION['id'];

    $client = $_POST['client'];

    $designation = $_POST['designation'];
    $qte = $_POST['qte'];
    $prixuni = $_POST['prixuni'];
    $total = $qte * $prixuni;
    $date = $_POST['date'];
    $reglement = $_POST['reglement'];




    $sql = "UPDATE commandes set nom_client='".$client."', designation='".$designation."', quantite='".$qte."', prix_unitaire='".$prixuni."', total='".$total."', reglement='".$reglement."' WHERE id_commande='".$test."'";
    if (mysqli_query($conn, $sql)) {

        echo "<script>alert('Commande modifiée avec succès')</script>";
        header("Location: listedescommandes.php");
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
                        <span class="details">nom du client*</span>
                        <select id="Civilite" name="client" required>
                            <option  value="<?php echo $row['nom_client']; ?>"><?php echo $row['nom_client']; ?></option>
                            <?php
                            $sql = "select * from clients";
                            $result = mysqli_query($conn, $sql);
                            while ($ligne = mysqli_fetch_assoc($result)) {
                                echo "<option value=" . $ligne['nom'] . ">" . $ligne['nom'] . "</option>";
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
                        <input type="number" name="qte" value="<?php echo $row['quantite']; ?>" required>
                    </div>

                    <div class="input-box">
                        <span class="details">prix unitaire</span>
                        <input type="number" step="0.01" name="prixuni" value="<?php echo $row['prix_unitaire']; ?>">
                    </div>
                    <div class="input-box">
                        <span class="details">Date</span>
                        <input type="date" name="date" value="<?php echo $row['date_commande']; ?>" required>
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