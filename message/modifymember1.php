<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改資料</title>
</head>



<body>
    <?php
    include('mysql.ini.php');
    session_start();
    $account = $_POST['id'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];



    $sqlupdate = "update member set account='$account',password='$password',name='$name',tel='$tel',address='$address' where id=$_SESSION[no] ";

    echo $sqlupdate;
    $result = mysql_query($sqlupdate);

    if (mysql_affected_rows() > 0) {
        echo '更新成功<br>';
        echo "<a href=modifymember.php>回到修改資料</a>";
    } else {
        echo '更新失敗';
        echo "<a href=modifymember.php>回到修改資料</a>";
    }

    ?>

</body>

</html>