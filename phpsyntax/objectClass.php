<?php

//類vs.對象(類是一個抽象概念，對象才是具體事物)

/*類的簡單使用
屬性==>變量
行為==>方法(函數)

人類{
    年齡;
    吃飯
}

*/

class Person //類名尊崇大駝峰原則
{
    public $age; //屬性==>變量
    public function eat()
    { //行為==>方法
        echo '我在吃飯';
    }
}


//創建方式

//通過類名
$xioaming = new Person();
var_dump($xioaming);

//通過字符串創建
$name = 'Person';
$yuyu = new $name;
var_dump($yuyu);

//調用裡面的函數不需要加$
var_dump($xioaming->age);

$xioaming->eat();

//賦予變量值
$xioaming->age = 18;

var_dump($xioaming->age);

class Person2
{
    public $name;
    public $age;
    public function __construct($name, $age) //構造方法(自動調用)
    {
        //echo '小樣,調用我了吧';
        //$this代表當前對象
        $this->name = $name;
        $this->age = $age;
    }
    public function test()
    {
        echo '今天天氣真好<br>';
    }
    public function test2()
    {
        $this->test();
        echo '我想出去玩<br>';
    }
}

$ming = new Person2('小名', 20);

var_dump($ming);

$niu = new Person2('小牛', 18);
$niu->test2();
