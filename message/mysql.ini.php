<?php

//設定網頁使用UTF8編碼
header('Content-Type:text/html; charset=utf-8');

//設定資料庫連線
$dbServer = "localhost";
$dbName = "message";
$dbUser = "root";
$dbPass = "";

//連線資料庫伺服器
if (!mysql_connect($dbServer, $dbUser, $dbPass)) {
    die("無法連線資料庫伺服器");
}

//設定連線的文字集與校對UTF8編碼
mysql_query("SET NAMES utf8");

//選擇資料庫
if (!mysql_select_db($dbName)) {
    die("無法使用資料庫");
}
