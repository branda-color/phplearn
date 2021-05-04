<?php
$string = <<<XML
<?xml version='1.0'?>
<document responsecode="200">
  <result count="10" start="0" totalhits="133047950">
    <title>Test</title>
    <from>Jon</from>
    <to>Tsung</to>
  </result>
</document>
XML;

$xml = simplexml_load_string($string);
//print_r($xml);

$a = (string)$xml->result->title; // 強迫轉換成字串

echo $a;
//取得屬性的值
$b = (string)$xml->result->attributes()->totalhits;

echo $b;
//取得屬性的值
$result_attr = $xml->result->attributes();
//print_r($result_attr['count']);



foreach ($xml->children() as $layer_one) { //循环输出根节点

    print_r($layer_one); //查看节点结构

    echo '<br>';

    //抓特定的值(屬性)
    $c = (string)$layer_one['totalhits'];

    var_dump($c);

    //抓特定值(value)
    $d = (string)$layer_one->title;

    var_dump($d);


    foreach ($layer_one->children() as $layer_two) { //循环输出第二层根节点

        print_r($layer_two); //查看节点结构


    }
}
