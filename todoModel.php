<?php
require_once("dbconnect.php");

function addJob($ID, $Name, $sID, $FName, $MName, $Income_status, $Note, $T_admit, $S_admit, $Amount, $S_note, $P_admit) {
	global $conn;
	$sql = "insert into apply_content (ID, Name, sID, FName, MName, Income_status, Note, T_admit, S_admit, Amount, S_note, P_admit) values ('$ID','$Name', '$sID', '$FName', '$MName', '', '', '', '', '', '', '');";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL	
}

function cancelJob($jobID) {
	global $conn;
	$sql = "update todo set status = 3 where id=$jobID and status <> 2;";
	mysqli_query($conn,$sql);
	//return T/F
}

function updateJob($ID, $Name, $sID, $FName, $MName, $Income_status, $Note, $T_admit, $S_admit, $Amount, $S_note, $P_admit) {
	global $conn;
	if ($ID == -1) {
		addJob($ID, $Name, $sID, $FName, $MName, $Income_status, $Note, $T_admit, $S_admit, $Amount, $S_note, $P_admit);
	} else {
		$sql = "update apply_content set Name, sID, FName, MName, Income_status, Note, T_admit, S_admit, Amount, S_note, P_admit where ID=$ID;";
		mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	}
}

function getJobList($userName, $role) {
	global $conn;
	if ($role==0) {
		$sql = "select * from apply_content where sID=$userName;";
	}
	else{
		$sql = "select * from apply_content where 1;";
	}
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	return $result;
}

function getJobDetail($ID) {
	global $conn;
	if ($ID == -1) { //-1 stands for adding a new record
		$rs=[
			"id" => -1,
			"title" => "new title",
			"content" => "job description",
			"urgent" => "一般"
		];
	} else {
		$sql = "select id, title, content, urgent from todo where id=$id;";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		$rs=mysqli_fetch_assoc($result);
	}
	return $rs;
}

function setFinished($jobID) {
	global $conn;
	$sql = "update todo set status = 1, finishTime=NOW() where id=$jobID and status = 0;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
	
}

function rejectJob($jobID){
	global $conn;
	$sql = "update todo set status = 0 where id=$jobID and status = 1;";
	mysqli_query($conn,$sql);
}

function setClosed($jobID) {
	global $conn;
	$sql = "update todo set status = 2 where id=$jobID and status = 1;";
	mysqli_query($conn,$sql);
}


?>