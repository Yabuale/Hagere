<?php
include 'connection.php';
session_start(); // start session
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $email = $_POST['email'];
   $password = $_POST['password'];

   $sqladmin = "SELECT * FROM users WHERE EMAIL = '$email' AND PASSWORD = '$password' AND TYPE='admin'";
   $adminresult = $conn->query($sqladmin);
   if ($adminresult->num_rows == 1) {
      $_SESSION['email'] = $email;
      header('Location: admin.html');
      exit();
  }
  else{
   $sql = "SELECT * FROM users WHERE EMAIL = '$email' AND PASSWORD = '$password'";
   $result = $conn->query($sql);

   if ($result->num_rows == 1) { // if user exists
       $_SESSION['email'] = $email; // set session variable
       header('Location: order.html'); // redirect to dashboard page
       exit();
   } 

else {
       echo "Invalid username or password";
   }
}}
$conn->close();
?>