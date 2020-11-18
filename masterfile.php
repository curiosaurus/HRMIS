<?php
error_reporting(0);
session_start();
if (!$_SESSION['usertype']=='admin')
{
    header('location:login.php');
}
require 'vendor\autoload.php'; 

$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->empcollection;
?>
<html><head>
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

    <style>
        
    </style>
</head>


<body>
<?php
    include 'adminnavbar.php';
    ?>

    <br><br>



<table border="1">
        <tr>
        <th>
            EMP CODE
        </th>
        <th>
            Emp Display Name
        </th>
        <th>
            Gender
        </th>
        <th>      
            Marital Status
        </th>
        <th>
            Date of Birth
        </th>
        <th>
            Date of joining
        </th>
        <th>
            Resigned date
            
        </th>
        <th>
            DATE OF LEAVING
            
        </th>
        <th>
            Personal Email
            </th>
        <th>
            PAN
        </th>
        <th>
            Adhar Card No
        </th>
        <th>
            Mobile No
        </th>
        <th>
            Designation
            
        </th>
        <th>
            Grade Id

        </th>
        <th>
            Department Id
            
        </th>
        <th>
            Location Id</th>
        <th>
            Employee Type Id
            
        </th>
        <th>
            Employee Status Id
        </th>
        <th>
            UAN Number
        </th>
        <th>
            REPORTING TO
        </th>
        <th>
            Blood Group
        </th>
        <th>
            EDUCATION
        </th>
        <th>
            RTPL Exp.
        </th>
        <th>
            Previous Exp.
        </th>
        <th>
            TOTAL EXP
        </th>
        <th>
            Parmanent Address
        </th>
        <th>
            Local Address
        </th>    
        <th>Update</th>        
        <tbody>
        <?php 
$counter = $empcollection->find();
foreach($counter as $row) {
    $id=$row['Emp Code'];
    echo "<tr>";
    echo "<td>" . $row['Emp Code'] ."</td>";
    echo "<td>" . $row['Emp Display Name'] ."</td>";
    echo "<td>" . $row['Gender'] ."</td>";
    echo "<td>" . $row['Marital Status'] ."</td>";
    echo "<td>" . $row['Date of Birth'] ."</td>";
    echo "<td>" . $row['Date of joining'] ."</td>";
    echo "<td>" . $row['Resigned date'] ."</td>";
    echo "<td>" . $row['DATE OF LEAVING'] ."</td>";
    echo "<td>" . $row['Personal Email'] ."</td>";
    echo "<td>" . $row['PAN'] ."</td>";
    echo "<td>" . $row['Adhar Card No'] ."</td>";
    echo "<td>" . $row['Mobile No'] ."</td>";
    echo "<td>" . $row['Designation'] ."</td>";
    echo "<td>" . $row['Grade Id'] ."</td>";
    echo "<td>" . $row['Department Id'] ."</td>";
    echo "<td>" . $row['Location Id'] ."</td>";
    echo "<td>" . $row['Employee Type Id'] ."</td>";
    echo "<td>" . $row['Employee Status Id'] ."</td>";
    echo "<td>" . $row['UAN Number'] ."</td>";
    echo "<td>" . $row['REPORTING TO'] ."</td>";
    echo "<td>" . $row['Blood Group'] ."</td>";
    echo "<td>" . $row['EDUCATION'] ."</td>";
    echo "<td>" . $row['RTPL EXP'] ."</td>";
    echo "<td>" . $row['Previous Exp'] ."</td>";
    echo "<td>" . $row['TOTAL EXP'] ."</td>";
    echo "<td>" . $row['Parmanent Address'] ."</td>";
    echo "<td>" . $row['Local Address'] ."</td>";
    echo "<td> <button name='' class='btn btn-block btn-primary'><a href='updateempcollection.php?variable1=".$id."' style='color:white;'>Update</a></button> </td>";
   

?>
    <?php echo "</tr>";
}
?>
</tbody>
</table>
</body>

</html>
