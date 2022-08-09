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
$recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';

     // la requete mysql
    //   && $_GET['recherche']!=""
    if(isset($_GET['subb'])){
        $c = $_GET['recherche'];
        $fonaco = "SELECT * FROM `commandes` WHERE nom_client like '%$c%' OR `designation` like '%$c%' OR `reglement` like '%$c%' OR `date_commande` like '%$c%'";
        $result = mysqli_query($conn,$fonaco);
        // while($b=mysqli_fetch_assoc($req)){
        //     echo "resultat  = " . $b['designation'];

        // }
    }





?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style/style-table.css">
<script language= "JavaScript" src="script.js">
    
</script>

</head>

<body>
    <header>
        <a href="#" class="logo">FONACO</a>
        <nav class="navigation">

            <?php echo "<a >Welcome " . $_SESSION['username'] . "</a>";?>


            <a href="welcome.php">Accueil</a>




        </nav>
    </header>


    <div class="table-wrapper">
        <form method="GET" action="">
            Rechercher un mot : <input type="text" name="recherche">
            <input type="SUBMIT" value="Search" name="subb">
        </form>
        <table class="fl-table">
            <tr>
                <th><button>Print PDF</button></th>
                <th>Client</th>
                <th>Designation</th>
                <th>Qte</th>
                <th>Prix unitaire</th>
                <th>Total</th>
                <th>Reglement</th>
                <th>Date</th>











            </tr>
            <?php while($row=mysqli_fetch_assoc($result)){
   
                ?>
            <tr>
                <td><input type="checkbox" name="formWheelchair" value="Yes" /></td>
                <td><?php echo $row['nom_client']; ?> </td>
                <td><?php echo $row['designation']; ?> </td>
                <td><?php echo $row['quantite']; ?> </td>
                <td><?php echo $row['prix_unitaire']; ?> </td>
                <td><?php echo $row['total']; ?> </td>
                <td><?php echo $row['reglement']; ?> </td>
                <td><?php echo $row['date_commande']; ?> </td>
 <td>
<a href="/fonacogestion/FonacoGestionPHP/editCom.php?ID=<?php echo $row['id_commande'];?>"> <button  class="confirm">Modifier</button></a></td>
 <td>
<a onclick="delCommande('<?php echo $row['id_commande'];?>')"> <button  class="confirm">Supprimer</button></a></td>




            </tr>
            <?php  
};
?>
        </table>
    </div>

</body>

</html>