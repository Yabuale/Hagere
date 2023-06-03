<?php
include 'connection.php';
$sqlretrive = "SELECT NAME, DESCRIPTION, PRICE, IMAGE FROM item";
$result = $conn->query($sqlretrive);
$conn->close();
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer List</title>
  <style>
    body {
      text-align: center;
      background-color: #f1f1f1;
      font-family: Arial, sans-serif;
    }

    table {
      margin: 0 auto;
      width: 80%;
      border-collapse: collapse;
      margin-top: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    th, td {
      padding: 10px;
      text-align: left;
      border: 1px solid #ddd;
    }

    th {
      background-color: #f9f9f9;
      font-weight: bold;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #ddd;
    }

    .back-button {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <table>
    <tr>
      <th>NAME</th>
      <th>DESCRIPTION</th>
      <th>PRICE</th>
      <th>IMAGE</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr>
          <td>".$row["NAME"]."</td>
          <td>".$row["DESCRIPTION"]."</td>
          <td>".$row["PRICE"]."</td>
          <td>".$row["IMAGE"]."</td>
        </tr>";
      }
    } else {
      echo "<tr><td colspan='4'>0 results</td></tr>";
    }
    ?>
  </table>

  <a href="admin.html" class="back-button">Back</a>
</body>
</html>
