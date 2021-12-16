<?php

    if(isset($_POST['item-insert']))
    {
        $target = "images/" .basename($_FILES['image']['name']);

        $db = mysqli_connect("localhost","root","","dbtest");

        $category = $_POST['item-category'];
        $product = $_POST['item-name'];
        $image = $_FILES['image']['name'];
        $info = $_POST['item-info'];
        $price = $_POST['item-price'];
        $date = $_POST['item-date'];

        $sql = "INSERT into products (category, product, image, prod_info, price, start_date, mod_date) VALUES ($category, $product, $image, $info, $price, now(), $date)";
        mysqli_query($db, $sql);

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            $msg ="Item uploaded successfuly";
        }
        else{
            $msg = "Item not uploaded";
        }

    }


?>