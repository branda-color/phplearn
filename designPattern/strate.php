<?php

use GirlFriend as GlobalGirlFriend;

/**
 * 策略模式
 * 1.多個類指區別在表現行為不同，可以使用strategy模式，在運行時動態選擇具體要執行的行為。
 * 2.需要在不同情況下使用不同的策略(算法)或者策略還可能在未來用其他方式來實現
 * 3.對客戶隱藏具體策略(算法)的實現細節，彼此完全獨立
 * 4.客戶端必須知道所有的策略類，並自行決定要使用哪一個策略類，策略模式只適用於客戶端知道所有的算法或行為的情況
 * 5.策略模式造成很多的策略類，每一個具體策略都會產生一個新纇
 * 優點:
 * 1.策略模式提供了管理相關的算法族的辦法
 * 2.算法封閉在獨立的strategy類中使得你可以獨立其context改變他
 * 3.使用策略模式可以避免使用多重條件轉移語句
 */

interface Love
{
    function sajiao();
}

//一個類都是一個策略
class Cute implements Love
{
    function sajiao()
    {
        echo '可愛';
    }
}

class Tiger implements Love
{
    function sajiao()
    {
        echo '給老娘過來';
    }
}

class GirlFriend
{
    protected $xingge;
    function __construct($xingge)
    {
        $this->xingge = $xingge;
    }

    function sajiao()
    {
        $this->xingge->sajiao();
    }
}


//要改變方法時傳入不同的纇
$keai = new Cute();
$yeman = new Tiger();
$li = new GirlFriend($yeman);
$li->sajiao();
