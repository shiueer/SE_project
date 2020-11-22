<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>補助經費申請表</h1>
<form method="POST" action="applyAddControl.php">
<table border="1" width="auto" style="text-align: center;">
      <tr>
        <td>學生基本資料</td>
        <td>學生姓名 :<input name="Name" type="text" />
            學號 :<input name="sID" type="text" />
        </td>
      </tr>
      <tr>
        <td>家庭狀況</td>
        <td>父 :<input name="FName" type="text" /><nsbp>母 :<input name="MName" type="text" /></td>
      </tr>
      <tr>
        <td>申請補助總類 :</td>
        <td><input type="radio" name = "Income_status" value = "0" checked disabled><label>低收入戶</label>
            <input type="radio" name = "Income_status" value = "1" checked disabled><label>中低收入戶</label>
            <input type="radio" name = "Income_status" value = "2" checked disabled><label>家庭突發因素</label>
        </td>
      </tr>
      <tr>
        <td>
            導師訪視說明 :
        </td>
        <td>
            <input name="title" type="text" id="title" readonly />
        </td>
        </tr>
        <tr>
        <td>
            導師簽章
        </td>
        <td>
            <input type="radio" name = "role" value = "2" checked disabled><label>同意</label>
        </td>
      </tr>
      <tr>
        <td>秘書審核 :</td>
        <td>
          <input type="radio" name = "role" value = "2" checked disabled ><label></label>准於補助
          <input name="title" type="text" id="title" readonly />元</th>
        </td>
      </tr>
      </tr>
      <tr>
        <td>秘書審查意見 :</td>
        <td>
        <input name="title" type="text" id="title" readonly/>
      </tr>
      <tr>
        </td>
        <td>校長簽章</td>
        <td><input type="radio" name = "role" value = "2" checked disabled><label>同意</label></td>
      </tr>
    </thead> 
</table>
<br/>
<input type="submit">
</form>
</body>
</html>