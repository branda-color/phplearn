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
//共同接口
interface db
{
    function conn();
}

//如果新增oracle類型怎麼辦?
//服務端要修改factory的內容(在java,C++中還得再重新編譯)
//在面相對象設計法則中,重要的開閉原則----對於修改是封閉,對於擴展是開放
//工廠方法
interface Factory
{
    function createDB();
}

class dbmysql implements db
{
    public function conn()
    {
        echo "連上mysql";
    }
}

class dbsqlite implements db
{
    public function conn()
    {
        echo "連上sqlite";
    }
}

class mysqlFactory implements Factory
{
    public function createDB()
    {
        return new dbmysql();
    }
}

class sqliteFactory implements Factory
{
    public function createDB()
    {
        return new dbsqlite();
    }
}

//服務器端增加oracle類
class oracle implements db
{
    public function conn()
    {
        echo "連上oracle";
    }
}
class oracleFactory implements Factory
{
    public function createDB()
    {
        return new oracle();
    }
}


//客戶端開始
$fact = new mysqlFactory();
$db = $fact->createDB();
$db->conn();

$fact = new sqliteFactory();
$db = $fact->createDB();
$db->conn();
