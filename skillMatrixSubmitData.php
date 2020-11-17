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
    $managerialSkill = $_POST["managerialSkill"];
    $preferredSkill = $_POST["preferredSkill"];
    $systemRequirements = $_POST["systemRequirements"];
    $nominationsRequired = array();
    // print("<pre>".print_r($managerialSkill,true)."</pre>");
    // print("<pre>".print_r($preferredSkill,true)."</pre>");
    // print("<pre>".print_r($systemRequirements,true)."</pre>");
    $managerialSkillCounter = $_POST['counter3'];
    $preferredSkillCounter = $_POST['counter'];
    $systemRequirementsCounter = $_POST['counter4'];
    for ($x = 0; $x < $managerialSkillCounter+1; $x++){
        if ($managerialSkill[$x][1] > $managerialSkill[$x][2]){
            array_push($nominationsRequired,array_merge($managerialSkill[$x],["Nominated"]));
        }
    }
    for ($x = 0; $x < $preferredSkillCounter+1; $x++){
        if ($preferredSkill[$x][1] > $preferredSkill[$x][2]){
            array_push($nominationsRequired,array_merge($preferredSkill[$x],["Nominated"]));
        }
    }
    for ($x = 0; $x <$systemRequirementsCounter+1; $x++){
        if ($systemRequirements[$x][1] > $systemRequirements[$x][2]){
            array_push($nominationsRequired,array_merge($systemRequirements[$x],["Nominated"]));
        }
    }
    print("<pre>".print_r($nominationsRequired,true)."</pre>");
    $sizeOfNominations = sizeof($nominationsRequired);
    //echo $sizeOfNominations;
    // Add skill to collections
    for ($i = 0; $i < $sizeOfNominations; $i++){
        //echo $nominationsRequired[$i][0];
        $query = $empcollection->findOne(['$and'=>[["year" => $year], ["skill" => $nominationsRequired[$i][0]]]]);
        print("<pre>".print_r($query,true)."</pre>");
        if ($query){
            echo $i;
            $query = $empcollection->updateOne(['year' => $year,'skill' => $nominationsRequired[$i][0]],['$push' => ["empIds" => $empcode]]);
        } else {
            $arrayOfId = array($empcode);
            //echo $i;
            $query = $empcollection->insertOne(['year' => $year, 'skill' => $nominationsRequired[$i][0], 'empIds' => $arrayOfId]);
        }
    }
    // Cheking year and skill is present in database or not
    $insertData = $skillyearcollection->insertOne( ['empcode' => $empcode , 'managerialSkill' =>  $managerialSkill , 
        'preferredSkill' => $preferredSkill , 'systemRequirements' => $systemRequirements , 'nominatedfor'=> $nominationsRequired ]);
    if($insertData){
        //echo "Success";
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