<?php
  session_start();
  $current_customer_id = $_SESSION['current-customer-id'];
  $current_username = $_SESSION['current-username'];
  $current_password = $_SESSION['current-password'];
  $current_email = $_SESSION['current-email'];
  $current_first_name= $_SESSION['current-first-name'];
  $current_last_name = $_SESSION['current-last-name'];
  $current_phone_number = $_SESSION['current-phone-number'];
  $current_street = $_SESSION['current-street'];
  $current_city = $_SESSION['current-city'];
  $current_state = $_SESSION['current-state'];
  $current_zip_code = $_SESSION['current-zip-code'];

  $_SESSION['update'] = true;
?>

<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>Electronics Depot Online | Home</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
    <meta charset="utf-8">
  </head>
  <body>
    <header>
      <a href = "http://codd.cs.gsu.edu/~jevans65/ElectronicsDepot/menu.php" style="text-decoration: none">
        <h1 id ="logo">Electronics Depot</h1></a>
      <div id="menu">
        <a href = "http://codd.cs.gsu.edu/~jevans65/ElectronicsDepot/menu.php"><h3>Menu</h3></a>
      </div>

    </header>

    <div id="main">
    <!-- *************** -->
    <!-- MAIN BODY START -->
    <!-- *************** -->


    <div id="main-center">
      <h2>Welcome, <?php echo $current_first_name?> <?php echo $current_last_name?>!</h2>
      <br>
      <h2>Check out our Inventory!</h2>
      <a href = "http://codd.cs.gsu.edu/~ajones172/project4/inventory.php"><h3>Start Shopping</h3></a>
      <hr>
      <h2>Check Your Profile/Previous Orders</h2>
      <a href = "http://codd.cs.gsu.edu/~ajones172/project4/profile.php"><h3>Profile</h3></a>
      <hr>
    </div>

    <!-- ************* -->
    <!-- MAIN BODY END -->
    <!-- ************* -->
    </div>

    <footer>
      <div id ="footerleft">
        <h2>For career opportunities<br> and sales contact us!</h2>
          <p>Monday thru Friday, 11:00AM - 2:00AM</p>
          <p>Saturday 11:00AM - 2:30PM</p>
          <p>Sunday 11:00AM - 12:00PM</p>
      </div>

      <div id="footerright">
        <h2>Location</h2>
        <h3>Electronics Depot distribution<br> center is located:</h3>
        <p>1745 Jimmy Carter Boulevard</p>
        <p>Norcross, GA 30092</p>
        <p>(770)987-6543</p>
      </div>

      <div id="footercenter">
          <div class="footerlogo">Electronics Depot</div>
      </div>

      <div style="clear: both;"></div>
        <p class = "footernotes">Prices and offers are subject to change. 2016 Electronics Depot. Logo is the property of Georgia State University students Jacob Evans &amp; Anthony Jones.</p>
        <p class = "footernotes">* Not responsible for orders not delivered on time, lost, damaged or otherwise unacceptable * </p>
    </footer>
  </body>
</html>
