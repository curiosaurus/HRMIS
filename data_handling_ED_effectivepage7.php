<?php


require 'vendor\autoload.php'; 

$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->employee;


if(isset($_POST['submit']))
{
    $year = $_POST['year'];
    $emp_code = $_POST['Emp_code'];
    $as_attended = $_POST['as_attended'];
    $evidence = $_POST['evidence'];


    $updateResult = $empcollection->updateOne(
        ['Emp Code' =>  $emp_code ],
        ['$set' => ['year' => $year , 'as_attended' => $as_attended , 'evidence' => $evidence ]]
    );
    

}

header("location:EmployeeDashoardEffectivespage7.php")

?>