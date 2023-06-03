<?php
include 'connection.php';
$sqlretrive = "SELECT FNAME, LNAME, LOCATIONS, EMAIL FROM customers";
$result = $conn->query($sqlretrive);
$conn->close();
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<table>
  <tr>
    <th style='border: 1px solid blue;'>first name</th>
    <th style='border: 1px solid black;'>last name</th>
    <th style='border: 1px solid black;'>location</th>
    <th style='border: 1px solid black;'>email</th>
  </tr>
  <?php
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<tr>
        <td style='border: 1px solid black;'>".$row["FNAME"]."</td>
        <td style='border: 1px solid black;'>".$row["LNAME"]."</td>
        <td style='border: 1px solid black;'>".$row["LOCATIONS"]."</td>
        <td style='border: 1px solid black;'>".$row["EMAIL"]."</td>
      </tr>";
    }
  } else {
    echo "<tr><td colspan='4'>0 results</td></tr>";
  }
  ?>
</table>
</body>
</html>