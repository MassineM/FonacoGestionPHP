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
 

if (isset($_POST['submit']) ) {
    $designation = $_POST['designation'];
    $qte = $_POST['qte'];
    $date =$_POST['date'];
        
  
   
 
        $sql = "INSERT INTO stock (designation, qte, `date`)
					VALUES ('$designation', '$qte', '$date')";
        if (mysqli_query($conn, $sql)) {
      
            echo "<script>console.log('Element ajouté au stock')</script>";
            header("Location: stock.php");
        }         
        else {
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

            <?php echo "<a >Welcome " . $_SESSION['username'] . "</a>";?>
            <a href="welcome.php">Accueil</a>



        </nav>
    </header>


    <div class="container">
        <div class="title">Ajouter au stock</div>
        <div class="content">
            <form method="post" action="">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">designation</span>
                        <input type="text" name="designation" placeholder="designation* .." required>
                    </div>






                    <div class="input-box">
                        <span class="details">qte*</span>
                        <input type="number" name="qte" placeholder="qte* .." required>
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