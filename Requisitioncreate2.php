<?php

session_start();

if (!$_SESSION['usertype']=='admin' && !$_SESSION['usertype']=='hod') 
{
    header('location:login.php');
}

//require 'session.php'; 
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->skills;
$masteropt = $companydb->masteropt;
// if(isset($_POST['submit'])){
//     $managerial=$_POST['msn'];
//     $function=$_POST['fsn'];
//     $designation=$_POST['add'];
//     $dept=$_POST['System'];
//     $grade=$_POST['grade'];
// }
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
    if ($_SESSION['usertype']=='admin')
    {
    include 'adminnavbar.php';
    }
    ?>
<center>
    <div class="title">
            <h2>Skills required
                <hr style="border-bottom: 2px solid#3f51b5 ; width: 50px;">
            </h2>
    </div>
<br>
<div class="row justify-content-md-center">
<div class="col-md-3">
department : <select name="dept" id="dept" onchange='chngdept()' class="form-control">
<?php 
$counter = $masteropt->find([ 'type' => 'department' ]);
//echo $counter;
foreach($counter as $row) {
    //echo $row['value'];
    if ($_GET['dept']==$row['value']){
    echo "<option value='".$row['value']."' selected>". $row['value'] ."</option>";
}
else{
    echo "<option value='".$row['value']."' >". $row['value'] ."</option>";

}
}
?>
</select>
</div>
</div>
<div class="row justify-content-md-center">
<div class="col-md-3">
<h4>Managerial Skills</h4>
<table class="table" id="ms">
<?php 
$counter = $empcollection->find(['skilltype'=>'managerial','department'=>$_GET['dept']]);
foreach($counter as $row) {
    echo "<tr>";
    echo "<td>".$row['skillname']."</td>";
    echo "<td><a href=deleteskills.php?skname=".$row['skillname']."&sktype=".$row['skilltype']."&dept=".$row['department']."><button class='btn btn-danger'>delete</button></a></td>";#button
    echo "</tr>";
}
?>
    <tr>
        <td><input required type="text" name="Managerial" id="msn"></td>
        <td><button class="btn btn-primary" onclick="addSkill('msn','managerial')">Add</button></td>
    </tr>
    </table>
    <h4>Functional Skills</h4>
    <table class="table" id="fs">
    <?php 
$counter = $empcollection->find(['skilltype'=>'functional','department'=>$_GET['dept']]);
foreach($counter as $row) {
    echo "<tr>";
    echo "<td>".$row['skillname']."</td>";
    echo "<td><a href=deleteskills.php?skname=".$row['skillname']."&sktype=".$row['skilltype']."&dept=".$row['department']."><button class='btn btn-danger'>delete</button></a></td>";#button
    echo "</tr>";
}
?>
    <tr>
        <td><input required type="text" name="Functional" id="fsn"></td>
        <td><button class="btn btn-primary" onclick="addSkill('fsn','functional')">+</button></td>
    </tr>   
    </table>   
    <h4>System Skills</h4><table class="table" id="ssn">
    <?php 
$counter = $empcollection->find(['skilltype'=>'system','department'=>$_GET['dept']]);
foreach($counter as $row) {
    echo "<tr>";
    echo "<td>" .$row['skillname']."</td>";
    echo "<td><a href=deleteskills.php?skname=".$row['skillname']."&sktype=".$row['skilltype']."&dept=".$row['department']."><button class='btn btn-danger'>delete</button></a></td>";#button
    echo "</tr>";
}
?>
    <tr>
        <td><input required type="text" name="System" id="si"></td>
        <td><button class="btn btn-primary" onclick="addSkill('si','system')">+</button></td>
    </tr>
    </table>
    <?php 
        $dept=$_GET['dept'];
    ?>
<script>
        function addSkill(p1, p2) {
            value=document.getElementById(p1).value;
            //window.alert('lol'+p1+p2);
            var e = document.getElementById("dept");
            var dept = e.options[e.selectedIndex].value;
            //window.alert(dept);
            window.location.replace("addskills.php?skname="+value+"&sktype="+p2+"&dept="+dept);   // The function returns the product of p1 and p2
        }
        function deleteSkill(p1,p2){
            //window.alert('lol'+p1+p2);
            window.location.replace("deleteskills.php?skname="+p1+"&sktype="+p2&"dept="+document.getElementById('dept').value);
        }
        function chngdept(){
            var e = document.getElementById("dept");
            var dept = e.options[e.selectedIndex].value;
            window.location.replace("Requisitioncreate2.php?dept="+dept);
        }
</script>
<button class="btn btn-primary btn-lg btn-block" style="height:10%; width: 20%;" name="submit">submit</button>
</div>
</body>
</html>