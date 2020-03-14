<?php
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->requisition;

    if (isset($_GET['variable1']))
    {
        $reqid=$_GET['variable1'];
        $d=date("Y/m/d");
        $updateResult = $empcollection->updateOne(
            ['unique_id' => $reqid],
            ['$set' => ['status' => 'closed','dateofclosedposition'=>$d]]
        );
    }
    header('Location:open_positions.php');

$updateStatus = $shortlist_candidate->find(['Requisition_id' => $reqid]);
foreach ($updateStatus as $row){
    $u_id = $row['unique_id'];
    $u_name = $row['name'];
    $u_contact = $row['contact'];
    $u_current_position = $row['current_position'];
    $u_exp = $row['exp'];
    $u_current_ctc = $row['current_ctc'];
    $u_expected_ctc = $row['expected_ctc'];
    $u_notice_period = $row['notice_period'];
    $u_remark = $row['remark'];
    $u_hod_remark= $row['hod_remark'];
    $u_resume = $row['resume'];

    $deleteresult = $shortlist_candidate->deleteOne( ['contact' => $u_contact] );

    $insert = $companydb->$closed_position_candidate->insertOne(['unique_id'=> $u_id ,'name'=> $u_name,
     'contact'=> $u_contact,'current_position'=> $u_current_position,'exp'=>$u_exp ,
     'current_ctc'=> $u_current_ctc ,'expected_ctc'=>$u_expected_ctc,'notice_period'=> $u_notice_period,
     'remark'=> $u_remark , 'hod_remark'=> $u_hod_remark,
     'resume'=> $u_resume]);
    
}

    

    
    
?> 