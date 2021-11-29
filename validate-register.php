<?php


session_start();

$error_fullname = "";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thth_company";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  echo "connect fail";
  die("Connection failed: " . $conn->connect_error);
}
$id = $_POST["id"];
$password = $_POST["password"];
$password_rp = $_POST["password_rp"];
$birthday = $_POST["birthday"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$length = strlen($phone);
$about = $_POST["about"];
$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";

if (
  empty($id) ||
  empty($password) ||
  empty($birthday) ||
  empty($email) ||
  empty($phone)
) die('Please fill all required fields!');

if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
  $username_error = "Only alphabets and white space are allowed";  
}  

if ($password != $password_rp) $rp_password_error = 'Password and Confirm password should match!';

if (strlen($_POST["password"]) <= '8') {
  $password_error = "Your Password Must Contain At Least 8 Characters!";
}
elseif(!preg_match("#[0-9]+#",$password)) {
  $password_error = "Your Password Must Contain At Least 1 Number!";
}
elseif(!preg_match("#[A-Z]+#",$password)) {
  $password_error = "Your Password Must Contain At Least 1 Capital Letter!";
}
elseif(!preg_match("#[a-z]+#",$password)) {
  $password_error = "Your Password Must Contain At Least 1 Lowercase Letter!";
}

if (!preg_match($pattern, $email)) {
  $email_error = "Email is not valid!";
}

if ($length < 10 && $length > 10) {  
  $birthday_error = "Mobile must have 10 digits!";
}


$permission = 0;
$sql1 = "INSERT INTO account (account_id, password, email , birthday, phonenumber, about, permission) 
                      VALUES ('$id', '$password','$email', '$birthday','$phone','$about','$permission')";
if ($conn->query($sql1) === TRUE) {
  echo "Add sucessful";
  header('location:login.php');
} else {

  $_SESSION['error'] = "Error";
  header('location:register.php');
}
