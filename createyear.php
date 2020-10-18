<?php
if(isset($_POST['submit']))
{
require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $years=$companydb->years;
    $start_month=$_POST['start_month'];
    $end_month=$_POST['end_month'];
    $year=$_POST['year'];
    echo $end_month;
    echo $year;
    echo $start_month;
    $yc=$companydb->createCollection($year);
    $results=$years->insertOne(['year' => $year , 'start_month' => $start_month , 'end_month' => $end_month ,'status' => 'unlocked']);
}
?>
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
        include 'adminnavbar.php';
    ?>
    <br><br>
    <center>
        <div class="interview">
            <div class="block">
              <h2> Create Year</h2>
            <hr class="line">
            </div>
        </div>
        <form action="createyear.php" method="POST">
    <div class="container" style="border: 1px solid lightblue; padding: 2px;">
        <div class="row justify-content-md-center">
            <div class="col-md-0">
                <h4><label> Year</label></h4>
            </div>
            <div class="col-md-8">
                <input type="text" id="year" name="year" >
            </div>
        </div>
    
            <table class="table">
            <tr>
                <td><center>Start Month</center></td>
                <td><input required type="date" name="start_month" id="st"  value="" onchange="myFunction()"></td>    
            </tr>
              <tr>
                <td><center>End Month</center></td>
                <td><input required type="date" name="end_month" id="en" value="" onchange="myFunction()"></td> 
            </tr>    
        </table>
      <button class="btn btn-primary btn-lg" name="submit">Submit</button>
      </form>
      <script>
		  var start='';
          var end='';
function myFunction() {
    const monthNames = ["Kedar","January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
        ];
        var start='';
          var end='';
        var val=document.getElementById("st").value;
        var val_1=document.getElementById("en").value;
    var val1=val.split("-");
    var  val2=parseInt(val1[1]);
    var  year=parseInt(val1[0]);
        var month=monthNames[val2]; 
         start+=month;
         start+=year;
    var val1=val_1.split("-");
    var  val2=parseInt(val1[1]);
    var  year=parseInt(val1[0]);
        var month=monthNames[val2]; 
         end+=month;
         end+=year;
         document.getElementById("year").value=start+"-"+end;
 // alert("The input value has changed. The new value is: " + start);
}
function myFunction1(val) {
    const monthNames = ["Kedar","January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"];
    var val1=val.split("-");
    var  val2=parseInt(val1[1]);
    var  year=parseInt(val1[0]);
        var month=monthNames[val2]; 
         end.push(month);
         end.push(year);
 // alert("The input value has changed. The new value is: " + end);
}
</script>
</div>
</body>
</html>
