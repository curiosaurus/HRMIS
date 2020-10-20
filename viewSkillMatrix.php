<?php
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$skillyear = (isset($_GET['year'])) ? $_GET['year'] : '';
$skillscollection = $companydb->$skillyear;
if(isset ($_GET['variable1']))
{
    $empcode = $_GET['variable1'];
    $result = $skillscollection->find(array('empcode' => $empcode));
    foreach ($result as $row){
        $managerialSkillArray = $row['managerialSkill'];
        $preferredSkillArray = $row['preferredSkill'];
        $systemRequirementsArray = $row['systemRequirements'];
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
                echo'<td ><input type="number" disabled style="width: 50px;">'.$row[1].'</td>
                <td><input type="number" disabled style="width: 50px;">'.$row[2].'</td>
                </tr>';
            }           
        ?>

        <tr>     
        <?php 
            $counter2 = sizeof($preferredSkillArray);
            echo '<th rowspan = "'.$counter2.'" >Preferred Skill</th>';
            foreach($preferredSkillArray as $row){
                echo "<td >".$row[0]."</td>";
                echo'<td ><input type="number" disabled style="width: 50px;">'.$row[1].'</td>
                <td><input type="number" disabled style="width: 50px;">'.$row[2].'</td>
                </tr>';
            }           
        ?>

        <tr>     
        <?php 
            $counter2 = sizeof($systemRequirementsArray);
            echo '<th rowspan = "'.$counter2.'" >System Requirements</th>';
            foreach($systemRequirementsArray as $row){
                echo "<td >".$row[0]."</td>";
                echo'<td ><input type="number" disabled style="width: 50px;">'.$row[1].'</td>
                <td><input type="number" disabled style="width: 50px;">'.$row[2].'</td>
                </tr>';
            }           
        ?>
        
    
    </table>

</div>

</body>

</html>