<?php
  session_start();
  require_once('config.php');
  date_default_timezone_set("America/New_York");
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

  $items = $_SESSION['items'];
  $time_stamp = time();

  // Create Order

  $sql_query_new_order = 'INSERT INTO orders (customer_id, time_stamp)
   VALUES (:customer_id, :time_stamp)';

  $sql_query_new_order_array = array(
    "customer_id" => $current_customer_id,
    "time_stamp" => $time_stamp
  );
  try {
    $stmt = $db->prepare($sql_query_new_order);
    $stmt->execute($sql_query_new_order_array);
  } catch(Exception $e){
    echo $e -> getMessage();
    die();
  }

  // Grab Recent Order ID

  $sql_query = "SELECT order_id FROM orders WHERE customer_id = '". $current_customer_id . "' AND time_stamp = '" . $time_stamp . "'";
  try {
    $results = $db->query($sql_query);
    $new_order = $results->fetchALL(PDO::FETCH_ASSOC);
  } catch(Exception $e){
    echo $e -> getMessage();
    die();
  }

  $order_id = $new_order[0]['order_id'];

  // Submit to Order Items table


  foreach($items as $item){
    $sql_query_new_order_items = 'INSERT INTO inventory (product_name, price, order_id)
     VALUES (:product_name, :price, :order_id)';

    $sql_query_new_items_array = array(
      "product_name" => $item['item_name'],
      "price" => $item['item_price'],
      "order_id" => $order_id
    );
    try {
      $stmt = $db->prepare($sql_query_new_order_items);
      $stmt->execute($sql_query_new_items_array);
    } catch(Exception $e){
      echo $e -> getMessage();
      die();
    }
  }
  header("Location: http://codd.cs.gsu.edu/~jevans65/ElectronicsDepot/viewcart.php");
?>
