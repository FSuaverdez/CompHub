<?php

    $conn = mysqli_connect("localhost", "root","");
    $db = mysqli_select_db($conn,'request');

    if(isset($_POST['delete-item'])){
        $id = $_POST['delete_id'];
        
        $query = "DELETE from products WHERE id = '$id'";
        $run = mysqli_query($conn,$query);

        if($run){
            header("location: adminProduct.php");
        }
    }
?>_