<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['usertype']=='employee'){

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
    <title>NOMINATION SHEET</title>
    <!-- Google font cdn file imported here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- bootstrap cdn files for the Tables and other contents  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    include 'employeenavbar.php'
?>
    <div class="title">
        <center>
            <h2>NOMINATION SHEET
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
    window.location.href="empnominationview.php?year="+y;
}
</script>
<div class="container" style="border: 1px solid lightblue; padding: 25px;">
<br>
  <table class="table"  border="1">
    <tr>
        <th>Skill</th>
        <th>Required</th>
        <th>Actual</th>
        <th>Status</th>
    </tr>
    <?php
    $skillyearcollection=$companydb->$y;
    $result=$skillyearcollection->findOne(['empcode'=>$_SESSION["Emp Code"]]);
    //print_r($result);
    $narray=[];
    $nominations=$result['nominatedfor'];
    // print_r( $nominations);

    //print_r($nominatedids);
    // $employees = $empcollection->find($query);
    //print("<pre>".print_r($employees,true)."</pre>");
    foreach($nominations as $row) {
        echo "<tr><td>".$row[0]."</td>";
        echo "<td>".$row[1]."</td>";
        echo "<td>".$row[2]."</td>";
        echo "<td>".$row[3]."</td></tr>";

    }
    ?>
  </table>
</div>

<br><br>
