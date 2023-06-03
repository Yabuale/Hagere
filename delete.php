<?php
include 'connection.php';
$EMAIL = $_GET["email"];
$sql = "DELETE FROM customers WHERE EMAIL = '$EMAIL' ";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Deleted successfully.'); window.location.href = 'delUpcustomer.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

$conn->close();
?>