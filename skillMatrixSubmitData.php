<!-- skillmatrix.php data will come here -->
<?php
$years=$_GET["year"];
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->hrmis;
// Add collection name here in place of user
$empcollection = $companydb->nominations;
$skillyearcollection = $companydb->$years;
// For getting year from URL
$year = (isset($_GET["year"]) ? $_GET["year"] : "");
if(isset($_GET['variable1']))
{
    $empcode=$_GET['variable1'];
    // Form data from skillmatrix.php
    // $employeename = $_POST["empName"];
    // $employeenumber = $_POST["empNumber"];
    // $doj = $_POST["doj"];
    // $department = $_POST["department"];
    // $designation = $_POST["designation"];
    // $grade = $_POST["grade"];
    // $location = $_POST["location"];
    // $employeeType = $_POST["employeeType"];
    // $employeeStatus = $_POST["employeeStatus"];
    // $employeeReportingTo = $_POST["employeeReportingTo"];
    // $education = $_POST["education"];
    // $previousExperience = $_POST["previousExperience"];
    // $resignedDate = $_POST["resignedDate"];
    // $lastWorkingDate = $_POST["lastWorkingDate"];
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
    // print("<pre>".print_r($managerialSkill,true)."</pre>");
    // print("<pre>".print_r($preferredSkill,true)."</pre>");
    // print("<pre>".print_r($systemRequirements,true)."</pre>");
    for ($x = 0; $x < 3; $x++){
        if ($managerialSkill[$x][1] > $managerialSkill[$x][2]){
            array_push($nominationsRequired,$managerialSkill[$x]);
        }
    }
    for ($x = 0; $x < 7; $x++){
        if ($preferredSkill[$x][1] > $preferredSkill[$x][2]){
            array_push($nominationsRequired,$preferredSkill[$x]);
        }
    }
    for ($x = 0; $x < 3; $x++){
        if ($systemRequirements[$x][1] > $systemRequirements[$x][2]){
            array_push($nominationsRequired,$systemRequirements[$x]);
        }
    }
    print("<pre>".print_r($nominationsRequired,true)."</pre>");
    $sizeOfNominations = sizeof($nominationsRequired);
    // Add skill to collections
    
    for ($i = 0; $i < $sizeOfNominations; $i++){
        echo $nominationsRequired[$i][0];
        $query = $empcollection->findOne(["year" => $year], ["skill" => $nominationsRequired[$i][0]]);
        print_r($query);
        if ($query){
            $query = $empcollection->updateOne(['year' => $year,'skill' => $nominationsRequired[$i][0]],['$push' => ["empIds" => $empcode]]);
        } else {
            $arrayOfId = array($empcode);
            $query = $empcollection->insertOne(['year' => $year, 'skill' => $nominationsRequired[$i][0], 'empIds' => $arrayOfId]);
        }
    }
    // Cheking year and skill is present in database or not
    $insertData = $skillyearcollection->insertOne( ['empcode' => $empcode , 'managerialSkill' =>  $managerialSkill , 
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