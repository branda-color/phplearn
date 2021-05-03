<?php

$code = new Code();

$code->outImage();

class Code
{
    //驗證碼個數
    protected $number;
    //驗證碼類型
    protected $codeType;
    //圖像寬度
    protected $width;
    //圖像高度
    protected $height;
    //圖像資源
    protected $image;
    //驗證碼字串
    protected $code;

    public function __construct($number = 4, $codeType = 2, $width = 100, $height = 50)
    {
        //初始化成員類型
        $this->number = $number;
        $this->codeType = $codeType;
        $this->width = $width;
        $this->height = $height;
        //生成驗證碼
        $this->code = $this->createCode();
    }

    public function __destruct()
    {
        imagedestroy($this->image);
    }

    public function __get($name) //嘗試取得不存在的屬性或無權訪問的屬性
    {
        if ($name == 'code') {
            return $this->code;
        }
        return false;
    }

    protected function createCode()
    {
        //通過驗整碼類型生成不同驗證碼
        switch ($this->codeType) {
            case 0: //純數字
                $code = $this->getNumberCode();
                break;

            case 1: //純字母
                $code = $this->getCharCode();
                break;
            case 2: //字母數字混合
                $code = $this->getNumCharCode();
                break;
            default:
                die('不支援這種驗證碼類型');
        }

        return $code;
    }

    protected function getNumberCode()
    {
        $str = join('', range(0, 9));
        return substr(str_shuffle($str), 0, $this->number);
    }

    protected function getCharCode()
    {
        $str = join('', range('a', 'z'));
        $str = $str . strtoupper($str);
        return substr(str_shuffle($str), 0, $this->number);
    }
    protected function getNumCharCode()
    {
        $numStr = join('', range(0, 9));
        $str = join('', range('a', 'z'));
        $str  = $numStr . $str . strtoupper($str);
        return substr(str_shuffle($str), 0, $this->number);
    }

    protected function createImage()
    {
        $this->image = imagecreatetruecolor($this->width, $this->height);
    }

    protected function fillBack()
    {
        imagefill($this->image, 0, 0, $this->lightColor());
    }

    protected function lightColor()
    {
        return imagecolorallocate($this->image, mt_rand(130, 255), mt_rand(130, 255), mt_rand(130, 255));
    }

    protected function deepColor()
    {
        return imagecolorallocate($this->image, mt_rand(1, 120), mt_rand(0, 120), mt_rand(0, 120));
    }

    protected function drawChar()
    {
        $width = ceil($this->width / $this->number); //函數向上捨入為最接近的整數
        for ($i = 0; $i < $this->number; $i++) {
            $x = mt_rand($i * $width + 5, ($i + 1) * $width - 10);
            $y = mt_rand(0, $this->height - 15);
            imagechar($this->image, 5, $x, $y, $this->code[$i], $this->deepColor());
        }
    }

    protected function drawDisturb()
    {
        for ($i = 0; $i < 150; $i++) {
            $x = mt_rand(0, $this->width);
            $y = mt_rand(0, $this->height);
            imagesetpixel($this->image, $x, $y, $this->lightColor());
        }
    }

    protected function show()
    {
        header('Content-Type:image/png');
        imagepng($this->image);
    }



    public function outImage()
    {
        //創建畫布
        $this->createImage();
        //填充被景色
        $this->fillBack();
        //將驗證碼字串放到畫布
        $this->drawChar();
        //添加干擾元素
        $this->drawDisturb();
        //輸出並顯示
        $this->show();
    }
}
