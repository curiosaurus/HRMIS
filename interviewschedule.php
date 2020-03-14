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
if(isset($_POST["submit"]))
{
                             
    require 'class.smtp.php';
    require 'PHPMailerAutoload.php';    
    
    $email=$_POST['iemail'];
    echo $email;
    $name=$_POST['date'];
    echo $date;
    $time=$_POST['time'];
    echo $time;
    $hemail=$_POST['hemail'];
    echo $hemail;

    if($email)
    {
        callforcandidate();
    }
    if($hemail)
    {
        callforhod();
    }

    function callforcandidate()
    {
        $mail = new PHPMailer();
        $mail->setFrom('admin@example.com');
        
        $mail->addAddress($email);
        $mail->Subject = 'HRMIS';
        $mail->Body = '
        <html>
        <body>
        Dear Mr  '.$email.'         
        With reference to our telephonic conversation, we have scheduled your interview for Open position, Sales & Marketing Engineer - Sales & Marketing Department.
        
        Organization    :  Rathi Transpower Pvt.Ltd
        Venue               :  M/S Rathi Transpower Pvt.Ltd
                                      Rathi Transpower Pvt Ltd.,
                                      Gaia Apex, S. No. 33/2D,
                                      Viman Nagar,Near Hindustan International Hotel,
                                      Pune, 411014         
        
         Day                   : '.$day.'
         Time                 :  '.$time.'
        
         Contact Person   :-   Ms. Neha
        
         Contact No.       :  
        
         for any information you can visit our websites of Rathi group ;
        
         Web Address   :      
         www.rathicouplings.com
        http://www.rathigroup.com
        
         Kindly available with following documents :
         1. Updated Resume.
         2. Passport size Photo.
         3. Last month updated salary slip.
        
         * Feel free to ask if you have any query.
         * Kindly confirm your presence after receiving the mail.
         * Kindly available before 15 Min.
        
        
         Thank you,
         With Best Regards,
         Rathi Group of Industries. 
         </body>
         </html> ';
         $mail->isHTML(true);
         $mail->AltBody = "This message is generated by plain text !";
         $mail->IsSMTP();
         $mail->SMTPSecure = 'ssl';
         $mail->Host = 'ssl://smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->Port = 465;
         $mail->Username = 'kedar@mitaoe.ac.in';
         $mail->Password = 'kedar1023';
         if(!$mail->send()) {
           echo 'Email is not sent.';
           echo 'Email error: ' . $mail->ErrorInfo;
         } else {
           echo 'Email has been sent.';
         }
        
    
    }

    function callforhod()
    {

        $mail = new PHPMailer();
        $mail->setFrom('admin@example.com');
        
        $mail->addAddress($email);
        $mail->Subject = 'HRMIS';
        $mail->Body = '
        <html>
        <body>
        Dear Mr '.$hemail.'
        
        With reference to our telephonic conversation, we have scheduled your interview for Open position, Sales & Marketing Engineer - Sales & Marketing Department.
        
        Organization    :  Rathi Transpower Pvt.Ltd
        Venue               :  M/S Rathi Transpower Pvt.Ltd
                                      Rathi Transpower Pvt Ltd.,
                                      Gaia Apex, S. No. 33/2D,
                                      Viman Nagar,Near Hindustan International Hotel,
                                      Pune, 411014         
        
         Day                   :    '.$day.'
         Time                 :     '.$time'
        
         Contact Person   :-   Ms. Neha
        
         Contact No.       :  
        
         for any information you can visit our websites of Rathi group ;
        
         Web Address   :      
         www.rathicouplings.com
        http://www.rathigroup.com
        
         Kindly available with following documents :
         1. Updated Resume.
         2. Passport size Photo.
         3. Last month updated salary slip.
        
         * Feel free to ask if you have any query.
         * Kindly confirm your presence after receiving the mail.
         * Kindly available before 15 Min.
        
        
         Thank you,
         With Best Regards,
         Rathi Group of Industries. 
         </body>
         </html>';
         $mail->isHTML(true);
         $mail->AltBody = "This message is generated by plain text !";
         $mail->IsSMTP();
         $mail->SMTPSecure = 'ssl';
         $mail->Host = 'ssl://smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->Port = 465;
         $mail->Username = 'kedar@mitaoe.ac.in';
         $mail->Password = 'kedar1023';
         if(!$mail->send()) {
           echo 'Email is not sent.';
           echo 'Email error: ' . $mail->ErrorInfo;
         } else {
           echo 'Email has been sent.';
         }
    }



    }
    


    
 
 ?>

