<?php
    // require 'session.php'	
    require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $empcollection = $companydb->masteropt;
    if(isset($_POST['submit']))
{   $location=$_POST['msn'];
    $address=$_POST['msn1'];
    $designation=$_POST['add'];
    $dept=$_POST['dept'];
    $grade=$_POST['grade'];
    echo $location;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HR & Admin dashbord</title>
    <!-- Google font cdn file imported here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- bootstrap cdn files for the Tables and other contents  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">
</head>
<div>
    <?php
    include 'adminnavbar.php';
    ?>
    <center>
    <div class="title">
            <h2>EMPLOYEE MASTER
                <hr style="border-bottom: 2px solid#3f51b5 ; width: 50px;">
            </h2>
    </div>
<br>
<div class="row justify-content-md-center">
<div class="col-md-3">
department : <select name="dept" id="dept">
</select>
</div>
</div>
<div class="row justify-content-md-center">
<div class="col-md-3">
<h4>Location</h4>
<table class="table" id="ms">
<?php 
$counter = $empcollection->find(['type'=>'location']);
foreach($counter as $row) {
    echo "<tr>";
    echo "<td>" . $row['city'] ."</td>";
    echo "<td>" . $row['address'] ."</td>";
    echo "<td><a href='deletemasteropt.php?req=".$row['address']."&type=location' target='_blank'><button class='btn btn-danger'>Delete</button></td>";#button
    echo "</tr>";
}
?>
    <form method="POST" action="adddatatomastertemplate.php">
    <tr>
        <td><input type="text" name="msn" required id="msn" placeholder="location" require></td>

        <td><input type="text" name="msn1" required id="m1" placeholder="Address" require></td>
        <td><button class="btn btn-primary" onclick="addSkill('ms')">+</button></td> 
    </tr>
    </form>
    </table>
    <h4>Designation</h4>
    <table class="table" id="fs">
    <?php 
    $counter = $empcollection->find(['type'=>'designation']);
    foreach($counter as $row) {
        echo "<tr>";
        echo "<td>" . $row['value'] ."</td>";
        echo "<td><a href='deletemasteropt.php?req=".$row['value']."&type=designation' target='_blank'><button class='btn btn-danger'>Delete</button></td>";#button
        echo "</tr>";
}
?>
    <tr><form action="">
        <td><input type="text" required name="add" id="fsn"></td>
        <td><button class="btn btn-primary" onclick="addSkill('fs')">+</button></td>
        </form>
    </tr>
    </table>   
    <h4>Department</h4>
    <table class="table">
    <?php 
    $counter = $empcollection->find(['type'=>'department']);
    foreach($counter as $row) {
        echo "<tr>";
        echo "<td>" . $row['value'] ."</td>";
        echo "<td><a href='deletemasteropt.php?req=".$row['value']."&type=designation' target='_blank'><button class='btn btn-danger'>Delete</button></td>";#button
        echo "</tr>";
}
?>

    <tr>
    <form action="">
        <td><input type="text" required name="dept" id="ssn"></td>
        <td><button class="btn btn-primary" onclick="addSkill('ss')">+</button></td>
    </form>
    </tr>
    </table>
    <h4>Grade</h4><table class="table" id="ssn">
    <?php 
$counter = $empcollection->find(['type'=>'grade']);
foreach($counter as $row) {
    echo "<tr>";
    echo "<td>" . $row['value'] ."</td>";
    echo "<td><a href='deletemasteropt.php?req=".$row['value']."&type=grade' target='_blank'><button class='btn btn-danger'>Delete</button></td>";#button
    echo "</tr>";
}
?>
    <tr>
        <td><input type="text" required name="grade" id="ssn"></td>
        <td><button class="btn btn-primary" onclick="addSkill('ss')">+</button></td>
    </tr>
    </table>
<script>
function addSkill(tid) {
var table = document.getElementById(tid);
var row = table.insertRow(1);
var cell1 = row.insertCell(0);
cell1.innerHTML = '<input type="text" required name="" id="" value='+document.getElementById(tid+'n').value+">";
var cell2 = row.insertCell(-1);
cell2.innerHTML = '<td><button   class="btn btn-danger">Delete</button></td>';
}

function addlocation(tid) {
var check=document.getElementById(m1);
if(check==null)
{
    alert(insert);
}    
else
{
var table = document.getElementById(tid);
var row = table.insertRow(1);
var cell1 = row.insertCell(0);
cell1.innerHTML = '<input type="text" name="" id="" value='+document.getElementById(tid+'n').value+">";
var cell3 = row.insertCell(1);
cell3.innerHTML = '<input type="text" name="" id="" value='+document.getElementById('m1').value+">";
var cell2 = row.insertCell(2);
cell2.innerHTML = '<td><button   class="btn btn-danger">Delete</button></td>';
}
</script>
<button class="btn btn-primary btn-lg btn-block" style="height:10%; width: 20%;" name="sub">submit</button>
</div>
</form>
</body>
</html>