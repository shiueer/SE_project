<?php
require("todoModel.php");

$Name =mysqli_real_escape_string($conn,$_POST['Name']);
$sID  =mysqli_real_escape_string($conn,$_POST['sID']);
$FName=mysqli_real_escape_string($conn,$_POST['FName']);
$MName=mysqli_real_escape_string($conn,$_POST['MName']);

if ($Name and $sID and $FName and $MName !="") { //if title is not empty
	addJob("",$Name,$sID ,$FName,$MName,"","","","","","","","");
	$apply="Add a new apply!!";
} else {
	$apply= "Fail to add a new apply!";
}
header("Location: todoListView.php?m=$apply");
?>