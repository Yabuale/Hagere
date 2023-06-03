<?php
include 'connection.php';
session_start();

$conn->close();
?>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>order</title>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css/order.css">
</head>
<body>
   <div> 
      <nav class="navbar">
         <ul class="ulnav" type="none">
            <img class="logo1" src="images/pngwing.png" alt="logo">
            <li>
               <h1 class="hageretext1">HAGERE</h1>
            </li>
            <div id="mySidenav" class="sidenav">
               <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
               <a href="home.php">Home</a>
               <a href="#jumppro">Products</a>
               <a href="#jumpfoot">Contact</a>
               <a href="logout.php">Log Out</a>
             </div>
             
               <span class="sidebarr" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
             
         </ul>
      </nav>
   </div>
   <section class="ordersec">
      <div>
         <h1 class="hagereshoptxt">Hagere Shop</h1>
      <h3 class="hagshopdesc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</h3>
      </div>
      <div id="jumppro">
       <form method="post" action="order.php" class="forms">
         
            <?php
            include 'connection.php';
            
            $sql = "SELECT NAME, PRICE,DESCRIPTION, IMAGE FROM `item`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
               // Loop through the rows and output the HTML code with the current image source
               echo "<div class='prods'>";
               $id = 2;
               while ($row = mysqli_fetch_assoc($result)) {
                  
                  echo "<div class='pro'>";
                   echo "<img class='pimg' src='itemimage/" . $row["IMAGE"] . "' width='300px' height='300px' alt='alt'/>";
                   echo "<div class='carddes'>";
                   echo "<label name='item' for='itemm'>". $row["NAME"] ."</label>";
                   echo "<label name='totalprice' for='itemm'>". $row["PRICE"] ."</label>";
                   echo "<input type='hidden' name='name' value='". $row["NAME"] ."'>";
                   echo "<input type='hidden' name='price' value='". $row["PRICE"] ."'>";
                   echo "<p>". $row['DESCRIPTION'] ."</p>";
                   echo "<a name='itemm' type='submit' href='order.php?id=". $id ."' class='btn1'>buy</a>";
                   echo "</div>";
                   echo "</div>";
                   $id++;
               }
               echo "</div>";
           } else {
               echo "No rows found";
           }
            
    $conn->close();
    ?>
           

       </form>  
      </div>
   </section>
   <div id="jumpfoot" class="footer">
      <div class="anchor-links">
          
          <a class="anchor-link" href="https://twitter.com/">twitter</a>
          <a class="anchor-link" href="https://www.instagram.com/">instagram</a>
          <a class="anchor-link" href="https://www.facebook.com/">facebook</a>
        
      </div>
      <div class="footfooter">
          <h4>@2023 copyrights reserved</h4>
      </div>
  </div>
  <script src="coffe.js"></script>
</body>
</html>