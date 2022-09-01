<?php
  
include 'cnfig.php';
include 'functions.php';

error_reporting(0);

session_start();

require('fpdf.php');

$idDevis=$_GET['ID'];
$reqdevis=mysqli_fetch_assoc(mysqli_query($conn,"select * from devis join clients on devis.id_client=clients.id_client  where id_devis='$idDevis'"));

  
// New object created and constructor invoked
$pdf = new FPDF('P','mm','A4');
  
// Add new pages. By default no pages available.
$pdf->AddPage();


$pdf->Image('modeleFacture.png', 0, 0,210);


$pdf->SetFont('Times', 'B', 20);

// Framed rectangular area
$pdf -> SetY(59);
$pdf -> SetX(180);
$pdf->Cell(210, 10, $idDevis, 0, 0, 'L');

// Set font format and font-size
$pdf->SetFont('Times', 'B', 12);
$pdf -> SetY(76);
$pdf -> SetX(152);

$pdf->Cell(210, 10, $reqdevis['nom'], 0, 0, 'L');
$pdf -> SetX(18);
$pdf->Cell(210, 10, $reqdevis['date_devis'], 0, 0, 'L');

$sql = "select * from commandes where id_devis=".$idDevis;
$result = mysqli_query($conn,$sql) or die ("bad query");
// Set font format and font-size
$pdf -> SetY(120);
while ($row=mysqli_fetch_assoc($result)) {
    $pdf -> SetX(25);
    $pdf->Cell(210, 6, $row['designation'], 0, 0, 'L');
    $pdf -> SetX(138);
    $pdf->Cell(12, 6, $row['quantite'], 0, 0, 'C');
    $pdf -> SetX(150);
    $pdf->Cell(26, 6, $row['prix_unitaire'], 0, 0, 'C');
    $pdf -> SetX(176);
    $pdf->Cell(18, 6, $row['total'], 0, 0, 'C');
    $pdf->Ln();
}

$pdf -> SetY(196);
$pdf -> SetX(152);
$pdf->Cell(40, 5, $reqdevis['total_ht'], 0, 0, 'R');
$pdf->Ln();
$pdf -> SetX(152);
$pdf->Cell(40, 6, $reqdevis['total_ht']*2/10, 0, 0, 'R');
$pdf->Ln();
$pdf -> SetX(152);
$total_ttc=$reqdevis['total_ht']*12/10;
$pdf->Cell(40, 7,$total_ttc, 0, 0, 'R');
$pdf->Ln();
$pdf -> SetY(210);
$pdf -> SetX(20);
$pdf->Cell(40, 7, toLetters($total_ttc), 0, 0, 'L');
  
// Close document and sent to the browser
$pdf->Output();
  
?>