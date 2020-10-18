
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
<body>
    <div class="p">
        <!-- NavBar for the Logo and the title -->
        <div class="nav">
            <div class="logo">
                <span>LOGO</span>
            </div>
            <center><span class="hr">HR & Admin dashbord</span></center>
            <span style="margin-left:700px; margin-top:30px; font-size:20px;">
            <?php  echo "MD"; ?>
</span>
            <hr>
        </div>
        <hr>
        <!-- Logo and the title navbar close here -->



        <!-- Main navbar that contains home recruittment Should Be start here -->
        <nav class="shadow p-3 mb-5 bg-white rounded">
            <div class="gri">
                <div class="item1">
                    <a href="hr_admin_dashboard.php"> HOME</a>
                </div>
                <div class="item2">
           
        </div>
                <div class="item3">
                    <div class="dropdown">
                        <span> <a href="#"> </a></span>
                        <div class="dropdown-content">
                            <p>SKILL MATRIX</p>
                            <a href="Requisitioncreate2.php?dept=sales"><p>ADD SKILLS</p></a>
                            <p>TRAINING NOMINATIONS CARD</p>    
                            <p>TRAINING CALENDER</p>
                            <p>TRAINING SCHEDULE</p>
                            <p>EFFECTIVENESS</p>
                        </div>
                    </div>



                </div>
                <div class="item4">
                    <a href="#"></a>


                </div>
                <div class="item5">
                    <a href="#"></a>


                </div>
        <div class="item6">
                    <div class="dropdown">
                        <span> <a href="#"> COMPANY</a></span>
                        <div class="dropdown-content">
                            <p>POLYBOND INDIA PVT.LTD</p>
                            <p>RATHI TRANSPOWER PVT.LTD</p>
                        </div>
                    </div>
                    </div>
        <div class="item7">
                    
                    <span> <a href="logout.php"> Logout</a></span>
         </div>
    
            </div>
        </nav>
        </div>
    <!-- Main navbar Close here --> 



<?php

require 'vendor\autoload.php'; 

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
    echo "<td><a class='btn btn-primary' href='apreqbymd.php?req=".$id."'><button>Approve</button></a>" ."</td>";
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