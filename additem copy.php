<?php
// Check if the form is submitted
include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Create a directory to store the images if it doesn't exist
    $imageDirectory = 'itemimage/';
    if (!is_dir($imageDirectory)) {
        mkdir($imageDirectory);
    }

    // Handle the uploaded image
    $imagePath = $imageDirectory . $_FILES['image']['name'];
    $imageName = $_FILES['image']['name'];
    $imageFileType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));

    // Check if the uploaded file is a valid image
    $validImageTypes = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($imageFileType, $validImageTypes)) {
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            // Image uploaded successfully

            $sqlinsert="INSERT INTO item (NAME, DESCRIPTION, PRICE, IMAGE) VALUES ('$name', '$description', '$price', '$imageName')";
            $sqlinsert1="INSERT INTO users (EMAIL, PASSWORD, TYPE) VALUES ('$email','$password','user')";
               if ($conn->query($sqlinsert) === TRUE){

                  header("Location: admin.html");
             exit;

               }
            else{
          echo "error saving record: ".$sqlinsert."<br>".$conn->error;

             }
            $conn->close();
        } else {
            // Failed to move the uploaded file
            echo "Error uploading the image.";
        }
    } else {
        // Invalid image file type
        echo "Invalid image file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
    }
}
?>
