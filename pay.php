<?php
require_once("config.php");
session_start();
$idList = $_GET["cart"];
$idList = explode(",",$idList);
for ($i = 0; $i < count($idList); $i++){
    $sql = 'insert into `productbuy` (`account_id`, `product_id`) VALUES ("'.$_SESSION["username"].'", '.$idList[$i].')';
    // echo $sql;
    execute($sql);

}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>