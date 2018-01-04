<?php
 include '../db.php';
  // $con = mysqli_connect("localhost","root","","madurai_giants_db");
  // if (mysqli_connect_errno())
  //   {
  //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
  //   }

  $record_count_qry = mysqli_query($con,"SELECT * FROM tbl_member_details");
  $record_count = mysqli_num_rows($record_count_qry);
  $registration_id_suffix = (int)$record_count + 1;
  $registration_id_string = "MG".$registration_id_suffix;
  $registration_id = md5($registration_id_string);

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
  $by_cash = $_POST['byCash'];
  
  $execute_query = mysqli_query($con,"INSERT INTO tbl_member_details VALUES(now(),'$registration_id' ,'$transaction_id','$name','$giant_group','$federation','$address','$city','$state','$pincode','$email','$phone','$men_count','$women_count','$children_count','$guest_count','$opt_trip','0','$by_cash') ");

  echo $execute_query;
  if($execute_query){
    // $subject = 'Registration | Giants group of Madurai';
    // $mailBody = 'Hi'.$name.', Thanks for registration <br/><a href="/track-status.php?id='.$registration_id.'">Click here</a> to know your registration status';
    // $headers = "From: no-reply@maduraigiants.org";
    // mail($email, $subject , $mailBody, $headers);
    
    header("location:../../registration.html?register=success");
  } else {
    echo mysqli_error($con);
  } 

  mysqli_close($con);
  
?>