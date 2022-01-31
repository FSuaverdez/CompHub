<?php

    require "../source/db_connect.php";
    if(isset($_POST['delete-btn'])){
       
        $id = $_POST['delete_id'];
        $mysqli->query("DELETE FROM GGS_ticket WHERE id = '$id'") or die(mysqli_error($mysqli));
        if(!mysqli_error($mysqli)){
            $_SESSION['message'] = "Record has been updated!";
            $_SESSION['msg_type'] = "warning";
        }else{
            $_SESSION['message'] = "Record failed!";
            $_SESSION['msg_type'] = "danger";
        }   
        header("Location: adminTicket.php");  
    }
?>