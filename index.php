<?php

header('Content-Type: text/html; charset=utf-8');
session_start();

$dbServer = "localhost";
$dbUser = "root";
$dbPass = "123456";
$dbName = "three";

$conn = @mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);

if (mysqli_connect_errno($conn))
  die("無法連線資料庫伺服器");

mysqli_set_charset($conn, "utf8");

$tbPhoto = 'photo';
$errMsg='';
$usrMsg='';

elseif ( isset($_POST['doupload']) && $_POST['doupload'] == 1 ) {
 foreach ($_FILES["picture"]["name"] as $key => $name) {
  $filename_tmp = $_FILES["picture"]["tmp_name"][$key];
    if ( empty($name) ) continue;
    $ext = strtolower(strrchr($name, '.')); 
    $filename = uniqid(). $ext;
   $size = $_FILES['picture']['size'][$key];
    $dest=$dirPhoto.$filename;
      date_default_timezone_set('Asia/Taipei');
	  $date = date("Y-m-d H:i:s"); 

      $stmt = mysqli_prepare($conn, 
                "INSERT $uploadurl (`name`,`filename`,`size`,`date`)
                 VALUES (?, ?, ?, ?)");
      mysqli_stmt_bind_param($stmt, 'ssis', 
				$name, $filename, $size, $date);
      $result = mysqli_stmt_execute($stmt);         
      
      if ($result){
          $usrMsg.="$name 上傳成功<br>";
          
          unset($_SESSION['totalRows']);
      }
      else {
        $errMsg.="無法寫入資料庫, $name 上傳失敗<br>";
      
        unlink($dest);
      }
    }
    else {
      $errMsg.="$name 上傳失敗<br>";
    }
  }
}
//點擊率
session_start();

$counter=1;
if(isset($_COOKIE['counter']) ){
  if ( isset($_SESSION['entered']) ) 
    $counter = $_COOKIE['counter'];
  else 
    $counter = $_COOKIE['counter'] + 1;    
}
setcookie("counter", $counter, time()+30*24*3600 );

echo "(使用 SESSION)<br>";
echo "這是您第 $counter 次進入本站";

$_SESSION['entered']=TRUE;

//上傳時間
session_start();	

date_default_timezone_set('Asia/Taipei');
	  $date = date("Y-m-d H:i:s"); 

if ( isset($_SESSION['uploadTime']) ){

  $upload = time()-$_SESSION['uploadTime'];
}
?>



<html>
<head>
	<title></title>
</head>
<body>
<?php
echo " <tr><td>原始網址<a href='$longUrl'>$longUrl</a></td><td>短網址<a href='$shortUrl'>$shortUrl</a></td><td>點擊率$counter</td><td>上傳時間$date("H 時 i 分 s 秒",$upload)</td></tr>";
echo " <tr><td>原始網址<a href='$longUrl'>$longUrl</a></td><td>短網址<a href='$shortUrl'>$shortUrl</a></td><td>點擊率$counter</td><td>上傳時間$date("H 時 i 分 s 秒",$upload)</td></tr>";
echo " <tr><td>原始網址<a href='$longUrl'>$longUrl</a></td><td>短網址<a href='$shortUrl'>$shortUrl</a></td><td>點擊率$counter</td><td>上傳時間$date("H 時 i 分 s 秒",$upload)</td></tr>";


?>
</body>
</html>