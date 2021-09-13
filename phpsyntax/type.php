<?php

$filters = "name:黑,personality:可愛";

$filter = explode(',', $filters);

//print_r($filter);


foreach ($filter as $key => $name) {
    list($key, $value) = explode(':', $name);

    //var_dump(list($key, $value) = explode(':', $name));

    var_dump($key);
    var_dump($value);
}


$testarray = ['mon', 'dad', 'child'];

//var_dump(list($a, $b, $c) = $testarray);


//var_dump($a);
