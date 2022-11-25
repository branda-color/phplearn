<?php

interface SuperModuleInterface
{
    /**
     * 超能力激活方法
     *
     * 任何一個超能力都得有該方法，並擁有一個參數
     *@param array $target 針對目標，可以是一個或多個，自己或他人
     */
    public function activate(array $target);
}

/**
 * X-超能量
 */
class XPower implements SuperModuleInterface
{
    public function activate(array $target)
    {
        echo "x-超能量";
    }
}

/**
 * 終極炸彈
 */
class UltraBomb implements SuperModuleInterface
{
    public function activate(array $target)
    {
        echo "終極炸彈";
    }

    public function blood(){
        echo "血量";
    }
}



class Superman
{
    protected $module;

    public function __construct(SuperModuleInterface $module)
    {
        $this->module = $module;
    }
}


/**
 * 這裡就是手動依賴注入>>把new UltraBomb()傳入Superman()這個實例化裡面
 */

$b = new UltraBomb();

$a = new Superman($b);

/**
 * 實現簡易容器注入
 */

class Container
{
    protected $binds;
 
    protected $instances;
 
    public function bind($abstract, $concrete)
    {
        if ($concrete instanceof Closure) {
            $this->binds[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }
 
    public function make($abstract, $parameters = [])
    {
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }
 
        array_unshift($parameters, $this);
 
        return call_user_func_array($this->binds[$abstract], $parameters);
    }
}


// 創建一個容器(超級工廠)
$container = new Container;
 
// 向該超級工廠添加超人的生產腳本
$container->bind('superman', function($container, $moduleName) {
    return new Superman($container->make($moduleName));
});
 
//向該 超級工廠添加超能力模組的生產腳本
$container->bind('xpower', function($container) {
    return new XPower;
});
 
// 同上
$container->bind('ultrabomb', function($container) {
    return new UltraBomb;
});
 
// ******************華麗的分割線 **********************
// 啟動生產
$superman_1 = $container->make('superman', 'xpower');
$superman_2 = $container->make('superman', 'ultrabomb');
$superman_3 = $container->make('superman', 'xpower');
// ...隨意添加







