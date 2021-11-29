<?php
require_once('config.php');
session_start();
if (isset($_SESSION['username'])){
    if (!empty($_POST['comment'])){
        $message = $_POST['message'];
        $news_id = $_POST['news_id'];
        $sql = 'insert into `comment` (`news_id`, `account_id`, `content`) VALUES ('.$news_id.', "'.$_SESSION['username'].'", "'.$message.'")';
        execute($sql);
        header('location:new_info.php?id='.$news_id.'');
    }
}
else {
    if (!empty($_POST['comment'])){
        function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        $news_id = $_POST['news_id'];
        alert("Bạn cần đăng nhập để bình luận");
        header('location:new_info.php?id='.$news_id.'');
    }
}
?>