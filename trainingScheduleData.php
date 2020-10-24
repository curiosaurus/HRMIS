<?php

require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$nomination = $companydb->nomination;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $year = $_POST['year'];
    $idetifiedSubject = $_POST['idetifiedSubject'];
    $scheduledDate = $_POST['scheduledDate'];
    $time = $_POST['time']; // Array of two time values
    $trainerName = $_POST['trainerName'];
    $faculty = $_POST['faculty'];
    $venue = $_POST['venue'];

    $query = $nomination->insertOne(array('year' => $year, 'idetifiedSubject' => $idetifiedSubject, 'scheduledDate' => $scheduledDate,'time' => $time, 'trainerName' => $trainerName, 'faculty' => $faculty, 'venue' => $venue));

    if ($query){
        echo "Sucess";
    } else {
        echo "Some Error";
    }
}
?>