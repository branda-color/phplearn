<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員留言管理</title>
</head>

<body>
    <a href="manager.php">回到管理者頁面</a>
</body>

</html>

<?php


session_start();
if ($_SESSION['flag'] == 1) {
    echo '歡迎登入，root';
    echo "<a href=index.php>登出</a>";
} else {
    echo '很抱歉，非管理者無法登入';
    echo "<a href=index.php>回到登入頁面</a>";
    die();
}

include('mysql.ini.php');

$sql = "select b.name,m.id,m.content,m.mdate from message as m join member as b  on m.name=b.id";

$result = mysql_query($sql);

echo '<br>總共有' . mysql_num_rows($result) . '留言';


echo "<table width=100% broder=2 align=center cellpadding=0 cellspacing=0 >";
echo "<tr bgcolor=#0033FF>
    <td>留言編號</td>
    <td>留言內容</td>
    <td>留言會員</td>
    <td>留言日期</td>
    <td>刪除</td>";


while ($row = mysql_fetch_array($result)) {
    echo "<tr bgcolor=#66FF66>
    <td>$row[1]</td>
    <td>$row[2]</td>
    <td>$row[0]</td>
    <td>$row[3]</td>
    <td><a href=managemessage.php?del=$row[0]>刪除</a></td>
    </tr>";
}


//刪除選項
if (@$_GET['del']) {
    $deletem = $_GET['del'];
    $s = "delete from message where id=$deletem";
    mysql_query($s);
    echo '你成功刪除:' . mysql_affected_rows();
}
