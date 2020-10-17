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
            $username = $_POST["email"];
            $password = $_POST["password"];
            $usertype = $_POST["usertype"];
            $cursor = $collection->findOne(array('email'=> $username, 'password'=> $password, 'usertype'=> $usertype));
            if($cursor){
                $p = $_POST['email'];
                $u = $_POST['usertype'];
                $_SESSION['email'] = $p;
                $_SESSION['usertype']=$u;
            if ($u =='hod')
            {
                header("location:HodDashboard.php");
            }
            else{
                header("location:hr_admin_dashboard.php");
            }
        }
            else{
                $loginerror = "Sorry Username and Password is Wrong!" ;
            }
        }
    ?>
<head>
    <title>HRMIS Ploybond</title>

    <!-- Compiled and minified CSS -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css" rel="stylesheet"/>

<!--Import Google Icon Font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <center>
        <div class="contact" id="contact">
            <section style="margin-top: 50px;" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                    <span class="card-title center" style="font-weight: 500;font-size: 36px;"> Login</span>
                    <span style="color:red;"><?php echo $loginerror; ?></span>
                        <div class="card-body">
        <form action="login.php" method="POST">
        <div class="input-field col s8 offset-s2 blue-text">
        <i class="material-icons prefix">account_circle</i>
        <input type="text" name="email" id="email" Placeholder="Enter EmailAddress" required>
</div>
<div class="input-field col s8 offset-s2 blue-text">
<i class="material-icons prefix">lock</i>
        <input type="password" name="password" id="password" Placeholder="Enter Password" required>
</div>
<div class="input-field col s8 offset-s2 blue-text">

<select name="usertype" id="usertype" class="browser-default btn" required>
          <option value="" disabled="" selected="">Choose Role</option>
          <option value="hod">HOD</option>
          <option value="admin">Admin</option>
          <option value="emp">Employee</option>
       </select>

  </div>

<div class="input-field col s8 offset-s2 blue-text">
        <button type="submit" class="btn btn-primary" name="submit">Login<i class="material-icons right">send</i></button>
</div>





        </form>
<br>
        </div>
</div>
</div>
    </div>
</center>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
</script>
<script>
$(document).ready(function() {
 	$('select').material_select();
});

</script>

</html> 