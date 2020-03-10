<!DOCTYPE html>
<html lang="en">
<?php
// require 'session.php'; 
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->shortlisted_candidate;
/**
 * Creating MongoDB like ObjectIDs.
 * Using current timestamp, hostname, processId and a incremting id.
 * 
 * @author Julius Beckmann
 */
function createMongoDbLikeId($timestamp, $hostname, $processId, $id)
{
	// Building binary data.
	$bin = sprintf(
		"%s%s%s%s",
		pack('N', $timestamp),
		substr(md5($hostname), 0, 3),
		pack('n', $processId),
		substr(pack('N', $id), 1, 3)
	);
	// Convert binary to hex.
	$result = '';
	for ($i = 0; $i < 12; $i++) {
		$result .= sprintf("%02x", ord($bin[$i]));
	}

	return $result;
}
?>
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

    <style>
        
    </style>
</head>

<body>
   

    

   
<br>
<div class="container">

    <div  style="margin-bottom: 30px; border: 1px solid lightblue; padding: 50px;">
        <div class="row justify-content-md-start" >
            
           <center><h3>Logo</h3></center>
        </div>
    </div>
</div> 


<div class="container">

    <div  style="margin-bottom: 30px; border: 1px solid lightblue; padding: 50px;">
        <center><h4>EMPLOYEE INTERVIEW FORM</h4></center>
        <br>
        <div class="row justify-content-md-start" >
            <div class="col-md-9">
            
            
                <div class="row justify-content-md-start">
                
                    <div class="col-md-5">
                        <label>Position Applied for :</label>
                    </div>
                
                    <div class="col-md-7">
                        <input required type="text" name="pos" class="form-control" >
                    </div>
                
                </div>

                <br>
                <div class="row justify-content-md-start">
            
                    <div class="col-md-2">
                        <label>Reference</label>
                    </div>
            
                    <div class="col-md-4">
                        <input type="text" name="ref" class="form-control" >
                    </div>
            
                    <div class="col-md-1">
                        <label>Date</label>
                    </div>
            
                    <div class="col-md-2">
                        <input required type="text"  class="form-control" >
                    </div>
            
                    <div class="col-md-1">
                        <label>Time</label>
                    </div>
            
                    <div class="col-md-2">
                        <input required type="text"  class="form-control" >
                    </div>
            
<br>


                    
                </div>

<br>
                <div class="row justify-content-md-start">
            
                    <div class="col-md-2">
                        <label>Resume</label>
                    </div>
            
                    <div class="col-md-4">
                        <input required type="file" name="resume" class="form-control" >
                    </div>
            
                    <div class="col-md-2">
                        <button class="btn btn-outline-primary btn-sm btn-block" >Yes</button>
                    </div>
            
                    
                    <div class="col-md-2">
                        <button class="btn btn-outline-primary btn-sm btn-block" >No</button>
                    </div>
                            
<br>

                    
                </div>
        </div>
        <div class="col-md-3" style="border: lightblue solid 1px;">
                
        
            <div class="row justify-content-md-start">
                <div class="col-md-9">
                    <button class="btn" style="margin-top: 100%;" >UPLOAD</button>
                </div>

            </div>

        </div>

      
        <div class="col-md-9">
            <br>
        

            <div class="row justify-content-md-start">
                
                <div class="col-md-5">
                    <label>Full Name : </label>
                </div>
            
                <div class="col-md-7">
                    <input required type="text" name="fname" class="form-control" placeholder="Surname   Name    Middle Name">
                </div>
            
            </div>
        </div>  
    </div>


    



</div> 


<div  style="margin-bottom: 0px; border: 1px solid lightblue; padding: 50px;">

    <div class="row justify-content-md-start">
      
        <div class="col-md-2">
            <label>Date of Birth : </label>
        </div>

        <div class="col-md-4">
            <input required type="date" name="dob" class="form-control" >
        </div>

        <div class="col-md-2">
            <label>Age</label>
        </div>

        <div class="col-md-4">
            <input required type="number" name="age"  class="form-control" >
        </div>

    </div>

