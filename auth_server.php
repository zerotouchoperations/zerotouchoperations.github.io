<?php
session_start();

//variables

$username="";
$email="";

//connecting to Database

$error=array();
$db=mysqli_connect('localhost','root','','authentication') or die("could npt connect");

//registering users

$username=mysqli_escape_string($db,$_POST['email1']);
$pass=mysqli_escape_string($db,$_POST['password1']);

$pass1=mysqli_escape_string($db,$_POST['password2']);


//form validation

if(empty($email)){array_push($error,"email is required")};
if(empty($pass)){array_push($error,"password is required")};
if(empty($pass1)){array_push($error,"All fields should be filled")};

if($pass != $pass1){array_push($error,"passwords do not match")};

//check db for existing user for same Usr name

$usr_check= "SELECT * FROM practicetable WHERE email = '$username' LIMIT 1";

//existing user with same email

$result=mysqli_query($db,$usr_check);
$user=mysqli_fetch_assoc($result);

if($user){
	if ($user['email']==$username){array_push($error,"User with this email already exits");}
}


//register if no error

if(count($error)==0){
	$password =md5($pass);
	$query="INSERT INTO practicetable (email,password) VALUES ('$username','$password')";


mysqli_query($db,$query);
$_SESSION['email']=$username;
$_SESSION['success']="You are now logged in";
header('location: index.php');

}























?>






