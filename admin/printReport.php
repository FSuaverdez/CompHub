<?php
require '../source/db_connect.php';
if (isset($_POST['download_service_report'])) {
  $result = $mysqli->query("SELECT * FROM GGS_purchase_history") or die($mysqli->error);
  $data = [];
  while ($row = $result->fetch_assoc()) :
    array_push($data, $row);
  endwhile;
  require('../source/fpdf.php');

  $header = array('ID', 'Paypal Transaction ID', 'Products', 'Qty', 'Cost', 'Total', 'Date Bought');
  $pdf = new FPDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial', 'B', 12);
  $pdf->Cell(40, 10, 'Sales Report');
  $pdf->Ln();
  // Colors, line width and bold font
  $pdf->SetFillColor(2, 48, 71);
  $pdf->SetTextColor(255);
  $pdf->SetDrawColor(128, 0, 0);
  $pdf->SetLineWidth(.3);
  $pdf->SetFont('', 'B');
  // Header
  $w = array(7, 45, 50, 7, 15, 15, 45);
  for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
  $pdf->Ln();
  // Color and font restoration
  $pdf->SetFillColor(224, 235, 255);
  $pdf->SetTextColor(0);
  $pdf->SetFont('');
  // Data
  $fill = false;
  foreach ($data as $row) {
    $pdf->Cell($w[0], 6, $row['id'], 'LR', 0, 'L', $fill);
    $pdf->Cell($w[1], 6, $row['transaction_id'], 'LR', 0, 'L', $fill);
    $pdf->Cell($w[2], 6, substr($row['products'], 0, 18) . '..', 'LR', 0, 'L', $fill);
    $pdf->Cell($w[3], 6, $row['qty'], 'LR', 0, 'L', $fill);
    $pdf->Cell($w[4], 6, number_format($row['total']), 'LR', 0, 'R', $fill);
    $pdf->Cell($w[5], 6, number_format($row['qty'] * $row['total']), 'LR', 0, 'R', $fill);
    $pdf->Cell($w[6], 6, $row['date_bought'], 'LR', 0, 'L', $fill);
    $pdf->Ln();
    $fill = !$fill;
  }
  // Closing line
  $pdf->Cell(array_sum($w), 0, '', 'T');
  $pdf->Output('i', 'sales_report');
}
