<?php 
    require 'session.php';
    require 'vendor\autoload.php';
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $empcollection = $companydb->masteropt;
    if (isset($_GET['type'])){
        if($_GET['type']=='location'){
            $value=$_GET['req'];
            $deleteresult = $empcollection->deleteOne( ['address' => $value] ); 
        }
        else{
            $type=$_GET['type'];
            $value=$_GET['req'];
            $deleteresult = $empcollection->deleteOne( ['value' => $value, 'type'=>$type] );
        }
    }
    header('Location: adddatatomastertemplate.php')
?>