<?php

/**
 * 適配器:將一個類的接口轉換為客戶希望的另一個接口，使的原本不兼容的接口能夠一起工作。
 * (將不同接口適配成統一接口)
 */

interface perfectMan
{
    function cook();
    function writePhp();
}


class Wife
{
    function cook()
    {
        echo '我會做滿漢全席';
    }
}


class Man implements perfectMan
{
    protected $wife;

    function __construct($wife)
    {
        $this->wife = $wife;
    }

    function cook()
    {
        //調用
        $this->wife->cook();
    }
    function writePhp()
    {
        echo '我會寫php';
    }
    //只要使用已知接口即可，不須重新從寫cook方法
}

$li = new Wife();
$ming = new Man($li);
$ming->writePhp();
$ming->cook();
