<?php

/*
繼承
動物(父類)->哺乳動物(子類)
相同同屬性->繼承(人類繼承自哺乳動物)
特有屬性->派生(哺乳動物派生出了人類->人類有哺乳動物特徵也又自己特殊的特徵)
父類(基類)vs.子類(派生類)

單繼承->子類只能有一種父類

*/
class Animal
{
    public $name = '小芳';
    public function eat()
    {
        echo '我會吃飯';
    }
}

class Person extends Animal
{
    public $age = 10;
}

$xioaming = new Person();

echo $xioaming->name;
echo $xioaming->eat();
echo $xioaming->age;

/*
訪問權限    外部訪問    子類繼承

public      可以        可以
protected   不可以      可以
private     不可以      不可以
*/

class Person2
{

    public $name; //公共的(類外可以直接訪問)
    protected $age; //受保護的
    private $height; //私有的
    public function __construct($name, $age, $height)
    {
        $this->name = $name;
        $this->age = $age;
        $this->height = $height;
    }
}
$yuyu = new Person2('小名', 10, 177);
echo $yuyu->name;


class Animal1
{
    public $name = '比比';
    protected $age = 12; //可以被子類繼承
    private $height = 157; //不可以被子類繼承
}

class Human extends Animal1
{
    function say()
    {
        echo '我叫' . $this->name . '<br>';
        echo '年齡' . $this->age . '<br>';
        echo '身高' . $this->height . '<br>';
    }
}

$wewe = new Human();

$wewe->say();
