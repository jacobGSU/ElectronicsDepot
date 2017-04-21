<?php

$username = "ajones172";
$password = "ajones172";

// remove before flight
ini_set('display_errors', 'On');

try {
  $db = new PDO('mysql:host=localhost; dbname=ajones172', $username, $password);
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
  echo $e -> getMessage();
  die();
}

?>
