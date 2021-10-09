<?php

namespace App;

use Database\Database;

class Order extends Database
{
    public static function all($payment_claimed = 0)
    {
        $sql = "SELECT * FROM `orders` WHERE `payment_claimed`=? ORDER BY `id` DESC";
        return parent::getRows($sql, [$payment_claimed]);
    }

    public static function find($id)
    {
        $sql = "SELECT * FROM `orders` WHERE `id`=?";
        return parent::getRow($sql, [$id]);
    }

    public static function create($customer_name, $ordered_items, $ordered_amount)
    {
        $sql = "INSERT INTO `orders`(`customer_name`, `ordered_items`, `ordered_amount`) VALUES (?,?,?)";
        return parent::insertRow($sql, [$customer_name, $ordered_items, $ordered_amount]);
    }

    public static function update($customer_name, $ordered_items, $ordered_amount, $id)
    {
        $sql = "UPDATE `orders` SET `customer_name`=?, `ordered_items`=?, `ordered_amount`=? WHERE `id`=? LIMIT 1";
        return parent::updateRow($sql, [$customer_name, $ordered_items, $ordered_amount, $id]);
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM `orders` WHERE `id`=? LIMIT 1";
        return parent::deleteRow($sql, [$id]);
    }

    public static function claim($id)
    {
        $sql = "UPDATE `orders` SET `payment_claimed`=1 WHERE `id`=? LIMIT 1";
        return parent::deleteRow($sql, [$id]);
    }
}
// Create a new item to instantiate a Connection
$order = new Order;
