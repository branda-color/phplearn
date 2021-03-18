<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>上傳檔案表單</title>
</head>

<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        請輸入要上傳的檔案名稱:<br>
        <input type="file" name="UpFile">
        <p></p>
        <input type="submit" value="送出">
    </form>

</body>


</html>




<?php

//刪除檔案

if ($_GET['del']) {


    $file = iconv('utf-8', 'BIG5', $_GET['del']); //轉換編碼
    if (file_exists($file)) {
        unlink($file); //刪除資料                
    }
}


//讀取目錄後，將檔案與子目錄名稱放入$dirlist陣列
$dirlist = scandir('./upload/');

//逐筆讀取檔案與子目錄名稱

echo "你上傳的檔案<br>";

$j = count($dirlist);
//讀目前的不要跟目錄跟當前目錄所以從3開始
for ($i = 3; $i <= $j; $i++) {
    $name = iconv("BIG5", "UTF-8", $dirlist[$i - 1]);
    echo '<br>';
    echo "<a href=./upload/$name>$name</a>";
    echo "<a href=readlist.php?del=./upload/$name>刪除</a>";
    echo "<a href=modify.php?modify=$name>修改檔名</a>";
}





?>