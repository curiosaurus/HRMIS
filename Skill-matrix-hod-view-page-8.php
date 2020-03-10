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

    <style>
        
    </style>
</head>


<body>
<?php
    include 'hodnavbar.php';
?>
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

    <div class="row justify-content-md-center">
       <label style="font-size: 22px;">Effectiveness</label>
    </div>

<br><br>

    <div class="row justify-content-md-start">
        
        <div class="col-md-3" >
            <label style="font-size: 20px;"> Employee Number </label>
        </div>

        <div class="col-md-4">
            <input required type="text" class="form-control" >
        </div>


    </div>
<br>
    <div class="row justify-content-md-start">
            
        <div class="col-md-3" >
            <label style="font-size: 20px;"> Employee Name </label>
        </div>

        <div class="col-md-4">
            <input required type="text" class="form-control" >
        </div>

    </div>
<br>
    <div class="row justify-content-md-start">
                
        <div class="col-md-3" >
            <label style="font-size: 20px;"> Training Date </label>
        </div>

        <div class="col-md-4">
            <input required type="text" class="form-control" >
        </div>

    </div>
<br>
    <div class="row justify-content-md-start">
                    
        <div class="col-md-3" >
            <label style="font-size: 20px;"> Subject </label>
        </div>

        <div class="col-md-4">
            <input required type="text" class="form-control" >
        </div>

    </div>
<br>
    <div class="row justify-content-md-start">
                        
        <div class="col-md-3" >
            <label style="font-size: 20px;"> Skill Level before Training </label>
        </div>

        <div class="col-md-4">
            <input required type="text" class="form-control" >
        </div>

    </div>

</div>

<br><br>

<div class="container" style="border: 1px solid lightblue; padding: 25px;">

    <div class="row justify-content-md-start">
                        
        <div class="col-md-6" >
            <label style="font-size: 18px;"> Has the trainee implemented this training in his / her working area?</label>
        </div>

        <div class="col-md-2">
            <button class="btn btn-outline-primary btn-sm btn-block">YES</button>
        </div>
    
        <div class="col-md-2">
            <button class="btn btn-outline-primary btn-sm btn-block">NO</button>
        </div>

    </div>
<br><br>
<div class="row justify-content-md-start">

    <div class="col-md">
        <label style="font-size: 18px;"> If yes, Where  give example or evidence or other specification. </label>
    </div>

</div>
<br>
<div class="row justify-content-md-start">
    
    <div class="col-md-8">
        <textarea required class="form-control"  rows="3"></textarea>
    </div>

</div>
<br><br>



    <div class="row justify-content-md-start">
                        
        <div class="col-md-6" >
            <label style="font-size: 18px;"> Has the trainee implemented this training in his / her working area?</label>
        </div>

        <div class="col-md-2">
            <button class="btn btn-outline-primary btn-sm btn-block">YES</button>
        </div>
    
        <div class="col-md-2">
            <button class="btn btn-outline-primary btn-sm btn-block">NO</button>
        </div>

    </div>
<br><br>

<div class="row justify-content-md-start">
                        
    <div class="col-md-6" >
    <label style="font-size: 18px;">If yes, please confirm trainee skill level after training</label>
    </div>
    <div class="col-md-4">
        <input required type="text" class="form-control" >
    </div>

    

</div>
<br><br>

<div class="row justify-content-md-start">
                        
    <div class="col-md-6" >
    <label style="font-size: 18px;">If No, reschedule of this training is needed? (Please mention specific requirements) </label>
    </div>
    <div class="col-md-8">
        <textarea required class="form-control"  rows="3"></textarea>
    </div>


</div>
<br><br>




<br>
<div class="row justify-content-md-center">

    <div class="col-md-2">
        <button class="btn btn-primary btn-md btn-block">SUBMIT</button>
    </div>
</div>
</div>
</form>
</body>
</html>
