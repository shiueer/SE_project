<?php
session_start();
require("userModel.php");

$userName = $_POST['id'];
$passWord = $_POST['pwd'];//接收網頁上的input

if (checkUserIDPwd($userName, $passWord)) {
	$_SESSION['uID'] = $userName;
	$_SESSION['rID'] = getUserRole($userName);
	//echo $userName, "roleID:".$_SESSION['rID'];
	header("Location: todoListView.php");
} else {
	echo'12345689';
	$_SESSION['uID'] = "";
	$_SESSION['rID'] = "";
	// header("Location: loginForm.php");
}
?>
