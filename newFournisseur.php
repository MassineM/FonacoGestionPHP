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
     $id_agent =  $_SESSION['id'];
        $agent =        $_SESSION['username'];
        $date =         date("Y-m-d H:i:s");
        $fournisseur =     $_POST['nom'];
        $portable =     $_POST['portable'];
     
        $email =   $_POST['email'];
    
    $sql = "SELECT * FROM fournisseur WHERE tel='$portable'";
	$result = mysqli_query($conn, $sql);
  
           if ($result->num_rows > 0) {
               echo "<script>alert('" . $fournisseur . " deja existe')</script>";
           }

            else{
                $sql = "INSERT INTO fournisseur (nom_fournisseur, tel, email)
                            VALUES ('$fournisseur', '$portable', '$email')";
                if (mysqli_query($conn, $sql)) {

                    echo "<script>alert('Nouveau fournisseur créé avec succès')</script>";
                    header("location: listfournisseur.php");
                }         
                else {
                    echo "<script>alert('Nccès')</script>";
              echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    
mysqli_close($conn);
    
}






?>



<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" href="style/style-trf.css" >
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
    <div class="title">Nouveau fournisseur</div>
    <div class="content">
      <form method="post" action="">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nom</span>
                <input type="text"  name="nom" placeholder="fournisseur* .." required>
          </div>
          
		
		
			
          
			
			<div class="input-box">
            <span class="details">N° Portable*</span>
            <input type="text"  name="portable" placeholder="N° Portable* .." required>
          </div>
			
			<div class="input-box">
            <span class="details">Email</span>
            <input type="email"  name="email" placeholder="email .." >
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