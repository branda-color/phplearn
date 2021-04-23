<?php

/*
抽象的抽象類->接口

interface:接口/implement實現

接口中的方法都是抽象方法，所以abstract可以省略不寫
接口中的方法必須是public
接口中只能規定方法不能寫屬性(接口中可以寫常量)
一個類可以實現多個接口，中間用逗號隔開
一個類可以先繼承父類，然後再實現接口
接口可以繼承接口，但是裡面的方法都要實現




*/



abstract class Test
{
    abstract function test1();
    abstract function test2();
}


interface Eat
{
    function eatrice();
}


interface Jump extends Demo
{
    function jump();
}

interface Demo
{
    function demo();
}



class Person implements Eat, Jump
{

    function jump()
    {
        echo '我會跳';
    }
    function eatrice()
    {
        echo '我在吃飯';
    }

    function demo()
    {
        echo '測試';
    }
}
