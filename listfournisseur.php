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
$sql = "select * from fournisseur";
 $result = mysqli_query($conn,$sql) or die ("bad query");
$recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';

     // la requete mysql
    //   && $_GET['recherche']!=""
    if(isset($_GET['subb'])){
        $c = $_GET['recherche'];
        $fonaco = "SELECT * FROM fournisseur WHERE nom_fournisseur like '%$c%' ";
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
                <th>tel</th>
			<th>email</th>
               
                
                
                
               
               
                
                
          
                
                </tr>
   <?php while($row=mysqli_fetch_assoc($result)){
   
                ?>
  <tr>			
	         <td><?php echo $row['nom_fournisseur']; ?> </td>
      			<td><?php echo $row['tel']; ?> </td>
                <td><?php echo $row['email']; ?> </td>
 <td>
<a onclick="delFournisseur('<?php echo $row['id'];?>')"> <button  class="confirm">Supprimer</button></a></td> </tr> 
                  <?php  
};
?>
</table>
        </div>
   
</body>
</html>
