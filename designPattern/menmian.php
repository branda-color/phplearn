<?php

/**
 * 門面模式(外觀模式):提供一個統一接口去訪問多個子系統的多個不同接口，它為子系統中的一組接口提供一個統一的高層接口
 * 1.他對客戶屏蔽了子系統組件，因而減少客戶處理的對象數目並使子系統使用起來更加方便。
 * 2.實現了子系統與客戶之間的松耦合關係
 * 3.如果應用需要，他並不限制他們使用子類系統，因此可以在系統易用性與能用性之間加以選擇
 * 適用場景:
 * 1.為一些複雜的子系統提供一組接口
 * 2.提高子系統獨立性
 * 3.在層次化結構中，可以使用門面模式定義系統的每一層接口
 */

//打開照相機為例:1.打開閃光燈2.打開照相機
//關閉照相機:1.關閉閃光燈2.關閉照相機
class Light
{
    function turnOn()
    {
        echo '打開閃光燈<br>';
    }

    function turnOff()
    {
        echo '關閉閃光燈<br>';
    }
}

class Camera
{
    function active()
    {
        echo '打開照相機<br>';
    }

    function deactive()
    {
        echo '關閉照相機<br>';
    }
}


class Facade
{
    protected $light;
    protected $camera;

    function __construct()
    {
        $this->light = new Light();
        $this->camera = new Camera();
    }


    function start()
    {
        $this->light->turnOn();
        $this->camera->active();
    }

    function stop()
    {
        $this->light->turnOff();
        $this->camera->deactive();
    }
}


$f = new Facade();
$f->start();
$f->stop();
