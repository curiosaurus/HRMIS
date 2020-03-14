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
    $empcollection = $companydb->trainingcalender;


    if (isset($_POST['submit'])){
      $year = $_POST['year'];
      $ttopic = $_POST['traningtopic'];
      $monthp = $_POST['month_p'];
      $monthc = $_POST['month_c'];

      $data = $empcollection->insertOne( ['year' => $year,'trainingtopic' => $ttopic, 'month_p'=>$monthp , 'month_c' => $monthc] );

      if($data){
        echo "sucess";
      }



    }


?>

<form action="calenderfilldata.php" method="post">
  
<select name="year" id="">
 <option value="2019">2019</option>
 <option value="2020">2020</option>
 <option value="2021">2021</option>
  ?>
     </select>
     <br><br>
</center>

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
