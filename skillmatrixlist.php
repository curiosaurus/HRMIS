<?php
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
    <title>Skill Matrix</title>
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
    include 'hodnavbar.php';
?>
    <center>
        <h1>SKILL MATRIX</h1>
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
    <div class="container" style="border: 1px solid lightblue; padding: 2px;">
        <div class="row justify-content-md-around">
  <?php
    echo '<div class="col-md-3"><div class="dropdown">';
    $masteropt = $companydb->masteropt;
    $counter = $masteropt->find(['type'=>'department']);
    echo'<select name="department" id="department" onchange="pp();">';
    if(isset ($_GET['uid'])){
    foreach($counter as $row) {
        if($_GET["uid"] == $row['value']){
        echo "<option value = ".$row['value']." selected>". $row['value'] ."</option>";
        $deptid=$row['value']; 
    }
        else{
            echo "<option value = ".$row['value']." >". $row['value'] ."</option>";
        }
    }
}
    else{
        foreach($counter as $row) {
            echo "<option value = ".$row['value']." selected>". $row['value'] ."</option>";
            $deptid=$row['value'];
        }   
    }
echo '</select>';
?>
<script>
function pp(){
    var p = document.getElementById("department").value;
    var y = document.getElementById("year").value;
    window.location.href="skillmatrixlist.php?uid="+p+"&year="+y;
}
</script>
        </div>
    </div>
    <br><br>
    <table class="table3" border="2" style="width:100%">
    <thead>    
    <tr>
            <th>Emp Code</th>
            <th>Emp Display Name</th>
            <th>Designation</th>
            <th>Grade</th>
            <th>Education</th>
            <th>Total Experience</th>
            <th>Skill Matrix</th>
        </tr>
    </thead>    
    <tbody>
<?php
        //database retrive
        //echo "lol";
        //$y=$_GET['year'];
        $empcollection = $companydb->empcollection;
        $counter = $empcollection->find(['Department Id'=>$deptid]);
        foreach($counter as $row) {
    //echo $row;
    //echo "lol";
    $pas=$row['Emp Code'];
    echo "<tr>";
    echo "<td>" . $row['Emp Code'] ."</td>";
    echo "<td>" . $row['Emp Display Name'] ."</td>";
    echo "<td>" . $row['Designation'] ."</td>";
    echo "<td>" . $row['Grade Id'] ."</td>";
    echo "<td>" . $row['EDUCATION'] ."</td>";
    echo "<td>" . $row['TOTAL EXP'] ."</td>";
    echo "<td><a href='skillmatrix.php?variable1=".$pas."&year=".$y."'>Upload</a>" ."</td>";
    #add just this line whenever you create  viewrequisition  33111`3
    //getting values in page2.php file by $_GET function:
    //$x=$_GET['variable1'];
    echo "</tr>";
}
?>
    </tbody>
    </table>
    <br>
    <!-- <center>
        <a href="update.html"><button name="" class="btn btn-block btn-primary">  SUBMIT</button></a>
    </center> -->
</body>
</html>