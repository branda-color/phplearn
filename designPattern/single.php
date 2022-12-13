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

//第一步,普通類
class single{
}
$s1 = new single();
$s2 = new single();
//注意兩個對象是1的時候才全等(這邊得到的結果是不同對象)
if($s1===$s2){
    echo"是同一個對象";
}else{
    echo"不是同一個對象";
}
//第2步封鎖new操作
class sigle{
protected function __construct(){ 
}
}
//第三步,留個接口可以new對象
class sigle2{
    public static function getIn(){
        return new self();
    }
    protected function __construct(){ 
}
}
//這邊得到的結果是不同對象
$s1 =  sigle2::getIn();
$s2 =  sigle2::getIn();
if($s1===$s2){
    echo"是同一個對象";
}else{
    echo"不是同一個對象";
}
//第四步getIn先判斷實例
class single3{
    protected static $ins=null;

    public static function getIn(){
        if(self::$ins===null){
            self::$ins=new self();
        }

        return self::$ins;
    }
    protected function __construct(){ 
    }
}
//這邊得到的結果是同對象
$s1 =  single3::getIn();
$s2 =  single3::getIn();
if($s1===$s2){
    echo"是同一個對象";
}else{
    echo"不是同一個對象";
}
class multi extends  single3{
    public function __construct(){ 
    }
}
//這邊得到的結果是不同對象
$s1 =  new multi();
$s2 =  new multi();
if($s1===$s2){
    echo"是同一個對象";
}else{
    echo"不是同一個對象";
}
//第五步,用final防止繼承時被修改權限
class single4{
    protected static $ins=null;

    public static function getIn(){
        if(self::$ins===null){
            self::$ins=new self();
        }

        return self::$ins;
    }   
    //方法前加final則方法不能被覆蓋,類前加final則類不能被繼承
    final protected function __construct(){ 
    }

    //封鎖克隆
    final protected function __clone(){
    }
}
$s1 =  single4::getIn();
$s2 =  clone $s1;
