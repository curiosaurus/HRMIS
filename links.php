<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"></head>
<title>Training Calender</title>
<style></style>
<body>
<?php 
error_reporting(0);
        include 'adminnavbar.php';
    ?>
<center><h1>Trainning Calender</h1></center>
<br>
<center>
<?php 
require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $traininglecture=$companydb->training_lecture;
    $yearcollection=$companydb->years;
?>
    <div class="title">
        <center>
            <h2>LINKS SHEET
                <hr style="border-bottom: 2px solid#3f51b5 ; width: 50px;">
            </h2>
        </center>
    </div>
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
    window.location.href="links.php?year="+y;
}
</script>

</center>
<table class="table"  border="1">
    <tr>
        <th>Training NO</th>
        <th>Skill</th>
        <th>Date</th>
        <th>Evaluation Link</th>
        <th>Feedback Link</th>

    </tr>
    <?php
    $result=$traininglecture->find(['year'=>$y]);
    foreach($result as $row) {
            echo "<tr><td>".$row['training_no']."</td>";
            echo "<td>".$row['skill']."</td>";
            echo "<td>".$row['scheduledDate']."</td>";
            echo "<td>http://localhost:7171/HRMIS-master/empeval.php?uid=".$row['unique_id']."</td>";
            echo "<td>http://localhost:7171/HRMIS-master/trainersfeedbackform.php?uid=".$row['unique_id']."</td></tr>";

        }
    ?>
    
  </table>

</body>