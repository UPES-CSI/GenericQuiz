<?php
include 'config.php';
session_start();
//db update variables
$qn=$_POST['quiz_name'];
$on=$_POST['o_name'];
$sd=$_POST['start_date'];
$st=$_POST['start_time'];
$ed=$_POST['end_date'];
$et=$_POST['end_time'];


$ent = mysql_query("INSERT into quizzes (quiz_name,o_name,start_date,start_time,end_date,end_time) values ('$qn','$on','$sd','$st','$ed','$et')") or die("Sorry, Technical Failure");
$entry = mysql_query("CREATE TABLE ".$qn."_score (email varchar(40) Primary Key,name varchar(20), score int(5))");
if($ent && $entry)
{	
	echo "<script>alert('Quiz Uploaded.');</script>";
	header('Location: index.php');
}
else
{
	echo "<script>alert('Quiz NOT Uploaded. Try Again');</script>";
	header('Location: request.php');
}
?>