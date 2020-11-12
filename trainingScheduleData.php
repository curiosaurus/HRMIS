<?php
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$nomination = $companydb->training_lecture;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $year = $_POST['year'];
    $no = $_POST['tno'];
    $idetifiedSubject = $_POST['skill'];
    $scheduledDate = $_POST['scheduledDate'];
    $time = $_POST['time']; // Array of two time values
    $trainerName = $_POST['trainerName'];
    $faculty = $_POST['faculty'];
    $venue = $_POST['venue'];
    $query = $nomination->insertOne(['year' => $year, 'skill' => $idetifiedSubject,'training_no'=>$no, 'scheduledDate' => $scheduledDate,'time' => $time, 'trainerName' => $trainerName, 'faculty' => $faculty, 'venue' => $venue]);
    if ($query){
        echo "Sucess";
    } else {
        echo "Some Error";
    }
}
?>