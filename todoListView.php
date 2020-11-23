<?php
session_start();
if (! isset($_SESSION['uID']) or $_SESSION['uID']<="") {
    header("Location: loginForm.php");
}    
require("todoModel.php");
$result=getJobList($_SESSION['uID'],$_SESSION['rID']) or die("DB Error: Cannot retrieve message.");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Apply System</title>
</head>

<body>

<h1>My Apply List !!</h1>
<hr />
<a href="loginForm.php"><button>OUT</button></a> | 
<?php
if($_SESSION['rID'] == 0){
    echo "<a href='applyAddForm.php?id=-1'><button>Add Apply</button></a> <br>";
}
else{
    echo "<br/>";
}
?>
<br/>
<table width="auto" border="1" style="text-align: center;">
  <tr>
    <td>No.</td>
    <td>姓名</td>
    <td>學號</td>
    <td>父親姓名</td>
    <td>母親姓名</td>
    <td>申請補助種類</td>
    <td>導師訪視說明</td>
    <td>導師同意</td>
    <td>秘書同意</td>
    <td>補助金額</td>
    <td>審查意見</td>
    <td>校長同意</td>
  </tr>
<?php
    while (    $rs=mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $rs['ID'] . "</td>";
      echo "<td>" . $rs['Name'] . "</td>";
      echo "<td>" . $rs['sID'] , "</td>";
      echo "<td>" . $rs['FName'] ,"</td>";
      echo "<td>" . $rs['MName'] ,"</td>";
      if($rs['Income_status'] == 0){
        echo "<td>低收入戶</td>";
      }
      if($rs['Income_status'] != 0){
        if($rs['Income_status'] == 1){
          echo "<td>中低收入戶</td>";
        }
        else{
          echo "<td>家庭突發因素</td>";
        }
      }
      echo "<td>" . $rs['Note'] ,"</td>";
      if($rs['T_admit'] == 1){
        echo "<td bgcolor = #72fb6f>通過</td>";
      }
      else{
        echo "<td bgcolor = #fe6158>未通過</td>";
      }
      if($rs['S_admit'] == 1){
        echo "<td bgcolor = #72fb6f>通過</td>";
      }
      else{
        echo "<td bgcolor = #fe6158>未通過</td>";
      }
      echo "<td>" . $rs['Amount'] ,"</td>";
      echo "<td>" . $rs['S_note'] ,"</td>";
      if($rs['P_admit'] == 1){
        echo "<td bgcolor = #72fb6f>通過</td>";
      }
      else{
        echo "<td bgcolor = #fe6158>未通過</td>";
      }
      if($_SESSION['rID']!=0){
        echo "<td><a href='applyAdmitForm.php?ID={$rs['ID']}'><button>檢閱申請</button></a></td>";
      }
    }
?>
</table>
</body>
</html>
