<?php

session_start();
require 'vendor\autoload.php'; 


$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->requisition;



if($_SESSION['usertype'] == 'admin'){

	
    if (isset($_GET['req'])){
        $reqid=$_GET['req'];
        $d=date("Y/m/d");
        $updateResult = $empcollection->updateOne(
            ['unique_id' => $reqid],
            ['$set' => ['status' => 'Approved by MD','dateofmdapproval'=>$d]]
        );
    }
    header('Location:open_positions.php');

}




?>
