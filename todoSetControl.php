<?php
require("todoModel.php");

$msgID=(int)$_GET['id'];
$act =$_GET['act'];
$msg = "Message:$msgID, Action: $act completed.";
if ($msgID>0) {
	switch($act) {
		case 'finish':
			setFinished($msgID);
			//$sql = "update todo set status = 1, finishTime=NOW() where id=$msgID and status = 0;";
			break;
		case 'reject':
			rejectJob($msgID);
			break;
		case 'close':
			setClosed($msgID);
			break;
		case 'cancel':
			cancelJob($msgID);
	
			break;
		default:
			$msg="Invalid action. Ignored.";
			break;
	}
}
header("Location: todoListView.php?m=$msg");
?>

