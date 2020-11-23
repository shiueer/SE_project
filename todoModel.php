<?php
require_once("dbconnect.php");

function addJob($ID, $Name, $sID, $FName, $MName, $Income_status, $Note, $T_admit, $S_admit, $Amount, $S_note, $P_admit) {
    global $conn;
    $sql = "INSERT INTO apply_content (ID, Name, sID, FName, MName, Income_status, Note, T_admit, S_admit, Amount, S_note, P_admit) values ('$ID','$Name', '$sID', '$FName', '$MName', '$Income_status', '', '', '', '', '', '');";
    mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL    
}

function updateJob($ID, $Note, $T_admit, $S_admit, $Amount, $S_note, $P_admit, $role) {
    global $conn;
    $ID = (int) $ID;
    switch($role) {
        case 1 :
            $sql = "UPDATE apply_content SET Note='$Note', T_admit=$T_admit WHERE ID=$ID;";
            mysqli_query($conn, $sql) or die("Update failed, SQL query error"); //執行SQL
            break;
        case 2:
            $sql = "UPDATE apply_content SET S_admit='$S_admit', Amount='$Amount', S_note='$S_note' WHERE ID=$ID;";
            mysqli_query($conn, $sql) or die("Update failed, SQL query error"); //執行SQL
            break;
        case 3:
            $sql = "UPDATE apply_content SET P_admit='$P_admit' WHERE ID=$ID;" ;
            mysqli_query($conn, $sql) or die("Update failed, SQL query error"); //執行SQL
            break;
    }
    
}

function getJobList($userName, $role) {
    global $conn;
    switch($role) {
        case 0 :
            $sql = "SELECT * FROM apply_content WHERE sID=$userName;";
            break;
        case 1 :
            $sql = "SELECT * FROM apply_content WHERE T_admit=0;";
            break;
        case 2 :
            $sql = "SELECT * FROM apply_content WHERE T_admit=1 AND S_admit=0;";
            break;
        case 3 :
            $sql = "SELECT * FROM apply_content WHERE T_admit=1 AND S_admit=1 AND P_admit=0;";
            break;
    }
    $result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
    return $result;
}

function getJobDetail($ID) {
    global $conn;
    $sql = "SELECT * FROM apply_content WHERE ID=$ID;";
    $result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
    $rs=mysqli_fetch_assoc($result);
    return $rs;
}


?>