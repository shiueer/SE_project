<?php
require("userModel.php");
$result=getUserPwd();
while (	$rs=mysqli_fetch_assoc($result)) {
	echo $rs['LoginID'], "---", $rs['Password'], "<br>";
}
?>