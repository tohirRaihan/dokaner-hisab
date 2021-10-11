<?php

require_once '../../../private/initialize.php';

use App\Item;
use App\User;

User::auth();
$id = $_GET['id'];
$delete_item = Item::delete($id);

if ($delete_item) {
    $return['status'] = 'success';
} else {
    $return['status'] = 'failure';
}
echo json_encode($return);
