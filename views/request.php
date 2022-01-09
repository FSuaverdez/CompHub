<?php 

require '../source/db_connect.php';

if(isset($_POST['submit_button'])){
    $name = $_POST['client_name'];
    $email = $_POST['email'];
    $subject = $_POST['issueSubject'];
    $description = $_POST['desc'];
    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d h:i:sa");
    $status = "In Queue";
    $mysqli->query("INSERT INTO ticket (name, email, subject, issue, date_issued, status_update) VALUES('$name', '$email', '$subject', '$description', '$date', '$status') ")
          or die($mysqli->error);
    
    echo "<script> alert('Request Made Successfully!'); </script>";
    if(isset($_POST["redirect"])){
        echo "<script> window.location = '../admin/adminTicket.php' </script>";
        unset($_POST["redirect"]);
    }
    else{
        echo "<script> window.location = '../index.php' </script>";
    }

}

?>