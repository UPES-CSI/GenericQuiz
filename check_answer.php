<?php
include 'config.php';
session_start();
$db = $_SESSION['qname'];
$answer=$_POST['group1'];
$fetch=mysql_query("SELECT * from $db WHERE q_no='".$_SESSION['q_no']."'");
$ans=mysql_fetch_array($fetch);
$result = mysql_query("SELECT * FROM $db");
$num_rows = mysql_num_rows($result);
	$_SESSION['count']=$num_rows;
	
if($_SESSION['q_no']<$num_rows)
{
	if($answer==$ans['answer'])
	{	
		$upd=mysql_query("UPDATE imibuzo_score SET score=score+1 WHERE email='".$_SESSION['email']."'");
		$_SESSION['q_no']=$_SESSION['q_no']+1;
		header('Location: quiz.php?Name='.$db);
	}
	else
	{
		$_SESSION['q_no']=$_SESSION['q_no']+1;
		header('Location: quiz.php?Name='.$db);
	}
}
else
{
	if($answer==$ans['answer'])
	{	
		$upd=mysql_query("UPDATE imibuzo_score SET score=score+1 WHERE email='".$_SESSION['email']."'");
		header('Location: result.php?Name='.$db);
	}
	else
	{
		header('Location: result.php?Name='.$db);
	}
}
?>