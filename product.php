<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thth_company";
$conn = new mysqli($servername, $username, $password, $dbname);
if (isset($_POST['save']))
{

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
    $sql1 = "INSERT INTO product ( image, name,price,description,rating,quantity,os,processor,memory,storage,graphics) 
    VALUES ('$image', '$name','$price', '$des','$rating','$quantity','$os','$pro','$mem','$sto','$gra')";
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
if (isset($_POST['save3']))
{
   
    $name =  $_POST['name-product2'];
    $price =  $_POST['price-product2'];
    $image =  $_POST['image-product2'];
    $quantity =  $_POST['quantity-product2'];
    $des =  $_POST['des-product2'];
    $os =  $_POST['os2'];
    $pro =  $_POST['pro2'];
    $mem =  $_POST['mem2'];
    $sto =  $_POST['sto2'];
    $gra =  $_POST['gra2'];
    $sql1 = "Update product set  image = '$image', name = '$name',price = '$price',description = '$des',quantity = '$quantity',os = '$os',processor = '$pro',memory = '$mem',storage = '$sto',graphics = '$gra'  where name = '$name' ";
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
if (isset($_POST['save2']))
{
    echo 'asdad';
    $id =  rand(0,100000);
    $title =  $_POST['title-news'];
    $descreption =  $_POST['descreption-news'];
    $image =  $_POST['image-news'];
    $postday =  date('Y/m/d', time());
    $sql1 = "INSERT INTO news (news_id, image, title,description,postday) 
    VALUES ('$id','$image', '$title','$descreption', '$postday')";
    if ($conn->query($sql1) === TRUE)
    {
        $_SESSION['add'] = '1';
    header('location:admin-new.php');
    
    
    }
    else
    {
        echo $postday;
        $_SESSION['add'] = '0';
        // header('location:admin-new.php');
       
    }
}
if (isset($_GET['delete']))
{
    
    $id = $_GET['delete']; 

    $del = mysqli_query($conn,"delete from product where product_id = '$id'"); // delete query

if($del)
{
    
    header("location:admin-product.php");
  
}
else
{
    echo "Error deleting record"; 
}
    
}
if (isset($_GET['delete2']))
{
    
    $id = $_GET['delete2']; 

    $del = mysqli_query($conn,"delete from news where news_id = '$id'"); // delete query

if($del)
{
    
    header("location:admin-new.php");
  
}
else
{
    echo "Error deleting record"; 
}
    
}
if (isset($_GET['edit']))
{
    
    $id = $_GET['edit']; 
    $result = mysqli_query($conn,"select * from product where product_id = '$id'");
    header("location:admin-product.php");
    ?>
         <script>
    const viewBtn = document.querySelector(".view-modal"),
    popup = document.querySelector(".popup"),
    close = popup.querySelector(".close"),
    field = popup.querySelector(".field");
    popup.classList.toggle("show");
    close.onclick = ()=>{
      viewBtn.click();

    
    }
  
  </script>
    <?php
}
?>