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


