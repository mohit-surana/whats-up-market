 <?php
                 
                session_start();
                if(isset($_POST['submit']))
                {
                mysql_connect('localhost','root','') or die(mysql_error());
                mysql_select_db('supermarket') or die(mysql_error());
                $id=$_POST['username'];
                $pwd=$_POST['password'];
                 
                 if($id!=''&&$pwd!='')
                 {
                   $query=mysql_query("select * from customer_login where C_ID='".$id."' and password='".$pwd."'") or die(mysql_error()) ;
                   $res=mysql_fetch_row($query);
                   if($res)
                   {
                    $_SESSION['id']=$id;
                    if($id == '103')
                      header('location:Manager_profile.php');
                    else header('location:Cashier_Home.php');
                    $cookie_name = 'id';
                    $cookie_value = $id;
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                     }
                     else
                     {
                      echo'The entered username or password is incorrect';
                     }
                   }
                   else
                   {
                    echo'Enter both username and password';
                   }
                  }


                  ?>