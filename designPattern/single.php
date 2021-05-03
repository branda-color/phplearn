<?php



/**
 * 單例設計模式
 * 通過類來創建始終都是同一個(只能創建一個對象)
 * 主要應用在資料庫，可以避免大量的new消耗資源
 * 流程:
 * 1.構造函數需要標記為private
 * 2.保存類實例靜態成員變量
 * 3.獲取實例的公共靜態方法
 */

class Dog
{
    private function __construct()
    {
    }

    //靜態屬性保存單例對象
    static private $instance;
    //通過靜態方法創建單例對象
    static public function getInstance()
    {
        //判斷$instance使否為空，如果為空則創建對象，若不為空則直接返回
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

$dog1 = Dog::getInstance();
$dog2 = Dog::getInstance();

if ($dog1 === $dog2) {
    echo '這是同一個對象';
} else {
    echo '這兩個是不同對象';
}
