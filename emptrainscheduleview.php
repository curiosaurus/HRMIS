<!DOCTYPE html>
<?php
error_reporting(0);
session_start();
if ($_SESSION['usertype']=='employee' or $_SESSION['usertype']=='hod'){

}
else{
    header('location:login.php');
}
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->empcollection;
$yearcollection=$companydb->years;

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Schedule</title>
    <!-- Google font cdn file imported here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- bootstrap cdn files for the Tables and other contents  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
if ($_SESSION['usertype']=='hod')
{
        include 'hodnavbar.php';
}
elseif($_SESSION['usertype']=='employee')
{
    include 'employeenavbar.php';
}
?>
    <div class="title">
        <center>
            <h2>Training Schedule
                <hr style="border-bottom: 2px solid#3f51b5 ; width: 50px;">
            </h2>
        </center>
    </div>
<br><br>
<select name="year" id="year" onchange="pp();" required class="form-control form-control-lg">
    <?php  
    $counter = $yearcollection->find();
    if(isset ($_GET['year'])){
        foreach($counter as $row) {
            if($_GET["year"] == $row['year']){
            echo "<option value = ".$row['year']." selected>". $row['year'] ."</option>";
            $y=$row['year']; 
        }
            else{
                echo "<option value = ".$row['year']." >". $row['year'] ."</option>";
            }
        }
    }
        else{
            foreach($counter as $row) {
                echo "<option value = ".$row['year']." selected>". $row['year'] ."</option>";
                $y=$row['year'];
            }   
        }
    ?>
</select>
<script>
  function pp(){
    var y = document.getElementById("year").value;
    window.location.href="emptrainscheduleview.php?year="+y;
}
</script>
<div class="container" style="border: 1px solid lightblue; padding: 25px;">
<br>
  <table class="table"  border="1">
    <tr>
        <th>Skill</th>
        <th>Training Number</th>
        <th>Status</th>
        <th>Trainer</th>
        <th>Venue</th>
        <th>Date</th>
        <th>Time</th>
    </tr>
    <?php
    $skillyearcollection=$companydb->$y;
    $training_lcollection=$companydb->training_lecture ;
    $result=$skillyearcollection->findOne(['empcode'=>$_SESSION["Emp Code"]]);
    //print_r($result);
    $nominations=$result['nominatedfor'];
    $resultlecture=$training_lcollection->find(['year'=>$y]);
    // print_r( $nominations);
    //print_r($nominatedids);
    // $employees = $empcollection->find($query);
    //print("<pre>".print_r($employees,true)."</pre>");
    foreach($resultlecture as $row) {
        $counter=0;
        echo "<tr><td>".$row['skill']."</td>";
        echo "<td>".$row['training_no']."</td>";
        foreach($nominations as $value){
            if ($value[0]==$row['skill']){
                echo "<td>".$value[3]."</td>";                
                $counter=1;
            break;
            }
    }if($counter==0) {
        echo "<td>-</td>";  
    }
        echo "<td>".$row['trainerName']."</td>";
        echo "<td>".$row['venue']."</td>";
        echo "<td>".$row['scheduledDate']."</td>";
        echo "<td>".$row['time'][0]."-".$row['time'][1]."</td></tr>";

    }
    ?>
  </table>
</div>
<br><br>