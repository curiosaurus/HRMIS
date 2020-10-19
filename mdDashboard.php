



<?php

include 'mdnavbar.php';

$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->requisition;

?>

<div class="container">
    <div class="row">

    <div class="table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <!-- table header  -->
                        <th scope="col">DEPARTMENT</th>

                        <th scope="col">POSITION
                        </th>
                       <th scope="col">Date of Creation
                        </th>
                        <th scope="col">Approved
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php 
$counter = $empcollection->find(array('reasonofappointment' => 'New Position' , 'dateofmdapproval' => ''));
foreach($counter as $row) {
    $id=$row['unique_id'];
    // echo $var;
    echo "<tr>";
    echo "<td>" . $row['department'] ."</td>";
    echo "<td>" . $row['position'] ."</td>";
 
    echo "<td>" . $row['dateofcreation']."</td>";
    echo "<td><a class='btn btn-primary' href='viewrequision.php?variable1=".$id."'>View Requisition</a>" ."</td>";
    echo "</tr>";
}
?>              

</tbody>
            </table>
        </div>



    </div>
</div>

</body>
</html>