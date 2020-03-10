<?php
    // require 'session.php'	
    require 'vendor\autoload.php'; 

    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $empcollection = $companydb->requisition;




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


    if(isset($_POST['submit']))
    {   
        foreach(range(0, 0) as $id) {
        $id = 7841;
        }
        $unique_id = createMongoDbLikeId(time(), php_uname('n'), getmypid(), $id); 
        $department = $_POST['department'];
        $raised_by = " "; 
        $reqfor = $_POST['reqfor']; 
        $reasonappnt = $_POST['reasonappnt'];
        $dateofcreation = date("m/d/Y");
        $dateofmdapproval = '';
        $dateofhrshortlist = '';
        $dateofhodshortlist = '';
        $dateofinterviewsch = '';
        $dateofinterview = '';
        $dateofcloseposition = '';
        $replacement = '';      
        $minqual = $_POST['minqual'];
        $prefqual = $_POST['prefqual'];
        $expmin = $_POST['expmin'];
        $expmax = $_POST['expmax'];
        $skillsreq = $_POST['skillsreq'];
        $skillconsider = $_POST['skillconsider'];
        $reqcomm = $_POST['reqcomm'];
        $actcomm = $_POST['actcomm'];
        $reqven = $_POST['reqven'];
        $actven = $_POST['actven'];
        $reqiso = $_POST['reqiso'];
        $actiso = $_POST['actiso'];
        $status = 'created'; 
    // Insert one data
    $insertOneResult = $empcollection->insertOne( ['unique_id' => $unique_id , 'department' => $department , 'raised by' => $raised_by , 'position' => $reqfor , 'reasonofappointment' => $reasonappnt , 'dateofcreation' => $dateofcreation , 'dateofmdapproval' => $dateofmdapproval , 'dateofhrshortlist' => $dateofhrshortlist , 'dateofhodshortlist' => $dateofhodshortlist , 'dateofinterviewsch' => $dateofinterviewsch , 'dateofinterview' => $dateofinterview , 'replacement' => $replacement , 
     'minqual' => $minqual , 'prefqual' => $prefqual , 'minexp' =>  $expmin , 'prefexp' => $expmax , 'skillreq' => $skillsreq , 'spconsideration' =>  $skillconsider , 'Communication Skill REQUIRED' => $reqcomm , 'Communication Skill ACTUAL' => $actcomm , 'Vendor Selection & Assessment REQUIRED' => $reqven , 'Vendor Selection & Assessment ACTUAL' => $actven , 'ISO REQUIRED' =>  $reqiso , 'ISO ACTUAL' => $actiso , 'status' => $status ] );

    // if($insertOneResult)
    // {
    //     echo "Sucess";
    // }
    // else{
    //     echo "unSucess";
    // }
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
    include 'hodnavbar.php';
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
<form action="Requisition.php" method="post">
<div class="container">
    <div class="row justify-content-md-start">
        
        <div class="col-md-1">
             From :
        </div>
        <div class="col-md-2">
             Department  
        </div>
<?php
// if ($_SESSION['usertype']=='admin'){?>
<div class="col-md-3">
	<div class="dropdown">

    
<select name="department">
    <option required >Select Department</option>
    <option value="PURCHASE DEPARTMENT">PURCHASE DEPARTMENT</option>
    <option value="SALES">SALES</option>
    <option value="MANUFACTURING">MANUFACTURING</option>
</select>

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
                <tr > 
                    <th>Managerial Skill</th>
            <td >Communication Skill</td>
            <td ><input required type="number" style="width: 50px;" name="reqcomm" id=""></td>
            <td><input required type="number" name="actcomm" id=""  style="width: 50px;"></td>
        </tr>
        <tr> 
            <th>Preffered Skill</th>
            <td style="">Vendor Selection & Assessment		
                </td>
                <td><input required type="number" name="reqven" id=""  style="width: 50px;"></td>
                <td><input required type="number" name="actven" id=""  style="width: 50px;"></td>   
            </tr>
            <tr> 
                <th >System Requirement</th>
                <td>ISO 9001:2015		
                    </td>
                    <td><input required type="number" name="reqiso" id=""  style="width: 50px;"></td>
                    <td><input required type="number" name="actiso" id=""  style="width: 50px;"></td>
                </tr>
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
