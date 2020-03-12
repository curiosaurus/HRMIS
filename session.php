<?php
            $msg = '';
            $_SESSION['email']='pavan';
            $_SESSION['usertype']='hod';

            if (isset($_POST['submit']) && !empty($_POST['email']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['email'] == 'pavan' && 
                  $_POST['password'] == '1234' && $_SESSION['usertype']=='hod') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['email'] = 'pavan';
                  
                  echo 'You have entered valid use name and passwordjjjj';
               }else {
                  $msg = 'Wrong username or password';
               }
            }
?>