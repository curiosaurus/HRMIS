<!DOCTYPE html>
<?php
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$years=$companydb->years;
?>
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
<body>
<?php
    include 'adminnavbar.php';
    ?>
    <br><br>
    <center>
    <div class="Button">
     <button class="btn btn-primary btn-lg">Manage Year</button>
     </div>
    </center>
    <a href="createyear.php">
   <div class="container">
  		 <div class="row justify-content-end">
    			<div class="col-4">
                    Create year
    			</div>
  </div>
     </a>
 <div class="container" style="padding: 1.2rem; text-transform: uppercase;">
 <table class="table table-bordered">
 <tr>
            <th>Skill Matrix year</th>
            <th>Start Month</th>
            <th>End Month</th>
            <th colspan="2"><center> Action </center></th>
        </tr>
        <?php $results=$years->find();
        foreach ($results as $row){?>
        <tr> 
            <td> <?php echo $row['year'];?></td>
            <td> <?php echo $row['start_month'];?></td>
            <td> <?php echo $row['end_month'];?></td>
            <?php if($row['status']=='unlocked'){ ?>
            <td><a href="yearstatuschange.php?stat=1&id=<?php echo $row['year'];?>"><button name="" class="btn btn-block btn-primary">LOCK</button></a>
            </td>
            <?php }
            else{ ?>
<td><a href="yearstatuschange.php?stat=2&id=<?php echo $row['year'];?>"><button name="" class="btn btn-block btn-primary">UNLOCK</button></a>
            </td>
            <?php }?>
            <td><a href="yearstatuschange.php?stat=3&id=<?php echo $row['year'];?>"><button name="" class="btn btn-block btn-danger">DELETE</button></a>
            </td>
        </tr>
        <?php } ?>
</table>
<div>
</body>
</html>