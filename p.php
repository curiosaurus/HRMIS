<?php

session_start();

if(isset($_SESSION['email'])){
    echo "all set";
    echo "<a href='logout.php'>logout</a>";
}
else{
   header("Location:login.php");

}
?>

