<?php
$username = "";
$password = "";
$email = "";
$phone ="";

if (isset($_POST["username"]))
   $username = $_POST["username"];
if (isset($_POST["password"]))
   $password = $_POST["password"];
if (isset($_POST["email"]))
   $email = $_POST["email"];
if (isset($_POST["phone"]))
   $phone = $_POST["phone"];

if ($username != "" && $password != "") {
   
   $db = mysql_connect("localhost","root","123456");
   mysql_select_db("login"); 
   $sql = "SELECT * FROM users ";
   $sql.= "WHERE username='".$username."'";
   $rows = mysql_query($sql);
   
   if (mysql_fetch_row($rows) == false) {
      $password = rand(100000, 999999); 
      $sql="INSERT INTO users(username,password,email)".
           " VALUES('".$username."','".$password."','".$email."')";
      mysql_query($sql) or die("SQL字串執行錯誤!<br>");
      $msg  = "使用者註冊成功!<br/>";
      $msg .= "使用者密碼: ".$password."<br/>";
      $body = "使用者名稱: ".$username."\r\n";
      $body.= "使用者密碼: ".$password."\r\n";
      
  
   mysql_close($db); 
}
?>

<html>
<head>
<meta charset="utf-8" />
<title>註冊</title>
</head>
<body>

<form action="reg.php" method="post">
<table>
  <tr>
    <td>使用者名稱: </td>
    <td><input type="text" name="username" 
               size="20" maxlength="15"></td>
  </tr>
  <tr>
    <td>使用者密碼 : </td>
   <td><input type="password" name="password"
              size="20" maxlength="10"></td>
  <tr>
    <td>電子郵件: </td>
    <td><input type="text" name="email"
               size="20" maxlength="30"></td>
  </tr>
  <tr>
    <td>使用者電話: </td>
    <td><input type="text" name="phone" 
               size="20" maxlength="15"></td>
  </tr>
</table><br/>
<input type="submit" value="註冊會員"><br/><br/>
<input type="reset" value="清除資料" />
<a href="log.php">登入網站</a>
</form>
</tr>
</table>
</body>
</html>