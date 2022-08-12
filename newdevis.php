<?php


include 'cnfig.php';


session_start();


error_reporting(0);

if (!$conn) {
  die("Échec de la connexion : " . mysqli_connect_error());
}


if (isset($_POST['submit'])) {
  $date = $_POST['date'];
  $getIdCli = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM clients WHERE nom=" . $_POST['client']));
  $idCli = $client['id_client'];



  $sql = "INSERT INTO devis (id_client, date_devis, total_ht, reglement)
					VALUES ('$idCli', '$date', 0, 0)";
  if (mysqli_query($conn, $sql)) {

    echo "<script>alert('Nouveau devis créé avec succès')</script>";
    header("Location: listedevis.php");
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
    <div class="title">Nouvelle commande</div>
    <div class="content">
      <form method="post" action="">
        <div class="user-details">
          <div class="input-box">
            <span class="details">nom du client*</span>
            <select id="" name="client" required>
              <option value="">---nom du client*---</option>
              <?php
              $sql = "select * from clients";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value=" . $row['nom'] . ">" . $row['nom'] . "</option>";
              }
              ?>

            </select>
          </div>
          <div class="input-box">
            <span class="details">Date</span>
            <input type="date" name="date" placeholder="Date .." required>
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