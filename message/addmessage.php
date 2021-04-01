<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增訊息</title>
</head>

<body>
    <?php
    include('mysql.ini.php');

    $postid = $_POST['no'];
    $postmessage = $_POST['message'];


    $sql = "insert message(name,content,mdate) values('$postid ','$postmessage',sysdate())";

    echo $sql;



    $result = mysql_query($sql);
    if (mysql_affected_rows() >= 1) {
        echo '新增成功';
    }

    ?>
    <a href="message.php">回到留言區</a>

</body>

</html>