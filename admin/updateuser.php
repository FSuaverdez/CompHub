<?php
    $mysqli = new mysqli('localhost', 'root', '') or die(mysqli_error($mysqli));
    $db = mysqli_select_db($mysqli, 'dbtest');

    if(isset($_POST['update-btn'])){
       
        date_default_timezone_set('Asia/Manila');
        $id = $_POST['update_id'];
        $username = $_POST['user-name'];
        $password = $_POST['user-pass'];
        $email = $_POST['user-email'];
        $contact = $_POST['user-contact'];
        $modified_time = date("Y-m-d h:i:s:A");

        
        $query = "UPDATE users SET  username ='$username', password ='$password', email ='$email', contact = '$contact', mod_date = '$modified_time' WHERE id ='$id'";
        $query_run = mysqli_query($mysqli, $query);

        if($query_run){
            $_SESSION['message'] = "Record has been updated!";
            $_SESSION['msg_type'] = "warning";

        header("Location: adminUser.php");
        }
        
        else{
            echo "oof";
        }
    }
?>