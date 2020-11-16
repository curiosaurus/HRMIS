<?php
    require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    // Enter collection name here
    global $empcollection;
    $empcollection = $companydb->training_lecture;

    global $y,$uid;

    $time = date("h.i.sa");
    $date = date("Y.m.d");

    $y = $_GET['year'];
    $uid = $_GET['unique_id'];

    function csvToArray($filename){
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
            global $empcollection, $y, $uid ;
            

            print("<pre>".print_r($empids,true)."</pre>");

            // $empcollection->updateOne(array('year' => $y, 'skillName' => $skillsNameArray[$arrayIndex]), array('$set' => $empids)   
            $empcollection->updateOne(array('unique_id' => $uid), array('$push' => array( 'attended_id' => $empids ))   
        );
        }
    }


    mkdir(__DIR__."../upload/".$time."--".$date, 0755);

    // $a = "../upload/".$time."--".$date;
    // echo $a;


    $target_dir = __DIR__."../upload/".$time."--".$date;

    if(isset($_POST["submit"])){
        echo $y;
        $skillsNameArray = $_POST['skillName'];
        print_r($skillsNameArray);
        $attendanceFiles = $_FILES['skills'];
        print("<pre>".print_r($attendanceFiles,true)."</pre>");

        // $sizeofSkill = sizeof($skillsNameArray);
    
        // for ($i = 0; i < $sizeofSkill; $i++){
            csvToArray($_FILES["skills"]["tmp_name"]);
            $filename = $target_dir . basename($_FILES["skills"]["name"]);
            // $empcollection->updateOne('fileUrl' => $fileUrl);

            $query = $empcollection->updateOne(['unique_id' => $uid],['$push' => ["fileUrl" => $filename]]);


            move_uploaded_file($_FILES["skills"]["tmp_name"], $filename);
        // }
    }
?>