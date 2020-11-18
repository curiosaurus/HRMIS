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
    $empcollection = $companydb->empcollection;
    $masteropt = $companydb->masteropt;
    
    if(isset($_POST['submit']))
    {
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
        $insertOneResult = $empcollection->insertOne( ['Emp Code' => $Emp_Code , 'Designation' => $position , 'Name' => $Full_Name , 'Gender' => $gender , 'Marital Status' => $Marital_Status , 'Date of Birth' => $DOB , 'PAN' => $PAN , 'Blood Group' => $Blood_Group , 'Personal Email' => $Personal_Email , 'Local Address' => $Correspondence_Address , 'Permanent Address' => $Permanent_Address , 'Local Pin' => $Pin_No1 , 'Permanent Pin' => $Pin_No2 , 'Mobile No' => $Mobile_No , 'Contact No' => $Contact_No , 'Date of joining' => $DOJ , 'Department' => $Department , 'Designation' => $Designation , 'Grade Id' => $Grade , 'Location_Id' => $Location , 'Employee Type' => $Employee_Type , 'Employee Status' => $Employee_Status , 'Reporting To' => $Employee_Reporting_to , 'EDUCATION' => $Education , 'Previous Exp' => $Previous_Experience , 'Resigned date' => $Resigned_Date , 'DATE OF LEAVING' => $Last_Working_Date);
        $target_dir = "uploads/";
        $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        
           /* $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        // if ($_FILES["fileToUpload"]["size"] > 1000000) {
        //     echo "Sorry, your file is too large.";
        //     $uploadOk = 0;
        // }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                // require 'vendor\autoload.php'; 
                // $client = new MongoDB\Client;
                // $companydb = $client->hrmis;
                // $empcollection = $companydb->filecollection;            
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $fileok=true;
            } else {
                $fileok=false;
                echo "Sorry, there was an error uploading your file.";
            }
        }







if($fileok){
    // Insert one data
    $insertOneResult = $empcollection->insertOne( ['Emp Code' => $Emp_Code , 'Designation' => $position , 'Name' => $Full_Name , 'Gender' => $gender , 'Marital Status' => $Marital_Status , 'Date of Birth' => $DOB , 'PAN' => $PAN , 'Blood Group' => $Blood_Group , 'Personal Email' => $Personal_Email , 'Local Address' => $Correspondence_Address , 'Permanent Address' => $Permanent_Address , 'Local Pin' => $Pin_No1 , 'Permanent Pin' => $Pin_No2 , 'Mobile No' => $Mobile_No , 'Contact No' => $Contact_No , 'Date of joining' => $DOJ , 'Department' => $Department , 'Designation' => $Designation , 'Grade Id' => $Grade , 'Location_Id' => $Location , 'Employee Type' => $Employee_Type , 'Employee Status' => $Employee_Status , 'Reporting To' => $Employee_Reporting_to , 'EDUCATION' => $Education , 'Previous Exp' => $Previous_Experience , 'Resigned date' => $Resigned_Date , 'DATE OF LEAVING' => $Last_Working_Date ,  'filename' => $_FILES["fileToUpload"]["name"] , 'fileaddress' => $target_file ]   );    
    if($insertOneResult)
    {
        echo "Sucess";
    }
    else{
        echo "unSucess";

    }*/
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
            <h2>EMPLOYEE MASTER
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



<form action="Master Template.php" method="POST" enctype="multipart/form-data">
<div class="container">

    <div  style="margin-bottom: 100px; border: 1px solid lightblue; padding: 50px;">
        <div class="row justify-content-md-start" >
            
            <div class="col-md-2">
                <label>EMPLOYEE NO </label>  
            </div>
            
            <div class="col-md-3">
                <input required type="text" name="Emp_Code" class="form-control" >
            </div> 
        </div>
    
    <br>


        <div class="row justify-content-md-start">
                
            <select required name="position" >
                <option>SELECT POSITION</option>
                <option value="HOD">HOD</option>
                <option value="Super HOD">Super HOD</option>
                <option value="HOEMPLOYEED">EMPLOYEE</option>
                <option value="MD">MD</option>
            </select>

        </div>   
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
                        <input required type="text" name="Full_Name" class="form-control" >
                    </div>
                
                </div>
                
    <br>
                
                <div class="row justify-content-md-start">
            
                    <div class="col-md-2">
                        <label> Gender : </label>
                    </div>
            
                    <div class="col-md-4">
                        <select required name="gender" id="" class="form-control">
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
            
                    <div class="col-md-3">
                        <label> Marital Status  </label>
                    </div>
            
                    <div class="col-md-3">
                        <input required type="text" name="Marital_Status"  class="form-control" >
                    </div>
            
                </div>
    <br>
                <div class="row justify-content-md-start">
            
                    <div class="col-md-2">
                        <label> DOB :  </label>
                    </div>
            
                    <div class="col-md-4">
                        <input required type="date" name="DOB"  class="form-control" >
                    </div>
        
                    <div class="col-md-2">
                        <label> PAN :  </label>
                    </div>
            
                    <div class="col-md-4">
                        <input required type="text" name="PAN"  class="form-control" >
                    </div>
            
                </div>
    <br>
                <div class="row justify-content-md-start">
                
                    <div class="col-md-5">
                        <label> Blood Group :</label>
                    </div>
                
                    <div class="col-md-7">
                        <input required type="text" name="Blood_Group" class="form-control" >
                    </div>
                
                </div>
    <br>
                <div class="row justify-content-md-start">
                
                    <div class="col-md-5">
                        <label> Personal Email :</label>
                    </div>
                
                    <div class="col-md-7">
                        <input required type="email" name="Personal_Email"  class="form-control" >
                    </div>
                
                </div>

            </div>

            <div class="col-md-3" style="border: lightblue solid 1px;">

                <div class="row justify-content-md-start">
                    <div class="col-md-12">
                   <!-- <input required type="file" name="fileToUpload" style="margin-top: 100%;" id="fileToUpload">-->
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
                        <textarea required class="form-control" name="Correspondence_Address"  rows="3"></textarea>
                    </div>
                
                    <div class="col-md-6">
                        <textarea required class="form-control" name="Permanent_Address"  rows="3"></textarea>
                    </div>
                
                </div>
    <br>
                <div class="row justify-content-md-start">
            
                    <div class="col-md-2">
                        <label> Pin No :  </label>
                    </div>

                    <div class="col-md-4">
                        <input required type="text" name="Pin_No1" class="form-control" >
                    </div>

                    <div class="col-md-2">
                        <label> Pin No :  </label>
                    </div>

                    <div class="col-md-4">
                        <input required type="text" name="Pin_No2"  class="form-control" >
                    </div>

                </div>
    <br>

            <div class="row justify-content-md-start">
            
                <div class="col-md-2">
                    <label> Mobile No :  </label>
                </div>

                <div class="col-md-4">
                    <input required type="text" name="Mobile_No" class="form-control" >
                </div>

                <div class="col-md-2">
                    <label> Contact No :  </label>
                </div>

                <div class="col-md-4">
                    <input required type="text" name="Contact_No"  class="form-control" >
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
                <input required type="text" name="DOJ"  class="form-control" >
            </div>

            <div class="col-md-2">
                <label> Department :  </label>
            </div>

             <div class="col-md-4">
           <?php
    $counter = $masteropt->find(['type'=>'department']);
    echo'<select name="department" id="department">';
    foreach($counter as $row) {
       
        echo "<option value = ".$row['value']." selected>". $row['value'] ."</option>";
         
    }
echo '</select>';
?>
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
                </select>-->         <?php
    $counter = $masteropt->find(['type'=>'designation']);
    echo'<select name="Designation" id="">';
    foreach($counter as $row) {
       
        echo "<option value = ".$row['value']." selected>". $row['value'] ."</option>";
         
    }
echo '</select>';
?>
                
            </div>
            
            <div class="col-md-2">
                <label> Grade :  </label>
            </div>
            <div class="col-md-4">
            
                <?php
    $counter = $masteropt->find(['type'=>'grade']);
    echo'<select name="Grade" id="">';
    foreach($counter as $row) {
       
        echo "<option value = ".$row['value']." selected>". $row['value'] ."</option>";
         
    }
echo '</select>';
?>
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
          
            <div class="col-md-2">
                <label> Location :  </label>
            </div>

            <div class="col-md-4" >
              
            <?php
    $counter = $masteropt->find(['type'=>'location']);
    echo'<select name="Location" id="">';
    foreach($counter as $row) {
       
        echo "<option value = ".$row['city']." selected>". $row['city'] ."</option>";
         
    }
echo '</select>';
?>
          </div>

            <div class="col-md-2">
                <label> Employee Type :  </label>
            </div>

            <div class="col-md-4">
                <input required type="text" name="Employee_Type"  class="form-control" >
            </div>

        </div>

<br>

        <div class="row justify-content-md-start">
                
            <div class="col-md-2">
                <label> Employee Status :  </label>
            </div>

            <div class="col-md-4">
                <input required type="text" name="Employee_Status"  class="form-control" >
            </div>

            <div class="col-md-2">
                <label> Employee Reporting to :  </label>
            </div>

            <div class="col-md-4">
                <input required type="text" name="Employee_Reporting_to" class="form-control" >
            </div>
        </div>
<br>
        <div class="row justify-content-md-start">
                
            <div class="col-md-2">
                <label> Education :  </label>
            </div>

            <div class="col-md-4">
                <input required type="text" name="Education"  class="form-control" >
            </div>

            <div class="col-md-2">
                <label> Previous Experience :  </label>
            </div>

            <div class="col-md-4">
                <input required type="number" name="Previous_Experience"  class="form-control" >
            </div>
        </div>
<br>
        <div class="row justify-content-md-start">
            <div class="col-md-2">
                <label> Resigned Date :  </label>
            </div>
            <div class="col-md-4">
                <input type="date" name="Resigned_Date" class="form-control" >
            </div>
            <div class="col-md-2">
                <label> Last Working Date :  </label>
            </div>
            <div class="col-md-4">
                <input type="date" name="Last_Working_Date" class="form-control" >
            </div>
        </div>
<br><br>
        <div class="row justify-content-md-around">
            <div class="col-3">
                <input required type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block"></button>
            </div>
            <div class="col-3">
                <button class="btn btn-danger btn-lg btn-block">Cancel</button>
            </div>
        </div>
    </div>
    </div>
</div>
</form>
</body>
</html>
