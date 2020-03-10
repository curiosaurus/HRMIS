<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HR & Admin dashbord</title>
    <!-- Google font cdn file imported here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- bootstrap cdn files for the Tables and other contents  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    include 'employeenavbar.php';
    ?>
<?php
//require 'session.php'; 
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->companydb;
$empcollection = $companydb->empollection;
?>
    <div class="title">
        <center>
            <h2>EMPLOYEE MASTER
                <hr style="border-bottom: 2px solid#3f51b5 ; width: 50px;">
            </h2>
        </center>
    </div><br><br>
<div class="container">
    <div  style="margin-bottom: 100px; border: 1px solid lightblue; padding: 50px;">
        <div class="row justify-content-md-start" >
            <div class="col-md-2">
                <label>EMPLOYEE NO </label>  
            </div>
            <div class="col-md-3">
            <?php
            echo  $row['Emp Code'] ;
            ?>
            </div> 
        </div>
    </div>
</div> 
<div class="container">
    <div  style="margin-bottom: 100px; border: 1px solid lightblue; padding: 50px;">
        <div class="row justify-content-md-start">
            <div class="col-md-8">
                <h4><label> PERSONAL INFO :</label></h4>
            </div>
        </div>
    <br>
        <div class="row justify-content-md-start">    
            <div class="col-md-9">
                <div class="row justify-content-md-start">
                    <div class="col-md-5">
                        <label> Full Name : &nbsp;&nbsp;&nbsp; </label>
                    </div>
                    <div class="col-md-7">
                    <?php
            echo  $row['Emp Display Name'] ;
            ?>
                    </div>
                </div>
    <br>
                <div class="row justify-content-md-start">    
                    <div class="col-md-2">
                        <label> Gender : </label>
                    </div>
            
                    <div class="col-md-4">
                    <?php
            echo  $row['Gender'] ;
            ?>
                    </div>
            
                    <div class="col-md-3">
                        <label> Marital Status  </label>
                    </div>
            
                    <div class="col-md-3">
                         <?php
            echo  $row['Marital Status'] ;
            ?>
                    </div>
                </div>
    <br>
                <div class="row justify-content-md-start">
                    <div class="col-md-2">
                        <label> DOB :  </label>
                    </div>
                    <div class="col-md-4">
                         <?php
            echo  $row['Date of Birth'] ;
            ?>
                    </div>
                    <div class="col-md-2">
                        <label> PAN :  </label>
                    </div>
                    <div class="col-md-4">
                         <?php
            echo  $row['PAN'] ;
            ?>
                    </div>
                </div>
    <br>
                <div class="row justify-content-md-start">
                    <div class="col-md-2">
                        <label> ADHAAR :  </label>
                    </div>
                    <div class="col-md-4">
                         <?php
            echo  $row['Adhar Card No'] ;
            ?>
                    </div>
                    <div class="col-md-2">
                        <label> UAN :  </label>
                    </div>
                    <div class="col-md-4">
                         <?php
            echo  $row['UAN Number'] ;
            ?>
                    </div>
                </div>
    <br>
                <div class="row justify-content-md-start">
                    <div class="col-md-5">
                        <label> Blood Group :</label>
                    </div>
                    <div class="col-md-7">
                         <?php
            echo  $row['Blood Group'] ;
            ?>
                    </div>
                </div>
    <br>
                <div class="row justify-content-md-start">
                    <div class="col-md-5">
                        <label> Personal Email :</label>
                    </div>
                    <div class="col-md-7">
                         <?php
            echo  $row['Personal Email'] ;
            ?>
                    </div>
                
                </div>

            </div>

            <div class="col-md-3" style="border: lightblue solid 1px;">
                
                <br><br><br>
                <div class="row justify-content-md-start">
                    <div class="col-md-12">
                        <button class="btn btn-outline-primary btn-sm btn-block" style="margin-top: 100%;" >UPLOAD</button>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
    <br>
                <div class="row justify-content-md-start">
                
                
                    <div class="col-md-6">
                        <label> Correspondence Address :</label>
                    </div>
                
                    <div class="col-md-6">
                        <label> Permanent Address: :</label>
                    </div>
                
                </div>

                <div class="row justify-content-md-start">
                
                
                    <div class="col-md-6">
                        <textarea class="form-control"  rows="3"></textarea>
                    </div>
                
                    <div class="col-md-6">
                        <textarea class="form-control"  rows="3"></textarea>
                    </div>
                
                </div>
    <br>
                <div class="row justify-content-md-start">
            
                    <div class="col-md-2">
                        <label> Pin No :  </label>
                    </div>

                    <div class="col-md-4">
                         <?php
            echo  $row['Local Pin'] ;
            ?>
                    </div>

                    <div class="col-md-2">
                        <label> Pin No :  </label>
                    </div>

                    <div class="col-md-4">
                         <?php
            echo  $row['Permanent Pin'] ;
            ?>
                    </div>

                </div>
    <br>

            <div class="row justify-content-md-start">
            
                <div class="col-md-2">
                    <label> Mobile No :  </label>
                </div>

                <div class="col-md-4">
                     <?php
            echo  $row['Mobile No'] ;
            ?>
                </div>

                <div class="col-md-2">
                    <label> Contact No :  </label>
                </div>

                <div class="col-md-4">
                     <?php
            echo  $row['Contact No'] ;
            ?>
                </div>

            </div>
    <br>
            <div class="row justify-content-md-start">
                
                <div class="col-md-5">
                    <label> Emergency Contact No. :</label>
                </div>
            
                <div class="col-md-7">
                     <?php
            echo  $row['Emergency No'] ;
            ?>
                </div>
            
            </div>

        </div>
    </div>
