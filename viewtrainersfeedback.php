<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $db = $client->hrmis;
    $lecturecollection = $db->training_lecture;
    $lecturecollection = $db->training_lecture;
    $eid=$_GET['empid'];
    $uid=$_GET['uid'];
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TRAINNING FEEDBACK FORM
    </title>
    <!-- Google font cdn file imported here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- bootstrap cdn files for the Tables and other contents  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">


</head>

<body>
<?php 
if ($_SESSION['usertype']=='admin'){
include 'adminnavbar.php';
}
?>

<div class="container" style="padding: 25px;">
<br>
<center><h5>TRAINNING FEEDBACK FORM</h5></center>
<br><br>



<?php
$unique_id = $_GET['uid'];

$counter=$lecturecollection->find(['unique_id'=>$unique_id]);

foreach ($counter as $row) {
    $date = $row['scheduledDate'];
    $faculty=$row['faculty'];
    $venue=$row['venue'];
    $sub=$row['skill'];
    $time=$row['time'][0]."-".$row['time'][1];
}
?>




<div class="row justify-content-center">
    <div class="col-1">
        <label for="Date">Date</label>
    </div>
    <div class="col-2">
        <input type="text" name="Date" id="Date" value="<?php echo $date; ?>" disabled >
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-1">
        <label for="Venue">Venue</label>
    </div>
    <div class="col-2">
        <input type="text" name="Venue" id="Venue" value="<?php echo $venue; ?>" disabled >
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-1">
        <label for="Subject">Subject</label>
    </div>
    <div class="col-2">
        <input type="text" name="Subject" id="Subject" value="<?php echo $sub; ?>" disabled >
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-1">
        <label for="Duration">Duration</label>
    </div>
    <div class="col-2">
        <input type="text" name="Duration" id="Duration" value="<?php echo $time; ?>" disabled >
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-1">
        <label for="Faculty">Faculty</label>
    </div>
    <div class="col-2">
        <input type="text" name="Faculty" id="Faculty" value="<?php echo $faculty; ?>" disabled >
    </div>
</div>
<br><br><br>

<hr class= "border border-primary">
   <center> <label> Rating    5 - Excellent, 4 - Best, 3 - Good, 2 - Fair, 1 - Poor  </label> </center>
<hr class= "border border-primary">
<?php

$result = $lecturecollection->find(['unique_id' => $uid]);
//print("<pre>".print_r($result,true)."</pre>");
foreach ($result as $row) {
    
    $effectiveness = $row['feedback'];
}
//print("<pre>".print_r($effectiveness,true)."</pre>");
foreach ($effectiveness as $row) {
    foreach ($row as $key => $value){
        if ($key == $eid){
            $data = $value;
            // print("<pre>".print_r($data,true)."</pre>");
            break;
        }
    }
}
// print("<pre>".print_r($data,true)."</pre>");
?>
<br><br>

<form action="redirecttrainingeedback.php" method="post" >

<input type="text" name="unique_id" id="unique_id" value="<?php echo $unique_id ?>" hidden>

<div class="row justify-content-center">
    <div class="col-2">
        <label >Emp Name</label>
    </div>
    <div class="col-2">
        <input type="text" name="emp_name" id="emp_name" value="<?php echo $data['name'];?>" disabled>
    </div>
    <div class="col-2"></div>
    <div class="col-2">
        <label >Emp Code</label>
    </div>
    <div class="col-2">
        <input type="text" name="emp_code" id="emp_code" value="<?php echo $eid;?>" disabled>
    </div>
</div>
<br>

<div class="row justify-content-center">
    <div class="col-2">
        <label >1.Material / Matter Relevance</label>
    </div>
    <div class="col-2">
        <input type="text" name="material" id="material" value="<?php echo $data['q1'];?>" disabled>
    </div>
    <div class="col-2"></div>
    <div class="col-2">
        <label >2.Presentation Method</label>
    </div>
    <div class="col-2">
        <input type="text" name="presentation" id="presentation" value="<?php echo $data['q2'];?>" disabled>
    </div>
</div>
<br>

<div class="row justify-content-center">
    <div class="col-2">
        <label >3. Communication Skill </label>
    </div>
    <div class="col-2">
        <input type="text" name="communication" id="communication"  value="<?php echo $data['q3'];?>" disabled>
    </div>
    <div class="col-2"></div>
    <div class="col-2">
        <label >4. Program Duration </label>
    </div>
    <div class="col-2">
        <input type="text" name="program" id="program" value="<?php echo $data['q4'];?>" disabled>
    </div>
</div>
<br>

<div class="row justify-content-center">
    <div class="col-2">
        <label >5. Group Participation</label>
    </div>
    <div class="col-2">
        <input type="text" name="group" id="group" value=" <?php echo $data['q5'];?>" disabled>
    </div>
    <div class="col-2"></div>
    <div class="col-1">
        <label >5. Total</label>
    </div>
    <div class="col-1">
        <label >25</label>
    </div>
    <div class="col-2">
        <input type="text" name="total" id="total"  value="<?php echo $data['q6'];?>" disabled>
    </div>
</div>

<br><br><br>

<hr class= "border border-primary">
   <center> <label> How will you use this training ? Please comment. </label> </center>
<hr class= "border border-primary">

<br>

<div class="row justify-content-center">
    <div class="col-4">
        <textarea name="comment" id="comment" cols="60" rows="5" disabled><?php echo $data['q7'];?></textarea>
    </div>  
</div>

<br><br>


<hr class= "border border-primary">

<br><br>

   <!-- <center>  <input type="submit" class="btn btn-primary" name="submit" value="submit" >   </center>  -->

<br><br>
</form>


    </div>
    </body>
</html> 