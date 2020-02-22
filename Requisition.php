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
            <input type="text" name="reqfor" id="reqfor"  class="form-control" >
        </div>
    </div>
<br>
    <div class="row justify-content-md-start">
        <div class="col-md-4">
            <label>Reason for Appoinment:   </label>
        </div>
        <div class="col-md-4">
            <select class="custom-select"  name="reasonappnt" id="reasonappnt">
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
                    <input type="text"  class="form-control" id="minqual" name="minqual">
                </div>
                <div class="col-md-6">
                    <input type="text"  class="form-control" id="prefqual" name="prefqual" >
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
                    <input type="text"  class="form-control" name="expmin" id="expmin">
                </div>
                <div class="col-md-6">
                    <input type="text"  class="form-control" name="expmax" id="expmax">
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
                <textarea class="form-control"  rows="3" name="skillsreq" id="skillsreq"></textarea>
            </div>
<br>
            <div class="row justify-content-md-start">
                <label class="text-md-center"> Any Special Consideration :</label>    
            </div>
            <div class="row justify-content-md-start">
                <textarea class="form-control"  rows="3"></textarea>
            </div>          
        </div> 

        &nbsp; &nbsp; &nbsp;
        <div class="">
<br><br>                
    <table class="table"  border="1" >
        <tr>
            <th colspan="2" >SKILL DETAILS</th>
            <th width='11px'>REQUIRED</th>
            <th width='11px'>ACTUAL</th width=''>
        </tr>
        <tr > 
            <th>Managerial Skill</th>
            <td >Communication Skill</td>
            <td ><input type="number" style="width: 50px;" name="" id=""></td>
            <td><input type="number" name="" id=""  style="width: 50px;"></td>
        </tr>
        <tr> 
            <th>Preffered Skill</th>
            <td style="">Vendor Selection & Assessment		
            </td>
            <td><input type="number" name="" id=""  style="width: 50px;"></td>
            <td><input type="number" name="" id=""  style="width: 50px;"></td>   
        </tr>
        <tr> 
            <th >System Requirement</th>
            <td>ISO 9001:2015		
            </td>
            <td><input type="number" name="" id=""  style="width: 50px;"></td>
            <td><input type="number" name="" id=""  style="width: 50px;"></td>
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
    <br>
</div>