<?php

echo time();

$time = time();


//利用date函數設定日期格式
echo '<br>' . date('Y-m-d H:i:s', $time);

echo '<br>' . date('Y-m-d', $time);

//設定時區
date_default_timezone_set('Asia/Taipei');

echo '<br>' . date('Y-m-d H:i:s', $time);
