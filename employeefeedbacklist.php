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
<?php
$y=$_GET['year'];

?>
<input name="year" id="year" value="<?php echo $_GET['year'];  ?>" hidden/> 
<input name="skill" id="skill" value="<?php echo $_GET['uniqueid'];  ?>" hidden/> 

<script>
function pp(){
    var year=document.getElementById("year").value;
    var y = document.getElementById("skill").value;
    window.location.href="employeefeedbacklist.php?uid="+p+"&uniqueid="+y+"&year="+year;
}
</script>
        </div>
    </div>
    </div>
    <br><br>




    <table class="table3" border="2" style="width:100%">
    <thead>    
    <tr>
            <th>Emp Id</th>
            <th>Emp Name</th>
            <th>Designation</th>
            <th>Grade</th>
            <!-- <th>Education</th> -->
            <th>Total Experience</th>
            <th>Feedback</th>
    </tr>
    </thead>    
    <tbody>
<?php
        //database retrive
        //echo "lol";
        //$y=$_GET['year'];
        $training_lecture = $companydb->training_lecture;
        $counter = $training_lecture->find(['unique_id' => $_GET['uniqueid'] ]);
        foreach ($counter as $row) {
            $effectiveness = $row['feedback'];
        }
        foreach ($effectiveness as $row1) {
            foreach ($row1 as $key => $value){
                // print("<pre>".print_r($data,true)."</pre>");
            $empcollection = $companydb->empcollection;
            $counter1 = $empcollection->find(['Emp Code'=>$key]);
            echo "<tr>";
            foreach($counter1 as $row) {
    $pas = $row['Emp Code'];
    $name=$row['Emp Display Name'];
    echo "<td>" . $row['Emp Code'] ."</td>";
    echo "<td>" . $row['Emp Display Name'] ."</td>";
    echo "<td>" . $row['Designation'] ."</td>";
    echo "<td>" . $row['Grade Id'] ."</td>";
    // echo "<td>" . $row['EDUCATION'] ."</td>";
    echo "<td>" . $row['TOTAL EXP'] ."</td>";
    echo "<td><a href='viewtrainersfeedback.php?empid=".$pas."&uid=".$_GET['uniqueid']."&name=".$name."&year=".$y."'>View Feedback </a>" ."</td>";
    #add just this line whenever you create  viewrequisition  33111`3
    //getting values in page2.php file by $_GET function:
    //$x=$_GET['variable1'];

echo "</tr>";
}
        }
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