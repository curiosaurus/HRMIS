<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    //require 'session.php';
    require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $db = $client->hrmis;
    $lecturecollection = $db->training_lecture;
    $eid=$_GET['empid'];
    $uid=$_GET['uid'];
    //$empname=$_GET['name'];
    //$syear=$_GET['year'];
    //$loginerror = " ";
    // if(isset($_POST["submit"])){
    //     $date = $_POST["date"];
    //     $skill_level = $_POST["skill_level"];
    //     //$venue = $_POST["venue"];
    //     //$subject = $_POST["subject"];
    //     //$duration = $_POST["duration"];
    //     //$faculty = $_POST["faculty"];
    //     $trainee_name = $_POST["trainee_name"];
    //     $emp_no = $_POST["emp_no"];
    //     $q1 = $_POST["q1"];
    //     $q2 = $_POST["q2"];
    //     $q3 = $_POST["q3"];
    //     $q4 = $_POST["q4"];
    // }
    // else{
    //     $error = "fill all details " ;
    // }  
        ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TRAINNING EFFECTIVENESS
    </title>
    <!-- Google font cdn file imported here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- bootstrap cdn files for the Tables and other contents  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- <div class="p"> -->
        <!-- NavBar for the Logo and the title -->
<?php
    //session_start();
    if($_SESSION['usertype']=="hod"){
    include 'hodnavbar.php';
}
elseif ($_SESSION['usertype']=="admin") {
    include 'adminnavbar.php';
}
?>
    <!-- Main navbar Close here -->
    <div class="title">
        <center>
           <h5>(Part-II)</h5>
        </center>
    </div>
<br>
<center>
    <!-- <div  style="width: 1140px;border: 1px solid royalblue; ;"> -->
<div class="container" style="border: 1px solid lightblue; padding: 25px;">
<br>
<center><h5>TRAINNING EFFECTIVENESS</h5></center>
<br><br>
<form action="trainingeffectivenessdata.php?emp=<?php echo $eid?>" method="post">
<table class="table" align="center">
<tr>
   <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
    Date : <input type="text" id="date" name="date"></td>
    <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
    Training Id : <input type="text" name="trainingid" value=<?php echo $uid?>></td>
    <?php
        $counter=$lecturecollection->find(['unique_id'=>$uid]);
        foreach ($counter as $row) {
            $faculty=$row['faculty'];
            $venue=$row['venue'];
            $sub=$row['skill'];
            $time=$row['time'][0]."-".$row['time'][1];
        }
    ?>
    <!-- <td>Skill level before training <input type="text" id="skill_level" value="<?php echo $prevs ?>" name="beforetraining"> -->
    <br>
    </td>
</tr>
<tr>
    <td> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
     Venue : <input type="text" name="venue" id="venue" value="<?php echo $venue ?>" disabled >
    <br><br><br>
    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
    Subject : <input type="text" name="subject" id="subject" value="<?php echo $sub ?>"disabled >
    </td>

<tr>
    <td> 
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        Duration : <input type="text" name="time" id="duration" value="<?php echo $time ?>" disabled> </td>
    <td>
    </td>
</tr>

<tr>
    
    <td>
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        Faculty : <input type="text" name="faculty" id="faculty" value="<?php echo $faculty ?>" disabled> </td>
    <td>
    </td>
</tr>
<tr>
    
    <td>
        Employee No. <input type="text" name="emp_no" id="emp_no" value="<?php echo  $eid?>" disabled>
    </td>
</tr>


</table>
</div>
<br><br>
<center>
    <!-- <div  style="width: 1140px; border: 1px solid royalblue; "> -->
        <center> 
            (TO be Filled By Trainee)
        </div></center>
<!-- <div class="container" style="border: 1px solid lightblue; padding: 25px;"> -->
<br>
<?php

$result = $lecturecollection->find(['unique_id' => $uid]);
//print("<pre>".print_r($result,true)."</pre>");
foreach ($result as $row) {
    
    $effectiveness = $row['evaluation'];
}
// print("<pre>".print_r($effectiveness,true)."</pre>");
foreach ($effectiveness as $row) {
    foreach ($row as $key => $value){
        if ($key == $eid){
            $data = $value;
            // print("<pre>".print_r($data,true)."</pre>");
            break;
        }
    }
}

?>
<td>
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        Trainee Name : <input type="text" name="trainee_name" id="trainee_name" value="<?php echo $data['name'];?>" disabled> </td>
<center>
1.Does this training are identified in skill matrix? 
    <br><br>
    Yes/No <input type="text"id="q1" name="q1" value="<?php echo $data['q1'];?> disabled">
</center>
<br>
<center>
2. Which topic did you like the most & why?
    <br><br>
    <textarea name="q2" id="q2" cols="60" rows="4" disabled><?php echo $data['q2'];?></textarea>
</center>
<br>
<center>
3. Were the content adequate and as desired.
    <br><br>
    <textarea name="q3" id="q3" cols="60" rows="4" disabled><?php echo $data['q3'];?></textarea>
    <br><br>
    4.  How will you use this training in your day to day work? Please give an example. 
    <textarea name="q4" id="q4" cols="60" rows="4" disabled><?php echo $data['q4'];?></textarea>
    <!-- <input type="submit" name="submit" value="Submit"/> -->
    </form>
</center>
</div>
<br><br>