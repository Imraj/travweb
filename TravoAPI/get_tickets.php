<?php
  include "connect.php";

  $userId = 1;

  $all_tickets = array();

  $query = mysql_query("SELECT * FROM tickets WHERE userId = '".$userId."' ");

  while($rows = mysql_fetch_array($query))
  {
    $ticket = array();
    $transactionId = $rows["transaction_id"];
    $ticketId = $rows["ticket_id"];
    $location = $rows["locationId"];
    $destination = $rows["destinationId"];
    $purchasedOn = $rows["purchasedOn"];
    $travelPlan = $rows["travelplanId"];

    $price = $rows["price"];
    $fullname = $rows["fullname"];
    $email_address = $rows["email_address"];
    $phone_number=  $rows["phone_number"];
    $agency = $rows["agency"];

    array_push($all_tickets,$ticket);
  }

  echo json_encode($all_tickets);

 ?>
