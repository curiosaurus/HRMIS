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
    <div class="Button">

     <button class="btn btn-primary btn-lg">Manage Year</button>
</center>
 </div>
 <div class="container" style="padding: 1.2rem; text-transform: uppercase;">
 <table class="table table-bordered">

  <tr>
            <th>Skill Matrix name</th>
            <th>Start Month</th>
            <th>End Month</th>
            <th colspan="2">Action</th>
         
        </tr>
        <tr> 
            <td> year january 2019 to december 2019</td>
            <td> january 2019</td>
            <td> december 2019</td>
            <td><button name="" class="btn btn-block btn-danger">LOCK</button></a>
            </td>
            <td><button name="" class="btn btn-block btn-success">DELETE</button></a>
            </td>
        </tr>
        <tr> 
            <td> year january 2018 to december 2018</td>
            <td> january 2018</td>
            <td> december 2018</td>
            <td><button name="" class="btn btn-block btn-danger">LOCK</button></a>
            </td>
            <td><button name="" class="btn btn-block btn-success">DELETE</button></a>
            </td>
        </tr>
        <tr> 
            <td> year january 2017 to december 2017</td>
            <td> january 2017</td>
            <td> december 2017</td>
            <td><button name="" class="btn btn-block btn-danger">LOCK</button></a>
            </td>
            <td><button name="" class="btn btn-block btn-success">DELETE</button></a>
            </td>
        </tr>
</table>
<div>
</body>

</html>
 
