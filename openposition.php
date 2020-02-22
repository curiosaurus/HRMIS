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
<body>

<?php
    include 'adminnavbar.php';
    ?>
<br><br><br>


<!-- Next Div that contains the title of the INTERVIEW SCHEDULE Start here -->
<div class="interview">
    <div class="block">
      <center>  <h2>OPEN POSITION
        </h2>
    <hr class="line">
    </center>
    </div>
</div>
<!-- INTERVIEW SCHEDULE Div Close here -->
<div class="shortlist">
    <span style="border-bottom: 1px black; margin-left: 20px; font-family: 'Hind Siliguri', sans-serif;;">SHORT LISTED EMPLOYEES 
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
            <th scope="col">Open Position	
                </th>
            <th scope="col">department	
                </th>
            <th scope="col">location
                </th>
                <th scope="col">Day
                    </th>
                    <th scope="col">Time
                        </th>
                        <th scope="col">EMAIL	
                            </th>
                            <th scope="col">HOD EMAIL
                                </th>
                                <th scope="col">Interview Form	
                                    </th>
            </tr>
        </thead>
        <tbody>
        <?php 
$counter = $empcollection->find();
foreach($counter as $row) {
    echo "<tr>";
    echo "<td>" . $row['Candidate Name'] ."</td>";
    echo "<td>" . $row['Open Position'] ."</td>";
    echo "<td>" . $row['department'] ."</td>";
    echo "<td>" . $row['interview location'] ."</td>";
    echo "<td>" . $row['interview day'] ."</td>";
    echo "<td>" . $row['interview time'] ."</td>";
    echo "<td>" . $row['cand email'] ."</td>";
    echo "<td>" . $row['hod email'] ."</td>";
    echo "<td>" . $row['interview form'] ."</td>";#button
    echo "</tr>";
}
?>
          <tr>
            <!-- table body -->
            <th scope="row">Sourav Roy</th>
            <td>Assi. Manager</td>
            <td>Sales</td>
            <td>Pune</td>
            <td>25-12-19</td>    
            <td>12:00 pm</td>
            <td>sr@gmail.com</td>
            <td>hod@gmail.com</td>            
            <td><button name="" class="btn btn-block btn-primary">Open</button></td>
          </tr>
        </tbody>
      </table>
</div>
<br><br><br>
</div>

</body>
</html>
