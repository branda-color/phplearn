<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言板管理系統</title>
    <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
    <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="jqueryui/style.css">
</head>
<script>
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
    $(function() {
        $("#datepicker1").datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>

<body>

    <!-- 查詢 -->
    <form action="mysqlsearch.php" method="GET" name="form1">
        請輸入留言編號:<br>
        <input type="text" name="no" maxlength="6" size="8">
        <p></p>
        <input type="submit" value="查詢">
        <input type="reset">
    </form>
    <!-- 新增 -->
    <form action="mysqlsearch.php" method="GET" name="form2">
        新增留言:<br>
        留言名稱:<input type="text" name="name" maxlength="20" size="20"><br>
        留言內容:<input type="text" name="content" maxlength="20" size="20"><br>
        留言日期:<input type="text" name="date" maxlength="20" size="20" id="datepicker"><br>
        <p></p>
        <input type="submit" value="新增">
        <input type="reset">
    </form>
    <!-- 修改 -->
    <?php
    include('mysql.ini.php');
    $sql = "select 留言編號 from guestbook";
    $result = mysql_query($sql);
    ?>
    <br>
    請輸入留言編號:
    <form action="mysqlsearch.php" method="GET" name="form3">
        <select name="blogno" size="1">
            <?php
            while ($row = mysql_fetch_array($result)) {
                echo " <option value = $row[0]>$row[0] </option>";
            }
            ?>

        </select>
        <input type="submit" value="送出查詢">
        <input type="reset">
        <br>
    </form>

    <?php
    if ($_GET['blogno']) {
        $blogno = $_GET['blogno'];
        $sql = "select * from guestbook where 留言編號=$blogno";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
    }
    ?>
    <form action="mysqlsearch.php" method="GET" name="form4">
        留言編號:<input type="hidden" name="number" maxlength="20" size="20" <?php echo "value='$row[0]'"; ?>><br>
        留言名稱:<input type="text" name="nameupdate" maxlength="20" size="20" <?php echo "value='$row[1]'"; ?>><br>
        留言內容:<input type="text" name="contentupate" maxlength="20" size="50" <?php echo "value= '$row[2]'"; ?>><br>
        留言日期:<input type="text" name="dateupdate" maxlength="20" size="20" id="datepicker1" <?php echo "value= '$row[3]'"; ?>><br>
        <p></p>
        <input type="submit" value="更新">
        <input type="reset">

    </form>
    <?php
    //更新資料
    $blogno = $_GET['blogno'];
    $name = $_GET['nameupdate'];
    $content = $_GET['contentupate'];
    $date = $_GET['dateupdate'];
    $update = $_GET['number'];
    if ($_GET['nameupdate']) {
        $sql = "update guestbook set 姓名='$name',留言='$content',日期時間='$date' where 留言編號=$update";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
    }
    ?>

</body>


</html>

<?php



//設定網頁使用UTF8編碼
header('Content-Type:text/html; charset=utf-8');


//新增選項
if ($_GET['name']) {

    $getname = $_GET['name'];
    $getcontent = $_GET['content'];
    $getdate = $_GET['date'];
    $sql = "insert guestbook(姓名,留言,日期時間) values('$getname','$getcontent','$getdate') ";
    $result = mysql_query($sql);
    if (mysql_affected_rows() >= 1) {
        echo '新增成功';
    }
}




//刪除選項
if ($_GET['del']) {
    $a = $_GET['del'];
    $s = "delete from guestbook where 留言編號=$a";
    mysql_query($s);
    echo '你成功刪除:' . mysql_affected_rows();
}

//查詢選項
$no = $_GET['no'];

if (!$_GET['no']) {
    $sql = "select  b.留言編號, b.姓名,b.留言,i.性別
    from guestbook as b join guestinfo as i on b.留言編號=i.留言編號";
} else {
    $sql = "select b.留言編號, b.姓名,b.留言,i.性別
    from guestbook as b join guestinfo as i on b.留言編號=i.留言編號 where b.留言編號=$no";
}


echo $sql;

$result = mysql_query($sql);


//查詢筆數

echo '<br>總共有' . mysql_num_rows($result) . '筆資料';


echo "<table width = 500 border=1 cellspacing=0 cellpadding=0 >";

echo "
<tr>
    <td>留言編號</td>
    <td>姓名</td>
    <td>留言</td>
    <td>性別</td>
    <td>刪除</td>
<tr>";



while ($row = mysql_fetch_array($result)) {
    echo "<table width = 500 border=1 cellspacing=0 cellpadding=0 >
<tr>
    <td>$row[0]<td>
    <td>$row[1]<td>
    <td>$row[2]<td>
    <td><a href=mysqlsearch.php?del=$row[0]>刪除</a></td>
<tr>
</table>";
}
