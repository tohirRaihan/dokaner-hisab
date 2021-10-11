<?php

require_once '../../../private/initialize.php';

use App\Order;
use App\Sale;
use App\User;

User::auth();
$id = $_GET['id'];
$claim_order = Order::claim($id);
$create_sale = Sale::create($id);

if ($claim_order) {
    $return['status'] = 'success';
} else {
    $return['status'] = 'failure';
}
echo json_encode($return);
