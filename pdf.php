<?php
  
include 'cnfig.php';

error_reporting(0);

session_start();

require('fpdf.php');

$mylist=$_SESSION['selected'];

  
// New object created and constructor invoked
$pdf = new FPDF('P','mm','A4');
  
// Add new pages. By default no pages available.
$pdf->AddPage();


$pdf->Image('bg.png', 0, 0,210);
  
// Set font format and font-size
for ($i=0; $i < count($mylist); $i++) { 
    $test=$mylist[$i];
    $sql = "select * from commandes where id_commande=".$test;
    $result = mysqli_query($conn,$sql) or die ("bad query");
    $pdf->SetFont('Times', 'B', 20);
    
    // Framed rectangular area
    $pdf->Cell(176, 5, 'Facture n'.$test, 0, 0, 'C');
    
    // Set it new line
    $pdf->Ln();
    $pdf->Ln();
    
    // Set font format and font-size
    $pdf->SetFont('Times', 'B', 12);
    
    // Framed rectangular area
    $row=mysqli_fetch_assoc($result);
    $pdf->Cell(176, 10, 'Client :       Designation :       PU :        Qte :       Total :     Date : ', 0, 0, 'C');
    $pdf->Ln();
    $pdf->Cell(176, 10, $row['nom_client']."        ".$row['designation']."        ".$row['prix_unitaire']."        ".$row['quantite']."        ".$row['total']."        ".$row['date_commande'], 0, 0, 'C');
    $pdf->Ln();
}

  
// Close document and sent to the browser
$pdf->Output();
  
?>