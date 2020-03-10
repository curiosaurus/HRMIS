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

</style>


<body>
<?php
    include 'hodnavbar.php';
?>
    <br><br>


    <div class="title">
        <center>
            <h2>EFFECTIVENESS
                <hr style="border-bottom: 2px solid#3f51b5 ; width: 50px;">
            </h2>
        </center>
    </div>
<br>
<br>
<form action="#" method="post">
    <div class="container" style="border: 1px solid lightblue; padding: 25px;">

        <div class="row justify-content-md-around">
        
            <div class="col-md-1" >
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

<br><br>


<div class="container" style="border: 1px solid lightblue; padding: 25px;">
    
    <div class="row justify-content-md-around">
        
        <div class="col-md-6" >
            <label style="font-size: 20px;"> EFFECTIVENESS</label>
        </div>
        
        <div class="col-md-1">
            <label style="font-size: 20px;"> Subject</label>
        </div>
        
        <div class="col-md-4">
            <input required type="text"  class="form-control" >
        </div>
        
    </div>
</div>

<br><br><br>

<div class="container table-responsive-md" style="margin-bottom: 200px;">

    <table class="table" >
        <thead  class="bg-primary" style="color: white;">
        <tr>
            <th scope="col">Sr.No</th>
            <th scope="col">Name of Employee</th>
            <th scope="col">Identified Subject</th>
            <th scope="col">Effectiveness</th>
        </tr>
    </thead>
    <tbody>
        
        <tr>
            <td>1</td>
            <td>SUNIL MANGATRAM SHARMA</td>
            <td>Communication skill</td>
            <td> <button class="btn btn-outline-primary btn-sm btn-block">OPEN</button> </td>
        </tr>
        <tr>
            <td scope="row">2</td>
            <td>PRAVIN HARINAND KOLGE</td>
            <td>ISO 9001:2015</td>
            <td> <button class="btn btn-outline-primary btn-sm btn-block">OPEN</button> </td>        </tr>
        <tr>
            <td scope="row">3</td>
            <td>SANJAY SURAJMAL GANDHI</td>
            <td>EMS 14001:2015</td>
            <td> <button class="btn btn-outline-primary btn-sm btn-block">OPEN</button> </td>        </tr>
        
        <tr>
            <td scope="row">4</td>
            <td>VINOD SHIVAJIRAO RAVAN</td>
            <td>5S</td>
            <td> <button class="btn btn-outline-primary btn-sm btn-block">OPEN</button> </td>        </tr>
        <tr>
            <td scope="row">5</td>
            <td>AJAY HARINAND KOLGE</td>
            <td>Product Application Knowledge</td>
            <td> <button class="btn btn-outline-primary btn-sm btn-block">OPEN</button> </td>        </tr>
        <tr>
            <td scope="row">6</td>
            <td>KIRAN POPAT THEURKAR</td>
            <td>Product Knowledge</td>
            <td> <button class="btn btn-outline-primary btn-sm btn-block">OPEN</button> </td>        </tr>
    </tbody>
    </table>
    <br><br>
    <div class="row justify-content-md-center">
    
        <div class="col-md-2">
            <button class="btn btn-primary btn-md btn-block">SUBMIT</button>
        </div>
    </div>

</div>
</form>
</body>
</html>
