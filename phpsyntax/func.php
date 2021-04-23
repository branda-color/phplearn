<?php

function test($a)
{
    echo '今天天氣好' . $a . '<br>';
}

call_user_func('test', '真心不錯'); //函數名,參數,參數

call_user_func_array('test', ['假的']); //函數名,[參數,參數]


class Dog
{
    function wang()
    {
        echo '汪汪汪<br>';
    }
    function rock()
    {
        call_user_func([$this, 'wang']);
        echo '搖搖搖尾八';
    }
}

$dog = new Dog();

$dog->rock();

call_user_func([$dog, 'wang']);

function myAtoload($className)
{
    echo $className; //通過類名找到文件名再導入進來
}

spl_autoload_register('myAtoload');
