<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增加會員資料</title>
</head>

<body>
    <?php
    include('mysql.ini.php');


    //檢查新增帳號是否重複
    $sqlcheck = "select * from member where account='$_POST[id]'";
    $result = mysql_query($sqlcheck);
    if (mysql_fetch_array($result)) {

        echo '帳號已存在，請選擇其他帳號<br>';
        echo "<a href=newmember.php>回到登入畫面</a>";
        die();
    }





    //定義存放上傳檔案的目錄
    $upload_dir = './upload/';

    //解決中文檔案上傳編碼問題
    $file_name = iconv('utf-8', 'big5', $_FILES["gif"]["name"]);

    //如果錯誤代碼>0上傳失敗
    if (@$_FILES['gif']['error'] > 0) {

        echo "檔案上傳失敗<br />";
        echo "Error: " . $_FILES['gif']['error'];
    } else if (file_exists($upload_dir . $file_name)) {
        echo "檔案已存在，請勿重複上傳相同檔案";
    } else {
        //將暫存檔搬移到上傳目錄下，並改為原檔名
        move_uploaded_file($_FILES['gif']['tmp_name'], $upload_dir . $file_name);
        //顯示上傳成功訊息
        echo '上傳成功....';
    }



    $postid = $_POST['id'];
    $postpassword = $_POST['password'];
    $postname = $_POST['name'];
    $posttel = $_POST['tel'];
    $postaddress = $_POST['address'];
    $newfile = $_FILES["gif"]["name"];


    $sql = "insert member(account,password,name,tel,address,gif,memdate) values('$postid ','$postpassword','$postname','$posttel','$postaddress','$newfile',sysdate()) ";

    echo $sql;

    $result = mysql_query($sql);
    if (mysql_affected_rows() >= 1) {
        echo '新增成功';
    }





    ?>

</body>

</html>