<?php
include 'connection.php';
session_start();
$email = $_SESSION['email'];
$item_id = $_GET['id'];

$sql = "SELECT NAME, PRICE FROM `item` WHERE ID = '$item_id'";

// Execute the query and get the result
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $name = $row['NAME'];
  $price = $row['PRICE'];
} else {
  echo "No rows found";
}

$sqlinsert = "INSERT INTO `order` (EMAIL, ITEMS, TOTALPRICE) VALUES ('$email', '$name', '$price')";
$result = mysqli_query($conn, $sqlinsert);

// Check if the query was successful
if ($result) {
   echo '<script>alert("Order placed successfully!"); window.location.href = "orderbuy.php";</script>';
} else {
  echo "Error: " . mysqli_error($conn);
}

$conn->close();
?>