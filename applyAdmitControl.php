<?php
session_start();
require("todoModel.php");
switch($_SESSION['rID']){
    case 1:
        $Note=mysqli_real_escape_string($conn,$_POST['Note']);
        $T_admit=mysqli_real_escape_string($conn,$_POST['T_admit']);
        $ID = $_GET["ID"];
        updateJob($ID, $Note, $T_admit, "", "", "", "", $_SESSION['rID']);
    break;
    case 2:
        $S_admit=mysqli_real_escape_string($conn,$_POST['S_admit']);
        $S_note=mysqli_real_escape_string($conn,$_POST['S_note']);
        $Amount=mysqli_real_escape_string($conn,$_POST['Amount']);
        $ID = $_GET["ID"];
        updateJob($ID, "", "", $S_admit, $S_note, $Amount, "", $_SESSION['rID']);
    break;
    case 3:
        $P_admit=mysqli_real_escape_string($conn,$_POST['P_admit']);
        $ID = $_GET["ID"];
        updateJob($ID, "", "", "", "", "", $P_admit, $_SESSION['rID']);
    break;
}

header("Location: todoListView.php?m=$msg");
?>