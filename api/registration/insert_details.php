<?php
include('../../db.php');

$current_time = new DateTime;
$transaction_id = $_POST['transaction_id'];
$name = $_POST['myName'];
$giant_group = $_POST['member'];
$federation = $_POST['federation'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$men_count = $_POST['men'];
$women_count = $_POST['women'];
$children_count = $_POST['children'];
$guest_count = $_POST['guest'];
$opt_trip = $_POST['enroll_trip'];


$qry = "INSERT INTO tbl_member_details VALUES('$current_time','$transaction_id',$name','$giant_group','$federation','$address','$city','$state','$pincode','$phone','$email','$men_count','$women_count','$children_count','$guest_count','$opt_trip') ";


$execute_query = mysqli_query($con,$qry);

if(!$execute_query){
	header("location:../../success.html");
}

?>