
<?php



//設定網頁使用UTF8編碼
header('Content-Type:text/html; charset=utf-8');


//建立資料庫連線
if (!mysql_connect("localhost", "root", "")) {
    die("無法連線資料庫");
} else {

    echo ('連線成功');
}

//設定編碼
mysql_query("SET NAMES utf8");

//選擇資料庫
if (!mysql_select_db('blog')) {
    die("無法連線到資料庫");
} else {
    echo '成功連線到資料庫';
}


//選擇資料表
$sql = 'select* from guestbook';

$result = mysql_query($sql);
/*
//資料表放到陣列內
$row = mysql_fetch_array($result);

//用欄位名稱
echo '<br>留言編號';
echo $row['留言編號'];
echo $row['姓名'];
echo $row['留言'];
echo $row['日期時間'];

//使用index編號
$row = mysql_fetch_array($result);

echo '<br>留言編號';
echo $row[0];
echo $row[1];
echo $row[2];
echo $row[3];

*/




echo '<br>總共有' . mysql_num_rows($result) . '筆資料';

//抓取回傳資料

while ($row = mysql_fetch_array($result)) {
    echo "<table width = 500 border=1 cellspacing=0 cellpadding=0 >
<tr>
    <td>$row[0]<td>
    <td>$row[1]<td>
    <td>$row[2]<td>
    <td>$row[3]<td>
<tr>
</table>";
}
