<?php
if (isset($_GET['id']) && isset($_GET['stat'])){
    require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $yearc = $companydb->years;
    $year=$_GET['id'];
    if ($_GET['stat']==1){
        $updateResult = $yearc->updateOne(
            ['year' => $year ],
            ['$set' => ['status' => 'lock']]
        );
    }
    if ($_GET['stat']==2){
        $updateResult = $yearc->updateOne(
            ['year' => $year ],
            ['$set' => ['status' => 'unlocked']]
        );
    }
    if ($_GET['stat']==3){
        $updateResult = $yearc->deleteOne(
            ['year' => $year ],
            ['$set' => ['status' => 'unlocked']]
        );
    }
    header('Location: manageyear.php');
}
?>