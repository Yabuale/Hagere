<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td.actions {
            white-space: nowrap;
        }

        td.actions a {
            color: #fff;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
            margin-right: 5px;
            font-size: 14px;
        }

        td.actions .delete-btn {
            background-color: #ff4646;
        }

        td.actions .update-btn {
            background-color: #4caf50;
        }

        .back-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <?php
    $sqlretrive = "SELECT FNAME, LNAME, LOCATIONS, EMAIL FROM customers";
    $result = $conn->query($sqlretrive);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Location</th>
            <th>Email</th>
            <th>Action</th>
        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>".$row["FNAME"]."</td>
                <td>".$row["LNAME"]."</td>
                <td>".$row["LOCATIONS"]."</td>
                <td>".$row["EMAIL"]."</td>
                <td class='actions'>
                    <a href='delete.php?email=".$row["EMAIL"]."' class='delete-btn' onclick='return confirmDelete();'>Delete</a>
                    <a href='update.php?email=".$row["EMAIL"]."' class='update-btn'>Update</a>
                </td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

    <a href="admin.html" class="back-button">Back</a>
    <script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this customer?");
}
</script>
</body>
</html>
