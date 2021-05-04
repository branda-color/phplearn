<?php

class Luntai
{
    function roll()
    {
        echo '輪胎在滾動<br>';
    }
}


class BMW
{

    protected $luntai;

    //注入方式
    function __construct($luntai)
    {
        $this->luntai = $luntai;
    }
    function run()
    {
        //創建自己的輪胎降低耦合度(注入)
        $this->luntai->roll();
        echo '開著寶馬吃烤串<br>';
    }
}

class Container
{
    //存放綁定的纇-->可以存放多個
    static $register = [];

    //綁定函數-->綁定的名字/閉包-->可以創建哪些對象
    static function bind($name, Closure $col) //Closure 閉包:定義在函數內，能夠讀取其他函數內部變量的函數
    {
        self::$register[$name] = $col;
    }

    //創建對象函數(根據名來創建對象)根據創建對象的方法來直接執行將對向創建出來
    static function make($name)
    {
        $col = self::$register[$name];
        return $col();
    }
}


/*
容器類似冰箱的概念，需要內部的東西，直接從裡面拿取即可。
將服務註冊(bind)到內部，需要時直接拿取(make)就好了。
 */

//先綁定輪胎
Container::bind('luntai', function () {
    return new Luntai(); //閉包保存創建對象的方法
});
//綁定創建寶馬的方法
Container::bind('bmw', function () {
    return new BMW(Container::make('luntai'));
});

$bmw = Container::make('bmw');
$bmw->run();
