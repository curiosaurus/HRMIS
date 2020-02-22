
<?php
    //Your Database Connection include file here.
    //This Entire PHP part can be placed in a seperate action file

    
    require 'vendor\autoload.php'; 
    // require 'mongoimport';

    $client = new MongoDB\Client;
    $companydb = $client->companydb;
    $empcollection = $companydb->user;


    // if(isset($_POST['submit']))
    // {
        // Upload Directory path.
        // $uploaddir = 'uploads/';
        // //FilePath with File name.
        // echo ($_POST['pk']);
        // $uploadfile = $uploaddir . basename($_FILES["file"]["name"]);
        //Check if uploaded file is CSV and not any other format.
        // if (($_FILES["file"]["type"] == "text/csv")){
            //Move uploaded file to our Uploads folder.
            // if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadfile)) 
            // {
                 //Import uploaded file to Database. $collection is defined in the connection file or can be defined here too
        // echo $uploadfile;
                 //shell_exec("start kk.bat");
        //$command = "mongoimport --db companydb --collection user --type csv --file C:\xampp\htdocs\Mongo\usercsv.csv --headerline" ;
        
        // echo  "Sucesfull";
            // }
        // }
        // else{
        //     echo "Please Upload a CSV file Only!";
        // }
    // }
        
?>
     
     
     
     
     
     <?php 
    if(isset($_POST['submit']))
    {
        $path = realpath($_POST['pk']);        
        $var_str = var_export($path, true);
        $var = "$path";
        file_put_contents('kk.txt', $var);
        shell_exec("start kk.bat");
    } 


     ?>
     
     
     
     
                    <!--Simple Form(no css) to Upload the File-->
<html>
    <head>
        <form action='upload.php' method='POST'>
        Choose file to import:<br><br>
        <!-- <input type="text" name="pk"> -->
        <input type='file' name='pk' ><br><br>
        <input type='submit' name='submit'>
        </form>
    </head>
</html>