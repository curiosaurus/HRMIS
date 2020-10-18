<?php

session_start();
//require 'db.php';

if (!$_SESSION['email']=='pavan' && !$_SESSION['email']=='nishad')
{
    header('location:login.php');

}

    require 'vendor\autoload.php'; 

    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $empcollection = $companydb->requisition;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOD DASHBOARD</title>
    <!-- Google font cdn file imported here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- bootstrap cdn files for the Tables and other contents  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">

</head>
<style>
    #disabled{

    }
</style>
<body>
<?php
   if ($_SESSION['usertype']=='admin')
   {
    include 'adminnavbar.php';
 }
 else
 {
include 'hodnavbar.php';

 }
 
 ?>
    <br><br><br>


    <!-- Next Div that contains the title of the INTERVIEW SCHEDULE Start here -->
    <div class="interview">
        <div class="block">
            <center>
                <h2>OPEN POSITION
                </h2>
                <hr class="line">
            </center>
        </div>
    </div>
    <!-- INTERVIEW SCHEDULE Div Close here -->
    <div class="shortlist">
        <span style="border-bottom: 1px black; margin-left: 20px; font-family: 'Hind Siliguri', sans-serif;;">			
    </span>
        <br>
        <br>
        <!-- bootstrap table start here Add and remove containt in table according to your task -->
        <div class="table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <!-- table header  -->
                        <th scope="col">DEPARTMENT</th>

                        <th scope="col">POSITION
                        </th>
                       <th scope="col">RAISED BY
                        </th>
                        <th scope="col">DATE
                        </th>
                        <th scope="col">Close
                        </th>

                        <th scope="col">View Requisition
                        </th>
                        <th scope="col">shortlist Candidate
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php 
$counter = $empcollection->find(['status'=>['$ne'=>'closed']]);
foreach($counter as $row) {
    $id=$row['unique_id'];
    // echo $var;
    echo "<tr>";
    echo "<td>" . $row['department'] ."</td>";
    echo "<td>" . $row['position'] ."</td>";
    echo "<td>" . $_SESSION['email'] ."</td>";
    echo "<td>" . $row['dateofcreation']."</td>";
    echo "<td>" . "<a  href='closed_position.php?variable1=".$id."'><button class='btn btn-primary'> close</button></a>" ."</td>";
    echo "<td><a href='viewrequision.php?variable1=".$id."'>View Requisition</a>" ."</td>";



    if ($_SESSION['usertype']=='hod')
    {
        if($row['dateofhrshortlist'] == ""){

            echo "<td> <a href='javascript:void(0)' title='wait for HOD to Shortlist' data-toggle='tooltip' data-placement='right' title='Tooltip on right'><button class='btn btn-primary' disabled>Shortlist for Interview </button></a>" ."</td>";

        }
        else{
            echo "<td><a href='hod_short_listing.php?variable1=".$id."'><button class='btn btn-primary'>Shortlist for Interview</button></a>" ."</td>";
        }
    }
    else
    {
  
        echo "<td><a href='open_positions-1.php?variable1=".$id."'>Upload Resume</a>" ."</td>";
    }


   
    #add just this line whenever you create  viewrequisition  33111`3
    //getting values in page2.php file by $_GET function:
    //$x=$_GET['variable1'];
    echo "</tr>";
}
?>                </tbody>
            </table>
        </div>
        <br><br><br>
    </div>

</body>

</html>