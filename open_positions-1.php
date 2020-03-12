<?php


require 'vendor\autoload.php'; 

$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->requisition;





if(isset($_GET['variable1']))
{
$R_id = $_GET['variable1'];   
}
else 
{
    $R_id = $_POST['requisition_id'];
}





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




$counter = $empcollection->find(array('unique_id' => $R_id));
    

    foreach($counter as $row) {
    


?>












<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOD and ADMIN DASHBOARD</title>
    <!-- Google font cdn file imported here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- bootstrap cdn files for the Tables and other contents  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">
</head>

<style>

</style>

<body>
<?php
    include 'adminnavbar.php';
    ?><br><br><br>
    <div class="interview">
        <div class="block">
            <center>
                <h2>OPEN POSITION
                </h2>
                <hr class="line">
		<br>
		<h5>
		POSITION TRACKER
		</h5>
		<br>
            </center>
        </div>
    </div>
    <div class="row">

        <div class="col-md-4" style="margin-left:5%;">
            <span> DEPARTMENT : <?php echo $row['department']; ?> </span>
        </div>
        
        <div class="col-md-4">
            <span> HOD: <?php echo $row['raised by']; ?></span>
        </div>
            
        <div class="col-md-3">
            Date : <?php echo date("m/d/Y"); ?>
        </div>
            <!-- INTERVIEW SCHEDULE Div Close here -->
    </div>
            <div class="shortlist">
                <span style="border-bottom: 1px black; margin-left: 20px; font-family: 'Hind Siliguri', sans-serif;;">			
                </span><br><br>
                <!-- bootstrap table start here Add and remove containt in table according to your task -->
        <div class="table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <!-- table header  -->
                        <th scope="col">Name</th>
                    
                        <th scope="col">Current Position</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Exp.</th>
                        <th scope="col">Current CTC</th>                        
                        <th scope="col">Expected CTC
                        <th scope="col">Notice Period</th>
                        <th scope="col">Remark</th>
                        <th scope="col">Resume</th>
                        <th scope="col">Submit</th>

                    </tr>
                </thead>
                <tbody>
                <?php 
// $counter = $empcollection->find();
// foreach($counter as $row) {
//     echo "<tr>";
//     echo "<td>" . $row['Candidate Name'] ."</td>";
//     echo "<td>" . $row['Current Position'] ."</td>";
//     echo "<td>" . $row['Expereince'] ."</td>";
//     echo "<td>" . $row['Current CTC'] ."</td>";
//     echo "<td>" . $row['Expected CTC'] ."</td>";
//     echo "<td>" . $row['Notice Period'] ."</td>";
//     echo "<td>" . $row['Remark'] ."</td>";?>
<!-- //     <td><button name="" class="btn btn-block btn-primary">Upload</button></td> -->
<?php
echo "</tr>";
}
?>
        
        
<?php 
    
    $empcollection = $companydb->shortlisted_candidate;

    $counter = $empcollection->find( array('Requisition_id' => $R_id ) );
    foreach($counter as $row) {

    echo "<tr>";
    echo "<th scope='row'><input style='width:130px;' type='text' name='name' value='".$row['name']." ' disabled></th>";
    echo "<td><input required style='width:130px;' type='text' name='cposition' value='".$row['current_position']." ' disabled></td>";

    echo "<td><input style='width:100px;' required type='text' name='num' value='".$row['contact']." ' disabled></td>";
    
    echo "<td ><input style='width:50px;' required type='text' name='exp' value='".$row['exp']." ' disabled></td>";
    echo "<td><input style='width:50px;' required type='text' name='currentctc' value='".$row['current_ctc']." ' disabled></td>";
    echo "<td><input style='width:50px;' required type='text' name='expectctc' value='".$row['expected_ctc']." ' disabled></td>";
    echo "<td><input style='width:100px;' required type='text' name='noticeperiod' value='".$row['notice_period']." ' disabled></td>";
    echo "<td><input required type='text' name='remark' value='".$row['remark']." ' disabled></td>";
    echo "<td><a href='".$row['resume']." ' target='__blank'>download<a></td>";
    echo "<td><input required type='text' style='width:100px;' name='remark' value=' Submitted ' disabled></td>";
    echo "</tr>";

    // echo "<td><button name="" class='btn btn-block btn-primary'><input style='width:100px;' type='file' name='file'></button></td>";

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
    }
    else{
        echo "unSucess";

    }
}

    
    
    ?>


        <form action="open_positions-1.php" method="POST" enctype="multipart/form-data">
        <tr>
    
                        <th scope="row"><input style="width:130px;" type="text" name="name"></th>
                        <td><input required style="width:130px;" type="text" name="cposition"></td>
                        <td><input style="width:100px;" required type="number" name="num">
                        </td>
                        <td ><input style="width:50px;" required type="number" name="exp"></td>
                        <td><input style="width:50px;" required type="number" name="currentctc"></td>
                        <td><input style="width:50px;" required type="text" name="expectctc">
                        </td>
                        <td><input style="width:100px;" required type="text" name="noticeperiod">
                        </td>
                        <td><input required type="text" name="remark">			
                        </td>
                        <td><button name="" class="btn btn-block btn-primary"><input style="width:100px;" type="file" name="file"></button></td>
   
                    <td> <button name="submit">Submit</button></td>
                    </tr>

                    <input type="hidden" name="requisition_id"  value="<?php echo $R_id ; ?>" > 


                </table>
            </tbody>
            </form>
                    <center>

                       <a href="submittohodforshortlist.php?req=<?php echo $R_id ?>"> <button name="submittohod" >Submit to HoD to Shortlist</button></a>
</center>
        </div>
        <br><br><br>
    </div>
</body>
</html>