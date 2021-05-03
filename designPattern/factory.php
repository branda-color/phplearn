<?php

/**
 * 工廠
 * 流程:
 * 1.接口定義一些方法
 * 2.實現街口類實現這些方法
 * 3.工廠類:用以實例化對象
 * 4.優點:為系統結構提供了靈活的動態擴展機制，方便維護。
 */

//創立接口
interface Skill
{
    function family();
    function buy();
}

class Person implements Skill
{
    function family()
    {
        echo '人族辛辛苦苦的伐木';
    }
    function buy()
    {
        echo '人族在使用錢買房子';
    }
}

class Jingling implements Skill
{
    function family()
    {
        echo '精靈族在檢果實';
    }

    function buy()
    {
        echo '精靈族用果實交換樹木';
    }
}

//利用工廠創建兩個對象
class Factory
{
    static function createHero($type)
    {
        switch ($type) {
            case 'person':
                return new Person();
                break;
            case 'jingling':
                return new Jingling();
                break;
        }
    }
}

$person = Factory::createHero('person');
$jing = Factory::createHero('jingling');
