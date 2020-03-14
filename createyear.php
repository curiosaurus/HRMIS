

<?php

if(isset($_POST['submit']))
{

    $years ="Years7";
require 'vendor\autoload.php'; 

    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $years=$companydb->$years;
    $results=$years->insertOne(['_id' => '2' , 'name' => 'Nishad' , 'age' => '21' , 'skill' => 'mongoDB' ,"start_month"=>'january',"end_month"=>'december']);

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
    <div class="container" style="border: 1px solid lightblue; padding: 2px;">

        <div class="row justify-content-md-around">


            <div class="col-md-0">
                <h4><label> Year</label></h4>
            </div>


            <div class="col-md-8">
                <select required class="form-control form-control-lg">
                    <option>YEAR JANUARY 2019 TO DECEMBER 2019</option>
                    <option>YEAR JANUARY 2019 TO DECEMBER 2019</option>
                    <option>YEAR JANUARY 2019 TO DECEMBER 2019</option>
                    <option>YEAR JANUARY 2019 TO DECEMBER 2019</option>
                  </select>
            </div>

        </div>
    </div>
    <form action="hr_admin_skill 2.html" method="post">
            <table class="table">
            <tr>
                <td>Start Month</td>
                <td><input required type="month" name="start_month"  value="" onchange="myFunction(this.value)"></td>
               
                      
            </tr>
              <tr>
                <td>End Month</td>
                <td><input required type="month" name="" id=""></td>
               
                      
            </tr>    

        </table>
      <button class="btn btn-primary btn-lg">Submit</button>
      </form>
      <script>
function myFunction(val) {
    
    const monthNames = ["Kedar","January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
        ];
    var val1=val.split("-");
    var  val2=parseInt(val1[1]);
        var month=monthNames[val2];  
  alert("The input value has changed. The new value is: " + month);
}
</script>

</body>
</html>
