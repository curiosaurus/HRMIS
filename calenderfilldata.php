<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"></head>
<title>Training Calender</title>
<style></style>
<body>
<?php 
error_reporting(0);
        include 'adminnavbar.php';
    ?>
<center><h1>Trainning Calender</h1></center>
<br>
<center>
<?php 
require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $trainingcalender = $companydb->trainingcalender;
    $nominationscollection=$companydb->nominations;
    $yearcollection= $companydb->years;
    //echo "lol";
    if (isset($_POST['submit'])){
      $year = $_POST['year'];
      $ttopic = $_POST['traningtopic'];
      //echo "lol";
      if (isset($_POST['month_p']) and isset($_POST['month_c']) ){
      $monthp = $_POST['month_p'];
      $monthc = $_POST['month_c'];
      //echo $year;
      $data = $nominationscollection->updateOne(['year'=>$year,'skill'=>$ttopic], ['$set'=>['month_p'=>$monthp , 'month_c' => $monthc]] );
    }elseif (isset($_POST['month_p'])) {
      echo "lol";
      $monthp = $_POST['month_p'];
      $data = $nominationscollection->updateOne(['year'=>$year,'skill'=>$ttopic], ['$set'=>['month_p'=>$monthp]] );
    }
      if($data){
        //echo "sucess";
      }
    }
?>
<form action="calenderfilldata.php" method="post">
<select name="year" id="year" onchange="pp();" required class="form-control form-control-lg">
                    <?php  
                    $counter = $yearcollection->find();
                    if(isset ($_GET['year'])){
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
     <br><br>
</center>
<script>
  function pp(){
    var y = document.getElementById("year").value;
    var s = document.getElementById("traningtopic").value;
    window.location.href="calenderfilldata.php?year="+y+"&skill="+s;
}
</script>
<div class="table">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Training Topics</th>
      <th scope="col"><center>P</center></th>
      <th scope="col">C</th>
         </tr>
  </thead>
  <tbody>
    <tr>
      <td><select name="traningtopic" id="traningtopic" onchange="pp();" required class="form-control form-control-lg">
                    <?php  
                    $counter = $nominationscollection->find(['year'=>$y]);
                    if(isset ($_GET['skill'])){
                        foreach($counter as $row) {
                          $rskill=$row['skill'];
                            if($_GET["skill"] == $row['skill']){
                              
                            //echo "<option value = ".$row['skill']." selected>". $row['skill'] ."</option>";
                            ?>
                            <option value = "<?php echo $rskill?>" selected><?php echo $rskill?></option>
                            <?php
                            $s=$row['skill']; 
                            $sm=$row['month_p'];
                            $em=$row['month_c'];
                        }
                            else{
                              ?>
                              <option value = "<?php echo $rskill?>"><?php echo $rskill?></option>
                              <?php
                            }
                        }
                    }
                        else{
                            foreach($counter as $row) {
                              $rskill=$row['skill'];
                              ?>
                              <option value = "<?php echo $rskill?>" selected><?php echo $rskill?></option>
                              <?php
                                $s=$row['skill'];
                                $sm=$row['month_p'];
                                $em=$row['month_c'];
                            }   
                        }
                    ?>
     </select>
      </td>
      <td>
	<select name="month_p"><option value="<?php echo $sm?>"><?php echo $sm?></option>
	<option value="Jan">Jan</option><option value="Feb">Feb</option><option value="Mar">Mar</option><option value="Apr">Apr</option><option value="May">May</option><option value="June">June</option><option value="July">July</option>
	<option value="Aug">Aug</option><option value="Sept">Sept</option><option value="Oct">Oct</option><option value="Nov">Nov</option><option value="Dec">Dec</option>
</select>
</td>
      <td>
	<select name="month_c"><option value="<?php echo $em?>"><?php echo $em?></option>
	<option value="Jan">Jan</option><option value="Feb">Feb</option><option value="Mar">Mar</option><option value="Apr">Apr</option><option value="May">May</option><option value="June">June</option><option value="July">July</option>
	<option value="Aug">Aug</option><option value="Sept">Sept</option><option value="Oct">Oct</option><option value="Nov">Nov</option><option value="Dec">Dec</option>
</select>
</td>
    </tr>
  </tbody></table>
<center><input type="submit" name="submit" value="submit"></center>
</form>
</div>
</body>
</html>