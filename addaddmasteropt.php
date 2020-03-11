<?php 
    //require 'session.php';
    require 'vendor\autoload.php';
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $empcollection = $companydb->masteropt;
    if (isset($_GET['add'])){
        $add=$_GET['add'];
        $value=$_GET['city'];

        $deleteresult = $empcollection->insertOne( ['type' => 'location','city' => $value, 'address'=>$add] );
    }
    echo "<script>window.alert('lol1')</script>";
    header('Location: adddatatomastertemplate.php')
?>