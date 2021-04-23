<?php

//流程控制

//若num = 0為假，超過0都為真
$num = 0;

//若字符串為0為假，有東西為真(但若輸入0.000為真)
$string = '0.00000';

//陣列也可判斷，空的鎮列為假

$arr = [];

//null作為判斷條件為假

$null = null;

if ($num) {
    echo "這是真區間<br>";
}

echo '<br>後續代碼';

$num1 = 12;

$str = '12';

if ($num1 == $str) {

    echo "這是真區間<br>";
}

/*php 錯誤分級

1.notice/warning錯誤:出現錯誤後續還是會執行(可用@來屏蔽錯誤)
2.fatal error:後續代碼不會繼續執行

*/

/*php 異常處理
try-catch 是一種結構，一個try對應一個catch(這之間不能加任何代碼)

要繼承自官方異常處理類。方法自己隨便添加，父類方法注意能不能重寫(若有多個catch要將自定義的寫在上面，將官方的寫到下面)

 */

try {
    echo '早上起床<br>';
    throw new Exception('拉肚子了', 10); //拋出異常，後面代碼都不執行直接跳catch
    echo '先吃早點<br>';
} catch (Exception $e) {

    echo $e->getMessage(); //拿到異常訊息
    echo $e->getCode(); //得到異常代號
}
echo '開始上班<br>';

//自訂義異常處理類
class MyException extends Exception
{
    function demo()
    {
        echo '執行第二套方案<br>';
    }
}


try {
    echo '我要打遊戲';
    throw new MyException('突然有人打電話');
    echo '我正在打遊戲';
} catch (MyException $e) {
    echo $e->getMessage();
    $e->demo();
} catch (Exception $e) {
    echo '222';
}
