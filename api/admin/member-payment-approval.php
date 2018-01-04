<?php
include('../db.php');
$transaction_id = $_REQUEST['tid'];
$registration_id = $_REQUEST['rid'];
$update_qry = mysqli_query($con,"UPDATE tbl_member_details SET payment_status='1' WHERE registration_id='$registration_id' AND transaction_id='$transaction_id' ");
if($update_qry)
    header('location:../../admin-center.php');
?>