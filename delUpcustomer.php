<?php
include 'connection.php';

$sqlretrive = "SELECT FNAME, LNAME, LOCATIONS, EMAIL FROM customers";
$result = $conn->query($sqlretrive);

if ($result->num_rows > 0) {
   echo "<table>";
  echo "<tr><th style='border: 1px solid blue;'>first name</th>
  <th style='border: 1px solid black;'>last anme</th>
  <th style='border: 1px solid black;'>location</th>
  <th style='border: 1px solid black;'>email</th>
  <th style='border: 1px solid black;'>action</th>
  </tr>"; 
  while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td style='border: 1px solid black;'>".$row["FNAME"]."</td>
    <td style='border: 1px solid black;'>".$row["LNAME"]."</td>
    <td style='border: 1px solid black;'>".$row["LOCATIONS"]."</td>
    <td style='border: 1px solid black;'>".$row["EMAIL"]."</td>
    <td><a href='delete.php?email=".$row["EMAIL"]."'> delete</a>
    <a href='update.php?email=".$row["EMAIL"]."'> update</a></td>
</tr>";
}
echo "</table>";
    
  }
   else {
    echo "0 results";
  }


$conn->close();
?>
