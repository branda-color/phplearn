<?php

/**
 * 工廠方法:核心是工廠類不在負責所有對象創建，而是將具體創建工作交予子類去做，
 * 成為一個抽象工廠腳色，他僅負責給出具體工廠類必須實現的接口，而不接駔哪一個產品類應當被實例化這種細節
 * (工廠定義接口，而其他子類具體創建對象)
 */

interface Tell
{
    function call();
    function receive();
}

class XiaoMi implements Tell
{
    function call()
    {
        echo '我在使用小米打電話';
    }

    function receive()
    {
        echo '我在使用小米接電話';
    }
}

class Apple implements Tell
{
    function call()
    {
        echo '我在使用蘋果打電話';
    }
    function receive()
    {
        echo '我在使用蘋果接電話';
    }
}

//工廠類只負責規定接口，具體實現交給子類
interface Factory
{
    static function createPhone();
}

class XiaoMiFactory implements Factory
{
    static function createPhone()
    {
        return new XiaoMi();
    }
}

class AppleFactory implements Factory
{
    static function createPhone()
    {
        return new Apple();
    }
}
