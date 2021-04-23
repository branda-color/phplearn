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
    echo "這是真區間";
}

echo '<br>後續代碼';

$num1 = 12;

$str = '12';

if ($num1 == $str) {

    echo "這是真區間";
}

/*php 錯誤分級

1.notice/warning錯誤:出現錯誤後續還是會執行(可用@來屏蔽錯誤)
2.fatal error:後續代碼不會繼續執行

*/
