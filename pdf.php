<?php
  
include 'cnfig.php';

error_reporting(0);

session_start();

require('fpdf.php');


$test=$_GET['selected'];
$sql = "select * from commandes where id_commande=".$test;
 $result = mysqli_query($conn,$sql) or die ("bad query");
  
// New object created and constructor invoked
$pdf = new FPDF();
  
// Add new pages. By default no pages available.
$pdf->AddPage();
  
// Set font format and font-size
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
$pdf->Cell(176, 10, 'Client : '.$row['nom_client'], 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(176, 10, 'Designation : '.$row['designation'], 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(176, 10, 'PU : '.$row['prix_unitaire'], 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(176, 10, 'Qte : '.$row['quantite'], 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(176, 10, 'Total : '.$row['total'], 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(176, 10, 'Date : '.$row['date_commande'], 0, 0, 'C');

  
// Close document and sent to the browser
$pdf->Output();
  
?>