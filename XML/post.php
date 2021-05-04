<?php
$guestbook = new DomDocument(); //建立一個新的 DOM物件
$guestbook->load('newxml.xml'); //讀取 XML資料
$threads = $guestbook->documentElement; //獲得 XML結構的根
//建立一個新 thread節點
$thread = $guestbook->createElement('thread');
$threads->appendChild($thread);
//在新的 thread節點上建立 title標籤
$title = $guestbook->createElement('title');
$title->appendChild($guestbook->createTextNode($_POST['title']));
$thread->appendChild($title);
//在新的 thread節點上建立 author標籤
$author = $guestbook->createElement('author');
$author->appendChild($guestbook->createTextNode($_POST['author']));
$thread->appendChild($author);
//在新的 thread節點上建立 content標籤
$content = $guestbook->createElement('content');
$content->appendChild($guestbook->createTextNode($_POST['content']));
$thread->appendChild($content);
//將 XML資料寫入檔案
$fp = fopen("newxml.xml", "w");
if (fwrite($fp, $guestbook->saveXML()))
    echo "留言提交成功";
else
    echo "留言提交失敗";
fclose($fp);
