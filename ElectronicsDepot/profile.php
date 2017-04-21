<?php
  session_start();
  require_once('config.php');
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


  $sql_query = "SELECT order_id, product_name, price FROM inventory WHERE order_id IN (SELECT order_id FROM customers, orders WHERE customers.customer_id = orders.customer_id AND customers.customer_id = '" . $current_customer_id . "');";
  try {
    $results = $db->query($sql_query);
    $orders = $results->fetchALL(PDO::FETCH_ASSOC);
  } catch(Exception $e){
    echo $e -> getMessage();
    die();
  }

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


    <div id="menu-center">
      <h2>Welcome, <?php echo $current_first_name?> <?php echo $current_last_name?>!</h2>
      <h2>Your Account Information: </h2>
      <ul>
        <li><strong>Customer ID: </strong><?php echo $current_customer_id?></li>
        <li><strong>Username: </strong><?php echo $current_username?></li>
        <li><strong>Password: </strong><?php echo $current_password?></li>
        <li><strong>Email: </strong><?php echo $current_email?></li>
        <li><strong>First Name: </strong><?php echo $current_first_name?></li>
        <li><strong>Last Name: </strong><?php echo $current_last_name?></li>
        <li><strong>Phone Number: </strong><?php echo $current_phone_number?></li>
        <li><strong>Street: </strong><?php echo $current_street?></li>
        <li><strong>City: </strong><?php echo $current_city?></li>
        <li><strong>State: </strong><?php echo $current_state?></li>
        <li><strong>Zip Code: </strong><?php echo $current_zip_code?></li>
      </ul>
      <h2>Your Previous Orders: </h2>
      <table id ="previous-orders">
        <tr>
          <th>Order ID</th>
          <th>Product Name</th>
          <th>Price</th>
        </tr>
        <tr>
          <?php
            foreach($orders as $order){
              echo '<tr>';
              echo '<td>' . $order['order_id'] . '</td>';
              echo '<td>' . $order['product_name'] . '</td>';
              echo '<td>' . $order['price'] . '</td>';
            }
           ?>
        </tr>
      </table>
      <br>


      <!--
      <hr>

      <h2>Update Your Info:</h2>
      <form id="register" action="register.php" method="post">
        <label for="username">Create Username: </label>
        <input type="text" name="username" id="username"/>
        <br>

        <label for="password">Create Password: </label>
        <input type="text" name="password" id="password"/>
        <br>

        <label for="email">Email: </label>
        <input type="text" name="email" id ="email"/>
        <br>


        <label for="first-name">First Name: </label>
        <input type="text" name="first-name" id ="first-name"/>
        <br>

        <label for="last-name">Last Name: </label>
        <input type="text" name="last-name" id ="last-name"/>
        <br>

        <label for="number1">Phone Number: </label>
          (<input type="tel" name="number1" size=3>)
          <input type="tel" name="number2" size=3> -
          <input type="tel" name="number3" size=4>
        <br>

        <label for="street">Street: </label>
        <input type="text" name="street" id ="street"/>
        <br>

        <label for="city">City: </label>
        <input type="text" name="city" id ="city"/>
        <br>

        <label for "state">State: </label>
        <select name = "state" id="state">
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          <option value="AZ">Arizona</option>
          <option value="AR">Arkansas</option>
          <option value="CA">California</option>
          <option value="CO">Colorado</option>
          <option value="CT">Connecticut</option>
          <option value="DE">Delaware</option>
          <option value="DC">District Of Columbia</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="HI">Hawaii</option>
          <option value="ID">Idaho</option>
          <option value="IL">Illinois</option>
          <option value="IN">Indiana</option>
          <option value="IA">Iowa</option>
          <option value="KS">Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="ME">Maine</option>
          <option value="MD">Maryland</option>
          <option value="MA">Massachusetts</option>
          <option value="MI">Michigan</option>
          <option value="MN">Minnesota</option>
          <option value="MS">Mississippi</option>
          <option value="MO">Missouri</option>
          <option value="MT">Montana</option>
          <option value="NE">Nebraska</option>
          <option value="NV">Nevada</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NM">New Mexico</option>
          <option value="NY">New York</option>
          <option value="NC">North Carolina</option>
          <option value="ND">North Dakota</option>
          <option value="OH">Ohio</option>
          <option value="OK">Oklahoma</option>
          <option value="OR">Oregon</option>
          <option value="PA">Pennsylvania</option>
          <option value="RI">Rhode Island</option>
        	<option value="SC">South Carolina</option>
        	<option value="SD">South Dakota</option>
        	<option value="TN">Tennessee</option>
        	<option value="TX">Texas</option>
          <option value="UT">Utah</option>
          <option value="VT">Vermont</option>
          <option value="VA">Virginia</option>
          <option value="WA">Washington</option>
          <option value="WV">West Virginia</option>
          <option value="WI">Wisconsin</option>
          <option value="WY">Wyoming</option>
        </select>

        <br>
        <label for="zip-code">Zip Code: </label>
        <input type="text" name="zip-code" id ="zip-code"/>
        <br>
        <br>

        <input type="submit" value="Update Account" />
      </form>

      -->

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
