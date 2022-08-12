<?php
    function updateTotalDevis($conn,$devis){
        $reqTotalDevis = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total) AS somme FROM devis JOIN commandes ON commandes.id_devis=devis.id_devis WHERE commandes.id_devis='$devis' GROUP BY commandes.id_devis"));
        $totaldevis = $reqTotalDevis['somme'];
        $sql = "UPDATE devis SET total_ht='$totaldevis' WHERE id_devis='$devis'";
        mysqli_query($conn, $sql);
    }
?>