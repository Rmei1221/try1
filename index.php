<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>計算機</title>
  <style>
    body{text-align:center}
    form{font-size:large;width:240}
  </style>
</head>
<body>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="num1" size="3"/> +
    <input type="text" name="num2" size="3"/> =？
    <br />
    <input type="text" name="num3" size="3"/> -
    <input type="text" name="num4" size="3"/> =？
    <br />
    <input type="text" name="num5" size="3"/> *
    <input type="text" name="num6" size="3"/> =？
    <br />
    <input type="text" name="num7" size="3"/> /
    <input type="text" name="num8" size="3"/> =？
    <br />
    <input type="submit" value="輸入完畢, 按我"/>
    <input type="reset"  value="全部清除"/>
  </form>

<?php

  function add(){
  //計算加法
  if ( $_POST['num1'] && $_POST['num2'] ) {
     echo "{$_POST['num1']} + {$_POST['num2']} = ";
     echo ($_POST['num1'] + $_POST['num2']);
     echo '<br />';
  }
}
  function less(){
  //計算減法
  if ( $_POST['num3'] && $_POST['num4'] ) {
     echo "{$_POST['num3']} - {$_POST['num4']} = ";
     echo ($_POST['num3'] - $_POST['num4']);
  }
}
  function multiply(){
  //計算乘法
  if ( $_POST['num5'] && $_POST['num6'] ) {
     echo "{$_POST['num5']} * {$_POST['num6']} = ";
     echo ($_POST['num5'] * $_POST['num6']);
  }
}
  function except(){
  //計算除法
  if ( $_POST['num7'] && $_POST['num8'] ) {
     echo "{$_POST['num7']} / {$_POST['num8']} = ";
     echo ($_POST['num7'] / $_POST['num8']);
  }
}
  function b3(){


    
  }

?>
</body>
</html>
