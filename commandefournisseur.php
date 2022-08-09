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
$sql = "select * from commande_fournisseur";
 $result = mysqli_query($conn,$sql) or die ("bad query");
$recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';

     // la requete mysql
    //   && $_GET['recherche']!=""
    if(isset($_GET['subb'])){
        $c = $_GET['recherche'];
        $fonaco = "SELECT * FROM commande_fournisseur WHERE nom_fournisseur like '%$c%' OR designation like '%$c%' OR prix_unitaire like '%$c%' OR qte like '%$c%' OR prix_total like '%$c%' OR `date` like '%$c%' ";
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
<table class="fl-table" >
        <tr>
			<th>fournisseur</th>
                <th>designation</th>
			<th>qte</th>
            <th>prix unitaire</th>
            <th>prix total</th>
            <th>date</th>
               
                
                
                
               
               
                
                
          
                
                </tr>
   <?php while($row=mysqli_fetch_assoc($result)){
   
                ?>
  <tr>			
                <td><?php echo $row['nom_fournisseur']; ?> </td>
      			<td><?php echo $row['designation']; ?> </td>
                <td><?php echo $row['qte']; ?> </td>
                <td><?php echo $row['prix_unitaire']; ?> </td>
                <td><?php echo $row['prix_total']; ?> </td>
                <td><?php echo $row['date']; ?> </td>
 <td>
<a onclick="delCommandeFournisseur('<?php echo $row['id'];?>')"> <button  class="confirm">Supprimer</button></a></td></tr>
                
                
                
                
                  <?php  
};
?>
</table>
        </div>
   
</body>
</html>
