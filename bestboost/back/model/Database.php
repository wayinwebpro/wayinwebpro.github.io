<?php
class Database
{
    // my properties
    private static $user = 'nickvaku_bestboost';
    private static $pass = '9P6r^V*js7';
    private static $db = 'nickvaku_bestboost';
    private static $dsn = 'mysql:host=nickvaku.mysql.tools; dbname=nickvaku_bestboost';
    private static $dbcon;
    private function __construct()
    {
        
    }
    
    // get PDO connection
    public static function getDb(){
        if(!isset(self::$dbcon)){
            try{
                self::$dbcon = new PDO(self::$dsn, self::$user, self::$pass);
                // Display an error
                self::$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e){
                $msg = $e->getMessage();
                include '../customerror.php';
                exit();
            }
        }
        return self::$dbcon;
    } // end getDb function
} // end Database class
/*  
NOTES
PDO - PHP data object
dsn - data source name
 */