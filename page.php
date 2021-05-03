<?php

/**
 * parse_url
 * path:文件路徑
 * query:請求參數
 * 
 * parse_str:將query字串變成關聯陣列
 * 
 * http_build_query:將關聯陣列轉換成query字串
 */

$page = new Page(5, 60);

var_dump($page->allUrl());

class Page
{
    //每頁顯示多少條數據
    protected $number;
    //總共有多少調數據
    protected $totalCount;
    //當前頁
    protected $page;
    //總頁數
    protected $totalPage;
    //url
    protected $url;

    public function __construct($number, $totalCount)
    {
        $this->number = $number;
        $this->totalCount = $totalCount;
        //得到總頁數
        $this->totalPage = $this->getTotalPage();
        //得到當前頁數
        $this->page = $this->getPage();
        //得到url
        $this->url = $this->getUrl();
        echo $this->url;
    }

    protected function getTotalPage()
    {
        return ceil($this->totalCount / $this->number);
    }

    protected function getPage()
    {
        if (empty($_GET['page'])) {
            $page = 1;
        } else if ($_GET['page'] > $this->totalPage) {
            $page = $this->totalPage;
        } else if ($_GET['page'] < 1) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        return $page;
    }

    protected function getUrl()
    {
        //得到協議名
        $scheme = $_SERVER['REQUEST_SCHEME'];
        //得到主機名
        $host = $_SERVER['SERVER_NAME'];
        //得到端口
        $port = $_SERVER['SERVER_PORT'];
        //得到路徑和請求字串
        $uri = $_SERVER['REQUEST_URI'];

        //先將原本的page參數給清空
        $uriArray = parse_url($uri);
        $path = $uriArray['path'];
        if (!empty($uriArray['query'])) {
            //請求字串變成關聯陣列
            parse_str($uriArray['query'], $array);
            //清除掉關聯陣列中的page值
            unset($array['page']);
            //將剩下的參數拼接為請求字串
            $query = http_build_query($array);
            //請求字串拼接到路徑後面
            if ($query != '') {

                $path = $path . '?' . $query;
            }
            return $scheme . '://' . $host . ':' . $port . $path;
        }
    }
    protected function setUrl($str)
    {
        if (strstr($this->url, '?')) {
            $url = $this->url . '&' . $str;
        } else {
            $url = $this->url . '?' . $str;
        }
        return $url;
    }
    public function allUrl()
    {
        return [
            'first' => $this->first(),
            'prev' => $this->prev(),
            'next' => $this->next(),
            'end' => $this->end()
        ];
    }
    public function first()
    {
        return $this->setUrl('page=1');
    }
    public function prev()
    {
        if ($this->page - 1 < 1) {
            $page = 1;
        } else {
            $page = $this->page - 1;
        }
        return $this->setUrl('page=' . $page);
    }
    public function next()
    {
        //根據當前頁得到下一頁
        if ($this->page + 1 > $this->totalPage) {
            $page = $this->totalPage;
        } else {
            $page = $this->page + 1;
        }
        return $this->setUrl('page=' . $page);
    }
    public function end()
    {
        return $this->setUrl('page=' . $this->totalPage);
    }

    public function limit()
    {
        //limit0,5  limit5,5
        $offset = ($this->page - 1) * $this->number;
        return $offset . ',' . $this->number;
    }
}
