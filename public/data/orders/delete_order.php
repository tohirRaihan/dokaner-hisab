<?php
require_once '../../../private/initialize.php';

use App\Order;
use App\User;

User::auth();
$id = $_GET['id'];
$delete_order = Order::delete($id);

if ($delete_order) {
    $return['status'] = 'success';
} else {
    $return['status'] = 'failure';
}
echo json_encode($return);
