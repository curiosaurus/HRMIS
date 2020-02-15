<!DOCTYPE html>
<html lang="en">

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

<style>

</style>


<body>
<?php
    include 'hodnavbar.php';
?>
    <br><br><br>


    <!-- Next Div that contains the title of the INTERVIEW SCHEDULE Start here -->

    <div class="interview">
        <div class="block">
            <center>
                <h2>OPEN POSITION
                </h2>
                <hr class="line">
		<br>
		<h5>
		Resume
		</h5>
		<br>
            </center>
        </div>
    </div>

    <!-- INTERVIEW SCHEDULE Div Close here -->



    <div class="shortlist">
        <span style="border-bottom: 1px black; margin-left: 20px; font-family: 'Hind Siliguri', sans-serif;;">			
       
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

                        <th scope="col">Current Position
                        </th>
                       <th scope="col">Contact
                        </th>
                        <th scope="col">Exp.
                        </th>

                        <th scope="col">Current CTC

                        </th>

                        <th scope="col">Expected CTC

                        </th>

                        <th scope="col">Notice Period

                        </th>
                        <th scope="col">Remark

                        </th>

                        <th scope="col">Resume
                        </th>
                  

                        <th scope="col">REMARK
                        </th>
                        <th scope="col">SUBMIT</th>
			


                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <!-- table body -->
                        <th scope="row">Sourav Roy</th>
                        <td>Assi. Manager</td>
                        <td>9062323767</td>
                        <td>4.9</td>
                        <td>3.6</td>
                        <td>As per company policy</td>
                        <td>30 days</td>
                        <td>Notice period negociable for 15 days</td>
                        <td><button name="" class="btn btn-block btn-primary">open</button></td>
                        <td><select name="remark" id=""><option value="shortlist">shortlist</option>
                            <option value="Hold">Hold</option>
                            <option value="Reject">Reject</option></select></td>
                        <td><button  name="" class="btn btn-block btn-primary">Submit</button></td>

                    </tr>
                    <tr>
                        <th scope="row">Ayan Banerjee </th>
                        <td>Sales Engineer</td>
                        <td>9134970449</td>
                        <td>5</td>
                        <td>4.08</td>
                        <td>20%</td>
                        <td>15 Days</td>
                        <td>Left the job befor 1 month, reason is transfer. currently  not working. 			
                        </td>
                         <td><button name="" class="btn btn-block btn-primary">open</button></td>
                        <td><select name="remark" id=""><option value="shortlist">shortlist</option>
                            <option value="Hold">Hold</option>
                            <option value="Reject">Reject</option></select></td>
                        <td><button  name="" class="btn btn-block btn-primary">Submit</button></td>

                    </tr>
                    <tr>
                        <th scope="row">Sonu Kumar Giri


                        </th>
                        <td>Sales Engineer

                        </td>
                        <td>7501757968
                        </td>
                        <td>4.5
                        </td>
                        <td>4.2</td>
                        <td>30% Negociable
                        </td>
                        <td>1 Month
                        </td>
                        <td>Expecting Senior designation			
                        </td>
                         <td><button name="" class="btn btn-block btn-primary">open</button></td>
                        <td><select name="remark" id=""><option value="shortlist">shortlist</option>
                            <option value="Hold">Hold</option>
                            <option value="Reject">Reject</option></select></td>
                        <td><button  name="" class="btn btn-block btn-primary">Submit</button></td>

                    </tr>

                    <tr>
                        <th scope="row">Somnath
                        </th>
                        <td>Sales Executive
                        </td>
                        <td>9836517139
                        </td>
                        <td>4</td>
                        <td>3.8</td>
                        <td>As per company policy
                        </td>
                        <td>1 Month
                        </td>
                        <td>Wants to change for better prospectos			
                        </td>
                         <td><button name="" class="btn btn-block btn-primary">open</button></td>
                        <td><select name="remark" id=""><option value="shortlist">shortlist</option>
                            <option value="Hold">Hold</option>
                            <option value="Reject">Reject</option></select></td>
                        <td><button  name="" class="btn btn-block btn-primary">Submit</button></td>

                    </tr>

                    <tr>
                        <th scope="row">Sourav Mandal</th>
                        <td>Sales & MKT Engineer</td>
                        <td>9113365059
                        </td>
                        <td>3.6
                        </td>
                        <td>4.5
                        </td>
                        <td>4.5
                        </td>
                        <td>1 Month
                        </td>
                        <td>-</td>
                         <td><button name="" class="btn btn-block btn-primary">open</button></td>
                        <td><select name="remark" id=""><option value="shortlist">shortlist</option>
                            <option value="Hold">Hold</option>
                            <option value="Reject">Reject</option></select></td>
                        <td><button  name="" class="btn btn-block btn-primary">Submit</button></td>

                    </tr>


                    <tr>
                        <th scope="row">Shailesh Pandey </th>
                        <td>Sales Engineer</td>
                        <td>7503388614
                        </td>
                        <td>6</td>
                        <td>5.8</td>
                        <td>As per company policy
                        </td>
                        <td>1 Month
                        </td>
                        <td>Notice period negociable for 15 days			
                        </td>
                         <td><button name="" class="btn btn-block btn-primary">open</button></td>
                        <td><select name="remark" id=""><option value="shortlist">shortlist</option>
                            <option value="Hold">Hold</option>
                            <option value="Reject">Reject</option></select></td>
                        <td><button  name="" class="btn btn-block btn-primary">Submit</button></td>

                    </tr>

                </tbody>
            </table>
        </div>
        <br><br><br>
    </div>

</body>

</html>
