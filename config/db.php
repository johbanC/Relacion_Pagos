<?php
 
class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'u845733158_desarrollo', 'Rosa.2106', 'u845733158_desarrollo');
        $db->query("SET NAMES 'uft8'");
        return $db;
    }
}


/*
class Database{
    private static $db_host='localhost';

    private static $db_user='u845733158_johbanc';

    private static $db_pass='Rosa.2106';

    private static $db_name='u845733158_app';

    //using public static function to avoid overloading
    public static function connect() {
        $db=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
        if($db){
            echo "sorry";
        }else {
            echo "si";//return $db;
        }
    }
}
*/





?>