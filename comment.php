<?php
require_once('config.php');
session_start();
$news_id = $_POST['news_id'];
if (isset($_SESSION['username'])){
    if (!empty($_POST['comment'])){
        $message = $_POST['message'];
        $sql = 'insert into `comment` (`news_id`, `account_id`, `content`) VALUES ('.$news_id.', "'.$_SESSION['username'].'", "'.$message.'")';
        execute($sql);
        header('location:new_info.php?id='.$news_id.'');
    }
}
else {
    header('location:new_info.php?id='.$news_id.'&error=notlogin');
}
?>