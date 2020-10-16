<?php

require 'vendor\autoload.php'; 

$client = new MongoDB\Client;
$companydb = $client->companydb;
$empcollection = $companydb->user;

if(isset ($_GET['variable1']))
{
    $empcode=$_GET['variable1'];
    $counter=$empcollection->find(['Emp Code'=>$empcode]);
    foreach ($counter as $row)
    {
        $empcode=$row['Emp code'];
        $display_name=$row['Emp Display Name'];
        $date_0f_joinng=$row['Date of joining'];
        $department=$row['Department Id'];
        $designation=$row['Designation'];
        $grade=$row['Grade Id'];
        $location=$row['Location Id'];
        $employeetype=$row['Employee Type Id'];
        $employeestatus=$row['Employee Status Id'];
        $employeereportingto=$row['REPORTING TO'];
        $education=$row['EDUCATION'];

        $previous_exp=$row['Previous Exp'];
        $resigned_date=$row['Resigned date'];
        $last_working_date=$row['DATE OF LEAVING'];
    }
}
else{
    header('location:skillmatrixlist.php');
}

?>

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
<form action="#" method="post">
    <div class="row justify-content-md-start">
            <div class="col-md-2">
                <label> Employee name :  </label>
            </div>

            <div class="col-md-4">
                <input required type="text" name="empName" class="form-control" >
            </div>
  
            <div class="col-md-2">
                <label> Employee number :  </label>
            </div>

            <div class="col-md-4">
                <input required type="text" name="empNumber" class="form-control" >
            </div>
            <div class="col-md-2">
                <label> D.O.J :  </label>
            </div>

            <div class="col-md-4">
                <input required type="text" name="doj" class="form-control" >
            </div>


            <div class="col-md-2">
                <label> Department :  </label>
            </div>

            <div class="col-md-4">
                <input required type="text" name="department" class="form-control" >
            </div>

        </div>

<br>
        <div class="row justify-content-md-start">
          
            <div class="col-md-2">
                <label> Designation:</label>
            </div>
            <div class="col-md-4">
                <select name="" id="" required class="form-control" name="designation">
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
                <select name="" id="" required class="form-control" name="grade">
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
                <select name="location" id="" required>
                    <option value="">Pune</option>
                    <option value="">Kolhapur</option>
                </select>
            </div>

            <div class="col-md-2">
                <label> Employee Type :  </label>
            </div>

            <div class="col-md-4">
                <input type="text" name="employeeType" required class="form-control" >
            </div>

        </div>
