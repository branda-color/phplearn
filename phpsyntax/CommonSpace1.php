<?php

const NAME = "ThinkCsly";

function f1()
{
    echo 'ok';
}


function f2()
{
    echo 'good';
}


include 'namespace.php';

use \hello\Person as Person1;

use \world\test\Person as Person2;

$ming = new Person2();

$ming->eat();

$niu = new Person1();

$niu->eat();
