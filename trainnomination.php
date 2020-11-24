<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['usertype']=='admin'){

}elseif ($_SESSION['usertype']=='hod'){

}
else{
    header('location:login.php');
}
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->empcollection;
$yearcollection=$companydb->years;
$nominationscollection=$companydb->nominations;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NOMINATION SHEET</title>
    <!-- Google font cdn file imported here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- bootstrap cdn files for the Tables and other contents  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
       if($_SESSION['usertype']=="hod"){
        include 'hodnavbar.php';
    }
    elseif ($_SESSION['usertype']=="admin") {
        include 'adminnavbar.php';
    }
?>
    <div class="title">
        <center>
            <h2>NOMINATION SHEET
                <hr style="border-bottom: 2px solid#3f51b5 ; width: 50px;">
            </h2>
        </center>
    </div>
<br><br>
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
    var s = document.getElementById("skill").value;
    window.location.href="trainnomination.php?year="+y+"&skill="+s;
}
</script>
<div class="container" style="border: 1px solid lightblue; padding: 25px;">
<h5>NAME OF PROGRAMME : </h5>
<select name="skill" id="skill" onchange="pp();" required class="form-control form-control-lg">
    <?php  
    $counter = $nominationscollection->find(['year'=>$y]);
    if(isset ($_GET['skill']) and $_GET['skill']!=""){
        foreach($counter as $row) {
            if($_GET["skill"] == $row['skill']){
                echo $row['skill'];
                ?>
                <option value = "<?php echo $row['skill']?>" selected><?php echo $row['skill']?></option>
                <?php
                $s=$row['skill']; 
        }
            else{
                ?>
                <option value = "<?php echo $row['skill']?>"><?php echo $row['skill']?></option>
                <?php
            }
        }
    }
        else{
            foreach($counter as $row) {
                ?>
                <option value = "<?php echo $row['skill']?>" selected><?php echo $row['skill']?></option>
                <?php
                $s=$row['skill'];
            }   
        }
    ?>
</select>
<br>
  <table class="table"  border="1">
    <tr>
        <th>EMP NO</th>
        <th>NAME OF EMPLOYEE</th>
        <th>DEPT</th>
        <th>Grade</th>
    </tr>
    <?php
    $nominatedresult=$nominationscollection->find(['year'=>$y,'skill'=>$s]);
    //print_r($nominatedresult);
    foreach($nominatedresult as $row) {
        $nominatedids=$row['empIds'];
    }
    $narray=[];
    foreach ($nominatedids as $key => $value) {
            array_push($narray,["Emp Code"=>$value]);
    }
    $query=['$or' => $narray];
    //print_r($nominatedids);
    $employees = $empcollection->find($query);
    //print("<pre>".print_r($employees,true)."</pre>");
    foreach($employees as $row) {
        if (isset($_SESSION['dept'])){
            $deptids=explode("_",$_SESSION['dept']);
            if ($_SESSION['location']=="Corporate"){
                if (in_array($row['Department Id'], $deptids)){
                    echo "<tr><td>".$row['Emp Code']."</td>";
                    echo "<td>".$row['Emp Display Name']."</td>";
                    echo "<td>".$row['Department Id']."</td>";
                    echo "<td>".$row['Grade Id']."</td></tr>";
                }
            }
            if (in_array($row['Department Id'], $deptids) and $row['Location Id']==$_SESSION['location']){
                echo "<tr><td>".$row['Emp Code']."</td>";
                echo "<td>".$row['Emp Display Name']."</td>";
                echo "<td>".$row['Department Id']."</td>";
                echo "<td>".$row['Grade Id']."</td></tr>";
            }
        }
        else{
            echo "<tr><td>".$row['Emp Code']."</td>";
            echo "<td>".$row['Emp Display Name']."</td>";
            echo "<td>".$row['Department Id']."</td>";
            echo "<td>".$row['Grade Id']."</td></tr>";
        }
    }
    ?>
    
  </table>
</div>

<br><br>
