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

  //echo 'transaction_id:'.$transaction_id.'<br />';
  //echo 'name:'.$name.'<br />';
  //echo 'giant_group:'.$giant_group.'<br />';
  //echo 'federation:'.$federation.'<br />';
  //echo 'address:'.$address.'<br />';
  //echo 'city:'.$city.'<br />';
  //echo 'state:'.$state.'<br />';
  //echo 'pincode:'.$pincode.'<br />';
  //echo 'email:'.$email.'<br />';
  //echo 'phone:'.$phone.'<br />';
  //echo 'men_count:'.$men_count.'<br />';
  //echo 'women_count:'.$women_count.'<br />';
  //echo 'children_count:'.$children_count.'<br />';
  //echo 'guest_count:'.$guest_count.'<br />';
  //echo 'opt_trip:'.$opt_trip.'<br />';

  $execute_query = mysqli_query($con,"INSERT INTO tbl_member_details VALUES(now(),'$transaction_id','$name','$giant_group','$federation','$address','$city','$state','$pincode','$email','$phone','$men_count','$women_count','$children_count','$guest_count','$opt_trip') ");
                                                                                                                                            
  echo $execute_query;

  if($execute_query){
    header("location:../../success.html");
  }

  mysqli_close($con);
  
?>