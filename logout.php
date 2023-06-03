<?php
include 'connection.php';
header('Location: index.html');
session_destroy();
$conn->close();
?>