<?php
  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $first_name = $_POST['first-name'];
  $last_name = $_POST['last-name'];
  $phone_number = $_POST['number1'] . $_POST['number2'] . $_POST['number3'];
  $street = $_POST['street'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip_code = $_POST['zip-code'];

  $_SESSION['new-username'] = $username;
  $_SESSION['new-password'] = $password;
  $_SESSION['new-email'] = $email;
  $_SESSION['new-first-name'] = $first_name;
  $_SESSION['new-last-name'] = $last_name;
  $_SESSION['new-phone-number'] = (int)$phone_number;
  $_SESSION['new-street'] = $street;
  $_SESSION['new-city'] = $city;
  $_SESSION['new-state'] = $state;
  $_SESSION['new-zip-code'] = $zip_code;

  $_SESSION['login'] = false;
  $_SESSION['new-customer'] = true;

  /*
  if($_SESSION['update']){
    $_SESSION['update-account'] = true;
    $_SESSION['new-customer'] = false;
  } else {
    $_SESSION['update-account'] = false;
  }
  */


  header("Location: http://codd.cs.gsu.edu/~jevans65/ElectronicsDepot/user.php");
?>
