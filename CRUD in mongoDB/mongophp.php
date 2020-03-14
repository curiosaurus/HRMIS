<?php
    $m = new MongoClient();
    $db = $m->selectDB('test');
    $collection = new MongoCollection($db, 'SoManySins');

    // Search criteria
    $query = array();

    // Projection (fields to include)
    $projection =  array("_id" => false, "FactoryCapacity" => true);

    $cursor = $collection->find($query, $projection);
    foreach ($cursor as $doc) {
        var_dump($doc);
    }
?>
