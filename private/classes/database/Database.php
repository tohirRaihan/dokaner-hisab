<?php

namespace Database;

use PDOException;

class Database extends Connection
{
    public static function getRow($query, $params = [])
    {
        try {
            $stmt = parent::$database->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getRows($query, $params = [])
    {
        try {
            $stmt = parent::$database->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function insertRow($query, $params = [])
    {
        try {
            $stmt = parent::$database->prepare($query);
            $stmt->execute($params);
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function updateRow($query, $params = [])
    {
        return self::insertRow($query, $params);
    }

    public static function deleteRow($query, $params = [])
    {
        return self::insertRow($query, $params);
    }
}
