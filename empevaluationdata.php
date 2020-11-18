<?php
//require 'session.php';
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$db = $client->hrmis;
$lecturecollection = $db->training_lecture;
$loginerror = " ";
if(isset($_POST["submit"])){
    $date = $_POST["date"];
    $trainingid = $_POST['trainingid'];
    // $skill_level = $_POST["skill_level"];
    //$beforetraining = intval( $_POST['beforetraining']);
    //$venue = $_POST["venue"];
    //$subject = $_POST["subject"];
    //$duration = $_POST["duration"];
    //$faculty = $_POST["faculty"];
    //$trainee_name = $_POST["trainee_name"];
    $emp_no = $_POST["emp_no"];
    $name=$_POST['trainee_name'];
    //$req=$_POST['req'];
    $counter = $lecturecollection->find(['unique_id' => $trainingid ]);
        foreach($counter as $row) {
            $empIds = $row['attended_id'][0];
            // print("<pre>".print_r($empIds,true)."</pre>");
        }
        $counter1=0;
    foreach ($empIds as $value) {
        if ($value==$emp_no){
            $counter1=1;
        }
    }
    if($counter1==0){
        echo "<h1>Sorry It seems you have not attended the session recheck the EMP ID you have filled</h1>";
        exit();
    }
    $q1 = $_POST["q1"];
    $q2 = $_POST["q2"];
    $q3 = $_POST["q3"];
    $q4 = $_POST["q4"];
    $a=explode("_",$trainingid);
    $skill=$a[1];
    $year= $a[2];
    $lecturecollection->updateOne(
        ['unique_id'=>$trainingid],
        ['$push'=>
        [ 'evaluation' => [$emp_no=>['date' => $date,'q1'=>$q1,'q2'=>$q2,'q3'=>$q3,'q4'=>$q4,'name'=>$name]] 
        ]]);
}
//(object)array('date' => $date,'beforetraining' => $beforetraining, 'emp_no' => $emp_no)
?>