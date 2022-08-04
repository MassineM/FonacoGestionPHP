<?php
include 'cnfig.php';

error_reporting(0);

session_start();

if ($_SESSION['statut'] != "admin") {
  header("location: index.php");
} else {
}





if (!$conn) {
      die("Échec de la connexion : " . mysqli_connect_error());
}
$sql = "select * from commandes";
$result = mysqli_query($conn,$sql) or die ("bad query");






?>
    <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style/style-table.css" >
        
</head>
<body >
      <header>
            <a href="#" class="logo">FONACO</a>
            <nav class="navigation">
                
                <?php echo "<a >Welcome " . $_SESSION['username'] . "</a>";?>
                                 

                <a href="welcome.php">Accueil</a>
                
                
                
    
            </nav>
        </header>
    
 
  <div class="table-wrapper" > 
<table class="fl-table" >
        <tr>
			<th>Client</th>
                <th>Designation</th>
			<th>qte</th>
                <th>Prix unitaire</th>
             <th>total</th>
               
                
                
                
               
               
                
                
          
                
                </tr>
   <?php while($row=mysqli_fetch_assoc($result)){
   
                ?>
  <tr>			
	 
                <td><?php echo $row['nom_client']; ?> </td>
      			<td><?php echo $row['designation']; ?> </td>
                <td><?php echo $row['quantite']; ?> </td>
                <td><?php echo $row['prix_unitaire']; ?> </td>
                <td><?php echo $row['total']; ?> </td>
                
                
                
                
                <td><?php echo $row['adresse']; ?> </td>
                
                <td><?php echo $row['portable']; ?> </td>
                
                
              
               <td> <a href="updateadmin.php?edit1=<?php echo $row['id']; ?>"  >Plus</a> </tr> 
                  <?php  
};
?>
</table>
        </div>
   
</body>
</html>
