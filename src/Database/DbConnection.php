<?php

namespace App\Database;

class DbConnection
{
    /**
     * @var ?PDO used to represent database connection
     */
    private static ?\PDO $_db = null;

    private function __construct()
    {
        // singleton
    }

    /**
     * @return PDO used for database connection in models
     */
    public static function getDb(): \PDO
    {
        if (!self::$_db) {
            try {
                // Define PDO dsn & auth infos with env variables
                self::$_db = new \PDO('mysql:dbname=' . $_ENV['DB_NAME'] . ';host=' . $_ENV['DB_HOST'] . ';charset=' . $_ENV['DB_CHARSET'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);

                // Prevent emulation of prepared requests
                self::$_db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$_db;
    }
}