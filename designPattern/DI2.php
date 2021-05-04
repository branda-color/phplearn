<?php

/**
 * 依賴注入/容器
 * 優點:
 * 1.降低耦合度
 * 2.實現惰性加載
 * 3.便於管理
 */

//輪胎類==>汽車類(耦合度太高)

class Luntai
{
    function roll()
    {
        echo '輪胎在滾動<br>';
    }
}


class BMW
{

    protected $luntai;

    //注入方式
    function __construct($luntai)
    {
        $this->luntai = $luntai;
    }
    function run()
    {
        //創建自己的輪胎降低耦合度(注入)
        $this->luntai->roll();
        echo '開著寶馬吃烤串<br>';
    }
}


$luntai = new Luntai;
$bmw = new BMW($luntai);
$bmw->run();
