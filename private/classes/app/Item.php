<?php

namespace App;

use Database\Database;

class Item extends Database
{
    public static function getAll()
    {
        $sql = "SELECT * FROM `items` WHERE 1";
        return parent::getRows($sql, []);
    }
}
