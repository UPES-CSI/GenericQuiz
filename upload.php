<?php
include 'config.php';
session_start();
$oname=$_SESSION['name'];
$email=$_SESSION['email'];
//mail to function
  mail ("varunbawa62ak@outlook.com", "Quiz Acceptance via Generic Quiz", "BODY", "From: '.$email.'");
?>