<?php
/*
重寫:父類方法不適合子類，子類可以重寫方法
1.完全重寫->子類調用的方法是子類重寫後的方法，父類還是調用父類的方法
2.在父類基礎上增加功能->要先使用parent關鍵字parent::work調用(普通方法/構造方法)

final 關鍵字:
1.修飾類(class)->不能被繼承
2.修飾方法(method)->不能被重寫

重寫中的方法權限修改(權限只能放大不能縮小/一般不會修改權限)
public===>public
protected==>protected public



*/



class Father
{
    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }


    public function jump()
    {
        echo '跳跳跳<br>';
    }

    public function work()
    {
        echo '非常認真工作<br>';
    }
}


class Son extends Father
{
    public $height;
    public $weight;
    public function __construct($name, $age, $height, $weight)
    {
        parent::__construct($name, $age);
        $this->height = $height;
        $this->weight = $weight;
    }

    public function jump() //直接重寫
    {
        echo '我能跳更高<br>';
    }
    public function work()
    {
        parent::work(); //先執行父類的在執行自己的
        echo '我有時間玩<br>';
    }
}


$ming = new Son('小小', 10, 180, 40);

$ming->jump();
$ming->work();

$yuyu = new Father('大大', 60);

$yuyu->jump();
