<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOD and ADMIN DASHBOARD</title>
    <!-- Google font cdn file imported here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- bootstrap cdn files for the Tables and other contents  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">

</head>

<style>

</style>


<body>
<?php
    include 'hodnavbar.php';
?>
    <br><br><br>


    <!-- Next Div that contains the title of the INTERVIEW SCHEDULE Start here -->

    <div class="interview">
        <div class="block">
            <center>
                <h2>OPEN POSITION
                </h2>
                <hr class="line">
		<br>
		<h5>
		Resume
		</h5>
		<br>
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
                        <th scope="col">Name</th>

                        <th scope="col">Current Position
                        </th>
                       <th scope="col">Contact
                        </th>
                        <th scope="col">Exp.
                        </th>

                        <th scope="col">Current CTC

                        </th>

                        <th scope="col">Expected CTC

                        </th>

                        <th scope="col">Notice Period

                        </th>
                        <th scope="col">Remark

                        </th>

                        <th scope="col">Resume
                        </th>
                  

                        <th scope="col">REMARK
                        </th>
                        <th scope="col">SUBMIT</th>
			


                    </tr>
                </thead>
                <tbody>
                


                    <?php 


require 'vendor\autoload.php'; 

$client = new MongoDB\Client;
$companydb = $client->companydb;
$empcollection = $companydb->shortlisted_candidate;

$counter = $empcollection->find();
foreach($counter as $row) {
    
    echo "<tr>";
    echo "<td>" . $row['name'] ."</td>";
    echo "<td>" . $row['current_position'] ."</td>";
    echo "<td>" . $row['contact'] ."</td>";
    echo "<td>" . $row['exp'] ."</td>";
    echo "<td>" . $row['current_ctc'] ."</td>";
    echo "<td>" . $row['expected_ctc'] ."</td>";
    echo "<td>" . $row['notice_period'] ."</td>";
    echo "<td>" . $row['remark'] ."</td>";
    echo   '  <td><button name="" class="btn btn-block btn-primary"><a target="__blank" href="'. $row['resume'] .'" style="color:white;text-decoration:none;">open</a></button></td>
';

    echo "<td><select name='remark' id=''><option value='shortlist'>shortlist</option>
    <option value='Hold'>Hold</option>
    <option value='Reject'>Reject</option></select></td>
";

 echo '<td><button  name="" class="btn btn-block btn-primary">Submit</button></td>
';
    #add just this line whenever you create  viewrequisition  
    //getting values in page2.php file by $_GET function:
    //$x=$_GET['variable1'];
    echo "</tr>";
}
?>     

                    
                        <!-- table body -->
                   
                    </tr>
                   
                </tbody>
            </table>
        </div>
        <br><br><br>
    </div>

</body>

</html>
