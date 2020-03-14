<html>
<head>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"></head>
<title>Training Calender</title>

<style></style>


<body>
<center><h1>Tranning Calender</h1></center>
<br>
<div class="table">

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" rowspan="2">SR.NO</th>
      <th scope="col" rowspan="2">Training Topics</th>
      <th scope="col" colspan="24"><center>Month</center></th>
      <th scope="col" rowspan="2">No of Employess Attended</th>
      <th scope="col" rowspan="2">Remark</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td colspan="2">Jan</td>
      <td colspan="2">Feb</td>
       <td colspan="2">Mar</td>
<td colspan="2">Apr</td><td colspan="2">May</td><td colspan="2">Jun</td><td colspan="2">July</td><td colspan="2">Aug</td><td colspan="2">Sept</td><td colspan="2">Oct</td><td colspan="2">Nov</td><td colspan="2">Dec</td>
<td></td><td></td>

    </tr>
   
      <?php
require 'vendor\autoload.php'; 

$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->trainingcalender;

      $counter = $empcollection->find();
$i=0;
foreach($counter as $row) {
        $i+=1;
        echo " <tr>";
        echo "<th>".$i."</th>";
        echo "<td>" . $row['trainingtopic'] ."</td>";
        $p = $row['month_p'].'p'.$i;
        $q = $row['month_c'].'c'.$i;
                
 echo  '    
        <td class="pra" id="Janp'.$i.'">
        </td>
        <td id="Janc'.$i.'"></td>
  <td id="Febp'.$i.'"></td><td id="Febc'.$i.'"></td><td id="Marp'.$i.'"></td><td id="Marc'.$i.'"></td><td id="Aprp'.$i.'"></td><td id="Aprc'.$i.'"></td><td id="Mayp'.$i.'"></td><td id="Mayc'.$i.'"></td><td id="Junep'.$i.'"></td><td id="Junec'.$i.'"></td><td id="Julyp'.$i.'"></td><td id="Julyc'.$i.'"></td><td id="Augp'.$i.'"></td><td id="Augc'.$i.'"></td>
  <td id="Septp'.$i.'"></td><td id="septc'.$i.'"></td><td id="Octp'.$i.'"></td><td id="Octc'.$i.'"></td><td id="Novp'.$i.'"></td><td id="Novc'.$i.'"></td><td id="Decp'.$i.'"></td><td id="Decc'.$i.'"></td><td></td><td></td>
';
?>
<script>
document.getElementById('<?php echo $p; ?>').innerHTML='P';
document.getElementById('<?php echo $q; ?>').innerHTML='C' ;
</script>
 
<?php
 echo "   </tr>";
}
      ?>
     
 
  </tbody>
</table>

</div>

</body>


</html>
