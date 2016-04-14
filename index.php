<?php 
session_start();
$counter=1;  

if( !isset($_COOKIE['myCounter']) ){
  setcookie("myCounter", $counter, time()+30*24*3600 );
}
else{
   $counter = (int)$_COOKIE['myCounter']; 
  if ( $_SESSION['setCounter'] == TRUE )   
    setcookie("myCounter", ++$counter, time()+30*24*3600);  
}

$_SESSION['setCounter']=FALSE;
$msg = "";
session_start(); 
if ($_SESSION["login_session"] != true)
   header("Location: log.php");  
else
   $msg = "歡迎使用者". $_SESSION["username"] ."回來!<br/>";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>網站首頁</title>
</head>
<body>
<?php
echo "使用者歡迎回來，你上次登入的時間為".$result[0]. ""，你登入的次數為"";
?>

<?php echo $msg; ?>
</body>
</html>