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
        if ($value==$emp_code){
            $counter1=1;
        }
    }
    if($counter1==0){
        echo "<h1>Sorry It seems you have not attended the session recheck the EMP ID you have filled</h1>";
        exit();
    }
    $lecturecollection->updateOne(
        ['unique_id'=>$unique_id],
        ['$push'=>
        [ 'feedback' => [$emp_code=>['q1'=>$material,'q2'=>$presentation,'q3'=>$communication,'q4'=>$program,'q5'=>$group,'q6'=>$total,'q7'=>$comment,'name'=>$emp_name]] 
        ]]);

}
?> 