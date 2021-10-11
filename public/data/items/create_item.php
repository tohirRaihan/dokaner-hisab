<?php
require_once '../../../private/initialize.php';

use App\Item;

$response = file_get_contents('php://input');
$data     = json_decode($response, true);
// reciving all data
$name      = $data['name'];
$price     = $data['price'];
$unit_name = $data['unitName'];
// creating new item
$create_new_item = Item::create($name, $price, $unit_name);
if ($create_new_item) {
    $return['status'] = 'success';
} else {
    $return['status'] = 'failure';
}
echo json_encode($return);
