<?php

/**
 * 觀察者模式:一個事件系統，涉及到兩個類(A類觀察B類狀態，A類發現B類變更狀態了，會立刻做出相應的動作)
 * 避免組件之間緊密耦合的另一種方法
 */

//觀察者模式涉及到兩個類
//以男人類與女朋友類為例

//男人類對象小明，小花小麗兩個女朋友

class Man
{
    //用來存放觀察者
    protected $observers = [];
    function addObserver($observer)
    {
        $this->observers[] = $observer;
    }
    //花錢的方法
    function buy()
    {
        //當小明花錢時女友會發現然後去凍結帳戶
        foreach ($this->observers as $girl) {
            $girl->blockaccount();
        }
    }

    //刪除觀察者的方法
    function delObserver($observer)
    {
        //查找對應值在陣列中的鍵
        $key = array_search($observer, $this->observers);
        //根據鍵刪除值，並且重新索引

        array_splice($this->observers, $key, 1);
    }
}

class GirlFriend
{
    function blockaccount()
    {
        echo '妳的男友正在花錢，馬上凍結他的帳戶';
    }
}

//創建對象
$xioaming = new Man();
$xioahua = new GirlFriend();
$xioali = new GirlFriend();

//添加觀察者
$xioaming->addObserver($xioahua);
$xioaming->addObserver($xioali);
$xioaming->delObserver($xioahua);

$xioaming->buy();
