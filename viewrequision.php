<?php
    session_start();
    // require 'session.php'	
    require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $empcollection = $companydb->requisition;

    if(isset($_GET['variable1']))
    {
       $id = $_GET['variable1'];   
       //echo $id;   
    }
    $counter = $empcollection->find(array('unique_id' => $id));

    foreach($counter as $row) {
?>

<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
    </script>



<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
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
    if ($_SESSION['usertype']=='hod')
    {
    include 'hodnavbar.php';
    }
    else
    {
        include 'adminnavbar.php';

    }
?>

<body >

        <div class="title">
        <center>
            <h2>REQUISITION
                <hr style="border-bottom: 2px solid#3f51b5 ; width: 50px;">
            </h2>
        </center>
    </div>
<br>

<br>
<hr style="border-bottom: 1px solid#3f51b5; width: 500px;">
<br>



<form action="Requisition.php"  method="post">
<div class="container" id="printablediv">
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

    
    
<select name="department" disabled>
    <option value="<?php echo $row['department'] ;?>" ><?php echo $row['department'] ; ?></option>
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
        <label><?php echo $row['dateofcreation']; ?></label>    
        </div>
<!-- <script>
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("cdate").innerHTML ="Date: "+ m + "/" + d + "/" + y;
</script> -->
    </div>
<br>


    <div class="row justify-content-md-start">
        <div class="col-md-4">
            <label>Requisition for the Post / Designation:</label>
        </div>
        <div class="col-md-4">
            <input type="text" name="reqfor" id="reqfor"  class="form-control" placeholder = "<?php echo $row['position']; ?>" disabled>
        </div>
    </div>
    <br>
    <div class="row justify-content-md-start">
        <div class="col-md-4">
            <label>Reason for Appoinment:   </label>
        </div>
        <div class="col-md-4">
            <select class="custom-select"  name="reasonappnt" id="reasonappnt" disabled>
                <option value="<?php echo $row['reasonofappointment']; ?>"> <?php echo $row['reasonofappointment']; ?> </option>
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
                    <input type="text"  class="form-control" id="minqual" name="minqual" placeholder = "<?php echo $row['minqual']; ?>" disabled>
                </div>
                <div class="col-md-6">
                    <input type="text"  class="form-control" id="prefqual" name="prefqual" placeholder = "<?php echo $row['prefqual']; ?>" disabled>
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
                    <input type="text"  class="form-control" name="expmin" id="expmin" placeholder = "<?php echo $row['minexp']; ?>" disabled>
                </div>
                <div class="col-md-6">
                    <input type="text"  class="form-control" name="expmax" id="expmax" placeholder = "<?php echo $row['prefexp']; ?>" disabled>
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
                <textarea class="form-control"  rows="3" name="skillsreq" id="skillsreq" placeholder = "<?php echo $row['skillreq']; ?>" disabled></textarea>
            </div>
            <br>
            <div class="row justify-content-md-start">
                <label class="text-md-center"> Any Special Consideration :</label>    
            </div>
            <div class="row justify-content-md-start">
                <textarea class="form-control" name="skillconsider"  rows="3" placeholder = "<?php echo $row['spconsideration']; ?>" disabled></textarea>
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
$empcoll = $companydb->skills;
$var= $row['department'];
?>
<tr>     
<?php 
$ms=$row['manageskill'];
$fs=$row['functionalskills'];
$ss=$row['systemskills'];
$countofrowsms = count($ms);
#echo $countofrows;
$countofrowsfs = count($fs);
$countofrowsss = count($ss);
echo '<th rowspan = "'.$countofrowsms.'" >Managerial Skill</th>';
foreach($ms as $row){
    //$counter3 = $counter3 + 1;
    // $array_manage = "managerialSkill".$counter3;
    // $array_manage = array();
    //array_push($array_manage,$row['skillname']);
    echo  '<td>'.$row[0].'</td>';
    echo'<td ><input type="number" style="width: 50px;" id="" value="'.$row[1].'" disabled></td>
    <td><input type="" disabled  id=""  style="width: 50px;"></td>
    </tr>';
    //echo '<input type="hidden" name="counter3" value="'.$counter3.'">';
}           
?>            
    <tr> 
      
      <?php
        echo '<th rowspan = "'.$countofrowsfs.'" >Preferrable Skill</th>';
        foreach($fs as $row){
        //$counter3 = $counter3 + 1;
        // $array_manage = "managerialSkill".$counter3;
        // $array_manage = array();
        //array_push($array_manage,$row['skillname']);
        echo  '<td>'.$row[0].'</td>';
        echo'<td ><input type="number" style="width: 50px;" id="" value="'.$row[1].'" disabled></td>
        <td><input type="" disabled  id=""  style="width: 50px;"></td>
        </tr>';
    //echo '<input type="hidden" name="counter3" value="'.$counter3.'">';
}         ?>
      
      
      <tr > 
      
      <?php 
        echo '<th rowspan = "'.$countofrowsss.'" >Managerial Skill</th>';
        foreach($ss as $row){
            //$counter3 = $counter3 + 1;
            // $array_manage = "managerialSkill".$counter3;
            // $array_manage = array();
            //array_push($array_manage,$row['skillname']);
            echo  '<td>'.$row[0].'</td>';
            echo'<td ><input type="number" style="width: 50px;" id="" value="'.$row[1].'" disabled></td>
            <td><input type="" disabled  id=""  style="width: 50px;"></td>
            </tr>';
            //echo '<input type="hidden" name="counter3" value="'.$counter3.'">';
        }         
      ?>    
            </table>
        </div>
    </div>
    </div>
    <br><br>
    <!-- <div class="row justify-content-md-around">
        <div class="col-3">
            <input type="submit" value="Submit" name="submit"  class="btn btn-primary btn-lg btn-block">
        </div>
        <div class="col-3">
            <button class="btn btn-danger btn-lg btn-block">Cancel</button>
        </div>
    </div> -->
    <br>
    <?php } ?>


  <form id="form1" runat="server">
   <center>      <input type="button" class="btn btn-primary" value="Print" onclick="javascript:printDiv('printablediv')"></center>
      </form>


<br>
<br><br><br>
</form> 
</div>

</body>
</html>