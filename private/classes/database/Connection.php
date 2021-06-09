<?php

namespace Database;

use PDO;
use PDOException;

class Connection
{
    protected static $database = null; // This holds the database connection

    // Database credentials
    private const DB_SERVER  = 'localhost';
    private const DB_USER    = 'root';
    private const DB_PASS    = '';
    private const DB_NAME    = 'database_name';
    private const DB_OPTIONS = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    public function __construct()
    {
        if (self::$database == null) {
            try {
                self::$database = new PDO("mysql:host=" . self::DB_SERVER . ";  dbname=" . self::DB_NAME . "; charset=utf8", self::DB_USER, self::DB_PASS, self::DB_OPTIONS);
            } catch (PDOException $e) {
                die('Connection Failed: ' . $e->getMessage());
            }
        }
    }

    // Open a database connection
    public static function open()
    {
        new self;
        return self::$database;
    }

    // Close the database connection
    public static function close()
    {
        if (isset(self::$database)) {
            self::$database = null;
        }
    }
}
