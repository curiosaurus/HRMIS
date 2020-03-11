<?php 
    //require 'session.php';
    require 'vendor\autoload.php';
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $empcollection = $companydb->skills;
    if (isset($_GET['skname'])){
        $skname=$_GET['skname'];
        $sktype=$_GET['sktype'];
        
        $deleteresult = $empcollection->insertOne( ['skilltype' =>$sktype,'department' => $_GET['dept'],'skillname' => $skname] );
    }
    //echo "<script>window.alert('lol1')</script>";
            echo "<script>window.location.replace('Requisitioncreate2.php?dept=".$_GET['dept']."');</script>"
?>