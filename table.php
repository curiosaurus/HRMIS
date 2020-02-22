<?php
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->companydb;
$empcollection = $companydb->empollection;
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Emp Code</th>
      <th scope="col">Emp Display Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Marital Status</th>
    </tr>
  </thead>
  <tbody>
<?php 
$counter = $empcollection->find();
foreach($counter as $row) {
    echo "<tr>";
    echo "<td>" . $row['Emp Code'] ."</td>";
    echo "<td>" . $row['Emp Display Name'] ."</td>";
    echo "<td>" . $row['Gender'] ."</td>";
    echo "<td>" . $row['Marital Status'] ."</td>";
    echo "</tr>";
}
?>
  </tbody>
</table>
</body>
</html>
