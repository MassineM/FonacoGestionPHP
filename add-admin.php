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
        $login =$_POST['login'];
        $password = $_POST['password'];
      
        $password2 =$_POST['password2'];
        
        echo'bonjour';
     
        
    
    $sql = "SELECT * FROM admins WHERE login='$login'";
	$result = mysqli_query($conn, $sql);
  
           if ($result->num_rows > 0) {
               echo "<script>alert('" . $login . " deja existe')</script>";
           }

            else{
                $sql = "INSERT INTO admins(login,password,statut) VALUES('$login','$password','admin')";
                if (mysqli_query($conn, $sql)) {

                    echo "<script>alert('Nouveau client créé avec succès')</script>";
                }         
                else {
                    echo "<script>alert('Nccès')</script>";
              echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    

    
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
    <div class="title">Nouveau admin</div>
    <div class="content">
      <form method="post" action="">
        <div class="user-details">
          
          
          
		
		
			
          
			
			
			<div class="input-box">
            <span class="details">Login</span>
            <input type="text"  name="login" placeholder="login .." required>
          </div> 
			
        
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text"  name="password" placeholder="password .." required>
          </div> 
          <div class="input-box">
            <span class="details">confirm your pasword</span>
            <input type="text"  name="password2" placeholder="password .." required>
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