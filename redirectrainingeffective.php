<?php
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$skillyear = (isset($_GET['year'])) ? $_GET['year'] : header('location: skillmatrixlist.php');
$skillscollection = $companydb->$skillyear;



if(isset ($_GET['variable1']))
{
    $empcode = $_GET['variable1'];
    $result = $skillscollection->find(array('empcode' => $empcode));
    print("<pre>".print_r($result->isDead(),true)."</pre>");
    // foreach ($result as $row){
    //     $managerialSkillArray = $row['managerialSkill'];
    //     $preferredSkillArray = $row['preferredSkill'];
    //     $systemRequirementsArray = $row['systemRequirements'];
    // } 
    if($result->isDead()==1){
        header('location: skillmatrix.php?variable1='.$empcode.'&year='.$skillyear);
    }
    else{
        header('location: viewSkillMatrix.php?variable1='.$empcode.'&year='.$skillyear);
    }
}
else {
    header('location: skillmatrixlist.php');
}
?>