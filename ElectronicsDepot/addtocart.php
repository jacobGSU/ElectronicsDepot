<?php
  session_start();
  $current_customer_id = $_SESSION['current-customer-id'];
  $current_username = $_SESSION['current-customer-id'];
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

  if (isset($_POST['item-1'])){
    $item_1 = array(
      "customer_id" => $current_customer_id,
      "product_id" => 1,
      "item_name" => "Samsung 40 Flatscreent TV",
      "item_price" => 255
    );
    $items[] = $item_1;
  } else {
    $item_1 = null;
  }

  if (isset($_POST['item-2'])){
    $item_2 = array(
      "customer_id" => $current_customer_id,
      "product_id" => 2,
      "item_name" => "Bose Ultra Quiet Headphones",
      "item_price" => 350
    );
    $items[] = $item_2;
  } else {
    $item_2 = null;
  }

  if (isset($_POST['item-3'])){
    $item_3 = array(
      "customer_id" => $current_customer_id,
      "product_id" => 3,
      "item_name" => "Bose Sound Minilink II",
      "item_price" => 150
    );
    $items[] = $item_3;
  } else {
    $item_3 = null;
  }

  if (isset($_POST['item-4'])){
    $item_4 = array(
      "customer_id" => $current_customer_id,
      "product_id" => 4,
      "item_name" => "HP Star Wars: Force Awakens Edition Laptop",
      "item_price" => 850
    );
    $items[] = $item_4;
  } else {
    $item_4 = null;
  }

  if (isset($_POST['item-5'])){
    $item_5 = array(
      "customer_id" => $current_customer_id,
      "product_id" => 5,
      "item_name" => "iPhone 6s",
      "item_price" => 750
    );
    $items[] = $item_5;
  } else {
    $item_5 = null;
  }

  if (isset($_POST['item-6'])){
    $item_6 = array(
      "customer_id" => $current_customer_id,
      "product_id" => 6,
      "item_name" => "Playstation 4 (Console Only)",
      "item_price" => 320
    );
    $items[] = $item_6;
  } else {
    $item_6 = null;
  }

  if (isset($_POST['item-7'])){
    $item_7 = array(
      "customer_id" => $current_customer_id,
      "product_id" => 7,
      "item_name" => "Sony Mirrorless Camera",
      "item_price" => 1500
    );
    $items[] = $item_7;
  } else {
    $item_7 = null;
  }

  if (isset($_POST['item-8'])){
    $item_8 = array(
      "customer_id" => $current_customer_id,
      "product_id" => 8,
      "item_name" => "Ultimate flying Drone",
      "item_price" => 855
    );
    $items[] = $item_8;
  } else {
    $item_8 = null;
  }

  if (isset($_POST['item-9'])){
    $item_9 = array(
      "customer_id" => $current_customer_id,
      "product_id" => 9,
      "item_name" => "External Hard Drive 1TB",
      "item_price" => 70
    );
    $items[] = $item_9;
  } else {
    $item_9 = null;
  }

  if ($item_1 == null && $item_2 == null && $item_3 == null && $item_4 == null &&
      $item_5 == null && $item_6 == null && $item_7 == null && $item_8 == null &&
      $item_9 == null){
      header("Location: http://codd.cs.gsu.edu/~jevans65/ElectronicsDepot/inventory.php");
  } else {
    $_SESSION['items'] = $items;
    header("Location: http://codd.cs.gsu.edu/~jevans65/ElectronicsDepot/shoppingcart.php");
  }
?>
