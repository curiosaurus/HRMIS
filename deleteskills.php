<?php 
    require 'session.php';
    require 'vendor\autoload.php';
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $empcollection = $companydb->skills;
    if (isset($_GET['sktype'])){
        echo $_GET['dept'];
            $deleteresult = $empcollection->deleteOne( ['skillname' =>$_GET['skname'], 'skilltype'=>$_GET['sktype'],'department'=>$_GET['dept']] );
    }
    //echo "<script>window.alert('lol1')</script>";

    echo "<script>window.location.replace('Requisitioncreate2.php?dept=".$_GET['dept']."');</script>"
    
?>