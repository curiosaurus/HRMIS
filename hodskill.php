<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skill Matrix</title>
    <!-- Google font cdn file imported here -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- bootstrap cdn files for the Tables and other contents  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Link the External Css here And please see name Its a Styles.css  -->
    <link rel="stylesheet" href="styles.css">
    <style>
        table,
        th {
            border: 1px solid black;
            width: 500px;
        }
        
        .table2 {
            border: 1px solid black;
            width: 500px;
        }
        
        .table3 tr th td {
            border: 1px solid black;
            width: 100%;
        }
        
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
<?php
    include 'hodnavbar.php';
?>
    <center>

        <h1>SKILL MATRIX</h1>
        <br>
    </center>
    <div class="container" style="border: 1px solid lightblue; padding: 2px;">

        <div class="row justify-content-md-around">

            <div class="col-md-0">
                <h4><label> Year</label></h4>
            </div>


            <div class="col-md-8">
                <select class="form-control form-control-lg">
                    <option>YEAR JANUARY 2019 TO DECEMBER 2019</option>
                    <option>YEAR JANUARY 2019 TO DECEMBER 2019</option>
                    <option>YEAR JANUARY 2019 TO DECEMBER 2019</option>
                    <option>YEAR JANUARY 2019 TO DECEMBER 2019</option>
                  </select>
            </div>

        </div>
    </div>
    <br><br>
    <div class="container" style="border: 1px solid lightblue; padding: 2px;">

        <div class="row justify-content-md-around">

            <div class="col-md-0">
                <h4><label> DEPARTMENT</label></h4>
            </div>


            <div class="col-md-8">
                <h4><label>ACCOUNTS & EXCISE</label></h4>
            </div>

        </div>
    </div>


    <br><br>

    <table class="table3" border="2" style="width:100%">
        <tr>
            <th>Emp Code</th>
            <th>Emp Display Name</th>
            <th>Designation</th>
            <th>Grade</th>
            <th>Education</th>
            <th>Total Experience</th>
            <th>Skill Matrix</th>
        </tr>

        <tr>
            <td>RM00028</td>
            <td>SUNIL MANGATRAM SHARMA</td>
            <td>DY. MANAGER - ACCOUNTS</td>
            <td>E11</td>
            <td>MCOM</td>
            <td>36</td>
            <td><a href="update.html"><button name="" class="btn btn-block btn-primary">UPDATE</button></a>
            </td>
        </tr>

        <tr>
            <td>RO00107</td>
            <td>PRAVIN HARINAND KOLGE</td>
            <td>DY. MANAGER - ACCOUNTS</td>
            <td>E11</td>
            <td>MCOM</td>
            <td>27</td>
            <td><a href="update.html"><button name="" class="btn btn-block btn-primary">UPDATE</button></a>
            </td>
        </tr>

        <tr>
            <td>RM00036</td>
            <td>SANJAY SURAJMAL GANDHI</td>
            <td>GENERAL MANAGER - FINANCE</td>
            <td>L01</td>
            <td>M COM,MBA</td>
            <td>28</td>
            <td><a href="update.html"><button name="" class="btn btn-block btn-primary">UPDATE</button></a>
            </td>
        </tr>

        <tr>
            <td>RS00106</td>
            <td>VINOD SHIVAJIRAO RAVAN</td>
            <td>EXECUTIVE ACCOUNT</td>
            <td>E07</td>
            <td>B COM</td>
            <td>18</td>
            <td><a href="update.html"><button name="" class="btn btn-block btn-primary">UPDATE</button></a>
            </td>
        </tr>

        <tr>
            <td>RS00112</td>
            <td>AJAY HARINAND KOLGE</td>
            <td>SR. OFFICER - ACCOUNTS</td>
            <td>E05</td>
            <td>M COM</td>
            <td>24</td>
            <td><a href="update.html"><button name="" class="btn btn-block btn-primary">UPDATE</button></a>
            </td>
        </tr>

        <tr>
            <td>RO00310</td>
            <td>KIRAN POPAT THEURKAR</td>
            <td>SR OFFICER EXCISE</td>
            <td>E05</td>
            <td>M COM</td>
            <td>13</td>
            <td><a href="update.html"><button name="" class="btn btn-block btn-primary">UPDATE</button></a>
            </td>
        </tr>

        <tr>
            <td>RO00315</td>
            <td>SANTOSH YAMANAJI JADHAV</td>
            <td>EXECUTIVE – EXCISE</td>
            <td>E07</td>
            <td>BCOM</td>
            <td>15</td>
            <td><a href="update.html"><button name="" class="btn btn-block btn-primary">UPDATE</button></a>
            </td>
        </tr>


        <tr>
            <td>RO00508</td>
            <td>SNEHAL RAM NARAYANPETHE</td>
            <td>OFFICER ACCOUNTS</td>
            <td>E02</td>
            <td>BCOM</td>
            <td>6</td>
            <td><a href="update.html"><button name="" class="btn btn-block btn-primary">UPDATE</button></a>
            </td>
        </tr>



        <tr>
            <td>RO00512</td>
            <td>PRADEEP VITTHAL SATHE</td>
            <td>SR. OFFICER - ACCOUNTS</td>
            <td>E04</td>
            <td>BCOM</td>
            <td>9</td>
            <td><a href="update.html"><button name="" class="btn btn-block btn-primary">UPDATE</button></a>
            </td>
        </tr>

    </table>
    <br>


    <center>
        <a href="update.html"><button name="" class="btn btn-block btn-primary">  SUBMIT</button></a>
    </center>
</body>

</html>
