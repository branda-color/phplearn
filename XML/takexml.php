<?php

$xml = simplexml_load_file("xmlfile.xml"); //讀取XML

foreach ($xml->depart as $a) {
    echo "$a->name <br>";
}

echo $xml->depart->name[0];


foreach ($xml->depart->children() as $depart) //迴圈讀取 depart標籤下的子標籤
{
    var_dump($depart); //輸出標籤的 XML資料
}


$result = $xml->xpath('/departs/depart/employees/employee/ name'); //定義節點
var_dump($result); //輸出節點


echo $xml->asXML(); //標準化 XML資料

$newxml = $xml->asXML(); //標準化 XML資料
$fp = fopen("newxml.xml", "w"); //開啟要寫入 XML資料的檔案
fwrite($fp, $newxml); //寫入 XML資料
fclose($fp); //關閉檔案


//var_dump($xml);  //輸出 XML