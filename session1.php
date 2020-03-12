<?php
            $msg = '';
            $_SESSION['email']='nishad';
            $_SESSION['usertype']='admin';

            if (isset($_POST['submit']) && !empty($_POST['email']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['email'] == 'nishad' && 
                  $_POST['password'] == '1234' && $_SESSION['usertype']=='admin') 
                  {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['email'] = 'nishad';
                  
                  echo 'You have entered valid use name and password kkkkk';
               }else {
                  $msg = 'Wrong username or password';
               }
            }
?>