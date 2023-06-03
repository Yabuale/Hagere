<?php
include 'connection.php';
$EMAIL = $_GET["email"];

if (isset($_POST['updated'])) {
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
   <title>Update Customer</title>
   <style>
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f1f1f1;
        font-family: Arial, sans-serif;
      }

      .card {
        width: 400px;
        padding: 20px;
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      .card-title {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
      }

      .input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
      
      
      .card-button{
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
        font-size: 16px;
        margin-top: 10px;
      }

      .back-button {
        background-color: #ccc;
        display: block;
        width: 95%;
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
        font-size: 16px;
        margin-top: 10px;
      }
   </style>
</head>
<body>
   <div class="card">
      <h2 class="card-title">Update Customer</h2>
      <form method="post">
         <input type="text" name="fname" class="input" placeholder="First Name" required><br/>
         <input type="text" name="lname" class="input" placeholder="Last Name" required><br/>
         <input type="text" name="location" class="input" placeholder="Location" required><br/>
         <button type="submit" name="updated" class="card-button">Update</button>
         <a href="admin.html" class="back-button">Back</a>
         
      </form>
     
   </div>
</body>
</html>
