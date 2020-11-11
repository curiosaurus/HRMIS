<?php
    require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    // Enter collection name here
    $empcollection = $companydb->empcollection;


    $time = date("h.i.sa");
    $date = date("Y.m.d");

    mkdir("../upload/".$time."--".$date);

    $target_dir = "../upload/".$time."--".$date;

    if(isset($_POST["submit"])){
        $communicationSkill = $target_dir . basename($_FILES["communicationSkill"]["name"]);
        $iso90012015 = $target_dir . basename($_FILES["iso90012015"]["name"]);
        $ems140012015 = $target_dir . basename($_FILES["ems140012015"]["name"]);
        $fives = $target_dir . basename($_FILES["fives"]["name"]);
        $productApplicationKnowledge = $target_dir . basename($_FILES["productApplicationKnowledge"]["name"]);
        $productKnowledge = $target_dir . basename($_FILES["productKnowledge"]["name"]);
        $erpKnowledge = $target_dir . basename($_FILES["erpKnowledge"]["name"]);


        move_uploaded_file($_FILES["communicationSkill"]["tmp_name"], $communicationSkill);
        move_uploaded_file($_FILES["iso90012015"]["tmp_name"], $iso90012015);
        move_uploaded_file($_FILES["ems140012015"]["tmp_name"], $ems140012015);
        move_uploaded_file($_FILES["fives"]["tmp_name"], $fives);
        move_uploaded_file($_FILES["productApplicationKnowledge"]["tmp_name"], $productApplicationKnowledge);
        move_uploaded_file($_FILES["productKnowledge"]["tmp_name"], $productKnowledge);
        move_uploaded_file($_FILES["erpKnowledge"]["tmp_name"], $erpKnowledge);

        $empcollection->insertOne(array("communicationSkill" => $communicationSkill,
            "iso90012015" => $iso90012015,
            "ems140012015" => $ems140012015,
            "fives" => $fives,
            "productApplicationKnowledge" => $productApplicationKnowledge,
            "productKnowledge" => $productKnowledge,
            "erpKnowledge" => $erpKnowledge
    ));
    }
?>