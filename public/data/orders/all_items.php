<?php

require_once '../../../private/initialize.php';

use App\Item;

$items = Item::all();
echo json_encode($items);
