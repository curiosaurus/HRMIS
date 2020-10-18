<!-- skillmatrix.php data will come here -->
<?php
require 'vendor\autoload.php'; 

$client = new MongoDB\Client;
$companydb = $client->hrmis;

// Add collection name here in place of user
$empcollection = $companydb->user;

// For getting year from URL
$year = (isset($_GET["year"]) ? $_GET["year"] : "");

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

    // Getting each skill from multidimensional array
    // $communicationSkill = $managerialSkill[0];
    // $leadershipSkill = $managerialSkill[1];
    // $teamWork = $managerialSkill[2];

    // $vendorSelection = $preferredSkill[0];
    // $boughtItem = $preferredSkill[1];
    // $projectManagement = $preferredSkill[2];
    // $pressTools = $preferredSkill[3];
    // $inventoryManagement = $preferredSkill[4];
    // $detailsOnTaxation = $preferredSkill[5];
    // $erpAndSap = $preferredSkill[6];

    // $iso = $systemRequirements[0];
    // $fiveS = $systemRequirements[1];
    // $ems = $systemRequirements[2];

    $nominationsRequired = array();
    $managerialSkillCounter = $_POST['counter3'];
    for ($x = 0; $x < $managerialSkillCounter + 1; $x++){
        if ($managerialSkill[$x][1] > $managerialSkill[$x][2]){
            array_push($nominationsRequired,$managerialSkill[$x]);
        }
    }
    $preferredSkillCounter = $_POST['counter'];
    for ($x = 0; $x < $preferredSkillCounter + 1; $x++){
        if ($preferredSkill[$x][1] > $preferredSkill[$x][2]){
            array_push($nominationsRequired,$preferredSkill[$x]);
        }
    }
    $systemRequirementsCounter = $_POST['counter4'];
    for ($x = 0; $x < $systemRequirementsCounter + 1; $x++){
        if ($systemRequirements[$x][1] > $systemRequirements[$x][2]){
            array_push($nominationsRequired,$systemRequirements[$x]);
        }
    }

    $sizeOfNominations = sizeof($nominationsRequired);

    // Add skill to collections
    for ($i = 0; $i < $sizeOfNominations; $i++){
        $query = $empcollection->findOne(array("year" => $year, "skill" => $nominationsRequired[$i][0]));

        if ($query){
            $query = $empcollection->updateOne(['year' => $year,'skillName' => $nominationsRequired[$i][0]],['$push' => ["empIds" => $empcode]]);
        } else {
            $arrayOfId = array($empcode);
            $query = $empcollection->insertOne(['year' => $year, 'skillName' => $nominationsRequired[$i][0], 'empIds' => $arrayOfId]);
        }
    }

    // Cheking year and skill is present in database or not
    $isPresent = $empcollection->findOne(array("year" => $year, "skill"));

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