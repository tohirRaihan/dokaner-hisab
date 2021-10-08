<?php

namespace App;

use Database\Database;

class Order extends Database
{
    public static function all()
    {
        $sql = "SELECT * FROM `orders` ORDER BY `id` DESC";
        return parent::getRows($sql, []);
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

    public static function update($name, $price, $unit_name, $id)
    {
        $sql = "UPDATE `orders` SET `name`=?,`price`=?,`unit_name`=? WHERE `id`=? LIMIT 1";
        return parent::updateRow($sql, [$name, $price, $unit_name, $id]);
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM `orders` WHERE `id`=? LIMIT 1";
        return parent::deleteRow($sql, [$id]);
    }
}
// Create a new item to instantiate a Connection
$order = new Order;
