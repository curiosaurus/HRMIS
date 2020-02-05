<?php

    require 'vendor\autoload.php'; 

    $client = new MongoDB\Client;
    $companydb = $client->companydb;
    $empcollection = $companydb->empollection;

// Update one data
    // $updateResult = $empcollection->updateOne(
    //     ['age' => '21'],
    //     ['$set' => ['age' => '20']]
    // );


// Update many data and enter new data
    // $updateResult = $empcollection->updateMany(
    //     ['skill' => 'mongoDB'],
    //     ['$set' => ['Manager' => 'Alan walker']]
    // );


// Replace data
//         $replaceresult = $empcollection->replaceOne(
//             ['_id' => '4'],
//             ['_id' => '4', 'favColor' => 'blue']
//         );

?>