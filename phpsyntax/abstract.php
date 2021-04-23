<?php


/*

1.抽象類不能實例化對象
2.抽象類存在是為了讓子類繼承
3.抽象類的定義和普通類定義一樣，不過前面多加了關鍵字"abstract"
4.抽象類裡面一般要有抽象方法，抽象方法是用來讓子類實現的，而且子類必須實現不然就會報錯
5.抽象方法裡面只能有public或protected
6.抽象方法裡面如果有參數，參數有默認值那麼實現該方法的時候參數和默認值也都要有
7.抽象類可以繼承抽象類，子類在實現的時候所有的抽象方法都得實現


 */

abstract class shin
{
    abstract public function jump();
}



abstract class Person extends shin
{
    public $name;
    public function say()
    {
        echo '說出自己得名字';
    }

    abstract public function test();
}

class Man extends Person
{
    public function test()
    {
        echo '吃東西';
    }
    public function jump()
    {
        echo '跳跳跳';
    }
}
