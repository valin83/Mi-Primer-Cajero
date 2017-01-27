<?php

class Database {
        
    private static $dbName = 'cajero';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    private static $cont = null;

    public function __construct() {
        exit('Init function is not allowed');
    }

    public static function connect() {
        
        $dbutf =  mysql_query("SET NAMES 'UTF8'");
        // to save data with ñ or á, é, í, ó, ú and uppercase
        
        // One connection through whole application
        if (null == self::$cont) {
            try {
                self::$cont = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect() {
        self::$cont = null;
    }   

}




?>