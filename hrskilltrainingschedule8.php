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
    ?>    <br><br>
    <center>
        <div class="interview">
            <div class="block">
              <h2> Manage Year</h2>
            <hr class="line">
            
            </div>
        </div>
    <div class="container" style="border: 1px solid lightblue; padding: 2px;">

        <div class="row justify-content-md-around">

            <div class="col-md-0">
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
<div>
    <br><br>


<div class="container" style="border: 1px solid lightblue; padding: 25px;">

    <div class="row justify-content-md-center">
       <label style="font-size: 20px;">Identified Subject</label>
       <select name="" id="">
           <option value="">Rejection Control</option>
           <option value="">Communication Skill</option>
        </select>
    </div>

<br>

    <div class="row justify-content-md-start">
        
        <div class="col-md-3" >
            <label style="font-size: 20px;"> Scheduled Date </label>
        </div>

        <div class="col-md-4">
            <input type="date" class="form-control" >
        </div>


    </div>
<br>
    <div class="row justify-content-md-start">
            
        <div class="col-md-3" >
            <label style="font-size: 20px;"> Time </label>
        </div>

        <div class="col-md-4">
            <input type="time" class="form-control" > 
        </div>
        to &nbsp;&nbsp;
        <div class="col-md-end">
            <input type="time" name="" id="">
        </div>
    </div>
<br>
    <div class="row justify-content-md-start">
                
        <div class="col-md-3" >
            <label style="font-size: 20px;"> Trainer name </label>
        </div>

        <div class="col-md-4">
            <input type="text" class="form-control" >
        </div>

    </div>
<br>
    <div class="row justify-content-md-start">
                    
        <div class="col-md-3" >
            <label style="font-size: 20px;"> Faculty/organisation </label>
        </div>

        <div class="col-md-4">
            <input type="text" class="form-control" >
        </div>

    </div>
<br>
    <div class="row justify-content-md-start">
                        
        <div class="col-md-3" >
            <label style="font-size: 20px;"> Venue </label>
        </div>

        <div class="col-md-4">
            <input type="text" class="form-control" >
        </div>

    </div>

</div>
</div>
     <a href="Skil-matrix-hr-and-admin-page-8.html"> <button class="btn btn-primary btn-lg">Submit</button></a>

</body>

</html>
