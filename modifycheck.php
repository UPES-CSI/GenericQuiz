<?php
include 'config.php';
session_start();
//db update variables
if($_POST['quiz_name'])
{
$qname=$_POST['quiz_name'];
$qno_old=$_POST['qno_old'];
$qno_new=$_POST['qno_new'];
$modify=mysql_query("UPDATE quizzes SET quiz_no='$qno_new' WHERE quiz_no='$qno_old' AND quiz_name='$qname'") or die ("Update query Error,Check Values Again");
if($modify)
	header('Location: modify.php');
}
else
	header('Location: index.php');
?>