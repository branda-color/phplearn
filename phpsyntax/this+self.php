<?php


/**
 * self代表了當前類的引用
 * 一般用在靜態屬性方法/常量
 */

/**
 * this代表了當前的實例方法
 */
class a
{
    function show()
    {
        // self::d();
        $this->d();
    }
    static function d()
    {
        echo "1111";
    }
}

class b extends a
{
    static  function d()
    {
        echo '122222';
    }
}

$e = new b();

/**
 * 當show裡面是$this->d()當前對象引用>>實例化對象的類，當前有就直接實現沒有就找父父級
 * 透過e去找show方法，會到成員方法內去找，成員沒有就會往父類去找，父類沒有就找父父類一直找上去(繼承)
 * 誰先有d()方法就會執行他的d()方法
 * 雖然show方法在a類中但真正實例了$this->d()的是b類的這個方法
 */

/**
 * 當show裡面的方法是self::d()，就直接用當前類的方法d()直接輸出
 */

// $e->show();


class e
{
    function m()
    {
        echo "111";
    }
}


class r extends e
{
    function m()
    {
        /**
         * 等於指向父類的m()，會先執行父類在執行當前類(父類改寫就不用子類也在寫一次)
         */

        parent::m();
        echo "222";
    }
}

$k = new r();
$k->m();

class TPL
{
    private $tplpath;
    private $catch;
    private $catechTime;
    function __construct()
    {
        $this->tplpath = "../template/defualt";
        $this->catch = "../catch";
        $this->catchTimes = 3600;
    }

    function dispaly($tpFile)
    {
        echo "read($tpFile)";
        echo "模板路徑:($this->tplpath)";
        echo "<br/>($this->catch)";
    }
    function reso()
    {
        echo "解析文件";
    }
    function wrong()
    {
        echo ".....";
    }
}

class APP extends TPL
{
    function __construct()
    {
        // parent::__construct();
        echo "<br/>app<br/>"; //會執行這段父類的就不會在執行
    }
}

class admin extends APP
{
}

class member extends APP
{
}

$chanel  = new admin();
$chanel->dispaly("index.html");
$user = new member();
$user->dispaly("member/user.html");
