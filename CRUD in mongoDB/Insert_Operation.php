<?php

    require 'vendor\autoload.php'; 

    $client = new MongoDB\Client;
    $companydb = $client->companydb;
    $empcollection = $companydb->empollection;

    // Insert one data
    // $insertOneResult = $empcollection->insertOne( ['_id' => '1' , 'name' => 'Nishad' , 'age' => '21' , 'skill' => 'mongoDB' ] );     


    // Insert Many data
    // $insertManyResult = $empcollection->insertMany( [
    //     ['_id' => '2' , 'name' => 'Pavan' , 'age' => '21' , 'skill' => 'mongoDB' ],
    //     ['_id' => '3' , 'name' => 'Kunal' , 'age' => '21' , 'skill' => 'mongoDB' ],
    //     ['_id' => '4' , 'name' => 'Pratik' , 'age' => '21' , 'skill' => 'mongoDB' ]
    //     ] );     


?>
