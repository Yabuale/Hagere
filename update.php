<?php
include 'connection.php';
$EMAIL = $_GET["email"];
if(isset($_POST['updated'])){
$new_fname = $_POST["fname"];
$new_lname = $_POST["lname"];
$new_location = $_POST["location"];

// Prepare the UPDATE statement
$sql = "UPDATE customers SET FNAME = '$new_fname', LNAME = '$new_lname', LOCATIONS = '$new_location' WHERE EMAIL = '$EMAIL'";

// Execute the UPDATE statement
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully.";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}
$conn->close();
?>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>
      .card-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 5px;
    text-decoration: none;
  }
   </style>
</head>
<body>
   <form method="post">
        <input type="text" name="fname" class="input" placeholder="First Name"> <br/>
        <input type="text" name="lname" class="input" placeholder="Last Name"> <br/>
        <input type="text" name="location" class="input" placeholder="Location"> <br/>
        <button type="submit" name="updated" class="card-button">Update</button>
   </form>
        
</body>
</html>
