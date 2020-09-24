<?php
session_start();
include("conn.php");

$oscaID = (int) $_POST["oscaID"];
$desc = $_POST["desc"];
$token = $_POST["token"];

// $timestamp = date('Y-m-d H:i:s', time());
$qry = "call `add_qr_request`('$oscaID', '$desc', '$token', @msg)";
// $qry = "call `add_complaint_report`('Jollibee', 'Gen. Luna, Ermita', 20200001, '20', '$timestamp', @msg)";
if ($result = $conn->query($qry)) {

  $result = $conn->query('select @msg as msg');
  $row = mysqli_fetch_assoc($result);
  $msg = $row['msg'];
  if ($msg == 1) {
    echo "success";
  } else {
    echo "osca ID does not exist";
  }
} else {
  echo "Error: Could not execute.<br>". mysqli_error($conn);
}
