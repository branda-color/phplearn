<?php

header("content-type:text/html;charset=utf-8");

//定義存放上傳檔案的目錄
$upload_dir = './upload/';

//解決中文檔案上傳編碼問題
$file_name = iconv('utf-8', 'big5', $_FILES["UpFile"]["name"]);

//如果錯誤代碼>0上傳失敗
if ($_FILES['UpFile']['error'] > 0) {

    echo "檔案上傳失敗<br />";
    echo "Error: " . $_FILES['UpFile']['error'];
} else if (file_exists($upload_dir . $file_name)) {
    echo "檔案已存在，請勿重複上傳相同檔案";
} else {
    //將暫存檔搬移到上傳目錄下，並改為原檔名
    move_uploaded_file($_FILES['UpFile']['tmp_name'], $upload_dir . $file_name);
    //顯示上傳成功訊息
    echo '上傳成功....';
    echo '<br>原始檔名:' . $_FILES['UpFile']['name'];
    echo '<br>檔案類型:' . $_FILES['UpFile']['type'];
    echo '<br>檔案大小:' . $_FILES['UpFile']['size'];
    echo '<br>暫存檔名:' . $_FILES['UpFile']['tmp_name'];
}
