<?php

  $con = mysqli_connect("localhost","root","","madurai_giants_db");
  if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

  $transaction_id = $_POST['transactionId'];
  $name = $_POST['myName'];
  $giant_group = $_POST['member'];
  $federation = $_POST['federation'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $pincode = $_POST['pincode'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $men_count = $_POST['men'];
  $women_count = $_POST['women'];
  $children_count = $_POST['children'];
  $guest_count = $_POST['guest'];
  $opt_trip = $_POST['enroll_trip'];

  $execute_query = mysqli_query($con,"INSERT INTO tbl_member_details VALUES(now(),'$transaction_id','$name','$giant_group','$federation','$address','$city','$state','$pincode','$email','$phone','$men_count','$women_count','$children_count','$guest_count','$opt_trip') ");
                                                                                                                                            
  echo $execute_query;

  if($execute_query){
    $subject = 'Registration | Giants group of Madurai';
    $mailBody = 'Hi'.$name.', Thanks for registration';
    $headers = "From: no-reply@maduraigiants.org";
    mail($email, $subject , $mailBody, $headers);
    
    header("location:../../registration.html?register=success");
  }

  mysqli_close($con);
  
?>