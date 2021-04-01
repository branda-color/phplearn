<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者頁面</title>
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['flag'] == 1) {
        echo '歡迎登入，root';
        echo "<a href=index.php>登出</a>";
    } else {
        echo '很抱歉，非管理者無法登入';
        echo "<a href=index.php>回到登入頁面</a>";
    }
    ?>
    <a href="managemember.php">管理會員資料</a>
    <a href="managemessage.php">管理留言資料</a>


</body>

</html>