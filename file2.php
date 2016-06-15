資料夾與檔案的屬性偵測
<br><br><br>
<?php

   $filename=__FILE__;
   if(is_file($filename))
    { echo "檔案存在："."$filename<br>";}
   else
    { echo "檔案不存在"."<br>";}

   if(is_dir(dirname(__FILE__)))
    { echo "資料夾存在：".dirname(__FILE__)."<br>";}
   else
    { echo "資料夾不存在"."<br>";}

   if (is_readable($filename))
    { echo '檔案可讀'."<br>";}
   else
    { echo '檔案不可讀'."<br>";}

   if (is_writeable($filename))
    { echo '檔案可寫'."<br>";}
   else
    { echo '檔案不可寫'."<br>";}

   if (is_executable($filename))
    { echo '檔案可執行'."<br>";}
  else
    { echo '檔案不可執行'."<br>";}

   if (is_uploaded_file($filename))
    { echo '經由表單上傳'."<br>";}
   else
    { echo '不經由表單上傳'."<br>";}
   echo getcwd();


?>