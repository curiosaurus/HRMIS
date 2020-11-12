<!DOCTYPE html>
<html lang="en">
<?php
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->empcollection;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOD and ADMIN DASHBOARD</title>
    <!-- Google font cdn file imported here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- bootstrap cdn files for the Tables and other contents  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">

</head>
<body>
<?php
    include 'adminnavbar.php';
    ?>    <br><br>
    <center>
        <div class="interview">
            <div class="block">
              <h2> Manage Year</h2>
            <hr class="line">
            
            </div>
        </div>
        <form action="trainingScheduleData.php" method="post">
    <div class="container" style="border: 1px solid lightblue; padding: 2px;">
        <div class="row justify-content-md-around">
            <div class="col-md-0">
                <h4><label> Year</label></h4>
            </div>
            <div class="col-md-8">
                <select name="year" id="year" onchange="pp();" required class="form-control form-control-lg">
                    <?php  
                    $years=$companydb->years;
                    $counter = $years->find();
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
            </div>

        </div>
    </div>
<div>
    <br><br>
<div class="container" style="border: 1px solid lightblue; padding: 25px;">
<?php
    $nominations = $companydb->nominations;
    $counter = $nominations->find(['year'=>$y]);
    echo'<div class="col-md-3" ><label style="font-size: 20px;"> Skill </label></div>';
    echo '<div class="col-md-3"><div class="dropdown">';
    echo'<select name="skill" id="skill" onchange="pp();">';
    if(isset ($_GET['uid'])){
    foreach($counter as $row) {
        if($_GET["uid"] == $row['skill']){
        ?><option value = "<?php echo $row['skill']?>" selected><?php echo $row['skill']?></option><?php
        
        $deptid=$row['skill']; 
    }
        else{
            ?><option value = "<?php echo $row['skill']?>" ><?php echo $row['skill']?></option><?php

        }
    }
}
    else{
        foreach($counter as $row) {
            ?><option value = "<?php echo $row['skill']?>" selected><?php echo $row['skill']?></option><?php
            $deptid=$row['skill'];
        }   
    }
echo '</select>';
?>
</div>
</div>
<script>
function pp(){
    var p = document.getElementById("skill").value;
    var y = document.getElementById("year").value;
    window.location.href="trainingschedule.php?uid="+p+"&year="+y;
}
</script>
<br>
    <div class="row justify-content-md-start">
        <div class="col-md-3" >
            <label style="font-size: 20px;"> Training Number </label>
        </div>
        <div class="col-md-4">
            <input type="number" name="tno" required class="form-control" >
        </div>
    </div>
<br>
<br>
    <div class="row justify-content-md-start">
        <div class="col-md-3" >
            <label style="font-size: 20px;"> Scheduled Date </label>
        </div>
        <div class="col-md-4">
            <input type="date" required class="form-control" name="scheduledDate">
        </div>
    </div>
<br>
    <div class="row justify-content-md-start">
        <div class="col-md-3" >
            <label style="font-size: 20px;"> Time </label>
        </div>
        <div class="col-md-4">
            <input type="time" required class="form-control" name="time[]"> 
        </div>
        to &nbsp;&nbsp;
        <div class="col-md-end">
            <input type="time" required  name="" id="" name="time[]">
        </div>
    </div>
<br>
    <div class="row justify-content-md-start">  
        <div class="col-md-3" >
            <label style="font-size: 20px;"> Trainer name </label>
        </div>
        <div class="col-md-4">
            <input type="text" required class="form-control" name="trainerName">
        </div>
    </div>
<br>
    <div class="row justify-content-md-start">      
        <div class="col-md-3" >
            <label style="font-size: 20px;"> Faculty/organisation </label>
        </div>
        <div class="col-md-4">
            <input type="text" required class="form-control" name="faculty">
        </div>
    </div>
<br>
    <div class="row justify-content-md-start">          
        <div class="col-md-3" >
            <label style="font-size: 20px;"> Venue </label>
        </div>
        <div class="col-md-4">
            <input type="text" required class="form-control" name="venue">
        </div>
    </div>
</div>
</div>
<input type="submit" value="Submit" name="Submit" class="btn btn-primary">
</form>
</body>
</html>