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
        return parent::getRows($sql, [$id]);
    }

    public static function create($name, $price, $unit_name)
    {
        $sql = "INSERT INTO `orders`(`name`, `price`, `unit_name`) VALUES (?, ?, ?)";
        return parent::insertRow($sql, [$name, $price, $unit_name]);

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
