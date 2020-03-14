<?php

require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->user;


$insertManyResult = $empcollection->insertMany([
    
    
    [
        'empcode' => 'postcard',
        'Dept' => 45,
        'skill1' => ['10', '20', '30' ,'40'],
        'status' => 'A',
    ],
]);

$cursor = $empcollection->find(array('empcode' => 'postcard'));

foreach($cursor as $row)
{
    echo ( $row['skill1'][0]);
    break;
}

// var_dump($cursor);

if($insertManyResult){

    echo "SUCESS ";
}

?>
