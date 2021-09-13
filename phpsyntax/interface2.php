<?php
interface action
{

    public function run();
    public function fast();
}

abstract  class animal implements action
{

    function run()
    {
        $this->fast();
    }
}

class dog extends animal
{

    function fast()
    {
        echo 'very fast';
    }
}

$dog = new dog;
$dog->run();
