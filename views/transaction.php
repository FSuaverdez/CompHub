<?php
if (isset($_POST['hidden_product'])) {

  $mysqli = new mysqli('localhost', 'root', '', 'request') or die(mysqli_error($mysqli));
  $conn = mysqli_connect('localhost', 'root', '');
  $db = mysqli_select_db($conn, 'request');

  $saved_prod = $_POST['hidden_product'];
  $saved_total = $_POST['hidden_total'];
  $transaction_id = $_POST['transaction_id'];
  $qty = $_POST['qty'];

  $data['product'] = $saved_prod;
  $data['total'] = $saved_total;
  $data['transaction_id'] = $transaction_id;
  $data['qty'] = $qty;



  date_default_timezone_set("Asia/Manila");
  $date = date("Y-m-d h:i:s a");

  $mysqli->query("INSERT into purchase_history (products,total,date_bought,transaction_id,qty) VALUES ('$saved_prod','$saved_total','$date','$transaction_id','$qty')")
    or die($mysqli->error);
  echo json_encode($data);
}
