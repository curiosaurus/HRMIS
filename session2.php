<?php
            $msg = '';
            $_SESSION['email']='pratik';
            $_SESSION['usertype']='md';

            if (isset($_POST['submit']) && !empty($_POST['email']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['email'] == 'pratik' && 
                  $_POST['password'] == '1234' && $_SESSION['usertype']=='md') 
                  {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['email'] = 'pratik';
                  
                  echo 'You have entered valid use name and password kkkkk';
               }else {
                  $msg = 'Wrong username or password';
               }
            }
?>