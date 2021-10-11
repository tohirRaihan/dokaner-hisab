<?php
require_once '../../../private/initialize.php';

use App\Item;
use App\Order;
use App\User;

User::auth();
$response = file_get_contents('php://input');
$data     = json_decode($response, true);
// reciving all data
$customer_name = $data['customerName'];
$ordered_items = $data['orderedItems'];

// Calculate total ordered amount;
$ordered_amount = 0;
foreach ($ordered_items as $order_item) {
    $item             = Item::find($order_item['itemId']);
    $item_quantity    = $order_item['itemQuantity'];
    $item_price       = $item['price'];
    $item_total_price = $item_price * $item_quantity;
    $ordered_amount  += $item_total_price;
}
// send the ordered items as json file
$ordered_items = json_encode($ordered_items);

$create_new_order = Order::create($customer_name, $ordered_items, $ordered_amount);
if ($create_new_order) {
    $return['status'] = 'success';
} else {
    $return['status'] = 'failure';
}
echo json_encode($return);
