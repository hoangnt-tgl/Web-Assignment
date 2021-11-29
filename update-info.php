<?php
require_once('config.php');
session_start();
$username = $_SESSION['username'];
$fullname = $account_id = $email = $phonenumber = $birthday = $about = $image = '';

if (!empty($_POST['changeInfo'])){
    if (isset($_POST['account_id'])){
        $account_id = $_POST['account_id'];
    }
    if (isset($_POST['fullname'])){
        $fullname = $_POST['fullname'];
    }
    if (isset($_POST['phonenumber'])){
        $phonenumber = $_POST['phonenumber'];
    }
    if (isset($_POST['birthday'])){
        $birthday = $_POST['birthday'];
    }
    if (isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if (isset($_POST['about'])){
        $about = $_POST['about'];
    }
    if (isset($_POST['image'])){
        $image = $_POST['image'];
        if ($image == ''){
            $sql = 'select image from `account` where account_id = "'.$username.'"';
            $accountList = executeResult($sql);
            $image = $accountList[0]['image'];
        }
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) {
                header('Location: ./edit-profile.php?error=image');
                die();
            }
    }
    $sql = 'select account_id, email, phonenumber from `account` where account_id != "'.$username.'"';
    $accountList = executeResult($sql);
    foreach($accountList as $std){
        if ($account_id === $std['account_id']){
            header('Location: ./edit-profile.php?error=username');
            die();
        }
        if ($email === $std['email']){
            header('Location: ./edit-profile.php?error=email');
            die();
        }
        if ($phonenumber === $std['phonenumber']){
            header('Location: ./edit-profile.php?error=phonenumber');
            die();
        }
    }
    
    $sql = "update account set account_id = '$account_id', fullname = '$fullname', `phonenumber` = '$phonenumber', `birthday` = '$birthday', email = '$email', about = '$about', image = '$image' where account_id = '$username'";
    execute($sql);
    $sql = "update comment set account_id = '$account_id' where account_id = '$username'";
    execute($sql);
    $_SESSION['username'] = $account_id;
    header('Location: ./edit-profile.php');
}
if (!empty($_POST['changePass'])){
    $currPass = $newPass = $confPass = "";
    if (isset($_POST['currPass'])){
        $currPass = $_POST['currPass'];
    }
    if (isset($_POST['newPass'])){
        $newPass = $_POST['newPass'];
    }
    if (isset($_POST['confPass'])){
        $confPass = $_POST['confPass'];
    }
    $sql = 'select password from `account` where account_id = "'.$username.'"';
    $accountList = executeResult($sql);
    $password = $accountList[0]['password'];
    if ($currPass != $password){
        header('Location: ./edit-profile.php?error=passwordErrIncorrect');
            die();
    }
    else if ($newPass != $confPass){
        header('Location: ./edit-profile.php?error=passwordErrNotMatch');
        die();
    }
    else if (!preg_match("#[0-9]+#", $newPass)){
        header('Location: ./edit-profile.php?error=passwordErrleast1number');
        die();
    }
    else if (!preg_match("#[A-Za-z]+#", $newPass)){
        header('Location: ./edit-profile.php?error=passwordErrleast1letter');
        die();
    }
    $sql = "update account set password = '$newPass' where account_id = '$username'";
    execute($sql);
    header('Location: ./edit-profile.php');
}
?>