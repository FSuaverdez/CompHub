<?php
    $mysqli = new mysqli("localhost", "root", ""); 
    $mysqli->query("DROP DATABASE IF EXISTS request;");
    if(empty(mysqli_fetch_array(mysqli_query($mysqli, "SHOW DATABASES LIKE 'request'")))){
       
        $mysqli->query("CREATE DATABASE IF NOT EXISTS request; ");
        $mysqli = new mysqli("localhost", "root", "", 'request') or die(mysqli_error($mysqli));
        $lines = file("../seed.sql"); 
        $sql="";
        foreach($lines as $line){
            $sql .= $line; 
            if (substr(trim($line), -1, 1) == ';'){
                $mysqli->query($sql) or die("Error seeding the table " . mysqli_error($mysqli));
                $sql = "";
            }
        }
        echo "<script> alert('Database initialization successful') </script> ";
    }
    else{
        echo "<script> alert('Database already exists') </script> ";
        $mysqli = new mysqli("localhost", "root", "", 'request') or die(mysqli_error($mysqli));
    }
    header( "refresh:0;url=../index.php" )
?>