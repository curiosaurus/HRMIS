<?php
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$skillyear = (isset($_GET['year'])) ? $_GET['year'] : header('location: skillmatrixlist.php');
$skillscollection = $companydb->$skillyear;
$empcollection = $companydb->empcollection;
//echo "123";
if(isset ($_GET['variable1']))
{
    $empcode = $_GET['variable1'];
    //echo "123";
    $result = $skillscollection->find(['empcode' => $empcode]);
    //print("<pre>".print_r($result,true)."</pre>");
    foreach ($result as $row){
        //echo "123";
        $managerialSkillArray = $row['managerialSkill'];
        $preferredSkillArray = $row['preferredSkill'];
        $systemRequirementsArray = $row['systemRequirements'];
    }
    $counter=$empcollection->find(['Emp Code'=>$empcode]);
    foreach ($counter as $row)
    {
        $empcode=$row['Emp Code'];
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
?>    
<div  style="margin-bottom: 100px; border: 1px solid lightblue; padding: 50px;">
    <div class="row justify-content-md-start">
        <div class="col-md-8">
            <h4><label>Skill Matrix DETAILS :</label></h4>
        </div>
    </div>
    <br>
<form action="skillMatrixSubmitData.php?variable1=<?php echo $empcode;?>&year=<?php echo $skillyear;?>" method="post">
    <div class="row justify-content-md-start">
            <div class="col-md-2">
                <label> Employee name :  </label>
            </div>
            <div class="col-md-4">
                <input type="text" disabled value="<?php echo (isset($display_name)) ? $display_name : '';?>" name="empName" class="form-control" >
            </div>
  
            <div class="col-md-2">
                <label> Employee number :  </label>
            </div>

            <div class="col-md-4">
                <input type="text" disabled value="<?php echo (isset($empcode)) ? $empcode : '';?>" name="empNumber" class="form-control" >
            </div>
            <div class="col-md-2">
                <label> D.O.J :  </label>
            </div>

            <div class="col-md-4">
                <input type="text" disabled value="<?php echo (isset($date_0f_joinng)) ? $date_0f_joinng : '';?>" name="doj" class="form-control" >
            </div>


            <div class="col-md-2">
                <label> Department :  </label>
            </div>

            <div class="col-md-4">
                <input type="text" disabled value="<?php echo (isset($department)) ? $department : '';?>" name="department" class="form-control" >
            </div>

        </div>

<br>
        <div class="row justify-content-md-start">
          
            <div class="col-md-2">
                <label> Designation:</label>
            </div>
            <div class="col-md-4">
                <select name="" id="" disabled value="" class="form-control" name="designation">
                    <option value="" selected><?php echo (isset($designation)) ? $designation : '';?></option>
                </select>
            </div>
            
            <div class="col-md-2">
                <label> Grade :  </label>
            </div>
            <div class="col-md-4">
                <select name="" id="" disabled class="form-control" name="grade">
                    <option value="" selected><?php echo (isset($grade)) ? $grade : '';?></option>
                </select>
            </div>

        </div>

<br>
        <div class="row justify-content-md-start">
          
            <div class="col-md-2">
                <label> Location :  </label>
            </div>

            <div class="col-md-4">
                <select name="location" disabled id="">
                    <option value="" selected><?php echo (isset($location)) ? $location : '';?></option>
                </select>
            </div>

            <div class="col-md-2">
                <label> Employee Type :  </label>
            </div>

            <div class="col-md-4">
                <input type="text" disabled value="<?php echo (isset($employeetype)) ? $employeetype : '';?>" name="employeeType" class="form-control" >
            </div>

        </div>
<br>

        <div class="row justify-content-md-start">
                
            <div class="col-md-2">
                <label> Employee Status :  </label>
            </div>

            <div class="col-md-4">
                <input type="text" disabled value="<?php echo (isset($employeestatus)) ? $employeestatus : '';?>" name="employeeStatus" class="form-control" >
            </div>

            <div class="col-md-2">
                <label> Employee Reporting to :  </label>
            </div>

            <div class="col-md-4">
                <input type="text" disabled value="<?php echo (isset($employeereportingto)) ? $employeereportingto : '';?>" name="employeeReportingTo" class="form-control" >
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
                
            <div class="col-md-2">
                <label> Education :  </label>
            </div>

            <div class="col-md-4">
                <input type="text" disabled value="<?php echo (isset($education)) ? $education : '';?>" name="education" class="form-control" >
            </div>

            <div class="col-md-2">
                <label> Previous Experience :  </label>
            </div>

            <div class="col-md-4">
                <input type="number" disabled value="<?php echo (isset($previous_exp)) ? $previous_exp : '';?>" name="previousExperience" class="form-control" >
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
                
            <div class="col-md-2">
                <label> Resigned Date :  </label>
            </div>

            <div class="col-md-4">
                <input type="date" disabled value="<?php echo (isset($resigned_date)) ? $resigned_date : '';?>" name="resignedDate" class="form-control" >
            </div>

            <div class="col-md-2">
                <label> Last Working Date :  </label>
            </div>

            <div class="col-md-4">
                <input type="date" disabled value="<?php echo (isset($last_working_date)) ? $last_working_date : '';?>" name="lastWorkingDate" class="form-control" >
            </div>

        </div>
        <br>
        <hr>
<br>
    <table class="table"  border="1">

        <tr>
            <th colspan="2">SKILL DETAILS</th>
            <th>REQUIRED</th>
            <th>ACTUAL</th>
        </tr>
        <tr>     
        <?php 
            $counter2 = sizeof($managerialSkillArray);
            echo '<th rowspan = "'.$counter2.'" >Managerial Skill</th>';
            foreach($managerialSkillArray as $row){
                echo "<td >".$row[0]."</td>";
                echo'<td >'.$row[1].'</td>
                <td>'.$row[2].'</td>
                </tr>';
            }           
        ?>
        <tr>     
        <?php 
            $counter2 = sizeof($preferredSkillArray);
            echo '<th rowspan = "'.$counter2.'" >Preferred Skill</th>';
            foreach($preferredSkillArray as $row){
                echo "<td >".$row[0]."</td>";
                echo'<td >'.$row[1].'</td>
                <td>'.$row[2].'</td>
                </tr>';
            }           
        ?>
        <tr>     
        <?php 
            $counter2 = sizeof($systemRequirementsArray);
            echo '<th rowspan = "'.$counter2.'" >System Requirements</th>';
            foreach($systemRequirementsArray as $row){
                echo "<td >".$row[0]."</td>";
                echo'<td >'.$row[1].'</td>
                <td>'.$row[2].'</td>
                </tr>';
            }           
        ?>
    </table>
</div>
</body>
</html>