<br>

    <div class="row justify-content-md-start">
      
        <div class="col-md-2">
            <label>Place of Birth</label>
        </div>

        <div class="col-md-4">
            <input required type="text" name="pob" class="form-control" >
        </div>

        <div class="col-md-2">
            <label>Gender</label>
        </div>

        <div class="col-md-4">
            <input required type="text" name="gender" class="form-control" >
        </div>

    </div>

<br>

    <div class="row justify-content-md-start">
      
        <div class="col-md-2">
            <label> Nationlity : </label>
        </div>

        <div class="col-md-4">
            <input required type="text" name="nationality" class="form-control" >
        </div>

        <div class="col-md-2">
            <label> Maritual Status :</label>
        </div>

        <div class="col-md-4">
            <input required type="text" name="marstatus"  class="form-control" >
        </div>

    </div>

<br>

    <div class="row justify-content-md-start">
            
        <div class="col-md-2">
            <label>Permanent Address </label>
        </div>

        <div class="col-md-4">
            <input required type="text" name="peraddress" class="form-control" >
        </div>

        <div class="col-md-2">
            <label>Phone No : </label>
        </div>

        <div class="col-md-4">
            <input required type="text" name="phno"  class="form-control" >
        </div>

    </div>

<br>

    <div class="row justify-content-md-start">
            
        <div class="col-md-2">
            <label></label>
        </div>

        <div class="col-md-4">
            <input required type="text"  class="form-control" >
        </div>

        <div class="col-md-2">
            <label>Mobile No : </label>
        </div>

        <div class="col-md-4">
            <input required type="text"  class="form-control" >
        </div>

    </div>


    <br>

    <div class="row justify-content-md-start">
            
        <div class="col-md-2">
            <label></label>
        </div>

        <div class="col-md-4">
            <input required type="text"  class="form-control" >
        </div>

        <div class="col-md-2">
            <label>Emergency No : </label>
        </div>

        <div class="col-md-4">
            <input required type="text"  class="form-control" >
        </div>

    </div>




    <br>

    <div class="row justify-content-md-start">
            
        <div class="col-md-2">
            <label>Pin</label>
        </div>

        <div class="col-md-4">
            <input required type="text"  class="form-control" >
        </div>

        <div class="col-md-2">
            <label>Email <sub>please enter the email on which you received your interview call</sub></label>
        </div>

        <div class="col-md-4">
            <input required type="text"  class="form-control" >
        </div>

    </div>

<br><br>

</div>

<br>

<div class="container">

    <div  style="margin-bottom: 30px; border: 1px solid lightblue; padding: 50px;">
    
        <div class="row justify-content-md-start">
            
            <div class="col-md-8">
                <h4><label>Academeic Qualifications</label></h4>
            </div>
        </div>

        <div class="table">
            <table class="table">
                <tr>
                    <td>Sr. No</td>
                    <td>Level</td>
                    <td>School/College</td>
                    <td>University Board</td>
                    <td>Month & year of Passing</td>
                    <td>Specialization</d>
                    <td>% of Marks(Division)</td>
                    <td>Remarks</td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>X/SSC</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td>2</td>
                    <td>XII/HSC/DIPLOMA</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td>3</td>
                    <td>Graduation</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td>4</td>
                    <td>Post Graduation</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td>5</td>
                    <td>Others</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
            </table>
        </div>


</div>



<br>

