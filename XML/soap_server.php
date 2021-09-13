<?php


//創造soap server，與檔案access對應soapclient(不須wsdl的模式)
class Test
{
    public function auth($a)
    {
        if ($a != '123456789') {
            throw new SoapFault('Server', '您无权访问');
        }
    }
    function say()
    {
        return 'Hi11111';
    }
}


//soapserver第一個參數設為null表示不需要wsdl模式，第二個參數設定uri驗證(client需填一樣)
$srv = new SoapServer(null, array('uri' => 'http://localhost:8787/phplearning/XML/'));
$srv->setClass('Test');
$srv->handle();
