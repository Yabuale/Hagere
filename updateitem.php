<?php
include 'connection.php';
$NAME = $_GET["name"];

if (isset($_POST['updated'])) {
    
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
            $sql = "UPDATE item SET  DESCRIPTION = '$description',   PRICE = '$price', IMAGE = '$imageName' WHERE NAME = '$NAME'";

    // Execute the UPDATE statement
                       if (mysqli_query($conn, $sql)) {
                          echo "Record updated successfully.";
                  }
            else{
          echo "error saving record: ".$sqlinsert."<br>".$conn->error;

             }
           
        } else {
            // Failed to move the uploaded file
            echo "Error uploading the image.";
        }
    } else {
        // Invalid image file type
        echo "Invalid image file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
    }
}
$conn->close();
?>

<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Customer</title>
   <style>
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f1f1f1;
        font-family: Arial, sans-serif;
      }

      .card {
        width: 500px;
        padding: 20px;
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      .card-title {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
      }

      
      
      
      .card-button{
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
        font-size: 16px;
        margin-top: 10px;
      }

      .back-button {
        background-color: #ccc;
        display: block;
        width: 95%;
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
        font-size: 16px;
        margin-top: 10px;
      }
      textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 20px;
    resize: vertical;
  }
  .file-drop-area.highlight {
    background-color: #eaf6ff;
    border-color: #2196F3;
  }

  .file-drop-area .file-message {
    font-size: 18px;
    margin-top: 20px;
  }

  .file-input {
    display: none;
  }
  .file-drop-area {
    width: 80%;
    padding: 50px;
    border: 2px dashed #ccc;
    text-align: center;
    transition: all 0.3s;
  }
  .sucess{
      border-color: rgba(58, 214, 58, 0.616);
      background-color: rgba(140, 235, 140, 0.521);
    }
    input[type="text"],
  input[type="file"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 20px;
  }
  

   </style>
</head>
<body>
   <div class="card">
      <h2 class="card-title">Update Item</h2>
      <form method="post" enctype="multipart/form-data">
         <textarea id="description" name="description" rows="4" required> description</textarea>
         <input type="text" id="price" name="price" placeholder="price" required>

         <div class="file-drop-area" id="file-drop-area">
         <span class="file-message" id="fileMessage">Drag and drop an image file here or click to upload.</span>
         <input type="file" class="file-input" id="image" name="image" accept="image/*" required>
        </div>
         <button type="submit" name="updated" class="card-button">Update</button>
         <a href="admin.html" class="back-button">Back</a>
         
      </form>
     
   </div>
   <script>
    const fileDropArea = document.getElementById('file-drop-area');
    const fileInput = document.getElementById('image');
    const fileMessage = document.getElementById('fileMessage');

    fileDropArea.addEventListener('dragover', (e) => {
      e.preventDefault();
      fileDropArea.classList.add('highlight');
    });

    fileDropArea.addEventListener('dragleave', () => {
      fileDropArea.classList.remove('highlight');
    });

    fileDropArea.addEventListener('drop', (e) => {
      e.preventDefault();
      fileMessage.innerHTML="IMAGE SELECTED";
      fileDropArea.classList.remove('highlight');
      fileDropArea.classList.add('sucess');
      const files = e.dataTransfer.files;
      fileInput.files = files;
      
    });

    fileInput.addEventListener('change', () => {
      if (fileInput.files.length > 0) {
        fileDropArea.classList.add('highlight');
      }
    });
  </script>
</body>
</html>
