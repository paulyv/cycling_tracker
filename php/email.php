<?php
$address = $_POST['email'];
echo 'Address: '.$address;
// The message
$message = "Cycling tracker Invitation from ".$address;

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Send. $to, $subject, $message
mail('admin@gingrkidd.com', 'Cycling Tracker Invite request', $message);
echo "<br>message sent!<br>";
echo "<a href=\"javascript: history.go(-1)\">Back</a>"
?>