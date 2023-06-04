<?php
include 'connection.php';
session_start();
session_destroy();
header('Location: login.html');
$conn->close();
?>