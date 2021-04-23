<?php



verify();

function verify($width = 100, $height = 40, $num = 5, $type = 3)
{

    //1.準備背景
    $image = imagecreatetruecolor($width, $height);
    //2.生成顏色

    //3.需要的字符串
    $string = '';
    switch ($type) {
        case 1:
            $str = '0123456789';
            $string = substr(str_shuffle($str), 0, $num);
            break;
        case 2:
            $arr = range('a', 'z');
            shuffle($arr);
            $tmp = array_slice($arr, 0, $num);
            $string = join('', $tmp);
            break;
        case 3:
            //0-9 a-z A-Z
            $str = '0123456789abcdefghyjklmonpqrstuvmwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $string = substr(str_shuffle($str), 0, $num);
            break;
    }
    //背景改成淺色
    imagefilledrectangle($image, 0, 0, $width, $height, lightColor($image));
    //4.開始寫字
    for ($i = 0; $i < $num; $i++) {
        $x = floor($width / $num) * $i;
        $y = mt_rand(10, $height - 20);
        imagechar(
            $image,
            5,
            $x,
            $y,
            $string[$i],
            deepColor($image)
        );
    }
    //5.干擾線
    for ($i = 0; $i < $num; $i++) {
        imagearc($image, mt_rand(10, $width), mt_rand(10, $height), mt_rand(10, $width), mt_rand(10, $height), mt_rand(0, 10), mt_rand(0, 270), deepColor($image));
    }

    for ($i = 0; $i < 50; $i++) {
        imagesetpixel($image, mt_rand(0, $width), mt_rand(0, $height), deepColor($image));
    }


    //6.指定輸出類型

    header('Content-type:image/png');

    //7.準備輸出圖片
    imagepng($image);
    //8.銷毀
    imagedestroy($image);
    return $string;
}

//淺色
function lightColor($image)
{
    return imagecolorallocate($image, mt_rand(130, 255), mt_rand(130, 255), mt_rand(130, 255));
}

//深色

function deepColor($image)
{
    return imagecolorallocate($image, mt_rand(1, 120), mt_rand(0, 120), mt_rand(0, 120));
}
