<?php

use Illuminate\Support\Facades\Redirect;

require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->requisition;
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
        // $reqcomm = $_POST['reqcomm'];
        // $actcomm = $_POST['actcomm'];
        // $reqven = $_POST['reqven'];
        // $actven = $_POST['actven'];
        // $reqiso = $_POST['reqiso'];
        // $actiso = $_POST['actiso'];
        $status = 'created'; 
        $counter3 = $_POST['counter3'];
        $counter = $_POST['counter'];
        $counter4 = $_POST['counter4'];

        // Managerial Skills
        $final_manage = array();
        for ($i = 1; $i <= $counter3; $i++) {
            array_push($final_manage,$_POST["managerialSkill$i"]);
        }

        // Preferrable Skill
        $final_preferrable = array();
        for ($i = 1; $i <= $counter; $i++) {
            array_push($final_preferrable,$_POST["preferrablesSkill$i"]);
        }
        // systemRequirement
        $final_systemRequirement = array();
        for ($i = 1; $i <= $counter4; $i++) {
            array_push($final_systemRequirement,$_POST["systemRequirement$i"]);
        }
        print("<pre>".print_r($final_manage,true)."</pre>");
        print("<pre>".print_r($final_preferrable,true)."</pre>");
        print("<pre>".print_r($final_systemRequirement,true)."</pre>");
        //var_dump($final_systemRequirement); 
        // $empcollection->insertOne($final_systemRequirement);
        //array("PreferrableSkill" => array($final_preferrable)),array("SystemRequirement" => array($final_systemRequirement))
        // Insert one data
        $insertOneResult = $empcollection->insertOne( ['unique_id' => $unique_id , 'department' => $department , 'raised by' => $raised_by , 'position' => $reqfor , 'reasonofappointment' => $reasonappnt , 'dateofcreation' => $dateofcreation , 'dateofmdapproval' => $dateofmdapproval , 'dateofhrshortlist' => $dateofhrshortlist , 'dateofhodshortlist' => $dateofhodshortlist , 'dateofinterviewsch' => $dateofinterviewsch , 'dateofinterview' => $dateofinterview , 'replacement' => $replacement , 
        'minqual' => $minqual , 'prefqual' => $prefqual , 'minexp' =>  $expmin , 'prefexp' => $expmax , 'skillreq' => $skillsreq , 'spconsideration' =>  $skillconsider , 'status' => $status ,'systemskills'=>$final_systemRequirement , 'functionalskills'=> $final_preferrable, 'manageskill'=>$final_manage] );
        if($insertOneResult)        {
            echo "Sucess";
            header('location:');
        } else{
            echo "unSucess";
         }
    }
        // Code by shyam
        // this code insert all skills with comma separared values
        // $managerial_skill_values = implode(",",$_POST['managerial_skill_array']);
        // $preferrable_skill_values = implode(",",$_POST['preferrable_skill_array']);
        // $system_requirement_skill_values = implode(",",$_POST['system_requirement_skill_array']);
        // $insertCommaSeparated = $empcollection->insertOne(['managerail_skill' => $managerial_skill_values , 'preferrable_skill' => $preferrable_skill_values , 'system_requirement_skill' => $system_requirement_skill_values]);
        // if ($insertCommaSeparated){
        //     echo "Success";
        // } else {
        //     echo "Error";
        // }

        
        
?>