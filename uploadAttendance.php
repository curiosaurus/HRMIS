<?php
    require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    // Enter collection name here
    $empcollection = $companydb->training_lecture;


    $time = date("h.i.sa");
    $date = date("Y.m.d");

    function csvToArray($filename, $arrayIndex){
        $array = $fields = array(); 
        $i = 0;
        $handle = @fopen($filename, "r");
        if ($handle) {
            while (($row = fgetcsv($handle, 4096)) !== false) {
                if (empty($fields)) {
                    $fields = $row;
                    continue;
                }
                foreach ($row as $k=>$value) {
                    $array[$i][$fields[$k]] = $value;
                }
                $i++;
            }
            if (!feof($handle)) {
                echo "Error: unexpected fgets() fail\n";
            }
            fclose($handle);
            $empids = array();
            for ($i = 0; $i < sizeof($array); $i++){
                array_push($empids, $array[$i]['emp_id']);
            }
            $empcollection->updateOne(array('year' => $y, 'skillName' => $skillsNameArray[$arrayIndex]), array('$set' => $empids)   
        );
        }
    }

    mkdir("../upload/".$time."--".$date);

    $target_dir = "../upload/".$date."--".$time;

    if(isset($_POST["submit"])){
        $y = $_GET['year'];
        $skillsNameArray = $_POST['skillName'];
        $attendanceFiles = $_FILES['skills'];
        $sizeofSkill = sizeof($skillsNameArray);
    
        for ($i = 0; i < $sizeofSkill; $i++){
            csvToArray($_FILES["skills"]["tmp_name"][$i], $i);
            $filename = $target_dir . basename($_FILES["skills"]["name"][$i]);
            $empcollection->insertOne(array('skillName' => $skillsNameArray[$i], 'year' => $y, 'fileUrl' => $filename));
            move_uploaded_file($_FILES["skills"]["tmp_name"][$i], $filename);
        }
    }
?>