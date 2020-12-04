<!DOCTYPE html>
<html lang="en">
    <?php
    error_reporting(0);
    session_start();
    //require 'session.php';
    require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $db = $client->hrmis;
    $empcollection= $db->empcollection;
    $lecturecollection = $db->training_lecture;
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
    <title>TRAINNING ATTENDANCE</title>
    
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
<br>
<center>
    <!-- <div  style="width: 1140px;border: 1px solid royalblue; ;"> -->
<div class="container" style="border: 1px solid lightblue; padding: 20px;">
<center><h6>TRAINNING ATTENDANCE</h6></center>
<br>
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
            $trainer=$row['trainerName'];
        }
    ?>
    <!-- <td>Skill level before training <input type="text" id="skill_level" value="<?php echo $prevs ?>" name="beforetraining"> -->
</tr>
<tr>
    <td>  &nbsp;&nbsp;&nbsp;&nbsp;
     Venue : <input type="text" name="venue" id="venue" value="<?php echo $venue ?>" disabled >
     &nbsp;&nbsp;&nbsp;&nbsp;
     Subject : <input type="text" name="subject" id="subject" value="<?php echo $sub ?>"disabled >
    </td>
    </tr>
<tr>
    <td> 
    &nbsp;&nbsp;&nbsp;&nbsp;
        Duration : <input type="text" name="time" id="duration" value="<?php echo $time ?>" disabled>
        &nbsp;&nbsp;&nbsp;&nbsp; Faculty : <input type="text" name="faculty" id="faculty" value="<?php echo ($faculty.",".$trainer) ?>" disabled> </td>
    <td>
</tr>
<tr>
</tr>


</table>
</div><br>
<center>
    <!-- <div  style="width: 1140px; border: 1px solid royalblue; "> -->
<!-- <div class="container" style="border: 1px solid lightblue; padding: 25px;"> -->
<br>
<table class="table">
    <thead>
        <th>EMP Code</th>
        <th>EMP Name</th>
        <th>Department</th>
    </thead>
    <tbody>
<?php
$result = $lecturecollection->find(['unique_id' => $uid]);

foreach ($result as $row) {
    $attended = $row['attended_id'][0];
    
}

foreach ($attended as $value) {
    //echo $value;
    $result = $empcollection->findOne(['Emp Code' => $value]);
    echo"<tr><td>$value</td>";
    echo"<td>".$result['Emp Display Name']."</td>";
    echo"<td>".$result['Department Id']."</td></tr>";
    
}
?>
</tbody>
</table>
</center>
</div>
<br><br>