<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thth_company";
$conn = new mysqli($servername, $username, $password, $dbname);
if (isset($_GET['delete']))
{
    
    $id = $_GET['delete']; 
    $sql = "SELECT status from account where account_id = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = $result ->fetch_assoc();
   
    if ($row['status'] == "1")
    {
        $del = mysqli_query($conn,"update account set  status = '0' where account_id = '$id'"); 
    }
    else{
        $del = mysqli_query($conn,"update account set  status = '1' where account_id = '$id'"); 
    }
   

if($del)
{
    
    header("location:admin-user.php");
  
}
else
{
    echo "Error baning record"; 
}
    
}
?>