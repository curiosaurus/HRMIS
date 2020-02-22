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
<div class="container">
    <div class="row justify-content-md-start">   
        <div class="col-md"><button class="btn btn-primary btn-lg btn-block">SEARCH</button></div>
        <div class="col-md"><button class="btn btn-primary btn-lg btn-block">ADD</button></div>
        <div class="col-md"><button class="btn btn-primary btn-lg btn-block">DELETE</button></div>
        <div class="col-md"><button class="btn btn-primary btn-lg btn-block">UPDATE</button></div>
    </div>
</div>
<br><br><br>
<form action="#" method="POST">
<div class="container">
    <div  style="margin-bottom: 100px; border: 1px solid lightblue; padding: 50px;">
        <div class="row justify-content-md-start" >
            <div class="col-md-2">
                <label>EMPLOYEE NO </label>  
            </div>
            <div class="col-md-3">
                <input type="text" name="emp_no" id="emp_no"  class="form-control">
            </div> 
        </div>
    <br>
    <div class="row justify-content-md-start">    
                    <div class="col-md-2">
                        <label> User Type: </label>
                    </div>
                    <select name="user_type" id="userr_type" class="form-control">
                            <option value="Employee" selected>Employee</option>
                            <option value="HoD">HoD</option>
                            <option value="SuperHoD">SuperHoD</option>
                            <option value="MD">MD</option>
                    </select>
    </div>
</div> 
<div class="container">
    <div  style="margin-bottom: 100px; border: 1px solid lightblue; padding: 50px;">
        <div class="row justify-content-md-start">
            <div class="col-md-8">
                <h4><label> PERSONAL INFORMATION :</label></h4>
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
                        <input type="text" name="full_name" id="full_name"  class="form-control" >
                    </div>
                </div>
    <br>
                <div class="row justify-content-md-start">    
                    <div class="col-md-2">
                        <label> Gender : </label>
                    </div>
                    <div class="col-md-4">
                        <select name="gender" id="gender" class="form-control">
                            <option value="" selected>Male</option>
                            <option value="">Female</option>
                            <option value="">Other</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label> Marital Status  </label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="marital_status" id="marital_status" class="form-control" >
                    </div>
                </div>
    <br>
                <div class="row justify-content-md-start">
                    <div class="col-md-2">
                        <label> DOB :  </label>
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="dob" id="dob"  class="form-control" >
                    </div>
                    <div class="col-md-2">
                        <label> PAN :  </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="PAN" id="PAN"  class="form-control" >
                    </div>
                </div>
    <br>
                <div class="row justify-content-md-start">
                    <div class="col-md-5">
                        <label> Blood Group :</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text"  class="form-control" name="blood" id="blood">
                    </div>
                </div>
    <br>
                <div class="row justify-content-md-start">
                    <div class="col-md-5">
                        <label> Personal Email :</label>
                    </div>
                    <div class="col-md-7">
                        <input type="email"  class="form-control" name="personal_email" id="personal_email">
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="border: lightblue solid 1px;">
                <div class="row justify-content-md-start">
                    <div class="col-md-12">
                        <button class="btn btn-outline-primary btn-sm btn-block" style="margin-top: 100%;">UPLOAD</button>
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
                        <label> Permanent Address :</label>
                    </div>
                </div>
                <div class="row justify-content-md-start">
                    <div class="col-md-6">
                        <textarea class="form-control" name="correspondence_add" id="correspondence_add"  rows="3"></textarea>
                    </div>
                    <div class="col-md-6">
                        <textarea class="form-control" name="permanent_add" id="permanent_add"  rows="3"></textarea>
                    </div>
                </div>
    <br>
                <div class="row justify-content-md-start">
                    <div class="col-md-2">
                        <label> Pin No :  </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="correspondence_add_pin" id="correspondence_add_pin"  class="form-control" >
                    </div>
                    <div class="col-md-2">
                        <label> Pin No :  </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="permanent_add_pin" id="permanent_add_pin"  class="form-control" >
                    </div>
                </div>
    <br>
            <div class="row justify-content-md-start">
                <div class="col-md-2">
                    <label> Mobile No :  </label>
                </div>
                <div class="col-md-4">
                    <input type="number" name="mob_no" id="mob_no"  class="form-control" >
                </div>
                <div class="col-md-2">
                    <label> Contact No :  </label>
                </div>
                <div class="col-md-4">
                    <input type="number" name="contact" id="contact"  class="form-control" >
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
                <input type="date"   class="form-control" >
            </div>
            <div class="col-md-2">
                <label> Department :  </label>
            </div>
            <div class="col-md-4">
                <select name="department" id="department">
                    <option value="" selected>HR</option>
                </select>
            </div>
        </div>
<br>
        <div class="row justify-content-md-start">      
            <div class="col-md-2">
                <label> Designation:</label>
            </div>
            <div class="col-md-4">
                <select name="designation" id="designation" class="form-control">
                    <option value="" selected>Assitant Manager</option>
                </select>
            </div>
            <div class="col-md-2">
                <label> Grade :  </label>
            </div>
            <div class="col-md-4">
                <select name="grade" id="grade" class="form-control">
                    <option value="">E1</option>
                </select>
            </div>
        </div>
<br>
        <div class="row justify-content-md-start">
          
            <div class="col-md-2">
                <label> Location :  </label>
            </div>

            <div class="col-md-4">
                <select name="location" id="location">
            </select>
            </div>

            <div class="col-md-2">
                <label> Employee Type :  </label>
            </div>

            <div class="col-md-4">
                <input type="text" name="emp_type" id="emp_type"  class="form-control" >
            </div>
        </div>
<br>
        <div class="row justify-content-md-start">            
            <div class="col-md-2">
                <label> Employee Status :  </label>
            </div>
            <div class="col-md-4">
                <input type="text" name="emp_status" id="emp_status" class="form-control" >
            </div>
            <div class="col-md-2">
                <label> Employee Reporting to :  </label>
            </div>
            <div class="col-md-4">
                <input type="text" name="emp_repoting_to" id="emp_repoting_to"  class="form-control" >
            </div>
        </div>
<br>
        <div class="row justify-content-md-start">
            <div class="col-md-2">
                <label> Education :  </label>
            </div>
            <div class="col-md-4">
                <input type="text"  class="form-control" name="education" id="education">
            </div>
            <div class="col-md-2">
                <label> Previous Experience :  </label>
            </div>
            <div class="col-md-4">
                <input type="number"  class="form-control" name="prev_exp" id="prev_exp">
            </div>
        </div>
<br>
        <div class="row justify-content-md-start">
            <div class="col-md-2">
                <label> Resigned Date :  </label>
            </div>
            <div class="col-md-4">
                <input type="date"  class="form-control" name="resigned_date" id="resigned_date">
            </div>
            <div class="col-md-2">
                <label> Last Working Date :  </label>
            </div>
            <div class="col-md-4">
                <input type="date"   class="form-control" name="last_working_date" id="last_working_date">
            </div>
        </div>
<br><br>
        <div class="row justify-content-md-around">
            <div class="col-3">
                <input type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
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