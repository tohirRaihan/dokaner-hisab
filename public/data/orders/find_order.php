<?php

require_once '../../../private/initialize.php';

use App\Order;

$id = $_GET['id'];
$order = Order::find($id);

echo json_encode($order);
