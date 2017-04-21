<?php
  session_start();
  require_once('config.php');

  ///////////////////////
  //// LOGIN CHECKER ////
  ///////////////////////

  if ($_SESSION['login']){
    $temp_username = $_SESSION['login-username'];
    $temp_password = $_SESSION['login-password'];

    $good_login = false;
    $account_already_exists = false;

    $sql_query = "SELECT username, password FROM customers";
    try {
      $results = $db->query($sql_query);
      $customers = $results->fetchALL(PDO::FETCH_ASSOC);
    } catch(Exception $e){
      echo $e -> getMessage();
      die();
    }

    foreach($customers as $customer){
      if ($customer['username'] == $temp_username){
        if($customer['password'] == $temp_password){
          $good_login = true;
        }
      }
    }

    if($good_login){
      $sql_query = "SELECT * FROM customers WHERE username = '"
      . $temp_username . "' AND password = '" . $temp_password . "'";
      try {
        $results = $db->query($sql_query);
        $current_customer = $results->fetchALL(PDO::FETCH_ASSOC);
      } catch(Exception $e){
        echo $e -> getMessage();
        die();
      }

      print('<pre>');
      print_r($current_customer);
      print('</pre>');

      $_SESSION['current-customer-id'] = $current_customer[0]['customer_id'];
      $_SESSION['current-username'] = $current_customer[0]['username'];
      $_SESSION['current-password'] = $current_customer[0]['password'];
      $_SESSION['current-email'] = $current_customer[0]['email'];
      $_SESSION['current-first-name'] = $current_customer[0]['first_name'];
      $_SESSION['current-last-name'] = $current_customer[0]['last_name'];
      $_SESSION['current-phone-number'] = $current_customer[0]['phone_number'];
      $_SESSION['current-street'] = $current_customer[0]['street'];
      $_SESSION['current-city'] = $current_customer[0]['city'];
      $_SESSION['current-state'] = $current_customer[0]['state'];
      $_SESSION['current-zip-code'] = $current_customer[0]['zip_code'];

      header("Location: http://codd.cs.gsu.edu/~ajones172/project4/menu.php");
    }

  }

  /////////////////////////////
  //// NEW ACCOUNT CHECKER ////
  /////////////////////////////

  if ($_SESSION['new-customer']){

    // CHECK IF ACCOUNT EXISTS

    $sql_query = "SELECT username, password FROM customers";

    try {
      $results = $db->query($sql_query);
      $accounts = $results->fetchALL(PDO::FETCH_ASSOC);
    } catch(Exception $e){
      echo $e -> getMessage();
      die();
    }

    $good_login = true;
    $account_already_exists = false;

    foreach($accounts as $account){
      if ($account['username'] == $_SESSION['new-username']){
        if($account['password'] == $_SESSION['new-password']){
          $account_already_exists = true;
        }
      }
    }

    if ($account_already_exists == false) {
      $sql_query_new_account = 'INSERT INTO customers (username, password, email, first_name, last_name, phone_number, street, city, state, zip_code)
       VALUES (:username, :password, :email, :first_name, :last_name, :phone_number, :street, :city, :state, :zip_code)';

      $sql_query_new_account_array = array(
        "username" => $_SESSION['new-username'],
        "password" => $_SESSION['new-password'],
        "email" => $_SESSION['new-email'],
        "first_name" => $_SESSION['new-first-name'],
        "last_name" => $_SESSION['new-last-name'],
        "phone_number" => $_SESSION['new-phone-number'],
        "street" => $_SESSION['new-street'],
        "city" => $_SESSION['new-city'],
        "state" => $_SESSION['new-state'],
        "zip_code" => $_SESSION['new-zip-code']
      );
      try {
        $stmt = $db->prepare($sql_query_new_account);
        $stmt->execute($sql_query_new_account_array);
      } catch(Exception $e){
        echo $e -> getMessage();
        die();
      }

      $sql_query = "SELECT customer_id FROM customers WHERE username = '"
      . $_SESSION['new-username'] . "' AND password = '" . $_SESSION['new-password'] . "'";
      try {
        $results = $db->query($sql_query);
        $new_cust = $results->fetchALL(PDO::FETCH_ASSOC);
      } catch(Exception $e){
        echo $e -> getMessage();
        die();
      }

      $_SESSION['current-customer-id'] = $new_cust[0]['customer_id'];
      $_SESSION['current-username'] = $_SESSION['new-username'];
      $_SESSION['current-password'] = $_SESSION['new-password'];
      $_SESSION['current-email'] = $_SESSION['new-email'];
      $_SESSION['current-first-name'] = $_SESSION['new-first-name'];
      $_SESSION['current-last-name'] = $_SESSION['new-last-name'];
      $_SESSION['current-phone-number'] = $_SESSION['new-phone-number'];
      $_SESSION['current-street'] = $_SESSION['new-street'];
      $_SESSION['current-city'] = $_SESSION['new-city'];
      $_SESSION['current-state'] = $_SESSION['new-state'];
      $_SESSION['current-zip-code'] = $_SESSION['new-zip-code'];


      header("Location: http://codd.cs.gsu.edu/~jevans65/ElectronicsDepot/menu.php");
    }
  }

  /////////////////////////////
  //// NEW ACCOUNT CHECKER ////
  /////////////////////////////

  /*

  if ($_SESSION['update-account']){
    
  }

  function updateAccount(){
    $sql_query = "UPDATE customers
                  SET " . ;
    try {
      $results = $db->query($sql_query);
      $orders = $results->fetchALL(PDO::FETCH_ASSOC);
    } catch(Exception $e){
      echo $e -> getMessage();
      die();
    }
  }
  */

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
      <a href = "http://codd.cs.gsu.edu/~jevans65/ElectronicsDepot/main.html" style="text-decoration: none">
        <h1 id ="logo">Electronics Depot</h1></a>
      <div id="menu">
      </div>
    </header>

    <div id="main">
    <!-- *************** -->
    <!-- MAIN BODY START -->
    <!-- *************** -->

    <div id="main-center">
      <h2>Oops! Something went wrong...</h2>

      <?php
      if ($good_login == false){
        echo '<h3>Try logging in again.</h3>';
        echo '<a href = "http://codd.cs.gsu.edu/~jevans65/ElectronicsDepot/login.html"><h4>Login Here!</h4></a>';
      } else if ($account_already_exists){
        echo '<h3>Account Already Exists...</h3><h3>Make a new account!</h3>';
        echo '<a href = "http://codd.cs.gsu.edu/~jevans65/ElectronicsDepot/register.html"><h4>Sign up here!</h4></a>';
      } else {
        echo 'Something very weird happened...<br>';
        echo 'login event:';
        echo $good_login;
        echo 'account event:';
        echo $account_already_exists;
      }
      ?>

      <br>
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
