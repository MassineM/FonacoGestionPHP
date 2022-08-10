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
$sql = "select * from clients";
$result = mysqli_query($conn,$sql) or die ("bad query");
$recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';

if(isset($_GET['subb'])){
    $c = $_GET['recherche'];
    $fonaco = "SELECT * FROM `clients` WHERE nom like '%$c%' OR `telephone` like '%$c%' OR `email` like '%$c%'";
    $result = mysqli_query($conn,$fonaco);
    // while($b=mysqli_fetch_assoc($req)){
    //     echo "resultat  = " . $b['designation'];

    // }
}
?>
    <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style/style-table.css" >
<script language= "JavaScript" src="script.js">
    
</script>
        
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
        <form method="GET" action="">
            Rechercher un mot : <input type="text" name="recherche">
            <input type="SUBMIT" value="Search" name="subb">
        </form>
        <a href="/fonacogestion/FonacoGestionPHP/newm.php">
        <button>Ajouter</button></a>
<table class="fl-table" >
        <tr>
			<th>Client</th>
                <th>Telephone</th>
			<th>Email</th>
                <th>Montat max</th>
               
                
                
                
               
               
                
                
          
                
                </tr>
   <?php while($row=mysqli_fetch_assoc($result)){
   
                ?>
  <tr>			
	 
                <td><?php echo $row['nom']; ?> </td>
      			<td><?php echo $row['telephone']; ?> </td>
                <td><?php echo $row['email']; ?> </td>
                <td><?php echo $row['montantmax']; ?> </td>
                
                
                
                
                <td><?php echo $row['adresse']; ?> </td>
                
                <td><?php echo $row['portable']; ?> </td>
                
                
              
 <td>
<a onclick="delClient('<?php echo $row['id_client'];?>')"> <button  class="confirm">Supprimer</button></a></td> </tr> 
                  <?php  
};
?>

</table>
   
</body>
</html>
