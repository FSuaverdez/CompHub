<?php 

require '../source/db_connect.php';
if(isset($_POST['update-item']))
{
    $target = "images/" .basename($_FILES['image']['name']);
    $id = $_POST['update_id'];
    $category = $_POST['item-category'];
    $product = $_POST['item-product'];
    $image = $_FILES['image']['name'];
    $info = $_POST['item-info'];
    $price = $_POST['item-price'];
    $stock = $_POST['stock'];

    $query = "UPDATE GGS_products SET product_category='$category', product_name='$product', product_info='$info', price='$price', stocks='$stock'  WHERE id ='$id' ";
    $query_run = mysqli_query($mysqli, $query);

    if($query_run){
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            mysqli_query($mysqli, "UPDATE GGS_products SET image='$image' WHERE id ='$id' ");

            $msg ="Item uploaded successfully";

            $_SESSION['message'] = "Record has been updated!";
            $_SESSION['msg_type'] = "warning";

            header("Location: adminProduct.php");
        } else if (file_exists($image) === false) {
            $msg ="Item uploaded successfully without image";

            $_SESSION['message'] = "Record has been updated without image!";
            $_SESSION['msg_type'] = "warning";

            header("Location: adminProduct.php");
        } else {
            $msg = "Item not uploaded";
        }
    }
}

?>