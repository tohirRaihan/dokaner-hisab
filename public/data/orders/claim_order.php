<?php

require_once '../../../private/initialize.php';

use App\Order;

$id = $_GET['id'];
$claim_order = Order::claim($id);

if ($claim_order) {
    $return['status'] = 'success';
} else {
    $return['status'] = 'failure';
}
echo json_encode($return);
