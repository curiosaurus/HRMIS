<?php 
    //require 'session.php';
    require 'vendor\autoload.php';
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $empcollection = $companydb->masteropt;
    if (isset($_GET['type'])){
        $add=$_GET['type'];
        $value=$_GET['value'];
        $deleteresult = $empcollection->insertOne( ['type' => $add,'value' => $value] );
    }
    //echo "<script>window.alert('lol1')</script>";
    header('Location: adddatatomastertemplate.php')
?>