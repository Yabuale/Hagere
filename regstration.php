<?php
include 'connection.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$location = $_POST['location'];
$email = $_POST['email'];
$password = $_POST['password'];

$sqlinsert="INSERT INTO customers (FNAME, LNAME, LOCATIONS, EMAIL) VALUES ('$fname', '$lname', '$location', '$email')";
$sqlinsert1="INSERT INTO users (EMAIL, PASSWORD, TYPE) VALUES ('$email','$password','user')";
if ($conn->query($sqlinsert) === TRUE &&  $conn->query($sqlinsert1) === TRUE){

   header("Location: login.html");
exit;

}
else{
   echo "error updating record: ".$sqlinsert."<br>".$conn->error;
}
$conn->close();
?>