<br>

        <div class="row justify-content-md-start">
                
            <div class="col-md-2">
                <label> Employee Status :  </label>
            </div>

            <div class="col-md-4">
                <input required type="text" name="employeeStatus" class="form-control" >
            </div>

            <div class="col-md-2">
                <label> Employee Reporting to :  </label>
            </div>

            <div class="col-md-4">
                <input required type="text" name="employeeReportingTo" class="form-control" >
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
                
            <div class="col-md-2">
                <label> Education :  </label>
            </div>

            <div class="col-md-4">
                <input required type="text" name="education" class="form-control" >
            </div>

            <div class="col-md-2">
                <label> Previous Experience :  </label>
            </div>

            <div class="col-md-4">
                <input required type="number" name="previousExperience" class="form-control" >
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
                
            <div class="col-md-2">
                <label> Resigned Date :  </label>
            </div>

            <div class="col-md-4">
                <input required type="date" name="resignedDate" class="form-control" >
            </div>

            <div class="col-md-2">
                <label> Last Working Date :  </label>
            </div>

            <div class="col-md-4">
                <input required type="date" name="lastWorkingDate" class="form-control" >
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
            <td><input type="hidden" name="managerialSkill[0][0]" value="Communication Skill"></td>
            <td><input required type="number" name="managerialSkill[0][1]" id=""></td>
            <td><input required type="number" name="managerialSkill[0][2]" id=""></td>
        </tr>

        <tr>

            <td>Leadership Skill</td>
            <td><input type="hidden" name="managerialSkill[1][0]" value="Leadership Skill"></td>
            <td><input required type="number" name="managerialSkill[1][1]" id=""></td>
            <td><input required type="number" name="managerialSkill[1][2]" id=""></td>
        </tr>

        
        <tr>

            <td>Teamwork</td>
            <td><input type="hidden" name="managerialSkill[2][0]" value="Teamwork"></td>
            <td><input required type="number" name="managerialSkill[2][1]" id=""></td>
            <td><input required type="number" name="managerialSkill[2][2]" id=""></td>
        </tr>
        
        <tr> 
            <th  rowspan="7">Preffered Skill</th>
            <td>Vendor Selection & Assessment		
            </td>
            <td><input type="hidden" name="preferredSkill[0][0]" value="Vendor Selection & Assessment"></td>
            <td><input required type="number" name="preferredSkill[0][1]" id=""></td>
            <td><input required type="number" name="preferredSkill[0][2]" id=""></td>   
        </tr>

        <tr>
            <td>Bought out items costing		
            </td>
            <td><input type="hidden" name="preferredSkill[1][0]" value="Bought out items costing"></td>
            <td><input required type="number" name="preferredSkill[1][1]" id=""></td>
            <td><input required type="number" name="preferredSkill[1][2]" id=""></td>
        </tr>

        <tr>
            <td>Project Management		
            </td>
            <td><input type="hidden" name="preferredSkill[2][0]" value="Project Management"></td>
            <td><input required type="number" name="preferredSkill[2][1]" id=""></td>
            <td><input required type="number" name="preferredSkill[2][2]" id=""></td>
        </tr>

        <tr>
            <td>Press tools/ casting & machining		
            </td>
            <td><input type="hidden" name="preferredSkill[3][0]" value="Press tools/ casting & machining"></td>
            <td><input required type="number" name="preferredSkill[3][1]" id=""></td>
            <td><input required type="number" name="preferredSkill[3][2]" id=""></td>
        </tr>


        <tr>
            <td>Inventory Management		
            </td>
            <td><input type="hidden" name="preferredSkill[4][0]" value="Inventory Management"></td>
            <td><input required type="number" name="preferredSkill[4][1]" id=""></td>
            <td><input required type="number" name="preferredSkill[4][2]" id=""></td>
        </tr>
        <tr>
            <td>Details on Taxation		
		
            </td>
            <td><input type="hidden" name="preferredSkill[5][0]" value="Details on Taxation"></td>
            <td><input required type="number" name="preferredSkill[5][1]" id=""></td>
            <td><input required type="number" name="preferredSkill[5][2]" id=""></td>
        </tr>
        <tr>
            <td>ERP/SAP Knowledge		
            </td>
            <td><input type="hidden" name="preferredSkill[6][0]" value="ERP/SAP Knowledge"></td>
            <td><input required type="number" name="preferredSkill[6][1]" id=""></td>
            <td><input required type="number" name="preferredSkill[6][2]" id=""></td>
        </tr>

        <tr> 
            <th rowspan=3>System Requirement</th>
            <td>ISO 9001:2015		
            </td>
            <td><input type="hidden" name="systemRequirements[0][0]" value="ISO 9001:2015"></td>
            <td><input required type="number" name="systemRequirements[0][1]" id=""></td>
            <td><input required type="number" name="systemRequirements[0][2]" id=""></td>
        </tr>
        <tr>
            <td>5S (House Keeping)		
            </td>
            <td><input type="hidden" name="systemRequirements[1][0]" value="5S (House Keeping)"></td>
            <td><input required type="number" name="systemRequirements[1][1]" id=""></td>
            <td><input required type="number" name="systemRequirements[1][2]" id=""></td>
        </tr>
        <tr>
            <td>EMS 14001:2015		
            </td>
            <td><input type="hidden" name="systemRequirements[2][0]" value="EMS 14001:2015"></td>
            <td><input required type="number" name="systemRequirements[2][1]" id=""></td>
            <td><input required type="number" name="systemRequirements[2][2]" id=""></td>
        </tr>

    </table>
    <center>
        <input type="submit" value="Submit" name="Submit" class="btn btn-primary">
    </center>
</form>
       
</body>
<html>
