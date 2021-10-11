<?php
require_once '../../../private/initialize.php';

use App\Item;
use App\User;

User::auth();
$response = file_get_contents('php://input');
$data     = json_decode($response, true);
// reciving all data
$id        = $data['id'];
$name      = $data['name'];
$price     = $data['price'];
$unit_name = $data['unitName'];
// updating item
$update_item = Item::update($name, $price, $unit_name, $id);

if ($update_item) {
    $return['status'] = 'success';
} else {
    $return['status'] = 'failure';
}
echo json_encode($return);
