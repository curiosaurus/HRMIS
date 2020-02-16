<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HRMIS</title>
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
    include 'employeenavbar.php';
    
    ?> 

    <div class="title">
        <center>
            <h2>TRAINNING NOMINATION
                <hr style="border-bottom: 2px solid#3f51b5 ; width: 50px;">
            </h2>
        </center>
    </div>
<br>
<br>


<div class="container" style="border: 1px solid lightblue; padding: 25px;">

        <div class="row justify-content-md-around">
            
            <div class="col-md-1" >
                <h4><label> Year</label></h4>
            </div>

            
            <div class="col-md-8">
                <select class="form-control form-control-lg">
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
            <label style="font-size: 20px;"> IDENTIFIED SUBJECT</label>
        </div>

        <div class="col-md-1">
            <label style="font-size: 20px;"> Search</label>
        </div>
        
        <div class="col-md-4">
            <input type="text"  class="form-control" >
        </div>

    </div>
</div>

<br><br><br>

<div class="container table-responsive-md" style="margin-bottom: 200px;">
    <table class="table">
        <thead  class="bg-primary" style="color: white;">
          <tr>
            <th scope="col">Sr.No</th>
            <th scope="col-md-3">IDENTIFIED SUBJECT</th>
            <th scope="col">STATUS</th>
            <th scope="col">TRAINER</th>
            <th scope="col">DATE</th>
            <th scope="col">TIME</th>
            <th scope="col">LOCATION</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Communication skill</td>
            <td>NOMINATED</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>ISO 9001:2015</td>
            <td>NOMINATED</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>EMS 14001:2015</td>
            <td>-</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>5S</td>
            <td>-</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>Product Application Knowledge</td>
            <td>-</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">6</th>
            <td>Product Knowledge</td>
            <td>NOMINATED</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">7</th>
            <td>ERP Knowledge</td>
            <td>NOMINATED</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">8</th>
            <td>KAIZEN</td>
            <td>NOMINATED</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
         
        </tbody>
      </table>
      
</div>




