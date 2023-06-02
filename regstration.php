<?php
include 'connection.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$location = $_POST['location'];
$email = $_POST['email'];
$passwords = $_POST['passwords'];

$sqlinsert="INSERT INTO customers (FNAME, LNAME, LOCATIONS, EMAIL, PASSWORDs) VALUES ('$fname', '$lname', '$location', '$email','$passwords')";

if ($conn->query($sqlinsert) === TRUE){

   header("Location: login.html");
exit;

}
else{
   echo "error updating record: ".$sqlinsert."<br>".$conn->error;
}

$conn->close();
?>