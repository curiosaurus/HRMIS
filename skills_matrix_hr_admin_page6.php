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
<center><h1>SKILL MATRIX</h1>
<hr class="line">
</center>
<br>
<form action="#" method="post">
<div class="container">
    <table class="table table-bordered">
      <tr>
            <th style="width: 50em;">YEAR</th>
            <th <div class="col-md-8">
                <select required class="form-control form-control-lg">
                    <option>YEAR JANUARY 2019 TO DECEMBER 2019</option>
                    <option>YEAR JANUARY 2019 TO DECEMBER 2019</option>
                    <option>YEAR JANUARY 2019 TO DECEMBER 2019</option>
                    <option>YEAR JANUARY 2019 TO DECEMBER 2019</option>
                  </select>
            </div></th>     
        </tr>
        </table>
</div> 
<div class="container" style="margin-right: 0%;margin-left:10%;width: 76%;">
        <table class="table table-bordered" style="">
          <tr>
                <th style="width: 50em;">DEPARTMENT 
                    <select required name="dept" id="dept">
                  <option value="purchase" > PURCHASE DEPARTMENT</option>
                  <option value="SALES" > SALES DEPARTMENT</option>
                  <option value="Accounts" selected > ACCOUNTS DEPARTMENT</option>
                </select>
           </th>
                <th style="float: right;">ACCOUNT & EXCISE</th>     
            </tr>
            </table>
    </div> 
    <div class="container" style="padding: 1.2rem; text-transform: uppercase;">
            <table class="table table-bordered">
           
             <tr>
                       <th>Emp code</th>
                       <th>Emp Display Name</th>
                       <th>Designation</th>
                       <th>Grade</th>
                       <th>Education</th>
                       <th>Total Experience</th>
                       <th>Skill Matrix</th>
                    
                   </tr>
                   <tr> 
                       <td>RM00028</td>
                       <td>Sunil Managatram Sharma</td>
                       <td> DY. Manager-Accounts</td>
                       <td>E11</td>
                       <td>MOOM</td>
                       <td>36</td>
                       
                   </tr>
                   <tr> 
                        <td>RM00107</td>
                        <td>Pravin Harinand Kolge</td>
                        <td> DY. Manager-Accounts</td>
                        <td>E11</td>
                        <td>MOOM</td>
                        <td>27</td>
                      
                    </tr>
                    <tr> 
                            <td>RM0036</td>
                            <td>Sanjay Surajmal Gandhi</td>
                            <td>Genral Manager-Finance</td>
                            <td>L01</td>
                            <td>M COM MBA</td>
                            <td>28</td>
                           
                        </tr>
                         
           </table>
           <div>
<center> <button style=" margin:2em; padding:0em 2em;" class="btn btn-primary btn-lg">Submit</button> </center> 
</form>
</body>

</html>
