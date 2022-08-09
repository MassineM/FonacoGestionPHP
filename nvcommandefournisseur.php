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
        $nom_fournisseur =$_POST['nom_fournisseur'];
        $designation = $_POST['designation'];
      
        $qte =$_POST['qte'];
        $prix_unitaire =$_POST['prix_unitaire'];
        $prix_total =$qte*$prix_unitaire;
        $date =$_POST['date'];
        $reglement = $_POST['reglement'];

        
        echo'bonjour';
     
        
    
                $sql = "INSERT INTO commande_fournisseur (nom_fournisseur,designation,qte,prix_unitaire,prix_total,date,reglement) 
                VALUES('$nom_fournisseur','$designation','$qte','$prix_unitaire','$prix_total','$date','$reglement')";
                if (mysqli_query($conn, $sql)) {

                    echo "<script>alert('Nouvelle commande créée avec succès')</script>";
                }         
                else {
                    echo "<script>alert('Erreur')</script>";
              echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
            
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
    <div class="title">Nouveau commande fournisseur</div>
    <div class="content">
      <form method="post" action="">
        <div class="user-details">
          
          
          
		
		
			
          
			
			
			<div class="input-box">
            <span class="details">Nom fournisseur</span>
            <input type="text"  name="nom_fournisseur" placeholder="nom fournisseur .." required>
          </div> 
			
        
          <div class="input-box">
            <span class="details">Designation</span>
            <input type="text"  name="designation" placeholder="designation .." required>
          </div> 
          <div class="input-box">
            <span class="details">Quantité</span>
            <input type="number"  name="qte" placeholder="quantité .." required>
          </div> 
          <div class="input-box">
            <span class="details">Prix unitaire</span>
            <input type="number"  name="prix_unitaire" placeholder="Prix unitaire .." required>
          </div> 
          <div class="input-box">
            <span class="details">Date</span>
            <input type="date"  name="date" placeholder="Date .." required>
          </div> 
          <div class="input-box">
            <span class="details">paiment</span>
            <select id="reglement" name="reglement" required>
              <option value="">---paiement*---</option>
              <option value="impayee">impayée</option>
              <option value="payee">payée</option>
              <option value="en cours">en cours</option>
            </select>
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