</div>

<div  style="margin-bottom: 100px; border: 1px solid lightblue; padding: 50px;">


        <div class="row justify-content-md-start">
        
            <div class="col-md-8">
                <h4><label> JOB DETAILS :</label></h4>
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
          
            <div class="col-md-2">
                <label> D.O.J :  </label>
            </div>

            <div class="col-md-4">
                 <?php
            echo  $row['Date of joining'] ;
            ?>
            </div>

            <div class="col-md-2">
                <label> Department :  </label>
            </div>

            <div class="col-md-4">
                 <?php
            echo  $row['Department Id'] ;
            ?>
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
          
            <div class="col-md-2">
                <label> Designation :  </label>
            </div>

            <div class="col-md-4">
                 <?php
            echo  $row['Designation'] ;
            ?>
            </div>

            <div class="col-md-2">
                <label> Grade :  </label>
            </div>

            <div class="col-md-4">
                 <?php
            echo  $row['Grade Id'] ;
            ?>
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
          
            <div class="col-md-2">
                <label> Location :  </label>
            </div>

            <div class="col-md-4">
                 <?php
            echo  $row['Location Id'] ;
            ?>
            </div>

            <div class="col-md-2">
                <label> Employee Type :  </label>
            </div>

            <div class="col-md-4">
                 <?php
            echo  $row['Employee Type Id'] ;
            ?>
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
                
            <div class="col-md-2">
                <label> Employee Status :  </label>
            </div>

            <div class="col-md-4">
                 <?php
            echo  $row['Employee Status Id'] ;
            ?>
            </div>

            <div class="col-md-2">
                <label> Employee Reporting to :  </label>
            </div>

            <div class="col-md-4">
                 <?php
            echo  $row['REPORTING TO'] ;
            ?>
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
            <div class="col-md-2">
                <label> Education :  </label>
            </div>
            <div class="col-md-4">
                 <?php
            echo  $row['EDUCATION'] ;
            ?>
            </div>
            <div class="col-md-2">
                <label> Previous Experience :  </label>
            </div>
            <div class="col-md-4">
                 <?php
            echo  $row['Previous Exp'] ;
            ?>
            </div>
        </div>
<br><br>

    </div>
    </div>
</div>
</body> 
</html>
