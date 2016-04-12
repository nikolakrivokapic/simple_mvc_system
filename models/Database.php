<?php

// singleton class

class Database {

     // set database credentials here
     private static $username = "your_username";
     private static $password = "your_password";
     private static $hostname = "localhost";
     private static $database = "testnikola";

    // for PDO connection object
    private static $instance;

    // private constructor
    private function __construct() {

        try {
            // assign PDO object to instance
            self::$instance = new PDO( "mysql:host=" . self::$hostname . ";dbname=" . self::$database . "", self::$username, self::$password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'") );
            self::$instance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch (PDOException $e) {
            // errors
            echo "Connection Error: " . $e->getMessage();
        }

    }

    // static method
    public static function getConnection() {

        // If no connection object exists then create one.
        if (!isset(self::$instance)) {
            // create Database object
              $object = __CLASS__;
              new $object;

        }

        //return connection.
        return self::$instance;
    }

       // disable clonning and wakeup for singleton class
       public function __clone()
    {
        return false;
    }

    public function __wakeup()
    {
        return false;
    }

}

?>