<br><br><br>


<!-- Next Div that contains the title of the INTERVIEW SCHEDULE Start here -->

<div class="interview">
    <div class="block">
      <center>  <h2> SCHEDULE INTERVIEW
        </h2>
    <hr class="line">
    </center>
    </div>
</div>

<!-- INTERVIEW SCHEDULE Div Close here -->



<div class="shortlist">
    <span style="border-bottom: 1px black; margin-left: 20px; font-family: 'Hind Siliguri', sans-serif;;">SHORT LISTED EMPLOYEES			
       
    </span>
<br>
<br>


<!-- bootstrap table start here Add and remove containt in table according to your task -->

<div class="table">
    <table class="table table-bordered">
        <thead>
          <tr>
              <!-- table header  -->
            <th scope="col">Name</th>
            <th scope="col">Open Position	
                </th>
            <th scope="col">department	
                </th>
            <th scope="col">location
                </th>

                <th scope="col">Day

                    </th>

                    <th scope="col">Time

                        </th>
        
                        <th scope="col">EMAIL	

                            </th>
                            <th scope="col">HOD EMAIL

                                </th>

                                <th scope="col">Interview Call Letter	

                                    </th>
                    

            </tr>
        </thead>
        <tbody>
<?php
require 'vendor\autoload.php'; 
$client = new MongoDB\Client;
$companydb = $client->hrmis;
$empcollection = $companydb->shortlisted_candidate;
if(isset($_POST['submit']))
{
    $interviewlocation = $_POST['city'];
    $interviewday = $_POST['date'];
    $interviewtime = $_POST['time'];
    $interviewemail = $_POST['iemail'];
    $interviewhodemail = $_POST['hemail'];
    $id = strval($_POST['id']);
    echo $id;   
    $updateResult = $empcollection->updateOne(
        ['unique_id' => $id],
        ['$set' => ['interviewlocation' =>$interviewlocation ,'interviewday'=>$interviewday , 'interviewtime'=> $interviewtime]]
    );
    


}
$counter = $empcollection->find( ['hod_remark' => 'Shortlist' ] ) ;
foreach($counter as $row) {
    
    $empcollection1 = $companydb->requisition;
    
    $counter1 = $empcollection1->find( ['unique_id' => $row['Requisition_id'] ] );

    foreach($counter1 as $row1) {
    
?>
<form method="POST" action="interviewschedule.php"> 
	<tr>	
            <!-- table body -->
            <input type="hidden" name="id" value="<?php echo $row['unique_id'] ?> ">
            <td scope="row"><input type="text" name="empname" value="<?php echo $row['name'] ?>" </td>
            <td> <?php echo $row['current_position'] ?> </td>
            <td> <?php echo $row1['department'] ?> </td>
            <td><select name="city">
                <option value="PUNE">PUNE</option>
                <option value="Kolhapur">Kolhapur</option>
            </select></td>
    <td><input required type="date" name="date" id="date"></td>
    <td><input required type="text" name="time" id="time" placeholder="hr:min am/pm"></td>
    <td><input required type="email" name="iemail" id="iemail"></td>
    <td><input required type="email" name="hemail" id="hemail"></td>           
    <td><button type="submit" name="submit" class="btn btn-block btn-primary" >Send</button></td>
</tr>
</form>

<?php
    }
}
?>


        </tbody>
      </table>
</div>
<br><br><br>
</div>
</form>
</body>
</html>
