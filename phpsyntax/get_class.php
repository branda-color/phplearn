<?php

class study
{
    public $name;
    public $age;
    public $city;

    public function __construct($name, $age, $city)
    {
        $this->name = $name;
        $this->age = $age;
        $this->city = $city;
    }

    public function say()
    {
        echo "學生($this->name)的年齡是($this->age)他來自($this->city)市";
    }
}

class HdwStudy extends study
{
    public $number; //類中增加學生編號
    function video()
    {
        echo "($this->name)在收看視頻";
    }
}

$lisi = new study("李四", "31", "南京");
$lisi->say();

/**
 * get_object_vars($obj)獲得對象屬性，以關聯陣列返回
 */

print_r(get_object_vars($lisi));

$lisi1 = new HdwStudy("李四", "31", "南京");
$lisi1->say();

/**
 * get_parent_class($obj|class[string])找到對象的父類(傳入對向或者類名)
 */

echo get_parent_class('HdwStudy');

/**
 * is_subclass_of($obj,$class)判斷一個對象是不是參數2的子類所產生的?如果是返回1(true)
 */

echo is_subclass_of($lisi1, 'study');

interface chanel
{
    function edit();
    function add();
}

class arc implements chanel
{
    function edit()
    {
        echo "修改文章欄目";
    }

    function add()
    {
        echo "添加文章欄目";
    }
}

if (interface_exists('chanel')) {

    echo "接口以定義";
} else {
    echo "接口未定義";
}

/**
 * interface_exists檢測接口是否有定義
 */
echo interface_exists('chanel');
