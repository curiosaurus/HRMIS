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
<body>
<?php
    include 'hodnavbar.php';
?>
    <br><br>

<div class="container-fluid" style=" height: 1000px;">

    <div class="row justify-content-md-around" style="height: 300px; margin: 10px;">

        <div class="col-md-5" style=" border: 1px solid lightblue; height: 250px;">
            <div class="row justify-content-md-center" style="font-size: 20px; color: white; background-color:rgba(25, 0, 255, 0.705); height: 50px;">OPEN POSITIONS</div>
        </div>

        <div class="col-md-3" style=" border: 1px solid lightblue; height: 350px;">
            <div class="row justify-content-md-center" style="font-size: 20px; color: white; background-color:rgba(25, 0, 255, 0.705); height: 50px;">UPCOMING TRAININGS</div>
        </div>

        <div class="col-md-3" style=" border: 1px solid lightblue; height: 350px;">
            <div class="row justify-content-md-center" style="font-size: 20px; color: white; background-color:rgba(25, 0, 255, 0.705); height: 50px;">WELFARE</div>
        </div>

    </div>

<br><br>
    
    <div class="row justify-content-md-start" style="height: 300px; margin-left: 30px; ">

        <div class="col-md-5" style=" border: 1px solid lightblue; height: 200px; ">
            <div class="row justify-content-md-center" style="font-size: 20px; color: white; background-color:rgba(25, 0, 255, 0.705); height: 50px;">UPCOMING INTERVIEW</div>
        </div>

    </div>

</div>
</body>
</html>

