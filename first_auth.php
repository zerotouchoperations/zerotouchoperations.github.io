<?php      
include('first_conn.php');  
$userid = $_POST['UserID'];

$username = $_POST['UserName'];

$email = $_POST['Email'];
$cloneid=$_POST['Clone'];
$ticketid=$_POST['Ticket'];
 
$userid=stripcslashes($userid);
$username=stripcslashes($username);
$email=stripcslashes($email);
$cloneid=stripcslashes($cloneid);
$ticketid=stripcslashes($ticketid);

$userid = mysqli_real_escape_string($con, $userid);
$username = mysqli_real_escape_string($con, $username);
$email = mysqli_real_escape_string($con, $email);
$cloneid = mysqli_real_escape_string($con, $cloneid);
$ticketid = mysqli_real_escape_string($con, $ticketid);


  $email_test = test_input($email);
    if (!filter_var($email_test, FILTER_VALIDATE_EMAIL)) {
      echo "<script>alert('Please Provide valid Email');</script>";
	echo "<h2><center>Invalid Email, Please fill the form again</center></h2>";
	
    }

    else{

	$query="insert into creationofuserinad values('$userid','$username','$email','$cloneid','$ticketid')";
	$data = mysqli_query($con,$query);
	if ($data){
	echo "<script>alert('Entries are recorded');</script>";
	echo "<h2><center>ThankYou</center></h2>";}
	else{
	echo "<script>alert('Unable to Record Entries')</script>";
	echo "<h2><center>Sorry, Problem with Recording data</center></h2>";}
	}



function test_input($data1) {
  $data = trim($data1);
  $data = stripslashes($data1);
  $data = htmlspecialchars($data1);
  return $data1;
}
?>  
