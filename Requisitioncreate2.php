<!DOCTYPE html>
<?php
require 'session.php'; 
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->companydb;
$empcollection = $companydb->empollection;
?>

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
            <h2>Skills required
                <hr style="border-bottom: 2px solid#3f51b5 ; width: 50px;">
            </h2>
    </div>
<br>
<form method="POST" action="Requisitioncreate2.php">
 <div class="row justify-content-md-center">
<div class="col-md-3">
<h4>Managerial Skills</h4>
<table class="table" id="ms">
<?php 
$counter = $empcollection->find();
foreach($counter as $row) {
    echo "<tr>";
    echo "<td>" . $row['skill name'] ."</td>";
    echo "<td><button class='btn btn-primary' onclick='deleteSkill('ms')'>+</button></td>";#button
    echo "</tr>";
}
?>

    <tr>
        <td><input type="text" name="Managerial" id="msn"></td>
        <td><button class="btn btn-primary" onclick="addSkill('ms')">+</button></td>
    </tr>
    </table>
    <h4>Functional Skills</h4>
    <table class="table" id="fs">
    <?php 
$counter = $empcollection->find();
foreach($counter as $row) {
    echo "<tr>";
    echo "<td>" . $row['skill name'] ."</td>";
    echo "<td><button class='btn btn-primary' onclick='deleteSkill('ms')'>+</button></td>";#button
    echo "</tr>";
}
?>

    <tr>
        <td><input type="text" name="Functional" id="fsn"></td>
        <td><button class="btn btn-primary" onclick="addSkill('fs')">+</button></td>
    </tr>   
    </table>   
    <h4>System Skills</h4><table class="table" id="ssn">
    <?php 
$counter = $empcollection->find();
foreach($counter as $row) {
    echo "<tr>";
    echo "<td>" . $row['skill name'] ."</td>";
    echo "<td><button class='btn btn-primary' onclick='deleteSkill('ms')'>+</button></td>";#button
    echo "</tr>";
}
?>

    <tr>
        <td><input type="text" name="System" id="ssn"></td>
        <td><button class="btn btn-primary" onclick="addSkill('ss')">+</button></td>
    </tr>
    </table>
<script>
function addSkill(tid) {
var table = document.getElementById(tid);
var row = table.insertRow(1);
var cell1 = row.insertCell(0);
cell1.innerHTML = '<input type="text" name="" id="" value='+document.getElementById(tid+'n').value+">";
var cell2 = row.insertCell(-1);
cell2.innerHTML = '<td><button   class="btn btn-danger">Delete</button></td>';
}
</script>
<button class="btn btn-primary btn-lg btn-block" style="height:10%; width: 20%;">submit</button>
</div>
     </form>
</body>
</html>
