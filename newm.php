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
        $client =     $_POST['nom'];
        $portable =     $_POST['portable'];
     
        $email =   $_POST['email'];
        $max = $_POST['max'];
    
    $sql = "SELECT * FROM clients WHERE telephone='$portable'";
	$result = mysqli_query($conn, $sql);
  
           if ($result->num_rows > 0) {
               echo "<script>alert('" . $client . " deja existe')</script>";
           }

            else{
                $sql = "INSERT INTO clients (nom, telephone, email, montantmax)
                            VALUES ('$client', '$portable', '$email', '$max')";
                if (mysqli_query($conn, $sql)) {

                    echo "<script>alert('Nouveau client créé avec succès')</script>";
                    header("location: listeclient.php");
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
    <div class="title">Nouveau clientt</div>
    <div class="content">
      <form method="post" action="">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Civilité*</span>
             <select id="Civilite" name="civilite" required>
		<option value="Civilité">---Civilité*---</option>
      <option value="Mr">Mr</option>
      <option value="Mme">Mme</option>
    </select>
          </div>
          <div class="input-box">
            <span class="details">Nom</span>
                <input type="text"  name="nom" placeholder="Client* .." required>
          </div>
          
		
		
			
          
			
			<div class="input-box">
            <span class="details">N° Portable*</span>
            <input type="text"  name="portable" placeholder="N° Portable* .." required>
          </div>
			
			<div class="input-box">
            <span class="details">Email</span>
            <input type="email"  name="email" placeholder="email .." >
          </div>
			
			
			
			
			<div class="input-box">
            <span class="details">Montant max</span>
            <input type="text"  name="max" placeholder="Montant max .." >
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