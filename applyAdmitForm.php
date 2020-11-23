<?php
session_start();
if (! isset($_SESSION['uID']) or $_SESSION['rID']== 0) {
    header("Location: loginForm.php");
} 

require("todoModel.php");

$ID = (int)$_GET['ID'];
$rs = getJobDetail($ID);
if (! $rs) {
    echo "no data found";
    exit(0);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<h1>Admit Apply</h1>
<form method="post" action="applyAdmitControl.php?ID=<?php echo $ID ?>">
  <table border="1" width="auto" style="text-align: center;">
      <tr>
        <td>學生基本資料</td>
        <td>學生姓名 :<input name="Name" type="text" value=<?php echo $rs['Name']?> readonly/>
            學號 :<input name="sID" type="text" value=<?php echo $rs['sID']?> readonly/>
        </td>
      </tr>
      <tr>
        <td>家庭狀況</td>
        <td>父 :<input name="FName" type="text" value=<?php echo $rs['FName']?> readonly/><nsbp>母 :<input name="MName" type="text" value=<?php echo $rs['MName']?> readonly/></td>
      </tr>
      <tr>
        <td>申請補助總類 :</td>
        <td>
          <?php
            switch($rs['Income_status']) {
              case 0 :
                echo "低收入戶";
                break;
              case 1 :
                echo "中低收入戶";
                break;
              case 2 :
                echo "家庭突發因素";
                break;
            }
          ?>
        </td>
      </tr>
      <tr>
        <td>
            導師訪視說明 :
        </td>
        <td>
          <?php
            if($_SESSION['rID']==1){
              echo '<input type="text" name="Note" />';
            }
            else{
              echo '<input type="text" name="Note" readonly />';
            }
          ?>
        </td>
        </tr>
        <tr>
        <td>
            導師簽章
        </td>
        <td>
        <?php
            if($_SESSION['rID']==1){
              echo '<input type="radio" name="T_admit" value = "1" ><label>同意</label>';
            }
            else{
              echo '<input type="radio" name="T_admit" value = "1" checked disabled ><label>同意</label>';
            }
          ?>
        </td>
      </tr>
      <tr>
        <td>秘書審核 :</td>
        <td>
          <?php
          switch ($_SESSION['rID']){
            case 1:
              echo '<input type="radio" name="S_admit" value = "0" checked disabled ><label></label>准於補助';
              echo '<input type="text" name="Amount" readonly />元</th>';
            break;
            case 2:
              echo '<input type="radio" name="S_admit" value = "1" /><label></label>准於補助';
              echo '<input type="text" name="Amount" />元</th>';
            break; 
            case 3:
              echo '<input type="radio" name="S_admit" value = "0" checked disabled ><label></label>准於補助';
              echo '<input type="text" name="Amount" readonly />元</th>';
            break;
          }
          ?>
        </td>
      </tr>
      </tr>
      <tr>
        <td>秘書審查意見 :</td>
        <td>
        <?php
            if($_SESSION['rID']==2){
              echo '<input  type="text" name="S_note" />';
            }
            else{
              echo '<input  type="text" name="S_note" readonly/>';
            }
        ?>
        </td>
      </tr>
      <tr>
        </td>
        <td>校長簽章</td>
        <?php
            if($_SESSION['rID']==3){
              echo '<td><input type="radio" name = "P_admit" value = "1" ><label>同意</label></td>';
            }
            else{
              echo '<td><input type="radio" name = "P_admit" value = "0" checked disabled><label>同意</label></td>';
            }
        ?>
      </tr>
  </table>
  <br/>
  <input type="submit">
</form>
</body>
</html>
