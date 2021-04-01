<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改會員資料</title>
</head>

<body>


    <?php
    include('mysql.ini.php');
    session_start();

    $sql = "select * from member where id=$_SESSION[no]";

    echo $sql;

    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);



    ?>
    <form action="modifymember1.php" method="POST" name="form1">

        <p>請輸入會員資料: 或 <a href="index.php">回到登入畫面</a></p>
        <p>
            登入帳號:<input type="text" name="id" maxlength="20" size="20" value="<?php echo $row[1]; ?>"><br>
            登入密碼<input type="password" name="password" maxlength="20" size="20" value="<?php echo $row[2]; ?>"><br>
        <p></p>
        會員姓名:<input type="text" name="name" maxlength="20" size="20" value="<?php echo $row[3]; ?>"><br>
        會員電話:<input type="text" name="tel" maxlength="20" size="20" value="<?php echo $row[4]; ?>"><br>
        會員住址:<input type="text" name="address" maxlength="20" size="20" value="<?php echo $row[5]; ?>"><br>

        <p></p>
        <input type="submit" value="修改">
        <input type="reset">
        </p>
    </form>


</body>

</html>