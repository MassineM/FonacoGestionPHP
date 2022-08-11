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
     // $id_agent =  $_SESSION['id'];
    
    $client = $_POST['client'];
    
    $designation = $_POST['designation'];
    $qte = $_POST['qte'];
    $prixuni = $_POST['prixuni'];
    $total = $qte * $prixuni;
    $date =$_POST['date'];
    $reglement = $_POST['reglement'];
        
  
   
 
        $sql = "INSERT INTO commandes (nom_client, designation, quantite, prix_unitaire, total, reglement, date_commande)
					VALUES ('$client', '$designation', '$qte', '$prixuni', '$total', '$reglement', '$date')";
        if (mysqli_query($conn, $sql)) {
      
            echo "<script>alert('Nouvelle commande créé avec succès')</script>";
            header("location: listedescommandes.php");
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
    <div class="title">Nouvelle commande</div>
    <div class="content">
      <form method="post" action="">
        <div class="user-details">
          <div class="input-box">
            <span class="details">nom du client*</span>
             <select id="Civilite" name="client" required>
		<option value="">---nom du client*---</option>
                 <?php 
                 $sql = "select * from clients";
                 $result = mysqli_query($conn,$sql);
                 while($row=mysqli_fetch_assoc($result)){
                     echo "<option value=" .$row['nom']. ">".$row['nom']."</option>";
                 }
                 ?>
     
    </select>
          </div>
          <div class="input-box">
            <span class="details">designation</span>
                <input type="text"  name="designation" placeholder="designation* .." required>
          </div>
          
		
		
			
          
			
			<div class="input-box">
            <span class="details">qte*</span>
            <input type="number"  name="qte" placeholder="qte* .." required>
          </div>
			
			<div class="input-box">
            <span class="details">prix unitaire</span>
            <input type="number" step="0.01"  name="prixuni" placeholder="prix unitaire .." >
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