<div class="container">

    <div  style="margin-bottom: 30px; border: 1px solid lightblue; padding: 50px;">
    
        <div class="row justify-content-md-start">
            
            <div class="col-md-8">
                <h4><label>Employee Record</label></h4>
            </div>
        </div>

        <div class="table">
            <table class="table" border="2">
                <tr>
                    <td>Sr. No</td>
                    <td>Organization Name</td>
                    <td colspan="2">Employeement Duration</td>
                    <td>Last Designation</td>
                    <td colspan="2">Total Gross/CTC</td>
                    <td>Reason for Leaving  </td>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <td>From</td>
                    <td>No</td>
                    <th></th>
                    <td>Joining</td>
                    <td>Leaving</td>
                    <th></th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>X/SSC</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td>2</td>
                    <td>XII/HSC/DIPLOMA</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td>3</td>
                    <td>Graduation</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td>4</td>
                    <td>Post Graduation</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td>5</td>
                    <td>Others</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                </tr>
            </table>
        </div>


</div>



<div class="container">

    <div  style="margin-bottom: 30px; border: 1px solid lightblue; padding: 50px;">
    
        <div class="row justify-content-md-start">
            
            <div class="col-md-8">
                <h4><label>Present Employeement</label></h4>
            </div>
        </div>

        <div class="table">
            <table class="table" border="2">
                <tr>
                    <td rowspan="3">Organization Name & Address</td>
                    <th></th>
                    <td rowspan="2">Initial Position & Joining Date</td>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <td></td>
                    <td rowspan="2">Present Position & when</td>
                    <td></td>
                </tr>

                <tr>
                    <td>nature of Business</td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Turnover(Rs/Crs)</td>
                    <td></td>
                    <td>Report to (Designation)</td>
                    <td></td>
                </tr>
                <tr>
                    <td>No. of Employees</td>
                    <th></th>
                    <td>Nos. of Person Report to you </td>
                    <td></td>

                </tr>
                
            </table>
        </div>


</div>






<div class="container">

    <div  style="margin-bottom: 30px; border: 1px solid lightblue; padding: 50px;">
    
        <div class="row justify-content-md-start">
            
            <div class="col-md-8">
                <h4><label>Reasons for seeking change</label></h4>
            </div>
        </div>

        <div class="table">
            <table class="table" border="2">
               <tr>
                   <td>a) Present Salary / CTC
                       <br>
                       &nbsp;&nbsp;&nbsp;(Rs. in Lacs/Annum)

                       <br><br>
                       b) Effective Date of Current CTC : &nbsp;&nbsp;/&nbsp;&nbsp;   /20
                   </td>
                   <td>
                       Total Expected Salary / CTC : 
                       <br>
                       (Rs. in Lacs/Annum)
                   </td>
               </tr> 
            </table>
        </div>


</div>



<div class="container">

    <div  style="margin-bottom: 30px; border: 1px solid lightblue; padding: 50px;">
    
        <div class="row justify-content-md-start">
            
            If Selected, When can you Join <br> <input required type="text" class="form-control">
         
            </div>
            </div>

</div>



<div class="container">

    <div  style="margin-bottom: 30px; border: 1px solid lightblue; padding: 50px;">
    
        <div class="row justify-content-md-start">
            
           <span>Refrences of 2 Persons (Other than relatives)</span>

           <div class="table">
               <table class="table">
                   <tr>
                       <td>Sr.No</td>
                       <td>Name & Address</td>
                       <td>Designation</td>
                       <td>Occupation</td>
                       <td>E-mail</td>
                       <td>Telephone No</td>
                   </tr>
                   <tr>
                       <td>1</td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                      
                   </tr>

                   
                   <tr>
                    <td>2   </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="4">Can we do a refrence check with them? This is required as a part of our selecetion process</td>
                    <td>Yes</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td colspan="4">Have you any reletive or friend employed in this company if so please note her/his
                        <br><br>
                        Name : <input required type="text" class="form-control">
                        Dept : <input required type="text"  class="form-control">
                        Relationship : <input required type="text"  class="form-control">

                    </td>
                    <td>Yes</td>
                    <td>No</td>
                </tr>
               </table>
           </div>

            </div>
            </div>

</div>
