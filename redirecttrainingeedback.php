<?php

if(isset($_POST['submit']))
{
    $emp_name = $_POST['emp_name'];
    $unique_id = $_POST['unique_id'];
    $emp_code = $_POST['emp_code'];
    $material = $_POST['material'];
    $presentation = $_POST['presentation'];
    $communication = $_POST['communication'];
    $program = $_POST['program'];
    $group = $_POST['group'];
    $total = $_POST['total'];
    $comment = $_POST['comment'];

    require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $db = $client->hrmis;
    $lecturecollection = $db->training_lecture;


    $counter = $lecturecollection->find(['unique_id' => $unique_id ]);
        foreach($counter as $row) {
            $empIds = $row['attended_id'][0];
            // print("<pre>".print_r($empIds,true)."</pre>");
        }
        $counter1=0;
    foreach ($empIds as $value) {
        if ($value==$emp_no){
            $counter1=1;
        }
    $q1 = $_POST["q1"];
    $q2 = $_POST["q2"];
    $q3 = $_POST["q3"];
    $q4 = $_POST["q4"];
    $a=explode("_",$unique_id);
    $skill=$a[1];
    $year= $a[2];
    $lecturecollection->updateOne(
        ['unique_id'=>$unique_id],
        ['$push'=>
        [ 'feedback' => [$emp_no=>['date' => $date,'q1'=>$q1,'q2'=>$q2,'q3'=>$q3,'q4'=>$q4,'name'=>$name]] 
        ]]);
    }
    if($counter1==0){
        echo "<h1>Sorry It seems you have not attended the session recheck the EMP ID you have filled</h1>";
        exit();
    }

}

?>