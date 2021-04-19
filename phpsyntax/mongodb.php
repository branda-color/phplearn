<?php
 

 $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

 $bulk = new MongoDB\Driver\BulkWrite;
 $document = ['_id' => new MongoDB\BSON\ObjectID, 'name' => '測試連線'];
 
 $_id= $bulk->insert($document);
 
 var_dump($_id);
 
 $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");  
 $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
 $result = $manager->executeBulkWrite('test.yuyu', $bulk, $writeConcern);


