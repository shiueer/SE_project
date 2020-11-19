<?php
session_start();
require("userModel.php");

$userName = $_POST['id'];
$passWord = $_POST['pwd'];//接收網頁上的input
$role = $_POST['role'];//設置變數存放

if (checkUserIDPwd($userName, $passWord,$role)) {
	$_SESSION['uID'] = $userName;
	header("Location: todoListView.php");
} else {
	$_SESSION['uID']="";
	header("Location: loginForm.php");
}
?>
