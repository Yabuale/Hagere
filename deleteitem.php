<?php
include 'connection.php';
$NAME = $_GET["name"];
$sql = "DELETE FROM item WHERE NAME = '$NAME' ";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Item Deleted successfully.'); window.location.href = 'updelitem.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

$conn->close();
?>