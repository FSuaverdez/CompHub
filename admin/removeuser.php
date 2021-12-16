<?php
 $mysqli = new mysqli('localhost', 'root', '','dbtest') or die(mysqli_error($mysqli));
    if(isset($_POST['delete-btn'])){
       
        $id = $_POST['delete_id'];
        $mysqli->query("DELETE FROM users WHERE id = '$id'") or die(mysqli_error($mysqli));
   
            $_SESSION['message'] = "Record has been updated!";
            $_SESSION['msg_type'] = "warning";

            header("Location: adminUser.php");
        
    }
?>