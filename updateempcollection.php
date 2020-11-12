<?php

session_start();
 
if (!$_SESSION['usertype']=='admin')
{
    header('location:login.php');
}

    require 'vendor\autoload.php'; 
    $M="masteropt";
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    $empcollection = $companydb->user;
    $masteropt = $companydb->masteropt;
    
    if(isset($_POST['submit']))
    {

        $imp = $_POST['UAN Number'];
        $Emp_Code = $_POST['Emp_Code'];
        $position = $_POST['position'];
        $Full_Name = $_POST['Full_Name'];
        $gender = $_POST['gender'];
        $Marital_Status = $_POST['Marital_Status'];
        $DOB = $_POST['DOB'];
        $PAN = $_POST['PAN'];
        $Blood_Group = $_POST['Blood_Group'];
        $Personal_Email = $_POST['Personal_Email'];
        $Correspondence_Address = $_POST['Correspondence_Address'];
        $Permanent_Address = $_POST['Permanent_Address'];
        $Pin_No1 = $_POST['Pin_No1'];
        $Pin_No2 = $_POST['Pin_No2'];
        $Mobile_No = $_POST['Mobile_No'];
        $Contact_No = $_POST['Contact_No'];
        $DOJ = $_POST['DOJ'];
        $Department = $_POST['Department'];
        $Designation = $_POST['Designation'];
        $Grade = $_POST['Grade'];
        $Location = $_POST['Location'];
        $Employee_Type = $_POST['Employee_Type'];
        $Employee_Status = $_POST['Employee_Status'];
        $Employee_Reporting_to = $_POST['Employee_Reporting_to'];
        $Education = $_POST['Education'];
        $Previous_Experience = $_POST['Previous_Experience'];
        $Resigned_Date = $_POST['Resigned_Date'];
        $Last_Working_Date = $_POST['Last_Working_Date'];
        $target_dir = "uploads/";
        // $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
        // $uploadOk = 1;
        // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // // Check if image file is a actual image or fake image
        
        //     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        //     if($check !== false) {
        //         echo "File is an image - " . $check["mime"] . ".";
        //         $uploadOk = 1;
        //     } else {
        //         echo "File is not an image.";
        //         $uploadOk = 0;
        //     }
        
        // // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }
        // // Check file size
        // // if ($_FILES["fileToUpload"]["size"] > 1000000) {
        // //     echo "Sorry, your file is too large.";
        // //     $uploadOk = 0;
        // // }
        // // Allow certain file formats
        // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        // && $imageFileType != "gif" ) {
        //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        //     $uploadOk = 0;
        // }
        // // Check if $uploadOk is set to 0 by an error
        // if ($uploadOk == 0) {
        //     echo "Sorry, your file was not uploaded.";
        // // if everything is ok, try to upload file
        // } else {
        //     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //         // require 'vendor\autoload.php'; 
        //         // $client = new MongoDB\Client;
        //         // $companydb = $client->hrmis;
        //         // $empcollection = $companydb->filecollection;            
        //         echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //         $fileok=true;
        //     } else {
        //         $fileok=false;
        //         echo "Sorry, there was an error uploading your file.";
        //     }
        // }








    // Insert one data
    $insertOneResult = $empcollection->updateOne( ['UAN Number' => $imp], 
    ['$set' => 
    ['Emp Code' => $Emp_Code , 'Designation' => $position , 'Name' => $Full_Name , 'Gender' => $gender , 'Marital Status' => $Marital_Status , 'Date of Birth' => $DOB , 'PAN' => $PAN , 'Blood Group' => $Blood_Group , 'Personal Email' => $Personal_Email , 'Local Address' => $Correspondence_Address , 'Permanent Address' => $Permanent_Address , 'Local Pin' => $Pin_No1 , 'Permanent Pin' => $Pin_No2 , 'Mobile No' => $Mobile_No , 'Contact No' => $Contact_No , 'Date of joining' => $DOJ , 'Department' => $Department , 'Designation' => $Designation , 'Grade Id' => $Grade , 'Location_Id' => $Location , 'Employee Type' => $Employee_Type , 'Employee Status' => $Employee_Status , 'Reporting To' => $Employee_Reporting_to , 'EDUCATION' => $Education , 'Previous Exp' => $Previous_Experience , 'Resigned date' => $Resigned_Date , 'DATE OF LEAVING' => $Last_Working_Date  ]]
   );    
    if($insertOneResult)
    {
        echo "Sucess";
    }
    else{
        echo "unSucess";

    }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HR & Admin dashbord</title>
    <!-- Google font cdn file imported here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- bootstrap cdn files for the Tables and other contents  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include 'adminnavbar.php';
?>
    <div class="title">
        <center>
            <h2>Update Employee
                <hr style="border-bottom: 2px solid#3f51b5 ; width: 50px;">
            </h2>
        </center>
    </div>
<br>
<!-- 
<div class="container">
    <div class="row justify-content-md-start">   
        <div class="col-md"><button class="btn btn-primary btn-lg btn-block">SEARCH</button></div>
        <div class="col-md"><button class="btn btn-primary btn-lg btn-block">ADD</button></div>
        <div class="col-md"><button class="btn btn-primary btn-lg btn-block">DELETE</button></div>
        <div class="col-md"><button class="btn btn-primary btn-lg btn-block">UPDATE</button></div>
    </div>
</div> -->

<br><br><br>

<?php 

require 'vendor\autoload.php'; 

$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->empcollection;

if(isset($_GET['variable1']))
{
   $id = $_GET['variable1'];   
   //echo $id;   
}
$counter = $empcollection->find(array('UAN Number' => $id));

foreach($counter as $row) {
   


    


?>

<form action="updateempcollection.php" method="POST" enctype="multipart/form-data">
<div class="container">


<input required type="text" value="<?php echo $row['UAN Number'] ;?>" name="Emp_Code"  class="form-control" hidden>


    <div  style="margin-bottom: 100px; border: 1px solid lightblue; padding: 50px;">
        <div class="row justify-content-md-start" >
            
            <div class="col-md-2">
                <label>EMPLOYEE NO </label>  
            </div>
            
            <div class="col-md-3">
                <input required type="text" value="<?php echo $row['Emp Code'] ;?>" name="Emp_Code"  class="form-control" >
            </div> 
        </div>
    
    <br>


      
    </div>
</div> 

<div class="container">

    <div  style="margin-bottom: 100px; border: 1px solid lightblue; padding: 50px;">
    
        <div class="row justify-content-md-start"> 
            
            <div class="col-md-8">
                <h4><label> PERSONAL INFO :</label></h4>
            </div>
        </div>

    <br>

        <div class="row justify-content-md-start">
            
            <div class="col-md-9">
            
            
                <div class="row justify-content-md-start">
                
                    <div class="col-md-5">
                        <label> Full Name : &nbsp;&nbsp;&nbsp; (In Block Letters)</label>
                    </div>
                
                    <div class="col-md-7">
                        <input required type="text" value="<?php echo $row['Emp Display Name'] ;?>" name="Full_Name" class="form-control" >
                    </div>
                
                </div>
                
    <br>
                
                <div class="row justify-content-md-start">
            
                    <div class="col-md-2">
                        <label> Gender : </label>
                    </div>
            
                    <div class="col-md-4">
                        <select required name="gender" id="" class="form-control">
                            <option value="Male" selected><?php echo $row['Gender'] ;?></option>
                        </select>
                    </div>
            
                    <div class="col-md-3">
                        <label> Marital Status  </label>
                    </div>
            
                    <div class="col-md-3">
                        <input required type="text" value="<?php echo $row['Marital Status'] ;?>" name="Marital_Status"  class="form-control" >
                    </div>
            
                </div>
    <br>
                <div class="row justify-content-md-start">
            
                    <div class="col-md-2">
                        <label> DOB :  </label>
                    </div>
            
                    <div class="col-md-4">
                        <input required type="date" value="<?php echo $row['Date of Birth'] ;?>" name="DOB"  class="form-control" >
                    </div>
        
                    <div class="col-md-2">
                        <label> PAN :  </label>
                    </div>
            
                    <div class="col-md-4">
                        <input required type="text" value="<?php echo $row['PAN'] ;?>" name="PAN"  class="form-control" >
                    </div>
            
                </div>
    <br>
                <div class="row justify-content-md-start">
                
                    <div class="col-md-5">
                        <label> Blood Group :</label>
                    </div>
                
                    <div class="col-md-7">
                        <input required type="text" value="<?php echo $row['Blood Group'] ;?>" name="Blood_Group" class="form-control" >
                    </div>
                
                </div>
    <br>
                <div class="row justify-content-md-start">
                
                    <div class="col-md-5">
                        <label> Personal Email :</label>
                    </div>
                
                    <div class="col-md-7">
                        <input required type="email" value="<?php echo $row['Personal Email'] ;?>" name="Personal_Email"  class="form-control" >
                    </div>
                
                </div>

            </div>

            <div class="col-md-3" style="border: lightblue solid 1px;">

                <div class="row justify-content-md-start">
                    <div class="col-md-12">
                    <input  type="file" name="fileToUpload" style="margin-top: 100%;" id="fileToUpload">
                    </div>
                    
                </div>
                
            </div>

            <div class="col-md-9">
    <br>
                <div class="row justify-content-md-start">
                
                
                    <div class="col-md-6">
                        <label> Correspondence Address :</label>
                    </div>
                
                    <div class="col-md-6">
                        <label> Permanent Address: :</label>
                    </div>
                
                </div>

                <div class="row justify-content-md-start">
                
                
                    <div class="col-md-6">
                        <textarea required class="form-control" value="<?php echo $row['Local Address'] ;?>" name="Correspondence_Address"  rows="3"></textarea>
                    </div>
                
                    <div class="col-md-6">
                        <textarea required class="form-control" value="<?php echo $row['Parmanent Address'] ;?>" name="Permanent_Address"  rows="3"></textarea>
                    </div>
                
                </div>
    <br>
                <div class="row justify-content-md-start">
            
        
                </div>
    <br>

            <div class="row justify-content-md-start">
            
                <div class="col-md-2">
                    <label> Mobile No :  </label>
                </div>

                <div class="col-md-4">
                    <input required type="text" value="<?php echo $row['Mobile No'] ;?>" name="Mobile_No" class="form-control" >
                </div>

               
            </div>
        </div>
    </div>
</div>

<div  style="margin-bottom: 100px; border: 1px solid lightblue; padding: 50px;">


        <div class="row justify-content-md-start">
        
            <div class="col-md-8">
                <h4><label> JOB DETAILS :</label></h4>
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
          
            <div class="col-md-2">
                <label> D.O.J :  </label>
            </div>

            <div class="col-md-4">
                <input required type="text" value="<?php echo $row['Date of joining'] ;?>" name="DOJ"  class="form-control" >
            </div>

            <div class="col-md-2">
                <label> Department :  </label>
            </div>

             <div class="col-md-4">
           
             <select required name="gender" id="" class="form-control">
                            <option value="Male" selected><?php echo $row['Department Id'] ;?></option>
                        </select>

            </div>
<script> 

</script>

        </div>

<br>

        <div class="row justify-content-md-start">
          
            <div class="col-md-2">
                <label> Designation:</label>
            </div>
            <div class="col-md-4">
                <!--select required name="Designation" id="" class="form-control">
                    <option value="Assitant Manager" selected>Assitant Manager</option>
                    <option value="Manager">Manager</option>
                    <option value="Devloper">Devloper</option>
                    <option value="senior Manager">senior Manager</option>
                </select>-->        


                <select required name="gender" id="" class="form-control">
                            <option value="Male" selected><?php echo $row['Designation'] ;?></option>
                        </select>
?>
                
            </div>
            
            <div class="col-md-2">
                <label> Grade :  </label>
            </div>
            <div class="col-md-4">
            
            <select required name="gender" id="" class="form-control">
                            <option value="Male" selected><?php echo $row['Grade Id'] ;?></option>
                        </select>
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
          
            <div class="col-md-2">
                <label> Location :  </label>
            </div>

            <div class="col-md-4" >
              
            <select required name="gender" id="" class="form-control">
                            <option value="Male" selected><?php echo $row['Location Id'] ;?></option>
                        </select>
          </div>

            <div class="col-md-2">
                <label> Employee Type :  </label>
            </div>

            <div class="col-md-4">
                <input required type="text" name="Employee_Type" value="<?php echo $row['Employee Type Id'] ;?>"  class="form-control" >
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
                
            <div class="col-md-2">
                <label> Employee Status :  </label>
            </div>

            <div class="col-md-4">
                <input required type="text" name="Employee_Status" value="<?php echo $row['Employee Status Id'] ;?>"  class="form-control" >
            </div>

            <div class="col-md-2">
                <label> Employee Reporting to :  </label>
            </div>

            <div class="col-md-4">
                <input required type="text" name="Employee_Reporting_to" value="<?php echo $row['REPORTING TO'] ;?>" class="form-control" >
            </div>
        </div>
<br>
        <div class="row justify-content-md-start">
                
            <div class="col-md-2">
                <label> Education :  </label>
            </div>

            <div class="col-md-4">
                <input required type="text" name="Education"  value="<?php echo $row['EDUCATION'] ;?>" class="form-control" >
            </div>

            <div class="col-md-2">
                <label> Previous Experience :  </label>
            </div>

            <div class="col-md-4">
                <input required type="number" name="Previous_Experience" value="<?php echo $row['Previous Exp'] ;?>"  class="form-control" >
            </div>
        </div>
<br>
        <div class="row justify-content-md-start">
            <div class="col-md-2">
                <label> Resigned Date :  </label>
            </div>
            <div class="col-md-4">
                <input required type="date" value="<?php echo $row['Resigned date'] ;?>" name="Resigned_Date" class="form-control" >
            </div>
        
        </div>
<br><br>
        <div class="row justify-content-md-around">
            <div class="col-3">
                <input required type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block"></button>
            </div>
           
        </div>
    </div>
    </div>
</div>
</form>
<?php 

}


?>



?>
</body>
</html>
