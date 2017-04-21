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
      <a href = "http://codd.cs.gsu.edu/~jevans65/ElectronicsDepot/menu.html" style="text-decoration: none">
        <h1 id ="logo">Electronics Depot</h1></a>
      <div id="menu">
        <a href = "http://codd.cs.gsu.edu/~jevans65/ElectronicsDepot/menu.php"><h3>Menu</h3></a>
        <a href = "http://codd.cs.gsu.edu/~jevans65/ElectronicsDepot/profile.php"><h3>Profile</h3></a>
      </div>
    </header>

    <div id="main">
      <!-- *************** -->
      <!-- MAIN BODY START -->
      <!-- *************** -->
      <h3 style="text-align: center;">Welcome, <?php echo $current_first_name?> <?php echo $current_last_name?></h3>

      <div id =main-center>

      <form id="shopping-cart" action="addtocart.php" method="post">
        <fieldset>
          <legend>Shopping Cart:</legend>
          <label for="item-1">Samsung 40" Flatscreent TV ($255): </label>
          <input type="checkbox" name="item-1" id ="item-1"/>
          <br>
          <label for="item-2">Bose Ultra Quiet Headphones ($350): </label>
          <input type="checkbox" name="item-2" id ="item-2"/>
          <br>
          <label for="item-3">Bose Sound Minilink II ($150): </label>
          <input type="checkbox" name="item-3" id ="item-3"/>
          <br>
          <label for="item-4">HP Star Wars: Force Awakens Edition Laptop ($850): </label>
          <input type="checkbox" name="item-4" id ="item-4"/>
          <br>
          <label for="item-5">iPhone 6s ($750): </label>
          <input type="checkbox" name="item-5" id ="item-5"/>
          <br>
          <label for="item-6">Playstation 4 (Console Only) ($320): </label>
          <input type="checkbox" name="item-6" id ="item-6"/>
          <br>
          <label for="item-7">Sony Mirrorless Camera ($1500): </label>
          <input type="checkbox" name="item-7" id ="item-7"/>
          <br>
          <label for="item-8">Ultimate flying Drone ($855): </label>
          <input type="checkbox" name="item-8" id ="item-8"/>
          <br>
          <label for="item-9">External Hard Drive 1TB ($70): </label>
          <input type="checkbox" name="item-9" id ="item-9"/>
          <br>
          <input type="submit" value="Add To Shopping Cart" />
        </fieldset>
      </form>

      </div>

      <div class="items">
        <img src="images/40Samsung$255.jpg" style="width:20em; height: 20em;" >
        <p class="pricing">Samsung 40" Flatscreen TV</p>
        <p class="pricing">Price: $255</p>
      </div>

      <div class="items">
        <img src="images/bosequietheadphones$350.jpg" style="width:20em; height: 20em;" >
        <p class="pricing">Bose Ultra Quiet Headphones</p>
        <p class="pricing">Price: $350</p>
      </div>

      <div class="items">
        <img src="images/bosesoundminilink$150.jpg" style="width:20em; height: 20em;" >
        <p class="pricing">Bose Sound Minilink II</p>
        <p class="pricing">Price: $150</p>
      </div>

      <div class="items">
        <img src="images/hpstarwarslaptop$850.jpg" style="width:20em; height: 20em;" >
        <p class="pricing">HP Star Wars: Force Awakens Edition Laptop</p>
        <p class="pricing">Price: $850</p>
      </div>

      <div class="items">
        <img src="images/iphone6s$750.jpg" style="width:20em; height: 20em;" >
        <p class="pricing">iPhone 6s</p>
        <p class="pricing">Price: $750</p>
      </div>

      <div class="items">
        <img src="images/PS4$320.jpg" style="width:20em; height: 20em;" >
        <p class="pricing">Playstation 4 (Console Only)</p>
        <p class="pricing">Price: $320</p>
      </div>

      <div class="items">
        <img src="images/sonymirrorlesscamera$1500.jpg" style="width:20em; height: 20em;" >
        <p class="pricing">Sony Mirrorless Camera</p>
        <p class="pricing">Price: $1500</p>
      </div>

      <div class="items">
        <img src="images/ultimatedrone$855.jpg" style="width:20em; height: 20em;" >
        <p class="pricing">Ultimate flying Drone</p>
        <p class="pricing">Price: $855</p>
      </div>

      <div class="items">
        <img src="images/harddrive.jpg" style="width:20em; height: 20em;" >
        <p class="pricing">External Hard Drive 1TB</p>
        <p class="pricing">Price: $70</p>
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
