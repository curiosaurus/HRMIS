<?php 


require 'vendor\autoload.php'; 

$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->employee;





if(isset($_GET['variable1']))
{
$E_id = $_GET['variable1'];   
}
 
$E_id = "123";



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HRMIS</title>
    <!-- Google font cdn file imported here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- bootstrap cdn files for the Tables and other contents  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<?php
    include 'employeenavbar.php';
    
    ?>
     

    <div class="title">
        <center>
            <h2>EFFECTIVENESS
                <hr style="border-bottom: 2px solid#3f51b5 ; width: 50px;">
            </h2>
        </center>
    </div>
<br>
<br>

<?php


$counter = $empcollection->find(array('Emp Code' => $E_id));
    

foreach($counter as $row) {
    
?>


<form action="data_handling_ED_effectivepage7.php" method="post">
<div class="container" style="border: 1px solid lightblue; padding: 25px;">

<div class="row justify-content-md-around">
    
    <div class="col-md-1" >
        <h4><label> Year</label></h4>
    </div>

    
    <div class="col-md-8">
        <select required class="form-control form-control-lg" name="year">
            <option value="">YEAR JANUARY 2019 TO DECEMBER 2019</option>
            <option value="">YEAR JANUARY 2019 TO DECEMBER 2019</option>
            <option value="">YEAR JANUARY 2019 TO DECEMBER 2019</option>
            <option value="">YEAR JANUARY 2019 TO DECEMBER 2019</option>
          </select>
    </div>

</div>
</div>

<br><br>


<div class="container" style="border: 1px solid lightblue; padding: 25px;">

<div class="row justify-content-md-center">
   <label style="font-size: 22px;">Effectiveness</label>
</div>

<br><br>

<div class="row justify-content-md-start">
    
    <div class="col-md-3" >
        <label style="font-size: 20px;"> Employee Number </label>
    </div>

    <div class="col-md-4">
        <input name = "Emp_code" required type="text" value="<?php echo $row['Emp Code']; ?>" class="form-control"  disabled>
    </div>


</div>
<br>
<div class="row justify-content-md-start">
        
    <div class="col-md-3" >
        <label style="font-size: 20px;"> Employee Name </label>
    </div>

    <div class="col-md-4">
        <input required type="text" value="<?php echo $row['Name']; ?>" class="form-control" disabled>
    </div>

</div>
<br>
<div class="row justify-content-md-start">
            
    <div class="col-md-3" >
        <label style="font-size: 20px;"> Training Date </label>
    </div>

    <div class="col-md-4">
        <input required type="text" value="" class="form-control" disabled>
        <!-- <?php echo $row['Training Date']; ?> -->
    </div>

</div>
<br>
<div class="row justify-content-md-start">
                
    <div class="col-md-3" >
        <label style="font-size: 20px;"> Subject </label>
    </div>

    <div class="col-md-4">
        <input required type="text" value="" class="form-control" disabled>
        <!-- <?php echo $row['Subject']; ?> -->

    </div>

</div>
<br>
<div class="row justify-content-md-start">
                    
    <div class="col-md-3" >
        <label style="font-size: 20px;"> Skill Level before Training </label>
    </div>

    <div class="col-md-4">
        <input required type="text" value="" class="form-control" disabled>
        <!-- <?php echo $row['as_a']; ?> -->

    </div>

</div>

<br>
<div class="row justify-content-md-start">
                    
    <div class="col-md-3" >
        <label style="font-size: 20px;"> Skill Level after Training </label>
    </div>

    <div class="col-md-4">
        <input required type="text" value="" class="form-control" disabled>
        <!-- <?php echo $row['ps_a']; ?> -->
        
    </div>



</div>





</div>

<br><br>

<div class="container" style="border: 1px solid lightblue; padding: 25px;">

<div class="row justify-content-md-start">
                    
    <div class="col-md-6" >
        <label style="font-size: 18px;"> Have you implemented this training in your regular work </label>
    </div>

    <div class="col-md-2">

    <select required class="form-control form-control-lg" name="as_attended">
            <option value="YES">YES</option>
            <option value="NO">NO</option>
    </select>
    </div>


    <!-- <div class="col-md-2">
        <input type="button" name="" class="btn btn-outline-primary btn-sm btn-block" value="YES">
    </div>

    <div class="col-md-2">
        <input type="button" class="btn btn-outline-primary btn-sm btn-block" value="NO">
    </div> -->

</div>
<br><br>
<div class="row justify-content-md-start">

        <div class="col-md">
            <label style="font-size: 18px;"> If yes, Where  give example or evidence or other specification. </label>
        </div>

</div>
<br>
<div class="row justify-content-md-start">

    <div class="col-md-8">
        <textarea required class="form-control" name="evidence" rows="3"></textarea>
    </div>

</div>
<br><br>
<div class="row justify-content-md-center">

    <div class="col-md-2">
        <button name="submit" class="btn btn-primary btn-md btn-block">SUBMIT</button>
    </div>
</div>

</div>
</div>
</form>
<?php 
}
?>
<br><br><br><br>
    </body>
</html>
    
