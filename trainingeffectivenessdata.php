<?php
require 'session.php';
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$db = $client->hrmis;
$lecturecollection = $db->training_lecture;

$loginerror = " ";
if(isset($_POST["submit"])){
    $date = $_POST["date"];
    $trainingid = $_POST['trainingid'];
    // $skill_level = $_POST["skill_level"];
    $beforetraining = intval( $_POST['beforetraining']);
    //$venue = $_POST["venue"];
    //$subject = $_POST["subject"];
    //$duration = $_POST["duration"];
    //$faculty = $_POST["faculty"];
    //$trainee_name = $_POST["trainee_name"];
    $emp_no = $_GET["emp"];
    $req=$_POST['req'];
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
        [ 'effectiveness' => [$emp_no=>['date' => $date,'beforetraining' => $beforetraining,'q1'=>$q1,'q2'=>$q2,'q3'=>$q3,'q4'=>$q4]] 
        ]]);
    if (intval($req)<=intval($q3)){
        $yearcollection = $db->$year;
        $result=$yearcollection->findOne(['empcode'=>$emp_no]);
        $nom=$result['nominatedfor'] ;
        foreach ($nom as $value) {
            if ($value[0]==$skill){
                $value[3]="Skill Acquired";
                break;
            }
        }
        $result=$yearcollection->updateOne(['empcode'=>$emp_no],['$set'=>['nominatedfor'=>$nom]]);   
    }
}
//(object)array('date' => $date,'beforetraining' => $beforetraining, 'emp_no' => $emp_no)
?>