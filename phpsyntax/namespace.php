<?php

namespace Wuhan;

function f1()
{
    echo "好心情";
}

/* 处于公共空间的文件被引入,针对当前空间不发生影响。 */

//include("CommonSpace1.php"); /* 公共空间 */

//include和require的分別在於include就算報警告，後續代碼還是會繼續執行，require會直接報錯停止


/* 访问元素 */
f1(); /* 好心情  当前空间就是Wuhan空间  */
echo '<br>';
echo \NAME; /* 访问公共空间的元素 */

/*本身有命名空间，引入的文件是公共空间，本身的空间访问不到，会到 别的空间去找这个元素

1)．声明命名空间的当前脚本的第一个 namespace 关键字前面不能有任何代码 (header 头代码也要写在下边)。
2)．命名空间是虚拟抽象的空间，不是真实存在的目录。
3)．同一请求的多个文件可以使用同名称的命名空间，只要这些文件里边不出现多个同名称、同类型的元素就可以。*/



/*
namespace:命名空間
use:使用
1.第一個命名空間前面不能有任何代碼




*/

namespace  hello;

class Person
{
    function eat()
    {
        echo '吃麵包中<br>';
    }
}

namespace world\test;

class Person
{
    function eat()
    {
        echo '吃饅頭中<br>';
    }
}


$ming = new Person();

$ming->eat();

$niu = new \hello\Person();

$niu->eat();
