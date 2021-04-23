<?php

//有參數沒有返回值

function info($name = '張三', $sex = 'male')
{

    echo $name . $sex;
}

info();

//有參數有返回值

function info1($name = '張三', $sex = 'male')
{

    echo $name . $sex;
    return 1; //只會返回不會輸出
    echo '後續代碼'; //return後面代碼不會執行
}

$num = info1();

echo $num;


info3('李四', '女的'); //若沒有默認參數必須傳入參數

//函數可以在後面定義先呼叫，但參數不行
function info3($name = '張三', $sex = 'male') //後面有默認參數要加=
{

    echo $name . $sex;
}

$name1 = '小花';

function say()
{
    echo $name1; //函數外部變量不能在內使用
    $name2 = 'yuyu';
}

echo $name2; //內部變量外部無法使用
say();



function sum()
{
    static $num = 1; //加入靜態變量會累加上次的值(只會初始化一次)
    $num++;
    echo $num;
}

sum();
sum();
sum();
sum();

function sum1($num1, $num2): string //加入string自動轉型
{

    return $num1 + $num2;
}

var_dump(sum1(1, 3)); //輸出外，還可以輸出型態
echo '<br>' . sum1(1, 2);


function test(...$arr) //加入...以陣列形式表示
{

    var_dump($arr);
}

test('abc', 1, 1, 2, 2);

//以陣列傳入值也可以(但定義4個參數就要傳四個)
function test1($a, $b, $c, $d)
{
    var_dump($a, $b, $c, $d);
}

$arr1 = ['1', 2, 3, 4];

test(...$arr1);


//調用匿名函數
$trr = function () {
    echo '匿名函數';
};

$trr();
