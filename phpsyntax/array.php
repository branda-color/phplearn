<?php

$arr = [1, 2, 3, 4, 5, 6, 7];
var_dump($arr);

$arr1 = array(1, 2, 3, 4, 5, 6);

var_dump($arr1);

$arr2 = ['3' => 1, 2, 3, 3, 3, 3]; //從3開始

var_dump($arr2);


//關聯陣列
$arr3 = [
    'java' => '大數據',
    'html' => 123,
    'php' => 'mysql'
];

var_dump($arr3);

//2維陣列

$arr4 = [
    'php' => [
        'html',
        'js',
        'css'
    ],
    'java'
];

var_dump($arr4);

$arr5 = ['a', 'b', 'c', 'd'];

echo '<br>' . $arr5[0];

//添加新的陣列
$arr5[4] = '新添加';

var_dump($arr5);

//刪除一個元素
unset($arr5[2]);

$arr6 = [1, 2, 3, 4, 5, 6, 7, 8, 9];

echo count($arr6); //得到陣列大小

$number = count($arr6);

$sum = 0;
for ($i = 0; $i < $number; $i++) {
    $sum += $arr6[$i];
}

echo $sum;

$arr7 = ['a' => 'a', 'b' => 'b', 'c' => 'c'];

echo $arr7['a'];


//迴圈拿出每個陣列內的東西
foreach ($arr7 as $key => $value) {
    echo $key . '-----' . $value . '<br>';
}

$arr8 = ['a', 'b', 'c', 'e'];

list($a, $b, $c) = $arr8; //只對一維陣列有效

echo $a, $b, $c;


/*php 內建超全域陣列

$_GET $_POST $_REQUEST $_SERVER $_SESSION $_COOKIE*/
