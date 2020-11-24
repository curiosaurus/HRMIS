<?php

session_start();

//if (!$_SESSION['email']==$p && !$_SESSION['usertype']==$u)
//{
//    header('location:login.php');  
//}

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
<body>
<?php

if ($_SESSION['usertype']=='hod')
{
    include 'hodnavbar.php';
}
else

{
include 'adminnavbar.php';

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
                        <th scope="col">DATE Of Creation
                        </th>
                        <th scope="col">Open
                        </th>

                        <th scope="col">View
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php 
if($_SESSION['usertype']=='hod'){
    $counter=array();
    $counterpre = $empcollection->find(['status'=>'closed']);
    $deptids=explode("_",$_SESSION['dept']);
    foreach($counterpre as $row=>$value) {
        if (in_array($value['department'],$deptids) and $_SESSION['location']==$value['location id']){
            array_push($counter,$value);
        }
    }
}
else{
$counter = $empcollection->find(['status'=>'closed']);
}
//$counter = $empcollection->find(['status'=>'closed']);
foreach($counter as $row) {
    $id=$row['unique_id'];
    // echo $var;
    echo "<tr>";
    echo "<td>".$row['department'] ."</td>";
    echo "<td>".$row['position'] ."</td>";
    echo "<td>".$row['raised by'] ."</td>";
    echo "<td>".$row['dateofcreation'] ."</td>";
    if($_SESSION['usertype']=='hod'){
        echo "<td>Closed</td>";
    }
    elseif ($_SESSION['usertype']=='admin') {
        echo "<td>"."<a href='close_position.php?variable1=".$id."'><button class='btn btn-primary'>Open</button></a>"."</td>";
    }

    echo "<td><a href='viewrequision.php?variable1=".$id."'>View Requisition</a>" ."</td>";
    echo "</tr>";
}
?>                </tbody>
            </table>
        </div>
        <br><br><br>
    </div>

</body>

</html>
