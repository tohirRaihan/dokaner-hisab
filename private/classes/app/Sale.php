<?php

namespace App;

use Database\Database;

class Sale extends Database
{
    public static function dailySales($date)
    {
        $sql = "SELECT
                sales.order_id as order_id,
                orders.customer_name as customer_name,
                orders.ordered_amount as ordered_amount,
                orders.created_at as ordered_at,
                sales.created_at as paid_at
                FROM `sales`
                INNER JOIN `orders`
                ON sales.order_id = orders.id
                WHERE DATE(sales.created_at) = ?";
        return parent::getRows($sql, [$date]);
    }

    public static function create($order_id)
    {
        $sql = "INSERT INTO `sales`(`order_id`) VALUES (?)";
        return parent::insertRow($sql, [$order_id]);
    }
}
// Create a new item to instantiate a Connection
$order = new Sale;
