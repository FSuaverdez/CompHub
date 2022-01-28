<?php require('fpdf.php');

class PDF extends FPDF
{
  // Load data
  function LoadData($file)
  {
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach ($lines as $line)
      $data[] = explode(';', trim($line));
    return $data;
  }
