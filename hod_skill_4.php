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
?>    <div  style="margin-bottom: 100px; border: 1px solid lightblue; padding: 50px;">


        <div class="row justify-content-md-start">
        
            <div class="col-md-8">
                <h4><label>Skill Matrix DETAILS :</label></h4>
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
            <div class="col-md-2">
                <label> Employee name :  </label>
            </div>

            <div class="col-md-4">
                <input type="text"  class="form-control" >
            </div>
  
            <div class="col-md-2">
                <label> Employee number :  </label>
            </div>

            <div class="col-md-4">
                <input type="text"  class="form-control" >
            </div>
            <div class="col-md-2">
                <label> D.O.J :  </label>
            </div>

            <div class="col-md-4">
                <input type="text"  class="form-control" >
            </div>


            <div class="col-md-2">
                <label> Department :  </label>
            </div>

            <div class="col-md-4">
                <input type="text"  class="form-control" >
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
          
            <div class="col-md-2">
                <label> Designation:</label>
            </div>
            <div class="col-md-4">
                <select name="" id="" class="form-control">
                    <option value="" selected>Assitant Manager</option>
                    <option value="">Manager</option>
                    <option value="">Devloper</option>
                    <option value="">senior Manager</option>
                </select>
            </div>
            
            <div class="col-md-2">
                <label> Grade :  </label>
            </div>
            <div class="col-md-4">
                <select name="" id="" class="form-control">
                    <option value="">E1</option>
                    <option value="">E2</option>
                    <option value="">D1</option>
                    <option value="">M1</option>
                </select>
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
          
            <div class="col-md-2">
                <label> Location :  </label>
            </div>

            <div class="col-md-4">
                <select name="" id="">
                <option value="">Pune</option>
                <option value="">Kolhapur</option>
            </select>
            </div>

            <div class="col-md-2">
                <label> Employee Type :  </label>
            </div>

            <div class="col-md-4">
                <input type="text"  class="form-control" >
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
                
            <div class="col-md-2">
                <label> Employee Status :  </label>
            </div>

            <div class="col-md-4">
                <input type="text"  class="form-control" >
            </div>

            <div class="col-md-2">
                <label> Employee Reporting to :  </label>
            </div>

            <div class="col-md-4">
                <input type="text"  class="form-control" >
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
                
            <div class="col-md-2">
                <label> Education :  </label>
            </div>

            <div class="col-md-4">
                <input type="text"  class="form-control" >
            </div>

            <div class="col-md-2">
                <label> Previous Experience :  </label>
            </div>

            <div class="col-md-4">
                <input type="number"  class="form-control" >
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
                
            <div class="col-md-2">
                <label> Resigned Date :  </label>
            </div>

            <div class="col-md-4">
                <input type="date"  class="form-control" >
            </div>

            <div class="col-md-2">
                <label> Last Working Date :  </label>
            </div>

            <div class="col-md-4">
                <input type="date"  class="form-control" >
            </div>

        </div>


    <table class="table"  border="1">

        <tr>
            <th colspan="2">SKILL DETAILS</th>
            <th>REQUIRED</th>
            <th>ACTUAL</th>
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
    <center>
    <input type="button" value="Submit" name="Submit" class="btn btn-primary">
</center>
    <html>