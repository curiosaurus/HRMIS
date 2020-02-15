<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOD DASHBOARD</title>
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
                        <th scope="col">DEPARTMENT</th>

                        <th scope="col">POSITION
                        </th>
                       <th scope="col">RAISED BY
                        </th>
                        <th scope="col">DATE
                        </th>
           	


                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <!-- table body -->
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button name="" class="btn btn-block btn-primary">OPEN</button></td>
                    </tr>
                    <tr>
                        <th scope="row"> </th>
                        <td>

                        </td>
                        <td></td>
                        <td></td>

                        <td><button name="" class="btn btn-block btn-primary">OPEN</button></td>
                    </tr>
                    <tr>
                        <th scope="row">


                        </th>
                        <td>

                        </td>
                        <td></td>
                        <td></td>
        
                        <td><button name="" class="btn btn-block btn-primary">OPEN</button></td>

                    </tr>

                    <tr>
                        <th scope="row">
                        </th>
                        <td>
                        </td>
                        <td></td>
                        <td></td>
        
                        <td><button name="" class="btn btn-block btn-primary">OPEN</button></td>

                    </tr>

                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
  
                        <td><button name="" class="btn btn-block btn-primary">OPEN</button></td>
                    </tr>


                    <tr>
                        <th scope="row"> </th>
                        <td></td>
                        <td></td>
                        <td></td>
                
                        <td><button name="" class="btn btn-block btn-primary">OPEN</button></td>
                    </tr>

                </tbody>
            </table>
        </div>
        <br><br><br>
    </div>

</body>

</html>
