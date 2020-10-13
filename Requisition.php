<?php

session_start();
// error_reporting(E_ERROR | E_PARSE);


// if (!$_SESSION['usertype']=='hod')
// {
//     header('location:login.php');
// }
    // require 'session.php'	
    require 'vendor\autoload.php'; 

    // $client = new MongoDB\Client;
    // $companydb = $client->hrmis;
    // $empcollection = $companydb->requisition;




/**
 * Creating MongoDB like ObjectIDs.
 * Using current timestamp, hostname, processId and a incremting id.
 * 
 * @author Julius Beckmann
 */
function createMongoDbLikeId($timestamp, $hostname, $processId, $id)
{
	// Building binary data.
	$bin = sprintf(
		"%s%s%s%s",
		pack('N', $timestamp),
		substr(md5($hostname), 0, 3),
		pack('n', $processId),
		substr(pack('N', $id), 1, 3)
	);

	// Convert binary to hex.
	$result = '';
	for ($i = 0; $i < 12; $i++) {
		$result .= sprintf("%02x", ord($bin[$i]));
	}

	return $result;
}
?>








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
    //include 'adminnavbar.php';
    // if ($_SESSION['usertype']=='hod')
    // {
    //         include 'hodnavbar.php';
    // }
    // else
    // {

    //     include 'adminnavbar.php';
    // }
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
<form action="Requisition_data.php" method="POST">
<div class="container">
    <div class="row justify-content-md-start">
        
        <div class="col-md-1">
             From :
        </div>
        <div class="col-md-2">
             Department  
        </div>


        <?php


echo '<div class="col-md-3"><div class="dropdown">';

    $masteropt='masteropt';
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $empcollection = $companydb->$masteropt;
    $counter = $empcollection->find(['type'=>'department']);
    echo'<select name="department" id="department" onchange="pp();">';
    foreach($counter as $row) {
        if($_GET["uid"] == $row['value']){
        echo "<option value = ".$row['value']." selected>". $row['value'] ."</option>";
        }
        else{
            echo "<option value = ".$row['value']." >". $row['value'] ."</option>";
        }

    }
echo '</select>';
    
?>
<script>
function pp(){
    var p = document.getElementById("department").value;
    window.location.href="Requisition.php?uid="+p;
}

</script>


</div>
</div>
<?php
// }
?>
<?php
// if ($_SESSION['usertype']=='hod'){?>
<div class="col-md-3">
<?php
// $_SESSION['dept']
?>    
</div>
<?php
// }
?>
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
            <input required type="text" name="reqfor" id="reqfor"  class="form-control" >
        </div>
    </div>
    <br>
    <div class="row justify-content-md-start">
        <div class="col-md-4">
            <label>Reason for Appoinment:   </label>
        </div>
        <div class="col-md-4">
            <select required class="custom-select"  name="reasonappnt" id="reasonappnt">
                <option value="Replacement"> Replacement </option>
                <option value="New Position"> New Position </option>
                <option value="Additional Workload"> Additional Workload </option>
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
                    <input required type="text"  class="form-control" id="minqual" name="minqual">
                </div>
                <div class="col-md-6">
                    <input required type="text"  class="form-control" id="prefqual" name="prefqual" >
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
                    <input required type="text"  class="form-control" name="expmin" id="expmin">
                </div>
                <div class="col-md-6">
                    <input required type="text"  class="form-control" name="expmax" id="expmax">
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
                <textarea required class="form-control"  rows="3" name="skillsreq" id="skillsreq"></textarea>
            </div>
            <br>
            <div class="row justify-content-md-start">
                <label class="text-md-center"> Any Special Consideration :</label>    
            </div>
            <div class="row justify-content-md-start">
                <textarea required class="form-control" name="skillconsider"  rows="3"></textarea>
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


<?php

require 'vendor\autoload.php'; 

$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcoll = $companydb->skills;

$var = $_GET["uid"];

?>
            <tr >     
<?php 
$counter2 = $empcoll->find(array('department' => $var, 'skilltype' => 'managerial'));
$o = $empcoll->count(array('department' => $var, 'skilltype' => 'managerial'));
$counter3 = 0;
echo '
<th rowspan = "'.$o.'" >Managerial Skill</th>';
foreach($counter2 as $row){
    $counter3 = $counter3 + 1;
    // $array_manage = "managerialSkill".$counter3;
    // $array_manage = array();
    //array_push($array_manage,$row['skillname']);
    echo '<input type="hidden" name="managerialSkill'.$counter3.'[]" id="" value="'.$row['skillname'].'">';
    echo "<td >".$row['skillname']."</td>";
    echo'<td ><input type="number" style="width: 50px;" name="managerialSkill'.$counter3.'[]" id=""></td>
    <td><input type="" disabled name="managerialSkill'.$counter3.'[]"  id=""  style="width: 50px;"></td>
    </tr>';
    echo '<input type="hidden" name="counter3" value="'.$counter3.'">';
}           
?>

  
            
    <tr > 
      
      <?php
      $counter = 0;
      $counter2 = $empcoll->find(array('department' => $var, 'skilltype' => 'functional'));
      $o = $empcoll->count(array('department' => $var, 'skilltype' => 'functional'));
      
      echo '<th rowspan = "'.$o.'" >Preferrable Skill</th>';
      foreach($counter2 as $row){
        $counter = $counter + 1;
        // $array_name = "preferrablesSkill".$counter;
        // $array_name = array();
        // array_push($array_name,$row['skillname']);
        echo '<input type="hidden" name="preferrablesSkill'.$counter.'[]" id="" value="'.$row['skillname'].'">';
        echo "<td >".$row['skillname']."</td>";
        echo'<td ><input type="number" style="width: 50px;" name="preferrablesSkill'.$counter.'[]" id=""></td>
        <td><input type="number" disabled name="preferrablesSkill'.$counter.'[]" id=""  style="width: 50px;"></td>
        </tr>';
        echo '<input type="hidden" name="counter" value="'.$counter.'">';
      }           
      ?>
      
      
      <tr > 
      
      <?php 
      $counter4 = 0;
      $counter2 = $empcoll->find(array('department' => $var, 'skilltype' => 'system'));
      $o = $empcoll->count(array('department' => $var, 'skilltype' => 'system'));
      
      echo '
      <th rowspan = "'.$o.'" >System Requirement</th>';
      foreach($counter2 as $row){
      $counter4 = $counter4 + 1;
    //   $array_name = "systemRequirement".$counter;
    //   $array_name = array();
    //   array_push($array_name,$row['skillname']);
      echo '<input type="hidden" name="systemRequirement'.$counter4.'[]" id="" value="'.$row['skillname'].'">';
      echo "<td >".$row['skillname']."</td>";
      echo'<td ><input type="number" style="width: 50px;" name="systemRequirement'.$counter4.'[]" id=""></td>
      <td><input  type="number" disabled name="systemRequirement'.$counter4.'[]" id=""  style="width: 50px;"></td>
      </tr>';
      echo '<input type="hidden" name="counter4" value="'.$counter4.'">';
      }           
      ?>
      
      
                
                    
            </table>
        </div>
    </div>
    <br><br>
    <div class="row justify-content-md-around">
        <div class="col-3">
            <input type="submit" value="Submit" name="submit"  class="btn btn-primary btn-lg btn-block">
        </div>
        <div class="col-3">
            <button class="btn btn-danger btn-lg btn-block">Cancel</button>
        </div>
    </div>
    <br>
</form> 
</div>
</body>
</html>