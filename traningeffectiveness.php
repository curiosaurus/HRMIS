<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    require 'session.php';
    require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $db = $client->hrmis;
    $collection = $db->user;
    $loginerror = " ";
            if(isset($_POST["submit"])){
                $date = $_POST["date"];
                $skill_level = $_POST["skill_level"];
                $venue = $_POST["venue"];
                $subject = $_POST["subject"];
                $duration = $_POST["duration"];
                $faculty = $_POST["faculty"];
                $trainee_name = $_POST["trainee_name"];
                $emp_no = $_POST["emp_no"];
                $q1 = $_POST["q1"];
                $q2 = $_POST["q2"];
                $q3 = $_POST["q3"];
                $q4 = $_POST["q4"];
            }
                else{
                    $error = "fill all details " ;
                }
            
        ?>
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TRAINNING EFFECTIVENESS
    </title>
    <!-- Google font cdn file imported here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- bootstrap cdn files for the Tables and other contents  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">

    <style>
        
    </style>
</head>


<body>
    <div class="p">
        <!-- NavBar for the Logo and the title -->
        <div class="nav">
            <div class="logo">
                <span>LOGO</span>
            </div>
            <center><span class="hr"></span></center>
            <hr>
        </div>
        <hr>
        <!-- Logo and the title navbar close here -->



        <!-- Main navbar that contains home recruittment Should Be start here -->
        <nav class="shadow p-3 mb-5 bg-white rounded">
            <div class="gri">
                <div class="item1">
                    <a href="#"> HOME</a>
                </div>
                <div class="item2">
                    <a href="#"> EMPLOYEE MASTER	</a>


                </div>
                <div class="item3">
                    <div class="dropdown">
                        <span> <a href="#"> TRAINNING</a></span>
                        <div class="dropdown-content">
                            <p>First</p>
                            <p>Secound</p>
                            <p>Third</p>
                        </div>
                    </div>
                </div>
                <div class="item4">
                    <a href="#"> PMS	</a>


                </div>
                <div class="item5">
                    <a href="#"> WELFARE	</a>


                </div>
                <div class="item6">

                </div>
                <div class="item7">
                    <a href="#"> COMPANY</a>
                </div>
        </nav>
        </div>
    </div>
    <!-- Main navbar Close here -->


    <div class="title">
        <center>
           <h5>(Part-III)</h5>
        </center>
    </div>


<br>
<center>
    <div  style="width: 1140px;border: 1px solid royalblue; ;">
        <center>To be filled in after 1 Month of tranning</center>
        </div></center>
<div class="container" style="border: 1px solid lightblue; padding: 25px;">

<br>
<center><h5>TRAINNING EFFECTIVENESS</h5></center>
<br><br>
<table class="table" align="center">
<tr>
   <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
       
    
    
    Date : <input type="text" id="date"></td>
    <td>Skill level before tranning <input type="text" id="skill_level">
    <br>
   <b>Legend:</b> 
    </td>
</tr>


<tr>
    <td> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        
     
     
     Venue : <input type="text"id="venue">
    <br><br><br>
    &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
    Subject : <input type="text"id="subject">
    </td>
     <td>
         <table class="table" border="1">
             <tr>
                 <td>tranning Required</td>
                 <td>0</td>
             </tr>
             <tr>
                 <td>Work can be assign under Supervision</td>
             <td>1</td>
                </tr>

                
             <tr>
                <td>Capable to work indivisully</td>
            <td>2</td>
               </tr>

               
             <tr>
                <td>Capable to work indivisully & train others</td>
            <td>3</td>
               </tr>
         </table> 
     </td>
 </tr>

<tr>
    <td> 
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        Duration : <input type="text" name="" id="duration"> </td>
    <td>
    </td>
</tr>

<tr>
    
    <td>
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        Faculty : <input type="text" name="" id="faculty"> </td>
    <td>
    </td>
</tr>


<tr>
    
    <td>
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        Trainee Name : <input type="text" name="" id="trainee_name"> </td>
    <td>
        Employee No. <input type="text" name="" id="emp_no">
    </td>
</tr>


</table>

</div>

<br><br>

<center>
    <div  style="width: 1140px;border: 1px solid royalblue; ;">
        <center> 
            (Review done by HOD)
        </div></center>
<div class="container" style="border: 1px solid lightblue; padding: 25px;">

<br>

<center>

    1. Has the trainee implemented this in his/her working area?
    <br><br>
    Yes/No <input type="text"id="q1">
</center>

<br>
<center>

    2. If yes, where give example or evidence or other specification
    <br><br>
    Yes/No <input type="text"id="q2">
</center>
<br>

<center>

    3. are you satisfied with tranning? 
    Yes/No 
    <br><br>
    a) If yes, please confirm trainee Skill level after tranning (_______) <br>
    <input type="text"id="q3">

    <br><br>
    
    b) If No, why
    <input type="text"id="q4">
</center>

</div>

<br><br>
