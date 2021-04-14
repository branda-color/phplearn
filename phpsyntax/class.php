<?php

//類別沒有大小寫的分別!!
class Car
{

    /*
     *  public:開放成員;(沒特別寫就會預設public)
     *  private:私有成員(設置屬性開頭為底線)
    */



    private $_color = 'red';
    private $_engine = '2000CC<br>';
    public $door;


    //建構式固定用__construct(寫在變數下方)一次性統合呼叫執行不要全部寫到建構式裡面
    function __construct($door)
    {
        $this->setColor('orange');
        $this->door = $door;
        echo $this->door, "Doors<br>";
        echo $this->showColor();
    }



    //method 方法
    function show()
    {
        echo 'HELLO CAR!<br>';
    }

    function showColor()
    {
        //不能直接寫return $color(讀不到變數)

        $this->show();
        $this->_showEngine();
        return $this->_color;
    }

    function setColor($color)
    {
        $this->_color = $color;
    }

    private function _showEngine()
    {
        echo $this->_engine;
    }
}


$car = new Car(3);
