<?php       
$userid = "bhaskar";
$userid=stripcslashes($userid);

    // check if e-mail address is well-formed
  $email = test_input($userid);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format";
    }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>  
