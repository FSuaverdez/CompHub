<?php
    require '../source/db_connect.php';
    if(isset($_POST['Queue'])){ 
        $id = $_POST['queue_id'];
        $modstat = "Resolved";
        date_default_timezone_set("Asia/Manila");
        $date = date("Y-m-d h:i:sa");
        
   
    $query = "UPDATE GGS_ticket SET  status_update = '$modstat', date_resolved ='$date' WHERE id ='$id'";
    $query_run = mysqli_query($mysqli, $query);

    if($query_run){
        $_SESSION['message'] = "Record has been updated!";
        $_SESSION['msg_type'] = "warning";

    header("Location: adminStatus.php");
    }
    }

        
?>