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
    ?>

    <br><br>

<div class="container">
    <table class="table table-bordered">
      <tr>
            <th style="width: 50em;">YEAR</th>
            <select name="year" id="year" onchange="pp();" required class="form-control form-control-lg">
                <?php  
                require 'vendor\autoload.php'; 
                $client = new MongoDB\Client;
                $companydb = $client->hrmis;
                $years=$companydb->years;
                $counter = $years->find();
                if(isset($_GET['year'])){
                    foreach($counter as $row) {
                        if($_GET["year"] == $row['year']){
                            echo "<option value = ".$row['year']." selected>". $row['year'] ."</option>";
                            $y=$row['year']; 
                        }
                        else{
                            echo "<option value = ".$row['year']." >". $row['year'] ."</option>";
                        }
                    }
                }
                else{
                    foreach($counter as $row) {
                        echo "<option value = ".$row['year']." selected>". $row['year'] ."</option>";
                        $y=$row['year'];
                    }   
                }
                ?>
            </select>   
        </tr>
        </table>
</div> <br>
<br>
<div class="a">
    
<center>
    <button name="" class="btn btn-block btn-info" style="width: 30%; margin:0px 10%;">COMPLETED TRAINING</button>
</center>
<br><br>
</div>
 <div class="container" style="padding: 1.2rem; text-transform: uppercase;">
 <table class="table table-bordered">

        <tr>
            <th>Sr no</th>
            <th>Identified Subject</th>
            <th>Upload attendance</th>
            <th>EffectiveNess</th>
            <th>Submit</th>
         
        </tr>
        <?php
            require 'vendor\autoload.php'; 
            $client = new MongoDB\Client;
            $companydb = $client->hrmis;
            $trainingCollection = $companydb->training_lecture;
            $counter = 0;
            $result = $trainingCollection->find(array('year'=>$y, 'attended_id'=>array('$exists'=>false)));
            
            foreach ($result as $row) {
                $counter++;
                ?>
                <tr>  
                <form action="uploadAttendance.php?unique_id=<?php echo $row['unique_id'] ;?>&year=<?php echo $y; ?>" method="post" enctype="multipart/form-data">
                    <td><?php echo $counter;?></td>
                    <td><?php echo $row['skill'];?></td>
                    <td><button class="btn btn-block btn-info"><input type="file" name="skills" id=""></button></td>
                    <input type="hidden" name="skillName[]" value="<?php echo $row['skill'];?>">
                    <td><button name="" class="btn btn-block btn-success">Edit</button></td>
                    <td><button type="submit" name="submit" class="btn btn-primary">Submit</button></td>
                </tr>
                <?php
            }
        ?>
</table>
<center>  </center> 
</form>
<script>
function pp(){
    var y = document.getElementById("year").value;
    window.location.href="trainingAttendance.php?year="+y;
}
</script>
</body>

</html>