<?php
session_start();
include("conn.php");

$oscaID = (int) $_POST["oscaID"];
$companyName = $_POST["companyName"];
$branch = $_POST["branch"];
$desc = $_POST["desc"];
$reportDate = $_POST["reportDate"];

// $timestamp = date('Y-m-d H:i:s', time());
$qry = "call `add_complaint_report`('$companyName', '$branch', '$oscaID', '$desc', '$reportDate', @msg)";
// $qry = "call `add_complaint_report`('Jollibee', 'Gen. Luna, Ermita', 20200001, '20', '$timestamp', @msg)";
if ($result = $conn->query($qry)) {

  $result = $conn->query('select @msg as msg');
  $row = mysqli_fetch_assoc($result);
  $msg = $row['msg'];
  if ($msg == 1) {
    echo "success";
  } else {
    echo "Invalid Company Name, Branch or OSCA ID";
  }
} else {
  echo "Error: Could not execute.<br>". mysqli_error($conn);
}
