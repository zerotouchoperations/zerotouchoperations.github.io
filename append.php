<?php
$Username=$_POST['UserId'];
$Userid=$_POST['UserName'];
$email=$_POST['Email'];


if (!empty($Username) || !empty($Userid) || !empty($email))
{
$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="testdata";

$connection= new mysqli($host,$dbUsername,$dbPassword,$dbname);

if (mysqli_connect_error())
{
die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else{
$select="SELECT Email FROM testdata WHERE Email = ? Limit 1";
$insert= "INSERT INTO testdata (UserName,UserId,Email) values(?,?,?)";

$stmt= $connection- >prepare($SELECT);
$stmt- >bind_param("s", $email);
$stmt- >execute();
$stmt- >bind_result($email);
$stmt- >store_result
$rnum = $stmt->num_rows;
if ($rnum==0)
{
$stmt->close();
$stmt=$conn->prepare($INSERT);
$stmt->bind_param("ssssii",$Username,$Userid,$email);
$stmt->execute();
echo "new record inserted successfully";
}
else{
echo "someone already registered with this email";
}
$stmt->close();
$conn->close();
}

}
else{
echo "all fields are required";
die();
}
?>