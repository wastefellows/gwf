<?php
$username = $_POST['user_name'];
$password = $_POST['pass_word'];

$con = mysqli_connect('localhost','root','','log');

   $myusername = stripslashes($username);
   $mypassword = stripslashes($password);
   $myusername = mysqli_real_escape_string($con, $myusername);
   $mypassword = mysqli_real_escape_string($con, $mypassword);
   $login = "SELECT * FROM signup WHERE firstname='$myusername' AND password='$mypassword'";

   $result = mysqli_query($con, $login); // Mysql_num_row is Counting table row
   $count = mysqli_num_rows($result); // if it matches it counts to be one 1  
   if($count==1)
  {
 	session_start();
    $_SESSION['username'] = $myusername;
  
 	header("location:temp.php");
  }
 else
  {
 	header("location:loginpage.html");
  }

?>
