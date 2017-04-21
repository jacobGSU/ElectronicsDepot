<?php
  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];


  $_SESSION['login-username'] = $username;
  $_SESSION['login-password'] = $password;

  $_SESSION['login'] = true;
  $_SESSION['new-customer'] = false;

  header("Location: http://codd.cs.gsu.edu/~jevans65/ElectronicsDepot/user.php");

?>
