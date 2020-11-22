<?php
require_once("dbconnect.php");

function checkUserIDPwd($userName, $passWord) {
    global $conn;
    $userName = mysqli_real_escape_string($conn,$userName);
    $isValid = false;

    $sql = "SELECT Password,LoginID FROM user WHERE LoginID='$userName'";
    if ($result = mysqli_query($conn,$sql)) {
        if ($row=mysqli_fetch_assoc($result)) {
            if ($row['Password'] == $passWord) {
                //keep the user ID in session as a mark of login
                $_SESSION['uID'] = $row['LoginID'];
                //provide a link to the message list UI
                $isValid = true;
            }
        }
    }
    return $isValid;
}

function getUserRole($userName) {
    global $conn;
    $sql = "select Role from user where LoginID=$userName";
    $result = mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
    $row = mysqli_fetch_assoc($result);
    return $row['Role'];
}


function getUserPwd() {
    global $conn;
    $sql = "select * from user;";
    $result = mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
    return $result;
}

function setUserPassword($userName){
        return false;
}

?>