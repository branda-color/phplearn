<?php

/*
trait(特性)

trait 用來模擬實現多繼承
instance :實例
定義trait要以trait關鍵字開頭，然後裡面的寫法和類的寫法一模一樣，一般情況下，trait中我們不加成員屬性只加成員方法
trait不能實例化
trait中的方法想讓(子類)來使用，該方法必須是public
trait可以嵌套trait

方法名衝突
use Dun,Sword{
    Dun::attack insteadof Sword;
    Dun::attack as DunAttack;
    Sword::attack as Sattack;
}


 */

trait Test
{
    function demo()
    {
        echo '測試方法<br>';
    }
}



trait Dun
{
    use Test;
    function fanyu()
    {
        echo '我能抵抗100點攻擊<br>';
    }

    function attack()
    {
        echo '增加100點傷害<br>';
    }
}

trait Sword
{
    function attack()
    {
        echo '我會增加50點傷害<br>';
    }
}



class Hero
{
    use Dun, Sword {
        Dun::attack insteadof Sword; //要使用Dun的
        Sword::attack as Sattack; //幫Sword裡面的attack取別名
    }
}

$mark = new Hero();
$mark->fanyu();

$mark->demo();

$mark->attack();
$mark->Sattack();
