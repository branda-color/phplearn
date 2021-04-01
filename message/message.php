<?php

include('mysql.ini.php');
session_start();
if (@$_GET['account']) {
    $_SESSION['id'] = $_GET['account'];
    $_SESSION['password'] = $_GET['password'];
}

$sql = "select * from member where account='$_SESSION[id]' and password='$_SESSION[password]'";

$result = mysql_query($sql);

if (!$row = mysql_fetch_array($result)) {

    echo '登入失敗';
    echo "<a href=index.php>回到登入畫面</a>";
    die();
}
if (@$_GET['account'] == 'root') {

    session_start();
    $_SESSION['flag'] = '1';

    header('location:manager.php');
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言板</title>
</head>

<body>
    <?php


    echo '<br>你好' . $row['name'] . '請留言';
    echo "<br><a href=index.php>回到登入畫面</a><br>";
    $_SESSION['no'] = $row[0];
    echo "<a href=modifymember.php>修改個人資料</a>";

    ?>


    <form action="addmessage.php" method="POST" name="form2">
        <p>留言內容</p>

        <textarea name="message" rows="10" cols="60">
        </textarea>
        <input type="hidden" name="no" value=<?php echo "$row[id]"; ?>>
        <input type="submit" value="送出留言">
        <input type="reset" value="重寫">

    </form>


    <?php
    $sql = "select b.name,m.id,m.content,m.mdate from message as m join member as b  on m.name=b.id where m.name=$_SESSION[no]";

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
    ?>


</body>

</html>