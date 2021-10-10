<?php

namespace App;

use Database\Database;

class Sale extends Database
{
    public static function all($payment_claimed = 0)
    {
        $sql = "SELECT * FROM `sales` WHERE `payment_claimed`=? ORDER BY `id` DESC";
        return parent::getRows($sql, [$payment_claimed]);
    }

    public static function create($order_id)
    {
        $sql = "INSERT INTO `sales`(`order_id`) VALUES (?)";
        return parent::insertRow($sql, [$order_id]);
    }
}
// Create a new item to instantiate a Connection
$order = new Sale;
