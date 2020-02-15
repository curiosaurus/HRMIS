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

    <style>
        
    </style>
</head>


<body>
<?php
    include 'hodnavbar.php';
?>
    
    <div class="title">
        <center>
            <h2>REQUISITION
                <hr style="border-bottom: 2px solid#3f51b5 ; width: 50px;">
            </h2>
        </center>
    </div>
<br>


<div class="container">
    <div class="row justify-content-md-start">   
        <div class="col-md"><button class="btn btn-primary btn-lg btn-block">NEW</button></div>
        <div class="col-md"><button class="btn btn-primary btn-lg btn-block">MODIFY</button></div>
        <div class="col-md"><button class="btn btn-primary btn-lg btn-block">DELETE</button></div>
        <div class="col-md"><button class="btn btn-primary btn-lg btn-block">OPEN</button></div>
    </div>
</div>

<br>
<hr style="border-bottom: 1px solid#3f51b5; width: 500px;">
<br>



<br><br>

<div class="container">

    
    <div class="row justify-content-md-start">
        
        <div class="col-md-1">
             From :
        </div>
        <div class="col-md-2">
             Department  
        </div>
        
        <div class="col-md-3">
	<div class="dropdown">
  <button class="dropbtn">Select Department</button>
  <div class="dropdown-content">
    <a href="#">PURCHASE DEPARTMENT</a>
    <a href="#">SALES</a>
    <a href="#">MANUFACTURING</a>
  </div>
</div>
        </div>
       <div class="col-md-3" id=cdate>
            
        </div>
<script>
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("cdate").innerHTML ="Date: "+ m + "/" + d + "/" + y;
</script>
    </div>

<br>

    <div class="row justify-content-md-start">

        <div class="col-md-4">
            <label>Requisition for the Post / Designation:</label>
        </div>

        <div class="col-md-4">
            <input type="text"  class="form-control" >
        </div>
        
    </div>
    

<br>

    <div class="row justify-content-md-start">

        <div class="col-md-4">
            <label>Reason for Appoinment:   </label>
        </div>

        <div class="col-md-4">
            <select class="custom-select"  >
                <option> Replacement </option>
                <option> New Position </option>
                <option> Additional Workload </option>
            </select>            
        </div>
        
    </div>
    
<br>

    <div class="row justify-content-md-start">
        <div class="col-md-4">
            <label>Qualification : </label>
        </div>
        <div class="col-md-8">
            <div class="row justify-content-md-start">
                <div class="col-md-6">
                    <label class="text-md-center"> Minimum </label>
                </div>
                <div class="col-md-6">
                    <label class="text-md-center"> Preferred</label>
                </div>
            </div>
            <div class="row justify-content-md-start">
                <div class="col-md-6">
                    <input type="text"  class="form-control" >
                </div>
                <div class="col-md-6">
                    <input type="text"  class="form-control" >
                </div>
            </div>
        </div>
    </div>

<br>
        
    <div class="row justify-content-md-start">
        <div class="col-md-4">
            <label>Experience : </label>
        </div>
        <div class="col-md-8">
            <div class="row justify-content-md-start">
                <div class="col-md-6">
                    <label class="text-md-center"> Minimum </label>
                </div>
                <div class="col-md-6">
                    <label class="text-md-center"> Maximum</label>
                </div>
            </div>
            <div class="row justify-content-md-start">
                <div class="col-md-6">
                    <input type="text"  class="form-control" >
                </div>
                <div class="col-md-6">
                    <input type="text"  class="form-control" >
                </div>
            </div>
        </div>
    </div>

<br>

    <div class="row justify-content-md-start">
                            
        <div class="col-md-4">
        
            <div class="row justify-content-md-start">
                <label class="text-md-center"> Skill Required :</label>    
            </div>

            <div class="row justify-content-md-start">
                <textarea class="form-control"  rows="3"></textarea>
            </div>
<br>
            <div class="row justify-content-md-start">
                <label class="text-md-center"> Any Special Consideration :</label>    
            </div>

            <div class="row justify-content-md-start">
                <textarea class="form-control"  rows="3"></textarea>
            </div>
                        
        </div>

        <div class="col-md-3">

<br><br>                
    <table class="table"  border="1" width="auto">

        <tr>
            <th colspan="2">SKILL DETAILS</th>
            <th width='15px'>REQUIRED</th>
            <th width='15px'>ACTUAL</th width=''>
        </tr>

        <tr > 
            <th rowspan="3">Managerial Skill</th>
            <td>Communication Skill</td>
            <td><input type="number" name="" id=""></td>
            <td><input type="number" name="" id=""></td>
        </tr>

        <tr>

            <td>Leadership Skill</td>
            <td><input type="number" name="" id=""></td>
            <td><input type="number" name="" id=""></td>
        </tr>

        
        <tr>

            <td>Teamwork</td>
            <td><input type="number" name="" id=""></td>
            <td><input type="number" name="" id=""></td>
        </tr>
        
        <tr> 
            <th  rowspan="7">Preffered Skill</th>
            <td>Vendor Selection & Assessment		
            </td>
            <td><input type="number" name="" id=""></td>
            <td><input type="number" name="" id=""></td>   
        </tr>

        <tr>
            <td>Bought out items costing		
            </td>
            <td><input type="number" name="" id=""></td>
            <td><input type="number" name="" id=""></td>
        </tr>

        <tr>
            <td>Project Management		
            </td>
            <td><input type="number" name="" id=""></td>
            <td><input type="number" name="" id=""></td>
        </tr>

        <tr>
            <td>Press tools/ casting & machining		
            </td>
            <td><input type="number" name="" id=""></td>
            <td><input type="number" name="" id=""></td>
        </tr>


        <tr>
            <td>Inventory Management		
            </td>
            <td><input type="number" name="" id=""></td>
            <td><input type="number" name="" id=""></td>
        </tr>
        <tr>
            <td>Details on Taxation		
		
            </td>
            <td><input type="number" name="" id=""></td>
            <td><input type="number" name="" id=""></td>
        </tr>
        <tr>
            <td>ERP/SAP Knowledge		
            </td>
            <td><input type="number" name="" id=""></td>
            <td><input type="number" name="" id=""></td>
        </tr>

        <tr> 
            <th rowspan=3>System Requirement</th>
            <td>ISO 9001:2015		
            </td>
            <td><input type="number" name="" id=""></td>
            <td><input type="number" name="" id=""></td>
        </tr>
        <tr>
            <td>5S (House Keeping)		
            </td>
            <td><input type="number" name="" id=""></td>
            <td><input type="number" name="" id=""></td>
        </tr>
        <tr>
            <td>EMS 14001:2015		
            </td>
            <td><input type="number" name="" id=""></td>
            <td><input type="number" name="" id=""></td>
        </tr>

    </table>

        </div>
    </div>

<br><br>
    
    <div class="row justify-content-md-around">
        <div class="col-3">
            <a href="print.html"><button class="btn btn-primary btn-lg btn-block">Submit</button></a>
        </div>
        <div class="col-3">
            <button class="btn btn-danger btn-lg btn-block">Cancel</button>
        </div>
    </div>


</div>

<div style="margin-bottom: 200px;">

</div>
