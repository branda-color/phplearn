<?php
 
//連接mongodb
 $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

 // 插入数据
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert(['x' => 1, 'name'=>'菜鸟教程', 'url' => 'http://www.runoob.com']);
$bulk->insert(['x' => 2, 'name'=>'Google', 'url' => 'http://www.google.com']);
$bulk->insert(['x' => 3, 'name'=>'taobao', 'url' => 'http://www.taobao.com']);
//$manager->executeBulkWrite('test.sites', $bulk);


//從第幾個開始查詢
$filter = ['x' => ['$gt' => 0]];

//排列情況
$options = [
    'projection' => ['_id' => 0],//不顯示id所以設為0
    'sort' => ['x' => -1],//降冪排列
];

// 查询数据
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('test.sites', $query);

foreach ($cursor as $document) {
    print_r($document);
}


