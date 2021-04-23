<?php
/*
類裡面定義常量(在類外部可以使用difine和const但內部只能用const)
const
調用方法:
1.類的外部調用=>類名::常量名(或$obj::常量名)
2.類內部調用=>self::常量名(或$this::常量名)

*/



class Person
{
    const ABC = 1000;
    public $name;
    public $age;

    function test()
    {
        echo self::ABC;
    }
}

$nui = new Person();
$nui->test();
echo Person::ABC;


/*
靜態屬性和靜態方法->對應的是對象屬性和對象方法
static如果用來修飾屬性和方法之後，那麼屬性和方法就是屬於整個類的，不屬於某個對象

靜態屬性調用方法:
類外->類名::靜態屬性名(或$obj::靜態屬性名)
類內->self::靜態屬性名(或$this::靜態屬性名)

靜態方法調用方法:
類外->類名::靜態屬性名(或$obj::靜態屬性名)
類內->self::靜態屬性名(或$this::靜態屬性名)

1.靜態屬性方法前面可以加屬性修飾符
2.靜態方法和靜態屬性效率高
3.通過靜態方法來創建單例對象
4.靜態方法種不能出現this關鍵字



*/

class Human
{
    public static $name = '小名'; //變成類的屬性了
    public static function test()
    {
        $this->won(); //這裡的this是不存在的(靜態方法內不可以調用其他函式)
        echo '這是靜態方法<br>';
    }

    public function won()
    {
        echo '汪汪汪';
    }

    public function demo()
    {
        echo self::$name;
        echo self::test();
    }
}

echo Human::$name;

echo Human::test();

$niu = new Human;
$niu->demo();
