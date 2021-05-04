<?php

/**
 * 依賴注入/容器
 * 優點:
 * 1.降低耦合度
 * 2.實現惰性加載
 * 3.便於管理
 */

//輪胎類==>汽車類(耦合度太高)改寫看2

class Luntai
{
    function roll()
    {
        echo '輪胎在滾動<br>';
    }
}


class BMW
{
    function run()
    {
        //要有輪胎才能跑
        $luntai = new Luntai();
        $luntai->roll();
        echo '開著寶馬吃烤串<br>';
    }
}

$bmw = new BMW();
$bmw->run();
