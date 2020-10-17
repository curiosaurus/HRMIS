<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"></head>
<title>Training Calender</title>
<style></style>
<body>
<center><h1>Trainning Calender</h1></center>
<br>
<center>
<?php 
require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $trainingcalender = $companydb->trainingcalender;
    $yearcollection= $companydb->years;
    if (isset($_POST['submit'])){
      $year = $_POST['year'];
      $ttopic = $_POST['traningtopic'];
      $monthp = $_POST['month_p'];
      $monthc = $_POST['month_c'];
      $data = $trainingcalender->insertOne( ['year' => $year,'trainingtopic' => $ttopic, 'month_p'=>$monthp , 'month_c' => $monthc] );
      if($data){
        echo "sucess";
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
    window.location.href="calenderfilldata.php?year="+y;
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
      <td><input type="text" name="traningtopic"></td>
      <td>
	<select name="month_p"><option>Select Month</option>
	<option value="Jan">Jan</option><option value="Feb">Feb</option><option value="Mar">Mar</option><option value="Apr">Apr</option><option value="May">May</option><option value="June">June</option><option value="July">July</option>
	<option value="Aug">Aug</option><option value="Sept">Sept</option><option value="Oct">Oct</option><option value="Nov">Nov</option><option value="Dec">Dec</option>
</select>
</td>
      <td>
	<select name="month_c"><option>Select Month</option>
	<option value="Jan">Jan</option><option value="Feb">Feb</option><option value="Mar">Mar</option><option value="Apr">Apr</option><option value="May">May</option><option value="June">June</option><option value="July">July</option>
	<option value="Aug">Aug</option><option value="Sept">Sept</option><option value="Oct">Oct</option><option value="Nov">Nov</option><option value="Dec">Dec</option>
</select>
</td>
    </tr>
  </tbody></table>
<center><button name="submit" class="btn btn-primary">Submit</button></center>
</form>
</div>
</body>
</html>