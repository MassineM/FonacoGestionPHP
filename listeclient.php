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







  /*  if(isset($_POST["export"])) {
		if($_POST['civilite']=="Mme"){
			
$sql_query = "SELECT * FROM histo1 WHERE civilite = 'mme'";
$resultset = mysqli_query($conn, $sql_query) ;
$info_records = array();
while( $rows = mysqli_fetch_assoc ($resultset) ) {
$info_records[] = $rows;
}
 
		}
			if($_POST['civilite']=="mr"){
			
$sql_query = "SELECT * FROM histo1 WHERE civilite = 'mr'";
$resultset = mysqli_query($conn, $sql_query) ;
$info_records = array();
while( $rows = mysqli_fetch_assoc ($resultset) ) {
$info_records[] = $rows;
}
 
		}
		
					if($_POST['situation']=="prospect"){
			
$sql_query = "SELECT * FROM histo1 WHERE situation = 'prospect'";
$resultset = mysqli_query($conn, $sql_query) ;
$info_records = array();
while( $rows = mysqli_fetch_assoc ($resultset) ) {
$info_records[] = $rows;
}
 
		}
		
							if($_POST['situation']=="adhérent"){
			
$sql_query = "SELECT * FROM histo1 WHERE situation = 'adhérent'";
$resultset = mysqli_query($conn, $sql_query) ;
$info_records = array();
while( $rows = mysqli_fetch_assoc ($resultset) ) {
$info_records[] = $rows;
}
 
		}
		    
 
$filename = "data_export_".date('d-m-Y '). ".xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
$show_coloumn = false;
if(!empty($info_records)) {
foreach($info_records as $record) {
if(!$show_coloumn) {

echo implode("\t", array_keys($record)) . "\n";
$show_coloumn = true;
}
echo implode("\t", array_values ($record)) . "\n";
}
}
        exit;
    }*/



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
                
                
              
               <!-- <td> <a href="sup.php?edit1=<?php echo $row['id_client']; ?>"  >Supprimer</a> </td> -->
 <td>
<a onclick="MM_openBrWindow('<?php echo $row['id_client'];?>')"> <button  class="confirm">Supprimer</button></a></td> </tr> 
                  <?php  
};
?>

</table>
   
</body>
</html>
