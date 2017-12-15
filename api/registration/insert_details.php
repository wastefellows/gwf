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
  $amount = $_POST['amount'];
  $name = $_POST['myName'];
  $cname = $_POST['cName'];
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
  
  $execute_query = mysqli_query($con,"INSERT INTO tbl_member_details VALUES(now(),'$registration_id' ,'$transaction_id','$amount','$name','$cname','$giant_group','$federation','$address','$city','$state','$pincode','$email','$phone','$men_count','$women_count','$children_count','$guest_count','$opt_trip','0','$by_cash') ");

  echo $execute_query;
  if($execute_query){
    $subject = 'Registration | Giants group of Madurai';
    $mailBody = 'Hi '.$name.', <br/> Welcome to GIANTS GROUP OF MADURAI. Thank you for joining hands with us. <br/><br/> <a href="http://www.maduraigiants.org/track-status.php?id='.$registration_id.'">Click here</a> to know your registration status. <br/><br/><br/> Registration status will be showing as Pending. Your registration status will be <em> Approved </em> once we approve your payment.<br/> 
    Note: You can check your registration status using the same link. <br/> <br/> 
    Thanks,<br/>
    Team - GIANTS GROUP OF MADURAI';
    $headers = "From: no-reply@maduraigiants.org\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    mail($email, $subject , $mailBody, $headers);
    header("location:../../registration.html?register=success");
  } else {
    echo mysqli_error($con);
  } 

  mysqli_close($con);
  
?>