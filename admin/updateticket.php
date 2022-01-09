<?php
    require "../source/db_connect.php"; 

    if(isset($_POST['update-btn'])){
       
        date_default_timezone_set('Asia/Manila');
        $id = $_POST['update_id'];
        $customerName = $_POST['user-name'];
        $email = $_POST['user-email'];
        $issue = $_POST["user-issue"];
        $description = $_POST['user-description'];
        $date_created = $_POST["user-date_created"];
        $status = $_POST["user_status"];
        if($status=="Resolved"){
            $date_resolved = date("Y-m-d h:i:sa");
        }else{
            $date_resolved = NULL; 
        }

        
        $query = "UPDATE ticket SET 
         name ='$customerName',
         email ='$email', 
         subject = '$issue',
         issue = '$description', 
         date_issued = '$date_created',
         date_resolved = '$date_resolved',
         status_update='$status'
         WHERE id ='$id'";
        $query_run = mysqli_query($mysqli, $query);

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