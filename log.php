<?php
session_start();  // 啟用交談期
$username = "";
$password = "";
$email = "";
$phone ="";
$msg="";

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
   
   $sql = "SELECT * FROM users WHERE password='";
   $sql.= $password."' AND username='".$username."'";
   $rows = mysql_query($sql); 
   
   
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>登入</title>
</head>
<body>

<form action="log.php" method="post">
<table>
 <tr>
   <td>使用者名稱 : </td>
   <td><input type="text" name="Username" 
             size="19" maxlength="10"></td>
 </tr>
 <tr>
   <td>使用者密碼 : </td>
   <td><input type="password" name="Password"
              size="20" maxlength="10"></td>
 </tr>
</table><br/>
<input type="submit" value="登入網站"><br/><br/>
<a href="index.php">登入網站</a>


</form>
<p><?php echo $msg; ?></p>
</body>
</html>