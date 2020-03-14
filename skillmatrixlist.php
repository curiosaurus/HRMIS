
<?php

require 'vendor\autoload.php'; 

$client = new MongoDB\Client;
$companydb = $client->companydb;
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
                <select required class="form-control form-control-lg">
                    <option>YEAR JANUARY 2019 TO DECEMBER 2019</option>
                    <option>YEAR JANUARY 2019 TO DECEMBER 2019</option>
                    <option>YEAR JANUARY 2019 TO DECEMBER 2019</option>
                    <option>YEAR JANUARY 2019 TO DECEMBER 2019</option>
                  </select>
            </div>

        </div>
    </div>
    <br><br>
    <div class="container" style="border: 1px solid lightblue; padding: 2px;">

        <div class="row justify-content-md-around">

            <!-- <div class="col-md-0">
                <h4><label> DEPARTMENT</label></h4>
            </div>


            <div class="col-md-8">
                <h4><label>ACCOUNTS & EXCISE</label></h4>
            </div> -->
  <?php
    echo '<div class="col-md-3"><div class="dropdown">';
    $masteropt='masteropt';
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $empcollection = $companydb->$masteropt;
    $counter = $empcollection->find(['type'=>'department']);
    echo'<select name="department" id="department" onchange="pp();">';
    if(!isset ($_GET['uid'])){
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
    window.location.href="skillmatrixlist.php?uid="+p;
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

        //database retrive
        $companydb = $client->companydb;
        $empcollection = $companydb->user;
        $counter = $empcollection->find(['DEPARTMENT ID'=>$deptid]);
        foreach($counter as $row) {
    
    // echo $var;
    $pas=$row['Emp code']
    echo "<tr>";
    echo "<td>" . $row['Emp Code'] ."</td>";
    echo "<td>" . $row['Emp Display Name'] ."</td>";
    echo "<td>" . $row['TOTAL EXP'] ."</td>";
    echo "<td>" . $row['GRADE ID'] ."</td>";
    echo "<td>" . $row['DEPARTMENT ID'] ."</td>";
    echo "<td><a href='skillmatrix.php?variable1=".$pas."'>Upload</a>" ."</td>";
    #add just this line whenever you create  viewrequisition  33111`3
    //getting values in page2.php file by $_GET function:
    //$x=$_GET['variable1'];
    echo "</tr>";
}
?>

    </tbody>


    </table>
    <br>


    <center>
        <a href="update.html"><button name="" class="btn btn-block btn-primary">  SUBMIT</button></a>
    </center>
</body>

</html>
