<?php
session_start();
require 'vendor\autoload.php'; 

$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->user;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Effctivenes Matrix</title>
    <!-- Google font cdn file imported here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- bootstrap cdn files for the Tables and other contents  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">
    <style>
        table,
        th {
            border: 1px solid black;
            width: 500px;
        }        
        .table2 {
            border: 1px solid black;
            width: 500px;
        }
        .table3 tr th td {
            border: 1px solid black;
            width: 100%;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
<?php
        if ($_SESSION['usertype']=='hod'){
            include 'hodnavbar.php';
        }
        elseif ($_SESSION['usertype']=='admin') {
            include 'adminnavbar.php';
        }
?>
    <center>
        <h1>Employee Feedback</h1>
        <br>
    </center>


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
    <br><br>

 
<?php 
echo '<div class="col-md-3"><div class="dropdown">';
$skills = $companydb->skills;
    $counter = $skills->distinct('skillname');
    //print("<pre>".print_r($counter,true)."</pre>");
    ?>
    <select name="skill" id="skill" onchange="pp();" required class="form-control form-control-lg">
    <?php  
    if(isset ($_GET['skill'])){
        foreach($counter as $row) {
            if($_GET["skill"] == $row){
                ?>
                <option value = "<?php echo $row;?>" selected><?php echo $row;?></option>
                <?php
            $s=$row; 
            
        }
        else{
            ?>
                <option value = "<?php echo $row;?>" ><?php echo $row;?></option>
                <?php
            }
            
        }
    }
    else{
        foreach($counter as $row) {
            ?>
                <option value = "<?php echo $row;?>" ><?php echo $row;?></option>
                <?php
                $s=$row;
                
            }   
        }
        
    ?>

</select>
<script>
function pp(){
    var y = document.getElementById("year").value;
    var s = document.getElementById("skill").value;
    window.location.href="listviewfeedback.php?year="+y+"&skill="+s;
}
</script>
        </div>
    </div>
    </div>
    <br><br>

<?php
    $training_lecture = $companydb->training_lecture;
    $counter = $training_lecture->find(['year'=>$y,'skill'=>$s, 'feedback'=>array('$exists'=>true)]);
?>
    <table class="table3" border="2" style="width:100%">
    <thead>    
    <tr>
            <th>Training No</th>
            <th>Training Name</th>
            <th>Date</th>
            <th>Feedback</th>
    </tr>
    </thead>    
    <tbody>
<?php
        //database retrive
        //echo "lol";
        //$y=$_GET['year'];
            echo "<tr>";
            foreach($counter as $row) {
    $pas = $row['unique_id'];
    echo "<td>" . $row['training_no'] ."</td>";
    echo "<td>" . $row['skill'] ."</td>";
    echo "<td>" . $row['scheduledDate'] ."</td>";
    echo "<td><a href='employeefeedbacklist.php?uniqueid=$pas&year=$y'>View Feedback </a>" ."</td>";
    #add just this line whenever you create  viewrequisition  33111`3
    //getting values in page2.php file by $_GET function:
    //$x=$_GET['variable1'];
}
echo "</tr>";
?>
    </tbody>
    </table>
    <br>
    <!-- <center>
        <a href="update.html"><button name="" class="btn btn-block btn-primary">  SUBMIT</button></a>
    </center> -->
</body>
</html>