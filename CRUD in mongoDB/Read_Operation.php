<?php

    require 'vendor\autoload.php'; 

    $client = new MongoDB\Client;
    $companydb = $client->companydb;
    $empcollection = $companydb->empollection;

// Find One
    // $document = $empcollection->findOne( ['_id' => '1'] );
    // var_dump($document);


// Find Many
    // $documentlist = $empcollection->find( ['skill' => 'mongoDB'] );
    // foreach(@$documentlist as $doc)
    // {
    //     var_dump($doc);
    // }

// Projection
            
    // $documentlist = $empcollection->find( 
    //     ['skill' => 'mongoDB'],
    //     ['projection' => ['_id' => 0 , 'name' => 1 ]] );

    // foreach(@$documentlist as $doc)
    // {
    //     var_dump($doc);
    // }

?>
