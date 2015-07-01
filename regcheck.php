<?php
include 'config.php';
if(isset($_POST['csi_id']))
{
	$csi="YES";
	$csi_id=$_POST['csi_id'];
}
else
{
	$csi="NO";
	$csi_id="NULL";
}
$email=$_POST['email'];
$name=$_POST['name'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
$phone=$_POST['phone'];
$college=$_POST['college'];

if($pass1!=$pass2)
{
	echo "	<script>
			alert('Password does not match');
			window.location.href='register.html';
			</script>";
}
else
{
$enter=mysql_query("INSERT into users values('$email','$name','$pass1','$phone','$college','$csi','$csi_id')");
if($enter)
{
	echo "	<script>
			alert('Registered Successfully');
			window.location.href='index.php';
			</script>";
}
else
{	
	echo "	<script>
			alert('Required Fields Empty, Try Again');
			window.location.href='register.html';
			</script>";
}
}
?>