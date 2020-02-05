<?php

    require 'vendor\autoload.php'; 

    $client = new MongoDB\Client;
    $companydb = $client->companydb;
    $empcollection = $companydb->empollection;

// Delete one data
    // $deleteresult = $empcollection->deleteOne( ['_id' => '4'] );

// Delete many data
    // $deleteresult = $empcollection->deleteOne( ['name' => 'Pratik'] );

?>