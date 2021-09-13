<?php


//與soapserver對應，需要驗證uri相同再進行資料傳輸
$cli = new SoapClient(null, array('uri' => 'http://localhost:8787/phplearning/XML/', 'location' => 'http://localhost:8787/phplearning/XML/soap_server.php', 'trace' => true, 'encoding' => 'utf-8'));

$h = new SoapHeader('http://localhost:8787/phplearning/XML/', 'auth', '123456789', false, SOAP_ACTOR_NEXT);
$cli->__setSoapHeaders(array($h));


try {
    echo $cli->say();
} catch (Exception $e) {
    echo $e->getMessage();
}
