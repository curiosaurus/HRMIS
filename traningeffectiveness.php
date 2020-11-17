<!DOCTYPE html>
<html lang="en">
    <?php
    //session_start();
    require 'session.php';
    require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $db = $client->hrmis;
    $lecturecollection = $db->training_lecture;
    
    $eid=$_GET['empid'];
    $uid=$_GET['uid'];
    $empname=$_GET['name'];
    $syear=$_GET['year'];
    $loginerror = " ";
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
    <div class="p">
        <!-- NavBar for the Logo and the title -->
<?php
    //session_start();
    if($_SESSION['usertype']=="hod"){
    include 'hodnavbar.php';
}
elseif ($_SESSION['usertype']=="admin") {
    include 'adminavbar.php';
}
?>
    <!-- Main navbar Close here -->
    <div class="title">
        <center>
           <h5>(Part-III)</h5>
        </center>
    </div>
<br>
<center>
    <div  style="width: 1140px;border: 1px solid royalblue; ;">
        <center>To be filled in after 1 Month of training</center>
        </div></center>
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
    Training Id : <input type="text" name="trainingid" value="<?php echo $uid?>"></td>
    <?php
        $counter=$lecturecollection->find(['unique_id'=>$uid]);
        foreach ($counter as $row) {
            $faculty=$row['faculty'];
            $venue=$row['venue'];
            $sub=$row['skill'];
            $time=$row['time'][0]."-".$row['time'][1];
        }
        $syearcollection=$db->$syear;
        $counter=$syearcollection->find(['empcode'=>$eid]);
        foreach ($counter as $row) {
            foreach ($row['managerialSkill'] as $skill) {
                if ($sub==$skill[0]){
                    $prevs=$skill[2];
                }
            }
            foreach ($row['preferredSkill'] as $skill) {
                if ($sub==$skill[0]){
                    $prevs=$skill[2];
                }
            }
            foreach ($row['systemRequirements'] as $skill) {
                if ($sub==$skill[0]){
                    $prevs=$skill[2];
                }
            }
        }
    ?>
    <td>Skill level before training <input type="text" id="skill_level" value="<?php echo $prevs ?>" name="beforetraining">
    <br>
   <b>Legend:</b> 
    </td>
</tr>
<tr>
    <td> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
     Venue : <input type="text" name="venue" id="venue" value="<?php echo $venue ?>" disabled >
    <br><br><br>
    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
    Subject : <input type="text" name="subject" id="subject" value="<?php echo $sub ?>"disabled >
    </td>
     <td>
         <table class="table" border="1">
             <tr>
                 <td>Training Required</td>
                 <td>0</td>
             </tr>
             <tr>
                 <td>Work can be assign under Supervision</td>
             <td>1</td>
                </tr>
             <tr>
                <td>Capable to work individually</td>
            <td>2</td>
               </tr>               
             <tr>
                <td>Capable to work individually & train others</td>
            <td>3</td>
               </tr>
         </table> 
     </td>
 </tr>

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
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        Trainee Name : <input type="text" name="trainee_name" id="trainee_name" value="<?php echo $empname?>" disabled> </td>
    <td>
        Employee No. <input type="text" name="emp_no" id="emp_no" value="<?php echo  $eid?>" disabled>
    </td>
</tr>


</table>
</div>
<br><br>
<center>
    <div  style="width: 1140px; border: 1px solid royalblue; ">
        <center> 
            (Review done by HOD)
        </div></center>
<div class="container" style="border: 1px solid lightblue; padding: 25px;">
<br>
<center>
    1. Has the trainee implemented this in his/her working area?
    <br><br>
    Yes/No <input type="text"id="q1" name="q1">
</center>
<br>
<center>
    2. If yes, where give example or evidence or other specification
    <br><br>
    Yes/No <input type="text"id="q2" name="q2">
</center>
<br>
<center>
    3. are you satisfied with tranning? 
    Yes/No 
    <br><br>
    a) If yes, please confirm trainee Skill level after tranning (_______) <br>
    <input type="text"id="q3" name="q3">
    <br><br>
    b) If No, why
    <input type="text"id="q4" name="q4">
    <input type="submit" name="submit" value="Submit"/>
    </form>
</center>
</div>
<br><br>