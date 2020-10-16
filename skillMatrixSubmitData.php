<!-- skillmatrix.php data will come here -->
<?php
require 'vendor\autoload.php'; 

$client = new MongoDB\Client;
$companydb = $client->companydb;

// Add collection name here in place of user
$empcollection = $companydb->user;

if(isset($_GET['variable1']))
{
    $empcode=$_GET['variable1'];

    // Form data from skillmatrix.php
    $employeename = $_POST["empName"];
    $employeenumber = $_POST["empNumber"];
    $doj = $_POST["doj"];
    $department = $_POST["department"];
    $designation = $_POST["designation"];
    $grade = $_POST["grade"];
    $location = $_POST["location"];
    $employeeType = $_POST["employeeType"];
    $employeeStatus = $_POST["employeeStatus"];
    $employeeReportingTo = $_POST["employeeReportingTo"];
    $education = $_POST["education"];
    $previousExperience = $_POST["previousExperience"];
    $resignedDate = $_POST["resignedDate"];
    $lastWorkingDate = $_POST["lastWorkingDate"];


    $managerialSkill = $_POST["managerialSkill"];
    $preferredSkill = $_POST["preferredSkill"];
    $systemRequirements = $_POST["systemRequirements"];

    $insertData = $empcollection->insertOne( ['empcode' => $empcode ,'employeename' => $employeename , 'employeenumber' => $employeenumber , 
    'doj' => $doj , 'department' => $department , 'designation' => $designation , 
    'grade' => $grade , 'location' => $location , 'employeeType' => $employeeType , 
    'employeeStatus' => $employeeStatus , 'employeeReportingTo' => $employeeReportingTo ,
     'education' => $education , 'previousExperience' => $previousExperience , 
        'resignedDate' => $resignedDate , 'lastWorkingDate' => $lastWorkingDate , 'managerialSkill' =>  $managerialSkill , 
        'preferredSkill' => $preferredSkill , 'systemRequirements' => $systemRequirements ] );

    if($insertData){
        echo "Success";

        // Enter URL of the file where it should redirect
        header('location:');
    } else {
        echo "Problem Occured!!";
    }
}
else
{
    // Enter URL of the file where it should redirect
    header('location:');
}

?>