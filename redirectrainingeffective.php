<?php
require 'vendor\autoload.php'; 
$eid=$_GET['empid'];
$uid=$_GET['uid'];
$empname=$_GET['name'];
$syear=$_GET['year'];
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$skillyear = (isset($_GET['year'])) ? $_GET['year'] : header('location: skillmatrixlist.php');
$skillscollection = $companydb->$skillyear;
$lecturecollection=$companydb->training_lecture;
if(isset ($_GET['uid']))
{
    $result = $lecturecollection->find(['unique_id' => $uid]);
    //print("<pre>".print_r($result,true)."</pre>");
    foreach ($result as $row) {
        $effectiveness = $row['effectiveness'];
    }
// print("<pre>".print_r($effectiveness,true)."</pre>");
    foreach ($effectiveness as $row) {
        foreach ($row as $key => $value){
            if ($key == $eid){
                $data = $value;
            // print("<pre>".print_r($data,true)."</pre>");
                break;
            }
        }
    }
    if($data){
        header('location: viewtrainingeffectiveness.php?empid='.$eid.'&uid='.$uid.'&name='.$empname.'&year='.$syear);
    }
    else{
        header('location: traningeffectiveness.php?empid='.$eid.'&uid='.$uid.'&name='.$empname.'&year='.$syear);
    }
}
else {
    header('location: empeffclist.php');
}
?>