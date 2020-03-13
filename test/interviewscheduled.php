<?php
require 'vendor\autoload.php'; 

$client = new MongoDB\Client;
$companydb = $client->hrmis;

    if (isset($_GET['req'])){
        $reqid=$_GET['req'];
        $d=date("Y/m/d");
        $empcollection = $companydb->shortlist_candidate;
        $updateResult = $empcollection->findOne(
            ['unique_id' => $reqid]
        );
        $int=$updateResult['interviewday'];
        $empcollection = $companydb->requisition;

        $updateResult = $empcollection->updateOne(
            ['unique_id' => $reqid],
            ['$set' => ['status' => 'Interview Scheduled','dateofhodshortlist'=>$d,'dateofinterview'=>$int]]
        );
    }
    header('Location:open_positions.php');
?>