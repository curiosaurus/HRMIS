<?php
require 'vendor\autoload.php'; 

$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->requisition;

    if (isset($_GET['variable1'])){
        $reqid=$_GET['variable1'];
        $d=date("Y/m/d");
        $updateResult = $empcollection->updateOne(
            ['unique_id' => $reqid],
            ['$set' => ['status' => 'closed','dateofclosedposition'=>$d]]
        );
    }
    header('Location:open_positions.php');
?>