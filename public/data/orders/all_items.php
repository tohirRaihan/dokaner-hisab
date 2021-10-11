<?php

require_once '../../../private/initialize.php';

use App\Item;
use App\User;

User::auth();
$items = Item::all();
echo json_encode($items);
