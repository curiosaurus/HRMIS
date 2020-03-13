<?php
   

   require 'vendor\autoload.php'; 

   
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->shortlisted_candidate;


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
                $id = 9423;
            }
        // $requisition_id = $R_id;
        $requisition_id = $_POST['requisition_id'];
        $unique_id = createMongoDbLikeId(time(), php_uname('n'), getmypid(), $id);
        $name = $_POST['name'];
        $position = $_POST['cposition'];
        $num = $_POST["num"];
        $exp = $_POST["exp"];
        $currenetctc = $_POST["currentctc"];
        $expectedctc = $_POST["expectctc"];
        $noticeperiod = $_POST["noticeperiod"];
        $remark = $_POST["remark"];
        $hod_remark = "Shortlist";
        if($_FILES['file']) {
            if(move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/'.$_POST["num"].$_FILES['file']['name'])) {
                // give session variable and pass it to dataBase
                $data= 'uploads/'.$_POST["num"].$_FILES['file']['name'];
       
            } else {
                echo "Failed to upload file.";
            }
        }

    // Insert one data
    // $empcollection->insertOne($data);
    $insertOneResult = $empcollection->insertOne( [ 'unique_id' => $unique_id , 'Requisition_id' => $requisition_id , 'name' => $name, 'contact' => $num , 'current_position' => $position , 'exp' => $exp , 'current_ctc' => $currenetctc , 'expected_ctc' => $expectedctc , 'notice_period' => $noticeperiod , 'remark' => $remark , 'hod_remark' => $hod_remark , 'resume' => $data]   );    
    if($insertOneResult)
    {
        echo "Sucess";
        header("Location: open_positions-1.php?variable1=$requisition_id");
    }
    else{
        echo "unSucess";

    }
}
?>