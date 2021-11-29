<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thth_company";
$conn = new mysqli($servername, $username, $password, $dbname);
if (isset($_POST['save']))
{
    $id =  $_POST['id-product'];
    $name =  $_POST['name-product'];
    $price =  $_POST['price-product'];
    $image =  $_POST['image-product'];
    $quantity =  $_POST['quantity-product'];
    $des =  $_POST['des-product'];
    $os =  $_POST['os'];
    $pro =  $_POST['pro'];
    $mem =  $_POST['mem'];
    $sto =  $_POST['sto'];
    $gra =  $_POST['gra'];
    $rating = 0;
    $sql1 = "INSERT INTO product (product_id, image, name,price,description,rating,quantity,os,processor,memory,storage,graphics) 
    VALUES ('$id','$image', '$name','$price', '$des','$rating','$quantity','$os','$pro','$mem','$sto','$gra')";
    if ($conn->query($sql1) === TRUE)
    {
        $_SESSION['add'] = '1';
    header('location:admin-product.php');
    
    
    }
    else
    {

        $_SESSION['add'] = '0';
        header('location:admin-product.php');
       
    }
}
if (isset($_GET['delete']))
{
    
    $id = $_GET['delete'];
    
    $conn->query("DELETE * FROM product WHERE product_id = $id");
    // header('location:admin-product.php'); 
    
}
?>