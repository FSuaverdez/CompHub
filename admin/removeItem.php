<?php
    require '../source/db_connect.php';
    $db = mysqli_select_db($mysqli,'request');

    if(isset($_POST['delete-item'])){
        $id = $_POST['delete_id'];
        
        $query = "DELETE from GGS_products WHERE id = '$id'";
        $run = mysqli_query($mysqli,$query);

        if($run){
            header("location: adminProduct.php");
        }
    }
?>_