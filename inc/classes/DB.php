<?php 
	// Als er geen CONSTANT is gedefinieerd genaamd __CONFIG__, laadt dit bestand dan niet. 
	if(!defined('__CONFIG__')) {
        exit('Er is geen config bestand');
    }
class DB {

    protected static $con;

    private function __construct() {

        try {

            self::$con = new PDO( 'mysql:charset=utf8mb4;host=localhost;port=8889;dbname=login_course', 'root', 'root');
            self::$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$con->setAttribute( PDO::ATTR_PERSISTENT, false);
        } catch (PDOException $e) {
            echo "Kan niet met database verbinden"; exit;
        }

    }

    public static function getConnection() {

        if (!self::$con) {
            new DB();
        }

        //Return the writeable db connection
        return self::$con;
    }

}
?>