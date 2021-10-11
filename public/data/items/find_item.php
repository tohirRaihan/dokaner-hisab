<?php

require_once '../../../private/initialize.php';

use App\Item;
use App\User;

User::auth();
$id = $_GET['id'];
$item = Item::find($id);

echo json_encode($item);
