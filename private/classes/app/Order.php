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

    public static function lastDayOrders()
    {
        $sql = "SELECT
        COUNT(`id`) AS last_day_orders,
        SUM(`ordered_amount`) AS last_day_total
        FROM `orders`
        WHERE `created_at` BETWEEN CURDATE() - INTERVAL 1 DAY AND CURDATE()";
        return parent::getRow($sql, []);
    }
    public static function lastMonthOrders()
    {
        $sql = "SELECT
        COUNT(`id`) AS last_month_orders,
        SUM(`ordered_amount`) AS last_month_total
        FROM `orders`
        WHERE YEAR(`created_at`) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
        AND MONTH(`created_at`) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
        return parent::getRow($sql, []);
    }
}
// Create a new item to instantiate a Connection
$order = new Order;
