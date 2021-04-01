<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>主頁</title>
</head>

<body>
    <?php
    session_start();
    $_SESSION['flag'] = '0';
    ?>
    <form action="message.php" method="GET" name="form1">
        會員登入<br>
        輸入帳號:<input type="text" name="account" maxlength="20" size="20"><br>
        輸入密碼<input type="password" name="password" maxlength="20" size="20"><br>
        <p></p>
        <input type="submit" value="登入">
        <input type="reset">
    </form>

    <p></p>
    <p><a href="newmember.php">註冊</a></p>

</body>

</html>